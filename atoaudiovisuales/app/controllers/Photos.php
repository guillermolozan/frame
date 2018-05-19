<?php 
namespace controllers;

class Photos extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}





	function detail(){



		$Photos=$this->loadModel('Photos');

		$Photos->setConfig([
					'photos'=>['fields'=>'id,name,file,fecha_creacion,url'],
				]);

		$gallery=$Photos->getItem();

		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>'photos',
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],
							'items' =>$gallery['items'],
							]

			]

		);

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		


	}	

	function grid(){


		$Photos=$this->loadModel('Photos');

		$gallery=$Photos->getItems();

		$gallery['name']='Eventos';

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

		$this->view->render(
			
			'layout_galleries'

		);	
	
	}






}
