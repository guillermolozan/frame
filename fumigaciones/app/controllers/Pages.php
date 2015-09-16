<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index(){
		
		parent::index();

		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}


}