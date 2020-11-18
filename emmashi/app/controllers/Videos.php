<?php 
namespace controllers;

class Videos extends \core\controllers\Videos {


	function __construct($params){

		parent::__construct($params);

	}



	function grid(){


		$Videos=$this->loadModel('Videos');

		$gallery=$Videos->getItem([
			// 'where'  =>' and id_grupo='.$this->this_group
			'item' =>$this->this_group ,	
		]);

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>'videos',
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		

	}



	function detail(){

		parent::detail();

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		

	}



}
