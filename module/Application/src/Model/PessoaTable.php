<?php

namespace Pessoa\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PessoaTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getPessoa($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function savePessoa(Pessoa $pessoa)
    {
        $data = [
            'name' => $pessoa->getName(),
            'lastname'  => $pessoa->getLastname(),
            'email' => $pessoa->getEmail(),
            'status' => $pessoa->getStatus(),
        ];

        $id = (int) $pessoa->getId();

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getpessoa($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update pessoa with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePessoa($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}