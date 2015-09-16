<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[

			'info@sginvestments.pe',
			'servicios@prodiserv.com',
			'guillermolozan@gmail.com',
		
		];

	}

	function contactenos($params){

		$this->name = "Contáctenos";

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],


			'dni'=>[
				'label'=>'DNI o Pasaporte',
			],

			'telefono'=>[
				'label'=>'Teléfono',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Correo',
				'type'  =>'email',
			],

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Mensaje o comentario',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){


			$message=(mail(

				implode(',',$this->admin_emails),

				"Mensaje de contacto desde ".$name,

				$this->emailFields()

				))?'Consulta Enviada':false;


			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");


		}

		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $message,

				'fields'			=> $fields_reformated,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}

}