<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		

		//servicios
		$servicios['items']=select(
			"fecha_creacion,name,text,id",
			"paginas",
			"where visibilidad=1
			and (id_grupo=4)
			order by weight desc
			limit 0,4",
			0
			,[
				'url'=>['url'=>['servicios/{name}/{id}']],

			// 	'img'=>['get_archivo'=>[
			// 								'carpeta'=>'pro_imas',
			// 								'fecha'=>'{fecha_creacion}',
			// 								'file'=>'{foto}',
			// 								'tamano'=>'0'
			// 								]
			// 							],
																	
			]									
		);


		// foreach($servicios['items'] as $ii=>$item)
		// {
		// 	$servicios['items'][$ii]['img']=$this->view->vars['pub_img'].'servicio_'.($ii+1).( ($ii==1)?'.jpg':'.png' ).'?1';
		// }

		$servicios['items'][0]['img']=$this->view->vars['pub_img'].'servicio_20.jpg?3';
		$servicios['items'][1]['img']=$this->view->vars['pub_img'].'servicio_2.jpg?3';

		$servicios['items']=array_merge([[
			'name'=>'Red de Talleres',
			'url'=>'red-de-talleres',
			'img'=>$this->view->vars['pub_img'].'servicio_map.jpg?3'
		]],$servicios['items']);



		$servicios['more']=$servicios['items'][0]['url'];


		// prin($servicios['items']);

		// prin($servicios);
	
		// $servicios['items']['0']['url']='invitaciones/partes-matrimoniales/1';
		// $servicios['items']['1']['url']='recuerdos/rcdo-partes-matr/9';
		// $servicios['items']['2']['url']='comprobantes/facturas/14';
		// $servicios['items']['3']['url']='comprobantes/otros/19';


		/*
		
		//
		//iconos
		$id_servicio=dato("id","paginas","where id_item=2 order by weight desc, id asc",0);
		
		$pagina1=fila(
			"text,id,name",
			"paginas",
			"where id='".$id_servicio."'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]
		);

		$pagina2=fila(
			"text,id,name",
			"paginas",
			"where id='13'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]
		);

		$pagina3=fila(
			"text,id,name",
			"paginas",
			"where id='12'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]			
		);

		$pagina4=fila(
			"text,id,name",
			"paginas",
			"where id='11'",
			0,
			[
			'url'=>['url'=>['pagina/{name}/{id}']],
			]			
		);


		
		$iconos=[
			[
				'nombre' =>'Servicios',
				'foto'   =>'pagina_1.jpg',
				'texto'  =>$pagina1['text'],
				'url'    =>$pagina1['url']
			],
			[
				'nombre' =>$pagina2['name'],
				'foto'   =>'pagina_2.jpg',
				'texto'  =>$pagina2['text'],
				'url'    =>$pagina2['url']
			],
			[
				'nombre' =>$pagina3['name'],
				'foto'   =>'pagina_3.jpg',
				'texto'  =>$pagina3['text'],
				'url'    =>$pagina3['url']
			],
			[
				'nombre' =>$pagina4['name'],
				'foto'   =>'pagina_4.jpg',
				'texto'  =>$pagina4['text'],
				'url'    =>$pagina4['url']
			],									
		];


		*/



		// $Videos=$this->loadModel('Videos');

		// $Videos->params['item']='1';
		// $Videos->params['limit']='limit 0,4';

		// $gallery=$Videos->getItem();

		// $this->view->assign([

		// 	// 'head_title'=> $gallery['name'].' | '.$this->title,

		// 	'gallery'=>[
		// 					'type'  =>$gallery['type'],
		// 					'name'  =>$gallery['name'],
		// 					'html'  =>$gallery['html'],
		// 					'items' =>$gallery['items'],
		// 					]

		// 	]

		// );

		// // servicios
		// $videos=[
		// 'name'=>'Videos',
		// 'items'=>$gallery['items'],
		// ];



		$banner_dad=fila(
			"id",
			"banners_fotos",
			"where name='banner_main'"
			// 0,
			// [
			// 	'img'=>['get_archivo'=>[
			// 								'carpeta'=>'banfotm_imas',
			// 								'fecha'=>'{fecha_creacion}',
			// 								'file'=>'{file}',
			// 								'tamano'=>'0'
			// 								]
			// 							]	
			// ]									
			);

		$id_banner=$banner_dad['id'];
		// $im_banner=$banner_dad['img'];


		$banner=select(
			"fecha_creacion,bg,bgmovil,file,foto_descripcion as name,url,
			textos",
			"banners_fotos_fotos",
			"where visibilidad=1 and id_grupo=".$id_banner." order by weight desc",
			0,
			[
				// 'img'=>['get_archivo'=>[
				// 							'carpeta'=>'banfot_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{file}',
				// 							'tamano'=>'0'
				// 							]
				// 						],
				'bg'=>['get_archivo'=>[
											'carpeta'=>'banbg_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{bg}',
											'tamano'=>'0'
											]
										],
				// 'bgmovil'=>['get_archivo'=>[
				// 							'carpeta'=>'banbgmovil_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{bgmovil}',
				// 							'tamano'=>'0'
				// 							]
				// 						],

				// 'filecentro'=>['get_archivo'=>[
				// 							'carpeta'=>'banfotcen_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{filecentro}',
				// 							'tamano'=>'0'
				// 							]
				// 						],	

				'class'=>'right-align'
																														
			]									
			);




		// home
		$post=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where id='1'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										]
			]
		);


		
		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				'head_title'    => $this->title,

				
				//banner
				"slides"        => $banner,

				//menu
				"servicios"     => $servicios,
				
	

				// links
				// "videos"         => $videos,
				
				//bievenido
				"post"        => $post,


			]

		);


		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

					
				])
			);
		}

		$this->view->render('layout_home');


	}

}