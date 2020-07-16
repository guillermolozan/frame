<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	
	function index_form(){

		/*
		########  #######  ########  ##     ##
		##       ##     ## ##     ## ###   ###
		##       ##     ## ##     ## #### ####
		######   ##     ## ########  ## ### ##
		##       ##     ## ##   ##   ##     ##
		##       ##     ## ##    ##  ##     ##
		##        #######  ##     ## ##     ##
		*/
		$this->fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Producto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
				'required' =>'1',				
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono ',
				'required' =>'1',
			],

			'ciudad'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Ciudad',
			],	

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
				'required' =>'1',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
				'value' =>'Estoy interesado en el el producto '.$post['name'].'
			Por favor contacten conmigo.
			Gracias
			'],

		];

		
		$fields_reformated=processFields($this->fields);


		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				// $post['email'],
				// 'informes@detallitosmathias.com',
				// 'guillermolozan@gmail.com',
				// ,'.implode(',',$this->admin_emails),
				$this->view->vars['web_email_admin'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);

			if($sended){	$this->setMessage($email);		} 
			// else { echo 'noooo'; }

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

			// prin($this->message);

		}		

		$this->view->assign([	
			'contact'       =>$fields_reformated,
		]);


	}


	function index($params){

		parent::index(array_merge($params,
			[
				'with_gallery'	=>1,
				'with_form'		=>1,
			]
		));

		// prin($this->view->vars['menu_post']['items']);

		$this->view->assign(
			[
				'type'=>'photos',
				'item_responsive'=>'col s12 m6 l6',
				'ul_class'=>'block_gallery_products row',
			]
		);


		$fila=fila(
			"pdf,fecha_creacion",
			"paginas",
			"where id=".$params['item'],
			0,
			[
				'pdf'=>['get_archivo'=>[
					'carpeta'=>'pdf_fil',
					'fecha'=>'{fecha_creacion}',
					'file'=>'{pdf}',
					'tamano'=>'0'
					]
				],
			]			
		);

		// prin($params);

		// $menu_post=$this->view->vars['menu_post']['items'];

		// $this->index_form();

		// prin($this->view->vars['menu_post']);

		$this->view->vars['post']['pdf']=$fila['pdf'];
		
		$this->view->assign([	
			'post'       => $this->view->vars['post'],
			// 'menu_post'  => $menu_post
		]);


		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}
	

}