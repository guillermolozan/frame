<?php 
namespace core\controllers;

class Photos extends \controllers\Controller {


	function grid(){


		$Photos=$this->loadModel('Photos');

		$gallery=$Photos->getItems();

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],							
							'items' =>$gallery['items'],
							]

			]

		);
	
	}



	function detail(){



		$Photos=$this->loadModel('Photos');

		$gallery=$Photos->getItem();

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
