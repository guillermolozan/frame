<?php 

namespace controllers;

class Emails extends \core\Emails {

	var $vars          = [];
	var $test          = false;
	var $logo          = 'aquasan-small.png';
	var $logo_height   = '70px';
	var $from_email    = 'mesadepartes@aquasan.com.pe';
	
	var $smtp_Host     = 'mail.incaclick.com';
	var $smtp_Username = 'prueba@incaclick.com';
	var $smtp_Password = 'platano5';

	var $email_template = "email_default";

	public function __construct($view){

		parent::__construct($view);

	}

}