<?php

namespace Pessoa\Model;

class Pessoa {
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $status;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name     = !empty($data['name']) ? $data['name'] : null;
        $this->lastname     = !empty($data['lastname']) ? $data['lastname'] : null;
        $this->email     = !empty($data['email']) ? $data['email'] : null;
        $this->status     = !empty($data['status']) ? $data['status'] : null;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }    
}