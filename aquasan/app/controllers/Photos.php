<?php 
namespace controllers;

class Photos extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}



	function grid(){

		parent::grid();

		$gallery=$this->view->vars['gallery'];
		$gallery['name']='Proyectos Recientes';
		unset($gallery['items'][0]);

		$this->view->assign(["gallery" => $gallery]);		
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
