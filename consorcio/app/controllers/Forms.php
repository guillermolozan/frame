<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[

			'informes@consorcioesi.com',
			'servicios@prodiserv.com',
			'guillermolozan@gmail.com',
		
		];

	}

	function contactenos($params){

		$this->name = "Contáctenos";

		$map=[
				'lat'     =>$this->view->vars['web_lat'],
				'lon'     =>$this->view->vars['web_lon'],
				'name'    =>$this->view->vars['web_name'],
				/*
				'address' =>'Av. Arenales 1737 Lince Centro Comerial Arenales Tda. 2-9',
				'phone'   =>'Delivery 266-2715 / 987-703-261',
				*/
				'text'    =>"<strong>".$this->view->vars['web_name']."</strong><br>
".$this->view->vars['web_address']."<br>
Celular: ".$this->view->vars['web_phone']."
"
				];

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],

			'dni'=>[
				'label'=>'DNI o Pasaporte',
			],

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
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

		$this->view->assign(['banner_imagen'=>'banner-contactenos.jpg?2']);


		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $message,

				'fields'			=> $fields_reformated,

				'map'				=> $map,

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