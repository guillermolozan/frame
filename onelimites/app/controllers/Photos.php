<?php 
namespace controllers;

class Photos extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}





	function index(){



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

		parent::grid();

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);	

	}







}
