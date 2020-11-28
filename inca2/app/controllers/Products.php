<?php 
namespace controllers;

class Products extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}

	function setMessage($email,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;

		// prin($this->email);

		if($this->view->vars['email_test']){

			$this->message.= '<ul><li>pruebas</li>';
			foreach($email->files_test as $fils){
				$this->message.='<li><a target="_black" href="'.$fils['link'].'">'.$fils['link'].'</a></li>';
			}
			$this->message.='</ul>';
	
		}

	}


	function emailFields($type="text"){

		if($type=="html"){

			$html="<table>";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=
							"<tr><th><br>".
							$item['label'].
							":</th></tr>".
							"<tr><td>".
							$_POST[$name].
							"</td></tr>";
					break;
					default:
						$html.=
							"<tr><th>".
							$item['label']."</th>".
							"<td>: ".
							$_POST[$name].
							"</td></tr>";
					break;
				}	
			}

			$html.="</table>";

		} elseif($type=="html"){

			$html="\n\n";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=$item['label'].":\n".$_POST[$name]."\n\n";
					break;
					default:
						$html.=$item['label'].": ".$_POST[$name]."\n\n";
					break;
				}	
			}

			$html.="\n\n";

		}

		return $html;

	}


	function detail($params){


		// prin($params); exit();


		//habitacion
		$servicio=fila(
			"id,name,text,text2,text3,text4",
			"projects",
			"where id=".$params['item'],
			0,
			[
				'url'=>['url'=>['habitacion-{name}/{id}']],
			]);



			$items=explode("\n",$servicio['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$servicio['text4']=$htm;

			// $servicio['photos']
			$photos=filas('file,fecha_creacion','projects_photos','where id_grupo='.$servicio['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'serfot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$servicio['photos'][]=$photo['get_archivo'];

			}

		
		$servicio['open']='active';


		$post=$servicio;



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

			// 'medio'=>[
			// 	'label'=>'Seleccione medio de pago',
			// 	'type'  =>'select',
			// 	'options'=>[
			// 		'Depósito a cuenta',
			// 		'Pago Link',
			// 		'Pago Efectivo contra entrega',
			// 	]
			// ],	

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
				'value'    =>"Estoy interesado en el el servicio ".$post['name']."\n".
				"Por favor contacten conmigo.\n".
				"Gracias"],

		];


		$fields_reformated=processFields($this->fields);
		$this->view->assign([	
			'form_fields'    =>$fields_reformated,
			'form_name'      =>'service',
			'form_button'    =>'ENVIAR',
			'form_title'     =>'Cotizar',
		]);
		// prin($this->view->vars);
		// 
		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
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
				"Mensaje de reserva",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Reserva",
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

		// prin($post['fotos']);





		// prin($breadcrumb);

		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords'	 => $head_keywords,
			
			'title'            => $post['name'],

			'post'             => $post,
			
			// 'menu_post'  => $menu['items'],
						
			// 'gallery'    => $gallery,
			
			// 'group_post'    => $producto['grupo']['url'],
						
			'canonical'     => $this->view->vars['baseurl'].$post['url'],
			
			// 'banner'     => $banner,

			// 'breadcrumb'		 => $breadcrumb,
			
			//form
			// 'contact'       =>$fields_reformated,
			
			'message'       => $this->message,

			//facebook
			'opengraph'			=> true,

		]);


		$this->view->render('layout_products_detail');


	}


	function grid($params){	




		//servicios
		$habitaciones['name'] ='Servicios';
		$habitaciones['url']  ='servicios';

		$habitaciones['items']=select("id,name,text,text2,text3,text4",
			"projects","where 1 ",0,[
				'url'=>['url'=>['servicio-{name}/{id}']],
			]);

		foreach($habitaciones['items'] as $ii=>$hab){

			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$habitaciones['items'][$ii]['text4']=$htm;

			// $habitaciones['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'projects_photos',
				'where id_grupo='.$hab['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'serfot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$habitaciones['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		// $habitaciones['more']=[
		// 	'url'  =>'habitaciones',
		// 	'name' =>'ver más habitaciones'
		// ];

		$this->view->assign([

			"habitaciones"=>$habitaciones

		]);






		//Asign vars for view
		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			



			'canonical'  => $canonical,

		]);


		// prin($post);
			







	

		//render the view
		$this->view->render('layout_products_grid');

	}

}