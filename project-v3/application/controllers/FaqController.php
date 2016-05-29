<?php

class FaqController extends Zend_Controller_Action
{
    protected $_faq;
    
    public function init()
    {
        $this->_faq= new Application_Model_ModelFunctions();
        
    }

    public function indexAction()
    {
        $this->_faq = $this->_faq->getFaq();

        /*$paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($this->_faq));
        $paginator->setItemCountPerPage(2)
            ->setCurrentPageNumber($this->_getParam('page', 1));
*/
        $this->view->faq = $this->_faq;


    }


}

