<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		

		//banner
		$Banner=$this->loadModel('Banners');

		$banner=$Banner->getItems();





		// products
			$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'items'  =>[
							'table'=>'pages_photos'
						],
						'photos' =>[
							'table'=>'pages_photos_photos',
							'dir'=>'profot_imas'
						],
						'url'		=>'producto',
						'type'	=>'link'
					]);

			$gallery=$Gallery->getItem([
				'item'=>'1',
				'limit'=>'0,4'
			]);

			$gallery['more']=[
				'url'  =>'productos',
				'name' =>'ver más'
			];

			$gallery['name']='Productos Estrella';

		$products=$gallery;




		// events
			$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'items'  =>[
							'table'=>'eventos_photos'
							,'fields'=>'id,name,fecha'
						],
					'photos' =>[
						'table'=>'eventos_photos_photos',
						'dir'=>'evefot_imas'
					],
						'url'		=>'evento',
						'type'	=>'link'
					]);

			$gallery=$Gallery->getItems([
				// 'item'=>'1',
				'limit'=>'0,4'
			]);
			// $gallery['items']=array_merge($gallery['items'],$gallery['items']);
			// prin($gallery);

			$gallery['more']=[
				'url'  =>$gallery['items'][0]['url'],
				'name' =>'ver más'
			];

			$gallery['name']='Social';

		$events=$gallery;





		// videos
		$Videos=$this->loadModel('Videos');

			$gallery=$Videos->getItem([
				'item'  =>'1',
				'limit' =>'0,4',
				// 'type'  =>'videos'
			]);
			// prin($gallery);

			$gallery['more']=[
				'url'  =>'videos',
				'name' =>'galería de videos'
			];

		$this->view->assign(["block_gallery_videos" => $gallery]);





		// nosotros
		$nosotros=fila(
			"name,text",
			"paginas",
			"where url='nosotros'",
			0
		);
		$nosotros['text']=nl2br($nosotros['text']);

		// // tierras
		// $tierras=fila(
		// 	"name,text",
		// 	"paginas",
		// 	"where url='tierras'",
		// 	0
		// );
		// $tierras['text']=nl2br($tierras['text']);

		


		// clients
		$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'photos'=>[
							'fields'=>'id,name,file,fecha_creacion,url'
						],
						'type'=>'link',
						'more'=>'ver mas',
					]);


			$gallery=$Gallery->getItem(['item'=>'2','limit'=>'0,12']);


			foreach($gallery['items'] as $ii=>$item){

				$gallery['items'][$ii]['url']=false;

			}

		$clients=$gallery;

		$clients['parallax']='fondo-clientes.png';
		$clients['parallax']='maiz.jpg';

		// prin($clients);







		$this->view->assign(
			[
				'is_home'              => true,
				
				'title'                => $this->title,
				
				//head
				'head_title'           => $this->title.' - Consultoría Integral de Ingeniería',
				
				//	
				"tierras"              => $tierras,
				
				//	
				"nosotros"             => $nosotros,
				
				//banner
				"banner"               => $banner,
				
				//products
				"products"             => $products,				
				
				//clients
				"clients"              => $clients,					

				//events
				"events"               => $events,		

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