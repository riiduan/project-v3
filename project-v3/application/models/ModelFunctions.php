<?php

class Application_Model_ModelFunctions extends App_Model_Abstract
{
    public function getFaq()
     {
         return $this->getResource('Faq')->getFaq();
     }

    public function insertFaq($info){
         return $this->getResource('Faq')->insertFaq();


     }


    public function getUserByName($usrName){
        return $this->getResource('Utenti')->getUserByName();
    }

    public function getUserAll()
    {
        return $this->getResource('Utenti')->getUserAll();
    }

    public function saveUser($info)
    {
        return $this->getResource('Utenti')->insertUser($info);
    }

}