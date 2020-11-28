<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;

	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=$this->view->vars['web_email_admin'];

	}

	function contactenos($params=null){

		$this->name = "Contáctenos";

		$map=[
			'lat'     =>$this->view->vars['web_lat'],
			'lon'     =>$this->view->vars['web_lon'],
			'name'    =>$this->view->vars['web_name'],
			/*
			'address' =>'Av. Arenales 1737 Lince Centro Comerial Arenales Tda. 2-9',
			'phone'   =>'Delivery 266-2715 / 987-703-261',
			*/
			'text'    =>"<strong>".$this->view->vars['web_name']."</strong><br>\n"
			.$this->view->vars['web_address']."<br>\n"
			."Celular: ".$this->view->vars['web_phone']."\n"
		];

		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombres y Apellidos',
			],

			'ciudad'=>[
				'class' =>'validate',
				'label' =>'Ciudad y Pais',
			],	
			
			'medio'=>[
				'class' =>'validate',
				'label' =>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],
			
			'telefono'=>[
				'class' =>'validate',
				'label' =>'Teléfono o Celular*',
			],
			
			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
			],	
			
			'empresa'=>[
				'class' =>'validate',
				'label' =>'Empresa',
			],

			'comentario'=>[
				'label' =>'Comentario',
				'type'  =>'textarea',
			],

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		if($_SERVER['REQUEST_METHOD']=='POST'){


			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Contactenos",
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

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de contacto",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Contacto",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);
			
			if($sended){	$this->setMessage($email);		} 
			// if($sended_response){	$this->setMessage($email);		} 


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

		// $this->view->assign(['banner_imagen'=>'banner-contactenos.jpg?2']);
		
		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' '.$this->pipe.' '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $this->message,

		

				'form_fields'			=> $fields_reformated,

				// 'map'				=> $map,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),

				/*
				 dP""b8 8b    d8    db    88""Yb
				dP   `" 88b  d88   dPYb   88__dP
				Yb  "88 88YbdP88  dP__Yb  88"""
				 YboodP 88 YY 88 dP""""Yb 88
				*/
				// 'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',
				
				/*
				88""Yb 888888  dP""b8    db    88""Yb 888888  dP""b8 88  88    db
				88__dP 88__   dP   `"   dPYb   88__dP   88   dP   `" 88  88   dPYb
				88"Yb  88""   Yb       dP__Yb  88"""    88   Yb      888888  dP__Yb
				88  Yb 888888  YboodP dP""""Yb 88       88    YboodP 88  88 dP""""Yb
				*/
				'recaptcha'				=>	[
					'site_key'				=>	'6Lfr4-IZAAAAAEO0R90iBDZHuT5-zBM-47ALzIey',
					'secret_key'			=>	'6Lfr4-IZAAAAAEAo1zedNJjWIP_84dohG4MJByQu',
				],

				'more_metas' 			=> str_replace("\n","",'
					<meta name="language" content="Español,Ingles">
					<meta name="Subject" content="Blindaje Autos Perú :: Contáctenos">
					<meta name="revisit-after" content="1 days">
				')				

			]

		);		

	}

	function suscribete($params=null){

		$this->name = "Suscríbete";

		$map=[
			'lat'     =>$this->view->vars['web_lat'],
			'lon'     =>$this->view->vars['web_lon'],
			'name'    =>$this->view->vars['web_name'],
			/*
			'address' =>'Av. Arenales 1737 Lince Centro Comerial Arenales Tda. 2-9',
			'phone'   =>'Delivery 266-2715 / 987-703-261',
			*/
			'text'    =>"<strong>".$this->view->vars['web_name']."</strong><br>\n"
			.$this->view->vars['web_address']."<br>\n"
			."Celular: ".$this->view->vars['web_phone']."\n"
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
				'class' =>'validate',
				'label'=>'Celular',
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
				"Mensaje de Contactenos",
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

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de contacto",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Contacto",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);
			
			if($sended){	$this->setMessage($email);		} 
			// if($sended_response){	$this->setMessage($email);		} 


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

		// $this->view->assign(['banner_imagen'=>'banner-contactenos.jpg?2']);

		
		$this->view->render(
			
			'layout_forms',

			[
				//head
				'head_title'   => $this->name.' - '.$this->title,

				'title' 			=> $this->name,
				
				'message'		=> $this->message,

				'fields1'			=> [
					$fields_reformated[0],
					$fields_reformated[1],
					$fields_reformated[2],
					$fields_reformated[3],
					$fields_reformated[4]
				],

				'fields2'			=> [$fields_reformated[5]],

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