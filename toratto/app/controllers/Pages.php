<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	

	function index($params){
		
		parent::index($params);

		parent::split();
		// prin($params);

		$this->view->assign(['banner'=>'banner-quienes-somos.jpg']);

		//render the view
		$this->view->render('layout_pages');

	}


}