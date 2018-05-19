<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;
use core\Tests as Tests;

class Controller extends \core\Controller {

	var $admin_emails;
	
	var $fields;


 	function processFields(){

		$fields3=[];

		foreach($this->fields as $name=>$item)
		{
			$fields2=$item;
			
			$fields2['name']=$name;
			
			if(!isset($item['type']))	$fields2['type']='text';

			if(!isset($item['class']))	$fields2['class']='';

			if(!isset($item['value']))	$fields2['value']='';

			$fields3[]=$fields2;
		}

		return $fields3;

	}


	function emailFields(){

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

		return $html;

	}

	function insertFields(){
		
		$fields=[];

		foreach($this->fields as $name=>$item)
		{	
			$fields[$name]=$_POST[$name];
		}

		return $fields;

	}

	function __construct($params){

		parent::__construct($params);

		// $stores	=select("url,nombre","locales");

		//menu left
			// foreach($stores as $store){

			// 	$this->menu_left[]=[
			// 						'url'=>$store['url'],
			// 						'name'=>$store['nombre'],
			// 						'class'=>'local',
			// 					 ];
			
			// }

			$this->menu_left=$this->elements->getMenu('menu_left',$this->menu_left,$params['uri']);



		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);


		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',[],$params['uri']);


		$web=$this->elements->getFromFile('web');


		//logo
		$logo=fila(
			"fecha_creacion,file",
			"banners",
			"where nombre='logo'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'ban_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);

		//body
		$body=fila(
			"fecha_creacion,file",
			"banners",
			"where nombre='fondo'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'ban_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);

		//map
		$map=[
				'lat'     =>'-12.0816025',
				'lon'     =>'-77.0358663',
				'name'    =>'Mis Motivos',
				'address' =>'Av. Arenales 1737 Lince Centro Comercial Arenales Tda. 2-9',
				'phone'   =>'Delivery 266-2715 / 987-703-261',
				'text'    =>"<strong>Mis Motivos</strong><br>
				Av. Arenales 1737 Lince <br>Centro Comercial Arenales Tda. 2-9<br>
				Delivery 266-2715 / 987-703-261
				"
				];

		$page=fila(
			"titulo,texto,fecha_creacion,foto,pagina",
			"paginas",
			"where pagina='nosotros'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										]
			]
		);
		// prin($page);

		$footer_pre='
		<div class="col s12 l4"><p><strong>Dirección</strong><br>
		Av. Arenales 1737 Lince <br>Centro Comercial Arenales Tda. 2-9
		</p></div>

		<div class="col s12 l4"><p>
		<strong>Delivery</strong><br>
		266-2715<br>
		<strong>Celular</strong><br>
		987-703-261
		</p></div>

		<div class="col s12 l4"><p><strong>Email</strong><br>
		ventas@mismotivos.com<br>
		<a class="facebook" target="_blank" href="https://www.facebook.com/mismotivos"> mismotivos</a><br>
		<a class="twitter" target="_blank" href="https://twitter.com/mismotivospe"> mismotivospe</a>

		</p></div>
		';


		//form
	

		$this->admin_emails=[
										'ventas@mismotivos.com',
										'servicios@prodiserv.com',
										'guillermolozan@gmail.com',
									];


		$this->fields=[

			'nombre'=>[
				'class' =>'validate',
				'label' =>'Nombre',
			],

			'telefono'=>[
				'label'=>'Teléfono',
			],

			'email'=>[
				'class' =>'validate',
				'label' =>'Email',
				'type'  =>'email',
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


			$message=(mail(

				implode(',',$this->admin_emails),

				"Mensaje de contacto desde Mis Motivos",

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


		$this->view->assign(
			[

			//header and menu top
				'menu_top'     => $this->menu_top,
				'menu_left'    => $this->menu_left,
				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logosmall.png',
				//logo
				'header_bg'		=> $logo['img'],
				//body
				'body_bg'		=> $body['img'],				
				// 'header_phones'=> $web['header_phones'],
				'icon'       => 'icon.ico',

			//footer
				'menu_footer'  => $this->menu_footer,

			//map
				'map'				=>$map,

			// post
				'post' => [

					'name'=>$page['titulo'],
					'text'=>$page['texto'],
					'img'=>$page['img'],
					'pagina'=>$page['pagina']

				],

				//form
				'message'		=> $message,

				'fields'			=> $fields_reformated,

				//footer pre
				'footer_pre'			=> $footer_pre,

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}