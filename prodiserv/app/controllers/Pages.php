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

		$parts=explode('/',$params['uri']);

		if($parts[0]=='ing-walter-tavara-aviles'){

			$parts2=explode('|',$this->view->vars['head_title']);
			// prin($this->view->vars['head_title']);
			$this->view->assign(
				[
					'head_title'    => $parts2[0]." | Ing. Walter Tavara",
				]
			);
		}

		//render the view
		$this->view->render('layout_pages');



	}

}