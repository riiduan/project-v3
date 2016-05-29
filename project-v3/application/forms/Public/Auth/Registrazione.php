<?php

class Application_Form_Public_Auth_Registrazione extends App_Form_Abstract
{
	public function init()
	{
		$this->setMethod('post');
        $this->setName('registrazione');
        $this->setAction('');
		
		$this->addElement('text', 'nome', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Nome',
            'decorators' => $this->elementDecorators,
            ));
		
		$this->addElement('text', 'cognome', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Cognome',
            'decorators' => $this->elementDecorators,
            ));
           	
       	$this->addElement('radio', 'genere', array(
            'multiOptions' => array('M' => 'M' , 'F' => 'F'),
            'required'   => true,
            'label'      => 'Genere',
            'decorators' => $this->radioDecorators,
            ));
		
		$this->addElement('text', 'eta', array(
            'required'   => true,
            'label'      => 'Età',
            'decorators' => $this->elementDecorators,
            ));
			
		$this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Username',
            'decorators' => $this->elementDecorators,
            ));
		
		
		
		$this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Password',
            'decorators' => $this->elementDecorators,
            ));
		
		$this->addElement('text', 'mail', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 40))
            ),
            'required'   => true,
            'label'      => 'Email',
            'decorators' => $this->elementDecorators,
            ));
		
		$this->addElement('text', 'telefono', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Numero di telefono',
            'decorators' => $this->elementDecorators,
            ));

        $this->addElement('radio', 'categoria', array(
            'multiOptions' => array('user' => 'user' ),
            'required'   => true,
            'label'      => 'Categoria',
            'decorators' => $this->radioDecorators,
        ));
		$this->addElement('submit', 'registrati', array(
            
            'label'      => 'Registrati',
            'decorators' => $this->buttonDecorators,
            ));


		$this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form')),
        		array('Description', array('placement' => 'prepend', 'class' => 'formerror')),
            'Form'
        ));
		
	}
}
