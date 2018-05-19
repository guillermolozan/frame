<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[
					// 'guillermolozan@gmail.com',
					'guilleprodiserv@gmail.com'
		];

		$this->template_dir='';

	}

	function contactenos(){

		$this->name = "Contáctenos";

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombres y Apellidos',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Correo electrónico',
				'type'  =>'email',
			],

			'telefono'=>[
				'label'=>'Teléfono / Móvil',
			],

			// 'proyecto'=>[
			// 	'class'=>'validate',
			// 	'label'=>'Estoy interesado en el proyecto',
			// 	'type' =>'select',
			// 	'options'=>get_valores("name","name","projects","where visibilidad=1")
			// ],

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Mensaje',
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

				// 'title' 			=> $this->name,

				'message'		=> $this->message,

				'fields'			=> $fields_reformated,

				// 'banner'			=> 'contacto-toratto-grupo-inmobiliario.jpg',

				'post'			=> [

					// 'name'	=> 'Contáctenos',
					
					'html'	=>'
						<h2>Contáctenos</h2>'
					]

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}




	function vende_tu_terreno(){

		$this->name = "Vende tu terreno";

		$this->fields=[

			'nombre'=>[
				'group' =>'Información del Propietario',
				'class' =>'validate',
				'label' =>'Nombres y Apellidos',
			],
			'direccion'=>[
				'class' =>'validate',
				'label' =>'Dirección',
			],			

			'telefono'=>[
				'class' =>'validate',
				'label'=>'Teléfono fijo',
			],

			'telefono'=>[
				'class' =>'validate',
				'label'=>'Teléfono móvil',
			],			

			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],

			'terreno_direccion'=>[
				'group' =>'Información del Terreno',
				'class' =>'validate',
				'label' =>'Dirección N°',
			],	

			'terreno_distrito'=>[
				'class' =>'validate',
				'label' =>'Distrito',
				'options'=>get_valores("nombre","nombre","geo_distritos","where visibilidad=1"),
				'type'  =>'select'
			],

			'terreno_area'=>[
				'class' =>'validate',
				'label' =>'Area',
			],
			'terreno_medidas'=>[
				'class' =>'validate',
				'label' =>'Medidas perimetrales',
			],
			'comentario'=>[
				'class' =>'validate',
				'label' =>'Comentarios Adiconales',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);


		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Vende tu terreno",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Vende tu Terreno",
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

				'banner'			=> 'banner-vende-terreno.jpg',

				'post'			=> [

					'name'	=> 'Vende tu terreno',
					'html'	=>'<p>Si usted es propietario de un terreno y le interesa negociarlo para el desarrollo de un proyecto inmobiliario, puede dejarnos sus datos completos y después de una evaluación, nos pondremos en contacto con usted.</p>'
					]

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}	

	function post_venta(){

		$this->name = "Post Venta";

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

			'proyecto'=>[
				'class'=>'validate',
				'label'=>'Proyecto',
				'type' =>'select',
				'options'=>get_valores("name","name","projects","where visibilidad=1")
			],

			'movil'=>[
				'class' =>'validate',
				'label'=>'Móvil',
			],

			'inmueble'=>[
				'class' =>'validate',
				'label'=>'Inmueble N°',
			],

			'ambiente'=>[
				'class' =>'validate',
				'label'=>'Ambiente',
			],		

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Descripción',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		
		// prin($fields_reformated);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Post Venta",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Post Venta",
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

				'banner'			=> 'banner-post-venta.jpg',

				'post'			=> [

					'name'	=> 'Post Venta',
					'html'	=>'

<p>Contamos con un Manual del Propietario, que tiene como propósito permitirle conocer y manejar toda la información que usted necesita para el mantenimiento general de su departamento. Además, detalla las medidas preventivas que le ayudaran a obtener el máximo bienestar y prolongación de la vida útil de su inmueble.</p>'
					]				


				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
			]

		);		

	}	



	function recomiendanos(){

		$this->name = "Recomiéndanos";

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

			'nombre1'=>[
				'class' =>'validate',
				'label' =>'Nombre Amigo 1',
			],

			'email1'=>[
				'class' =>'validate',
				'label' =>'Email Amigo 1',
				'type'  =>'email',
			],

			'nombre2'=>[
				'label' =>'Nombre Amigo 2',
			],

			'email2'=>[
				'label' =>'Email Amigo 2',
				'type'  =>'email',
			],			

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Mensaje',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($fields_reformated);

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Recomiéndanos",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Recomiendanos",
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

				'banner'			=> 'grupo-inmobiliario-toratto-departamentos-en-venta-peru.jpg',

				'post'			=> [

					'name'	=> 'Recomiendanos a tus amigos',
					'html'	=>'<p>Te brindaremos la mejor asesoría y atención personalizada para resolver cualquiera de tus consultas. Llámanos por teléfono, escríbenos un e-mail, visítenos en nuestras oficinas, caseta de ventas o envíenos este formulario de contacto. </p>
						<p>Caseta de ventas: Calle Joaquin Bernal 764 Lince.</p>'
					]


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