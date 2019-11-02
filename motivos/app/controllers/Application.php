<?php 
namespace controllers;

class Application extends Controller {

	function __construct($params){

		parent::__construct($params);

	}
	
	function ubicacion($params){

		// $this->name='store';

		//map
		$map=[
				'lat'     =>'-12.0816025',
				'lon'     =>'-77.0358663',
				'name'    =>'Mis Motivos',
				'address' =>'Av. Arenales 1737 Lince Centro Comercial Arenales Tda. 2-9',
				'phone'   =>'Delivery 266-2715 / 987-703-261',
				'text'    =>"<strong>Mis Motivos</strong><br>
				Av. Arenales 1737 Lince <br>Centro Comercial Arenales Tda. 2-9<br>
				Delivery 987-703-261
				"
				];


		$this->view->render(
			
			'layout_application',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
		
				//map
				'map'				=>$map,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		


		$this->view->assign(
			[
				'title'			=> $this->name,

				//head
				'head_title'   => $local['name'].' - '.$this->title,



			]

		);



	}

}