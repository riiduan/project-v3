<?php

class Application_Model_ModelAdmin extends App_Model_Abstract
{

    public function __construct()
    {
    }

  
    public function getUserByName($usrName){
        return $this->getResource('Utenti')->getUserByName($usrName);
    }

}