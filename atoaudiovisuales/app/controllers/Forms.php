<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[
					// 'informes@asiste.pe',
					'servicios@prodiserv.com',
					'guillermolozan@gmail.com',
					'eventos@atoaudiovisuales.com.pe'
								 ];

	}

	function trabaja_con_nosotros(){

		$this->name = "Trabaja con Nosotros";

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],


			'apellidos'=>[
				'class' =>'validate',
				'label' =>'Apellidos',
			],

			'curriculum'=>[
				'label' =>'Curriculum',
				'type'  =>'file',
			],	


			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Trabaje con Nosotros",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Curriculum",
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
				"contacto");

		}




		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $this->message,

				'fields'			=> $fields_reformated,

				'banner'			=> 'trabajo_banner_bg.jpg'

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}	




	function haga_su_reserva(){

		$this->name = "Reserva";

		$this->fields=[

			'nombre'=>[
				'label' =>'Nombre y Apellidos',
				'class' =>'validate',
			],
			'ciudad'=>[
				'label'=>'Ciudad y Pais de Procedencia',
			],
			'fecha'=>[
				'label'=>'Fecha de servicio',
				'type'=>'date',
				'class'=>'datepicker'
			],
			'hora'=>[
				'label'=>'Hora exacta de servicio',
			],
			'desde'=>[
				'label'=>'Lugar de recojo',
				'type'  =>'select',
				'options'=>['Aeropuerto','Hotel','Domicilio']
			],			
			'desde_direccion'=>[
				'label'=>'Dirección de recojo en Lima',
			],
			'hasta_direccion'=>[
				'label'=>'Dirección de destino en Lima',
			],			
			'telefono'=>[
				'label'=>'Teléfono o Celular',
			],
			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],
			'aerolinea'=>[
				'label'=>'Aerolínea y N de vuelvo (servicio de llegada)',
			],
			'pasajeros'=>[
				'label'=>'Número de Pasajeros',
			],
			'tipo'=>[
				'label'=>'Tipo de Movilidad solicitada',
				'type'  =>'select',
				'options'=>['Auto','Van','Camioneta']
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
				"Mensaje de Haga su reserva",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reserva",
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


	function contactenos(){

		$this->name = "Contáctenos";

		$map=[
				'lat'     =>'-12.0763845',
				'lon'     =>'-77.045409',
				'name'    =>'Ato Audiovisuales',
				/*
				'address' =>'Av. Arenales 1737 Lince Centro Comerial Arenales Tda. 2-9',
				'phone'   =>'Delivery 266-2715 / 987-703-261',
				*/
				'text'    =>"<strong>Ato Audiovisuales</strong><br>
Jr. Coronel Felix Zegarra #786 - Jesús María. Lima Perú<br>
Email: eventos@atoaudiovisuales.com.pe
"
				];

		$this->fields=[

			'nombre'=>[
				'label' =>'Nombre y Apellidos',
				'class' =>'validate',
			],

			'ciudad'=>[
				'label'=>'Ciudad y Pais',
			],

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],			

			'telefono'=>[
				'label'=>'Teléfono o Celular',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

			'ciudad'=>[
				'label'=>'Empresa',
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