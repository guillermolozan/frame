<?php 

namespace controllers;

class Emails extends \core\Emails {

	var $vars           = [];
	var $test           = false;
	var $logo           = 'logo.jpg';
	var $logo_height    = '70px';
	
	var $smtp_Host      = 'mail.torattogrupoinmobiliario.com';
	var $smtp_Username  = 'no-reply@torattogrupoinmobiliario.com';
	var $smtp_Password  = 'prueba';
	var $from_email     = 'no-reply@torattogrupoinmobiliario.com';
	
	var $email_template = "email_default";

	public function __construct($view){

		parent::__construct($view);

	}

}