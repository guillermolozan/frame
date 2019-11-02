<?php 
namespace controllers;

class PhotosClients extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}





	function detail(){



		$Photos=$this->loadModel('Photos');

		$Photos->setConfig([
					'photos'=>[
						'table'  =>'galleries_clientes',
						'dir'    =>'galcli_imas',
						'fields' =>'id,name,file,fecha_creacion,url'
					],
				]);

		$gallery=$Photos->getItem();

		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>'links',
							'name'  =>'CLientes',
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
