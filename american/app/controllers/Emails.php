<?php 

namespace controllers;

class Emails extends \core\Emails {

	var $vars          = [];
	var $test          = false;
	var $logo          = 'logo.png?3';
	var $logo_height   = '70px';

	// var $from_email 	 = 'no-reply@prodiserv.com';
	// var $smtp_Host     = 'mail.incaclick.com';
	// var $smtp_Username = 'prueba@incaclick.com';
	// var $smtp_Password = 'platano5';

	var $smtp_Host      = 'mail.detallitosmathias.com';
	var $smtp_Username  = 'no-reply@detallitosmathias.com';
	var $smtp_Password  = 'no-reply';
	var $from_email     = 'no-reply@detallitosmathias.com';


	var $email_template = "email_default";

	public function __construct($view){

		parent::__construct($view);

	}

}