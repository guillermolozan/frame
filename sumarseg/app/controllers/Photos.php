<?php 
namespace controllers;

class Photos extends \core\controllers\Photos {


	function __construct($params){

		parent::__construct($params);

	}



	function grid(){

		parent::grid();

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
