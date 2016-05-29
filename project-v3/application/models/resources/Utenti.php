<?php

class Application_Resource_Utenti extends Zend_Db_Table_Abstract
{
    protected $_name    = 'utenti';
    protected $_primary  = 'idutenti';
    protected $_rowClass = 'Application_Resource_Utenti_Item';

    public function init()
    {
    }

    public function getUserByName($usrName)
    {
        return $this->fetchAll($this->select()->where('username = ?',$usrName));
    }

    /**
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getUserAll()
    {
        return $this->fetchAll($this->select()->where('idutenti != 0'));
    }

    public function insertUser($info=Null)
    {
        $this->insert($info);
    }
}

