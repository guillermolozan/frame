<?php
namespace controllers;


class Modules extends Controller {

	function index($params){

		parent::index();

		$this->view->render(

			'layout_modules',

			[
				//main
				'main_title' 	=> $this->elements->title($params['param']),

				//menu
				'menu_left'    => $this->elements->getMenuLeft($params['param']),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
				
			]
		);

	}


}