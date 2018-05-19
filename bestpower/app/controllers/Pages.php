<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	

	function index($params){
		
		parent::index($params);

		parent::split();

		// prin($this->view->vars['group_post']);
		if($this->view->vars['group_post']=='Empresa')
			$this->view->assign(['banner'=>'banner3b.jpg']);
		if($this->view->vars['group_post']=='Servicios')
			$this->view->assign(['banner'=>'banner.jpg']);
		//render the view
		
		$this->view->render('layout_pages');

	}


}