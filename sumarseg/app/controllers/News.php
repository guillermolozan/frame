<?php 
namespace controllers;

class News extends \core\controllers\News {


	function grid(){

		parent::grid();

		//render the view
		$this->view->render(
			
			'layout_news_grid'

		);		

	}



	function detail(){

		parent::detail();

		//render the view
		$this->view->render(
			
			'layout_news_detail'

		);		

	}



}
