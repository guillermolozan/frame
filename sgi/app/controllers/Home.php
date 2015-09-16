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
					'items'  =>['table'=>'pages_photos'],
					'photos' =>['table'=>'pages_photos_photos','dir'=>'profot_imas'],
					'url'		=>'producto',
					'type'	=>''
				]);


		$gallery=$Gallery->getItem(['item'=>'1','limit'=>'0,3']);


		$products=$gallery['items'];


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

		
		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title.' - Consultoría Integral de Ingeniería',
				
				//	
				"tierras"    => $tierras,
				
				//	
				"nosotros"   => $nosotros,
				
				//banner
				"banner"     => $banner,
				
				//products
				"products"   => $products,				
			
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