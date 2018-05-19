<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[
					'guillermolozan@gmail.com',
					// 'wtavara@prodiserv.com',
					'wtavara@gmail.com',
					'richfel@yahoo.com',
					'terranova.traducciones@yahoo.com'
		];

	}



	function contactenos(){

		$this->name = "Contáctenos";

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

			'pais'=>[
				'label'=>'País',
			],

			// 'telefono'=>[
			// 	'label'=>'Teléfono',
			// ],



			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>[
					'Internet',
					'Facebook',
					'Twitter',
					'Linkedin',
					'Publicidad Tradicional',
					'Recomendación de un amigo',
						// 'Web',
						// 'Periódico',
						// 'Revista',
						// 'Televisión',
						// 'Panel Publicitario',
						// 'Un conocido nos recomendó',
					'Otros'
				]
			],	

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Consulta',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Contáctenos",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Contacto",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);


			if($sended){	$this->setMessage($email);		} 


			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto"
			);


		}

		// parent::split();
		// prin($params);


		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,

				'message'		=> $this->message,

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