<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){
		
		parent::index($params);

		//render the view
		$this->view->render('layout_pages');

	}

}