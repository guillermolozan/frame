<?php 

namespace controllers;

class Emails extends \core\Emails {

	var $vars           = [];
	var $test           = false;
	var $logo           = 'logobespower.png';
	var $logo_height    = '70px';
	
	var $smtp_Host      = 'mail.bestpowerperu.com';
	var $smtp_Username  = 'no-reply@bestpowerperu.com';
	var $smtp_Password  = 'no-reply';
	var $from_email     = 'no-reply@bestpowerperu.com';
	
	var $email_template = "email_default";

	public function __construct($view){

		parent::__construct($view);

	}

}