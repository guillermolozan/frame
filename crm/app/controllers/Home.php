<?php 
namespace controllers;

class Home extends Controller {

	function index($params){

		parent::index();

		$this->view->render(
			
			'layout_modules',

			[
				//main
				'main_title' 	=> 'Home',

				//menu
				'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);


	}

}