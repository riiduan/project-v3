<?php

class Application_Resource_Faq extends Zend_Db_Table_Abstract
{
    protected $_name = 'faq';
    protected $_primary = 'id_faq';
    protected $_rowClass = 'Application_Resource_Faq_Item';

    public function init()
    {
    }

    public function getFaq()
    {
        $select = $this->select()
            ->where('id_faq != 0');
        return $this->fetchAll($select);
    }

    public function insertFaq($info)
    {
        $this->insert($info);
    }
}