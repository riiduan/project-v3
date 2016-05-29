<?php

class PublicController extends Zend_Controller_Action
{

	protected $_modelFunctions;
	protected $_loginform;
	protected $_authService;
	protected $_formUser;
	protected $_form;

	// devo definire il modello

	public function init()
	{
		$this->_modelFunctions = new Application_Model_ModelFunctions();
		$this->_authService = new Application_Service_Auth();
		$this->_helper->layout->setLayout('layout');
		$this->view->loginForm = $this->getLoginForm();
		$this->view->userForm = $this->getUserForm();//inietto metodo getRegistratiForm nel view
		//devo instanziare il modello
	}

	public function indexAction()
	{

	}
	public function viewstaticAction()
	{
		$page = $this->_getParam('staticPage');
		$this->render($page);
	}

	
	
	
	
	
	//-------------------------qui inizia la parte del login--------------
	

	public function loginAction()
	{
		if(Zend_Auth::getInstance()->hasIdentity()){

			$this->_redirect('index/index');}

	}


	public function authenticateAction()
	{
		$request = $this->getRequest();
		if (!$request->isPost()) {
			return $this->_helper->redirector('login');
		}
		$form = $this->_form;
		if (!$form->isValid($request->getPost())) {
			$form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
			return $this->render('login');
		}
		if (false === $this->_authService->authenticate($form->getValues())) {
			$form->setDescription('Autenticazione fallita. Riprova');
			return $this->render('login');
		}
		//return $this->_helper->redirector('index', $this->_authService->getIdentity()->role);
	}

	

	private function getLoginForm()
	{
		$urlHelper = $this->_helper->getHelper('url');
		$this->_form = new Application_Form_Public_Auth_Login();
		$this->_form->setAction($urlHelper->url(array(
			'controller' => 'public',
			'action' => 'authenticate'),
			'default'
		));
		return $this->_form;
	}

	// Validazione AJAX
	public function validateloginAction()
	{
		$this->_helper->getHelper('layout')->disableLayout();
		$this->_helper->viewRenderer->setNoRender();

		$loginform = new Application_Form_Public_Auth_Login();
		$response = $loginform->processAjax($_POST);
		if ($response !== null) {
			$this->getResponse()->setHeader('Content-type', 'application/json')->setBody($response);
		}
	}

		public function logoutAction()
		{


			$authAdapter = $this->_authService->clear();
			$this->_redirect('index/index');


		}

	//-----------------------Qui inizia la parte del registrazione del utente (non login)


	public function registrazioneAction()
	{

	}

	public function adduserAction()
	{
		if (!$this->getRequest()->isPost()) {
			$this->_helper->redirector('index');
		}
		$forms=$this->_formUser;
		if (!$forms->isValid($_POST)) {
			$forms->setDescription('Attenzione: alcuni dati inseriti sono errati.');
			return $this->render('registrazione');
		}
		$values = $forms->getValues();
		$this->_modelFunctions->saveUser($values);
		$this->_helper->redirector('index');
	}

	// Validazione AJAX
	public function validateUserAction()
	{
		$this->_helper->getHelper('layout')->disableLayout();
		$this->_helper->viewRenderer->setNoRender();

		$userform = new Application_Form_Public_Auth_Registrazione();
		$response = $userform->processAjax($_POST);
		if ($response !== null) {
			$this->getResponse()->setHeader('Content-type','application/json')->setBody($response);
		}
	}

	private function getUserForm()
	{
		$urlHelper = $this->_helper->getHelper('url');
		$this->_formUser = new Application_Form_Public_Auth_Registrazione();
		$this->_formUser->setAction($urlHelper->url(array(
			'controller' => 'public',
			'action' => 'adduser'),
			'default'
		));
		return $this->_formUser;
	}


	public function registrazioneEffettuataAction()
	{

	}

	
}