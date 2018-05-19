<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){
		
		$params['with_gallery']=1;

		parent::index($params);

		//render the view
		$this->view->render('layout_pages');

	}

}