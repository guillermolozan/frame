<?php 
namespace controllers;

class News extends \core\models\News {

	function grid($params){


		parent::index($params);


		$this->view->assign(
			$this->model_grid()
		);


		//render the view
		$this->view->render(
			
			'layout_news_grid'

		);		

	}



	function detail($params){


		parent::index($params);


		$this->view->assign(
			$this->model_detail()
		);


		//render the view
		$this->view->render(
			
			'layout_news_detail'

		);		

	}



}
