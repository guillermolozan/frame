<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		

		//servicios
		$servicios['items']=select(
			"fecha_creacion,name,text,id,file,url",
			"projects",
			"where visibilidad=1
			order by weight desc
			limit 0,6",
			0,
			[

				'img'=>['get_archivo'=>[
											'carpeta'=>'pro_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],
																	
			]									
		);

		// prin($servicios['items']);

		

		foreach($servicios['items'] as $ii=>$servicio){

			// $serv=fila('id,name','project_galleries_photos','where id_grupo='.$servicios['items'][$ii]['id'].' order by id asc limit 0,1 ',0);
			// $servicios['items'][$ii]['html']=nl2br($servicios['items'][$ii]['text']);
			$servicios['items'][$ii]['url']=$servicio['url'].'/'.
														str_replace([' ','.'],['-'.''],strtolower($serv['name'])).
														'/'.
														$serv['id'];

			$servicios['items'][$ii]['url']=$servicio['url'].'/'.$servicio['id'];
		

		}

		// prin($servicios['items']);

		$servicios['more']=$servicios['items'][0]['url'];

		
	

		$banner_dad=fila(
			"id",
			"banners_fotos",
			"where name='banner_main'"							
			);

		$id_banner=$banner_dad['id'];
		// $im_banner=$banner_dad['img'];


		$banner=select(
			"fecha_creacion,bg,bgmovil,file,filecentro,foto_descripcion as name,url,
			texto2,texto3",
			"banners_fotos_fotos",
			"where visibilidad=1 and id_grupo=".$id_banner." order by weight desc",
			0,
			[

				'bg'=>['get_archivo'=>[
											'carpeta'=>'banbg_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{bg}',
											'tamano'=>'0'
											]
										],

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
										],
			]
		);



		// clients
		$Gallery=$this->loadModel('Photos');

		$Gallery->setConfig([
					'photos'=>['fields'=>'id,name,file,fecha_creacion,url'],
				]);


		$gallery=$Gallery->getItem(['item'=>'2','limit'=>'0,12']);

		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}

		$clients=$gallery['items'];


		//PRODUCTOS
		

		//Grupos
	
		$grupos_items=select(
		"nombre as name,id,fecha_creacion,foto,url,url as class",
		"productos_grupos",
		"where visibilidad=1
		order by weight desc
		limit 0,5",
		0,[

			// 'url'=>['url'=>['{name}']],
			'img'=>['get_archivo'=>[
										'carpeta'=>'progru_imas',
										'fecha'=>'{fecha_creacion}',
										'file'=>'{foto}',
										'tamano'=>'0'
										]
									],
		]);

		// prin($this->pub_img);
		// prin($grupos_items);

		$grupos_items[1]['word_action'] ='entrena';
		// $grupos_items[1]['class']      ='entrena';
		$grupos_items[1]['ico']        =$this->pub_img.'logo_entrenar_trans.png';
		
		$grupos_items[0]['word_action'] ='protégete';
		// $grupos_items[0]['class']      ='protegete';
		$grupos_items[0]['ico']        =$this->pub_img.'logo_proteger_trans.png';
		
		$grupos_items[3]['word_action'] ='reduce';
		// $grupos_items[3]['class']      ='reduce';
		$grupos_items[3]['ico']        =$this->pub_img.'logo_reducir_trans.png';
		
		$grupos_items[4]['word_action'] ='diviértete';
		// $grupos_items[4]['class']      ='diviertete';
		$grupos_items[4]['ico']        =$this->pub_img.'logo_divertir_trans.png';
		
		$grupos_items[2]['word_action'] ='rehábilitate';
		// $grupos_items[2]['class']      ='rehabilitate';
		$grupos_items[2]['ico']        =$this->pub_img.'logo_rehabilitar_trans.png';

		// prin($grupos_items);

		foreach($grupos_items as $ii=>$item){

			$grupos_items[$ii]['productos']=select(
			"nombre as name,id,precio,moneda,oferta,precio_oferta",
			"productos_items",
			"where id_grupo=".$item['id']."
			and visibilidad=1
			order by weight desc
			limit 0,10",
			0,[

				'url'=>['url'=>['producto/{name}/{id}']],

			]);

			foreach($grupos_items[$ii]['productos'] as $iii=> $prod){

				$grupos_items[$ii]['productos'][$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$grupos_items[$ii]['productos'][$iii]['foto']=fila(
					"id,fecha_creacion,file",
					"productos_fotos",
					"where id_item=".$prod['id'],
					0,
					[
						'img'=>['get_archivo'=>[
													'carpeta'=>'profot_imas',
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												],
						]

				);


			}

		}


		$ii='mas-vistos';

		$grupos_items[$ii]=['name'=>'Más vistos','url'=>'mas-vistos'];

			$grupos_items[$ii]['productos']=select(
			"nombre as name,id,precio,moneda,oferta,precio_oferta",
			"productos_items",
			"where 1
			and visibilidad=1
			order by viewed desc
			limit 0,4",
			0,[

				'url'=>['url'=>['producto/{name}/{id}']],

			]);

			foreach($grupos_items[$ii]['productos'] as $iii=> $prod){

				$grupos_items[$ii]['productos'][$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$grupos_items[$ii]['productos'][$iii]['foto']=fila(
					"id,fecha_creacion,file",
					"productos_fotos",
					"where id_item=".$prod['id'],
					0,
					[
						'img'=>['get_archivo'=>[
													'carpeta'=>'profot_imas',
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												],
						]

				);


			}

		
		$mas_vistos=['mas-vistos'=>$grupos_items['mas-vistos']];

		unset($grupos_items['mas-vistos']);

		// prin(sizeof($mas_vistos));

		// prin($grupos_items);

		// prin($mas_vistos);


		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				'head_description'=> 'Listo Para Proteger, Entrenar, Rehabilitar, Reducir, Divertir',
				
				'head_keywords'=> 'Best Power, Proteger, Entrenar, Rehabilitar, Reducir, Divertir',

				//head
				'head_title'    => $this->title. ( ($this->slogan)?' '.$this->slogan:'' ),

				
				//banner
				"slides"        => $banner,

				//menu
				"servicios"     => $servicios,
	
	
				//clients
				"clients"     => $clients,

				// links
				// "videos"         => $videos,
				
				//bievenido
				"post"        => $post,

				//productos
				'grupos'		  => $grupos_items,	
				
				'mas_vistos'  => $mas_vistos,	



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