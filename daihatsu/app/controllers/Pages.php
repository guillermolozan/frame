<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	

	function index($params){
		
		parent::index($params);

		parent::split();

		// prin($this->collapsible($this->view->vars['post']['html']));
		if($params['item']=='4')
			$this->view->assign(['banner'=>'banner-empresa.jpg']);
		// elseif($params['item']=='17')
		// 	$this->view->assign(['banner'=>'banner-post-venta.jpg']);
		else
			$this->view->assign(['banner'=>'banner-servicios.jpg']);

		//render the view
		$this->view->render('layout_pages');

	}


}