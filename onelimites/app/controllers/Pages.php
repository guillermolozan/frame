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
		// prin($this->view->vars['group_post']);
		if($params['item']=='3')
			$this->view->assign(['banner'=>'banner.jpg']);
		else
			$this->view->assign(['banner'=>'banner3b.jpg']);		
		//render the view
		$this->view->render('layout_pages');

	}


}