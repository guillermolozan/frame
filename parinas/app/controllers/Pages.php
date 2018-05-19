<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index($params){
		
		parent::index($params);
		
		// parent::split();

		// prin($this->collapsible($this->view->vars['post']['html']));
		if($this->view->vars['group_post']=='SERVICIOS')
			$this->view->assign(['banner_imagen'=>'banner-servicios.jpg?4']);
		else
			$this->view->assign(['banner_imagen'=>'banner-empresa.jpg?4']);

		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}

}