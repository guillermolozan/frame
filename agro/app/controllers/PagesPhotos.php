<?php 
namespace controllers;

class PagesPhotos extends \controllers\Controller {


	function __construct($params){

		parent::__construct($params);

	}


	function grid(){

		// call Photos Model
		$Gallery=$this->loadModel('Photos');

		$Gallery->setConfig([
					'items'  =>['table'=>'pages_photos'],
					'photos' =>['table'=>'pages_photos_photos','dir'=>'profot_imas'],
					'url'		=>'producto',
					'type'	=>''
				]);


		$gallery=$Gallery->getItem(['item'=>'1']);




		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'html'  =>$gallery['html'],
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);


		//render the view
		$this->view->render(
			
			'layout_products'

		);		


	}	


	function detail($params){


		$Page=$this->loadModel('Pages');

		$Page->setConfig([
				'items'=>[
					'table'  =>'pages_photos_photos',
					'fields' =>'name,html,fecha_creacion,file as foto,id_grupo',
					'dir'    =>'profot_imas',
					'url'		=>'producto'
				],
				'groups'=>[
					'table'	=>'pages_photos'
				]
			]);

		$post             =$Page->getPage();

		$head_description =$Page->getDescription();

		$head_keywords 	=$Page->getKeywords();

		$head_title       =$Page->getTitle();
		


		$post = fila(
		        "id,id_grupo,name,html,weight,file,
		        fecha_creacion"
		        ,"pages_photos_photos"
		        ,"where id='".$params['item']."'"
		        ,0
		        ,[
		       //  		'grupo'=>['fila'=>[
		       //  				'id,nombre,url',
		       //  				'productos_grupos',
		       //  				'where id={id_grupo}',0,[
									// 'url'=>['url'=>['{nombre}']],
		       //  				]
		       //  		]],
		       //  		'cat'=>['fila'=>[
		       //  				'id,nombre',
		       //  				'productos_subgrupos',
		       //  				'where id={id_subgrupo}'
		       //  		]],
		       //  		'subcat'=>['fila'=>[
		       //  				'id,nombre',
		       //  				'productos_filtros',
		       //  				'where id={id_filtro}'
		       //  		]],

						'url'=>['url'=>['producto/{name}/{id}']],

						// 'get_archivo'=>['get_archivo'=>[
						// 				'carpeta'=>'atc_imas',
						// 				'fecha'=>'{fecha_creacion}',
						// 				'file'=>'{adjunto}',
						// 				'tamano'=>'0'
						// 				]],			

						'img'=>['get_archivo'=>[
													'carpeta'=>'profot_imas',
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												]	
		        ]
		);

		// prin($post);
		
		$group =$Page->getGroup(['item'=>$post['id_grupo']]);
		

		// $post['fotos']=select(
		// 		'id,file,fecha_creacion',
		// 		'productos_fotos',
		// 		'where id_item='.$post['id'],
		// 		0,
		//  	[
		// 		'img'=>['get_archivo'=>[
		// 									'carpeta'=>'profot_imas',
		// 									'fecha'=>'{fecha_creacion}',
		// 									'file'=>'{file}',
		// 									'tamano'=>'0'
		// 									]
		// 								]	
		//  	]
		// );

		$fotos[]=[
				'img'=>$post['img']
				];


		//form
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

			'empresa'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Empresa',
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

		// prin($this->view->vars);
		// 
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
				
			'head_title' => $post['name'].' | '.$this->title,
			
			'title'      => $post['name'],
			
			'post'       => $post,
			
			'menu_post'  => $menu['items'],

			'group_post' => $group,

			'fotos' 		 => $fotos,



			//form
			'contact'       =>$fields_reformated,
			
			'message'       => $this->message,

			//facebook
			'opengraph'			=> true

		]);

		//render the view
		$this->view->render(
			
			'layout_pagesphotos'

		);


	}


}
