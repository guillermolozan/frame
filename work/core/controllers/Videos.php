<?php 
namespace core\controllers;

class Videos extends \controllers\Controller {


	function grid(){


		$Videos=$this->loadModel('Videos');


		$gallery=$Videos->getItems();

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);


	}


	function detail(){


		$Videos=$this->loadModel('Videos');


		$gallery=$Videos->getItem();

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>$gallery['type'],
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],
							'items' =>$gallery['items'],
							]

			]

		);
	

	}


}
