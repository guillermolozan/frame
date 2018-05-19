<?php 
namespace controllers;

class Emails extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){
		
		parent::index($params);

		//render the view
		$this->view->render('layout_emails');

	}

}