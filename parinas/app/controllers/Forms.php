<?php 
namespace controllers;

class Forms extends \core\controllers\Forms {

	var $admin_emails;
	
	var $fields;


	function __construct($params){

		parent::__construct($params);

		$this->admin_emails=[
			'hpptalara@hotmail.com',
			'reservas@hotelpuntaparinastalara.com',
			'hpptalara@hotmail.com',
			'servicios@prodiserv.com*',
			'guillermolozan@gmail.com*',
			// 'guillekldc@gmail.com',
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
				'text'    =>"<strong>".$this->view->vars['web_name']."</strong><br>\n".
						$this->view->vars['web_address']."<br>\n".
						"Celular: ".$this->view->vars['web_phone']
		];


		/*
		######## #### ######## ##       ########   ######
		##        ##  ##       ##       ##     ## ##    ##
		##        ##  ##       ##       ##     ## ##
		######    ##  ######   ##       ##     ##  ######
		##        ##  ##       ##       ##     ##       ##
		##        ##  ##       ##       ##     ## ##    ##
		##       #### ######## ######## ########   ######
		*/
		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'¿Cuál es tu nombre?',
			],

			'apellido'=>[
				'class' =>'validate',
				'label' =>'¿Cuál es tu apellido?',
			],	
			'email'=>[
				'class' =>'validate',
				'label' =>'¿Algún correo para escribirte?',
				'type'  =>'email',
			],						

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Facebook','Otros']
			],

			'comentario'=>[
				'class' =>'validate',
				'label' =>'Describe tu requerimiento',
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

		$this->view->assign(['banner_imagen'=>'banner-contactenos.jpg?3']);


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



	function reservar($params){

		$this->name = "Reservar";
		
		// prin($_POST);

		$this->fields=[

			'nombre'=>[
				// 'group' =>'',
				'class' =>'validate',
				'label' =>'Nombre',
				// 'divclass' =>'col s12 l6',
			],

			'apellido'=>[
				'class' =>'validate',
				'label' =>'Apellido',
				// 'divclass' =>'col s12 l6',
			],	
			'telefono'=>[
				'class' =>'validate',
				'label' =>'Teléfono de contacto',
				// 'type'  =>'phone',
			],				
			'email'=>[
				'class' =>'validate',
				'label' =>'Correo',
				'type'  =>'email',
			],	

			'llegada'=>[
				'label'    =>'Fecha de Ingreso',
				'type'     =>'date',
				'divclass' =>'col s12 l6',
				'value'    =>$_POST['llegada']
			],

			'salida'=>[
				'label'    =>'Fecha de Salida',
				'type'     =>'date',
				'divclass' =>'col s12 l6',
				'value'    =>$_POST['salida']				
			],

			'hab_individuales'=>[
				'group'    =>'N° Habitaciones',
				'label'    =>'Individual',
				'type'     =>'select',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3',
				'value'    =>$_POST['hab_individuales']
			],

			'hab_dobles'=>[
				'label'    =>'Doble',
				'type'     =>'select',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3',
				'value'    =>$_POST['hab_dobles']					
			],

			'hab_matrimoniales'=>[
				'label'    =>'Matrimonial',
				'type'     =>'select',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3',
				'value'    =>$_POST['hab_matrimoniales']						
			],

			'hab_triple'=>[
				'label'    =>'Triple',
				'type'     =>'select',
				'options'  =>['1','2','3','4','5'],
				'divclass' =>'col s12 l3',
				'value'    =>$_POST['hab_triple']							
			],					
	

		];


		$fields_reformated=$this->processFields();
		// prin($form);

		// prin($_SERVER);

		// prin($_POST);

		if($_SERVER['REQUEST_METHOD']=='POST' and $_POST['nombre'] and $_POST['apellido']){


			$email= new \controllers\Emails($this->view);

			// prin($email);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de Reserva",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reserva",
					'subtitle'   =>'Se recibió una reserva desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);


			// prin($sended);

			// exit();

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

		$this->view->assign(['banner_imagen'=>'banner-contactenos.jpg?3']);


		$this->view->render(
			
			'layout_reserva',

			[
				//head
				'head_title' => $this->name.' - '.$this->title,
				
				'title'      => $this->name,
				
				'message'    => $message,
				
				'contact'    => $fields_reformated,

				// 'map'				=> $map,

				//main
				// 'main_title' 	=> 'Home',

				//menu
				// 'menu_left'    => $this->elements->getMenuLeft(),
				// 'filters'   => $ele->getFilters(),
				// 'grid'      => $ele->getGrid(),
				
			]

		);		

	}




	function reclamaciones($params){

		$this->name = "Hoja de Reclamación";	

		/*
		######## #### ######## ##       ########   ######
		##        ##  ##       ##       ##     ## ##    ##
		##        ##  ##       ##       ##     ## ##
		######    ##  ######   ##       ##     ##  ######
		##        ##  ##       ##       ##     ##       ##
		##        ##  ##       ##       ##     ## ##    ##
		##       #### ######## ######## ########   ######
		*/
		$this->fields=[
			'nombre'=>[
				'group' =>'1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE',
				'required'=>'1',
				'label' =>'Nombre',
				'divclass' =>'col s12 l6',
			],
			'domicilio'=>[
				// 'group' =>'',
				'required'=>'1',
				'label' =>'Domicilio',
				'divclass' =>'col s12 l6',
			],			
				'documento_tipo'=>[
					// 'group'    =>'Tipo de Documento',
					'label'    =>'Tipo de Doc.',
					'type'     =>'select_materialize',
					'options'  =>['DNI','CE','Pasaporte'],
					'divclass' =>'col s4 l3',
					'required'=>'1',
					// 'value'    =>$_POST['hab_individuales']
				],
				'documento_numero'=>[
					// 'group' =>'',
					'required'=>'1',
					'label' =>'Num. Documento',
					'divclass' =>'col s8 l3',
					// 'divclass' =>'col s12 l6',
				],						
			'telefono'=>[
				'label' =>'Teléfono',
				'divclass' =>'col s12 l3',
				'required'=>'1',
				// 'type'  =>'phone',
			],
			'email'=>[
				'label' =>'Correo',
				'type'  =>'email',
				'divclass' =>'col s12 l3',
				'required'=>'1',
			],
			'padre'=>[
				// 'group' =>'',
				'label'=>'En caso de ser menor de edad',
				'placeholder' =>'Nombre de padre. En caso sea menor edad',
				'divclass' =>'col s12',
			],

			'servicio_tipo'=>[
				'group'    =>'2. IDENTIFICACIÓN DEL BIEN CONTRATADO',
				'label'    =>'Tipo de Servicio',
				'type'     =>'radio',
				'options'  =>['Producto','Servicio'],
				'divclass' =>'col s12 l3',
				// 'value'    =>$_POST['hab_individuales']
			],			
			'servicio_descripcion'=>[
				// 'group' =>'',
				'label' =>'Descripción',
				'required'=>'1',
				// 'type'  =>'textarea',
				// 'divclass' =>'col s12 l9',
			],

			'reclamo_tipo'=>[
				'group'    =>'3. DETALLE DE LA RECLAMACIÓN Y PEDIDO DEL CONSUMIDOR',
				'label'    =>'Tipo de Reclamo',
				'type'     =>'radio',
				'options'  =>['(1) Queja','(2) Reclamo'],
				// 'divclass' =>'col s12 l3',
				// 'value'    =>$_POST['hab_individuales']
			],			
			'reclamo_detalle'=>[
				'label' =>'Detalle',
				'type'  =>'textarea',
				'divclass' =>'col s12 l6',
				'required'=>'1',
			],
			'reclamo_pedido'=>[
				'label' =>'Pedido',
				'type'  =>'textarea',
				'divclass' =>'col s12 l6',
				'required'=>'1',
			],			


		];

		$fields_reformated=$this->processFields(
			// ['all'=>['autocomplete'=>'nope']]
		);
		// prin($fields_reformated);

		// prin($_SERVER);

		// prin($_POST);

		if($_SERVER['REQUEST_METHOD']=='POST' and $_POST['nombre'] and $_POST['apellido']){


			$email= new \controllers\Emails($this->view);

			// prin($email);

			$sended=$email->send(
				implode(',',$this->admin_emails),
				"Mensaje de la Hoja de Reclamación",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reclamación",
					'subtitle'   =>'Se recibió una reclamación desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended2=$email->send(
				$_POST['email'],
				"Mensaje de la Hoja de Reclamación",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reclamación",
					'subtitle'   =>'Ud. ha enviado una reclamación desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);
			// prin($sended);

			// exit();

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

		// $this->view->assign(['banner_imagen'=>'banner-servicios.jpg?3']);

		$this->view->render(
			
			'layout_reclamaciones',

			[
				//head
				'head_title' => $this->name.' - '.$this->title,
				
				'title'      => $this->name,

				// 'description'    => 'Descripción de la hoja de reclamación',
						
				'name'		=> 'reclamacion',

				'fields'    => $fields_reformated,
				
				'button'	 => 'Enviar',

				'message'    => $message,

				'web_razonsocial'=>'INVERSIONES PUNTA PARIÑAS S.A.C.',

				'web_ruc'=>'20526123141',
				
				'web_fecha'=>fecha_formato('now()','2'),



				// 'map'				=> $map,

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