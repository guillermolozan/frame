<?php 
namespace controllers;

class Meta extends \core\controllers\Meta {


	function __construct($params){

		parent::__construct($params);

	}
	
	function index($params){
		
		$this->project= [

			'single'=>[
				[
					'Quienes Somos',
					'Terminos y Condiciones',
				]
			],

			'blocks'=>[
				[
					'bloque 1'=>'Taxi Programado',
					'bloque 2'=>'Cobertura',
				]
			],
			
			'banners'=>[
				[
					'Home',
				]
			],

			'group'=>[
				[
					'Servicios',
					'Tarifas',
					'Notas de Interés',
				]
			],

			'photos'=>[
				[
					'clientes',
				]
			],

			'forms'=>[
				[
					'Haga su reserva',
					'Contáctenos',
					'Trabaja con Nosotros',
				]
			],

		];

		prin($this->project);

	}

}