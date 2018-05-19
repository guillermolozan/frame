<?php 
namespace controllers;

class Blog extends Controller {

	function index($params){

		parent::index();

		$this->view->render(
			
			'layout_modules',

			[
				//head
				'head_title'   => 'Rinconcito Ayacuchano',
				
				
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