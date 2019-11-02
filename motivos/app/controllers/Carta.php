<?php 
namespace controllers;

class Carta extends Controller {

	function __construct($params){

		parent::__construct($params);

	}

	function index(){
		

		$this->name='Carta';

		//photo
		$photos=[
					'name' =>$this->name,

					'items'=>select(
						"fecha_creacion,file,nombre as name,descripcion as text",
						"carta_fotos",
						"where visibilidad=1",
						0,
						[
							'img'=>['get_archivo'=>[
														'carpeta'=>'car_imas',
														'fecha'=>'{fecha_creacion}',
														'file'=>'{file}',
														'tamano'=>'0'
														]
													]	
						]									
					)
				];


		$this->view->assign(
			[
				'title'			=> $this->name,

				//head
				'head_title'   => $this->name.' - '.$this->title,

				//photos
				"gallery"    	=> $photos,

			]

		);


		$this->view->render(
			
			'layout_carta'

		);


	}

}