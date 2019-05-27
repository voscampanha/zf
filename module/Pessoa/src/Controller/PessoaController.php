<?php

namespace Pessoa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Pessoa\Model\PessoaTable;
use Pessoa\Model\Pessoa;
use Pessoa\Form\PessoaForm;


class PessoaController extends AbstractActionController{

    private $table;

    public function __construct(PessoaTable $table){
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(['pessoas' => $this->table->fetchAll()]);
    }

    public function addAction()
    {
        $form = new PessoaForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $pessoa = new Pessoa();
        $form->setInputFilter($pessoa->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $pessoa->exchangeArray($form->getData());
        $this->table->savePessoa($pessoa);
        return $this->redirect()->toRoute('pessoa');
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }

}