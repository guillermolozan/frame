<?php 

namespace controllers;

class Emails extends \core\Emails {

	var $vars          = [];
	var $test          = false;
	var $logo          = 'logo.png';
	var $logo_height   = 'auto';
	var $from_email 	 = 'no-reply@prodiserv.com';
	
	var $smtp_Host     = 'mail.incaclick.com';
	var $smtp_Username = 'prueba@incaclick.com';
	var $smtp_Password = 'platano5';

	var $email_template = "email_default";

	public function __construct($view){

		parent::__construct($view);

	}

}