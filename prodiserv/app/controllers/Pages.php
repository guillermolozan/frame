<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		if($params['item']=='home'){
			
			$id_grupo=dato("id","paginas_groups","where url='".$params['uri']."'",0);
			$params['item']=dato("id","paginas","where id_grupo=$id_grupo and weight = '-1'",0);

		}

		parent::__construct($params);

	}
	


	function index($params){
		
		parent::index($params);
		
		//render the view
		$this->view->render('layout_pages');

	}

}