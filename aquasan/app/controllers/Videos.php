<?php 
namespace controllers;

class Videos extends \core\controllers\Videos {


	function __construct($params){

		parent::__construct($params);

	}


	function grid(){


		$Videos=$this->loadModel('Videos');



		if($this->params['uri']=='trabajos-realizados'){

			$gallery=$Videos->getItems(['where'=>' and id_grupo=1 ']);
			$gallery['name']='Trabajos Realizados';

		}
		elseif($this->params['uri']=='videos-tutoriales'){

			$gallery=$Videos->getItems(['where'=>' and id_grupo=2 ']);
			$gallery['name']='Videos Tutoriales';

		}
		
		
		
		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);

		$this->view->assign(["gallery" => $gallery]);

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);			


	}


	function detail(){

		parent::detail();
		
		$group=dato("id_grupo","galleries_videos","where id=".$this->params['item']);
		$menu_top=$this->view->vars['menu_top'];
		if($group=='1'){
			$menu_top[5]['class']='active';
		}
		if($group=='2'){
			$menu_top[4]['class']='active';
		}		
		$this->view->assign(["menu_top" => $menu_top]);	
		// prin($this->view->vars);
		// if($this->params['item']=='1'){
		// 	unset($menu_top[5]['class']);
		// 	$this->view->assign(["menu_top" => $menu_top]);	
		// }

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		

	}



}
