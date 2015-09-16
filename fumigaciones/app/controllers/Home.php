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



		//news
		$News=$this->loadModel('News');

		$news=$News->getLinks();	



		//links
		$Links=$this->loadModel('Links');

		$links=$Links->getLinks();	




		// phones
		$img_one=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where id='9'",
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



		// phones
		$phones=fila(
			"name,text as html,fecha_creacion,foto",
			"paginas",
			"where id='8'",
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




		// video
		$video=fila(
			"name,video",
			"galleries_videos_videos",
			"where id=1",
			0	
			);




		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				//head
				'head_title'    => $this->title.' - Consultoría Integral de Ingeniería',
				
				//banner
				"banner"        => $banner,
				
				// // news
				// "img_one"       => $img_one,
				
				// links
				"links"         => $links,

				// news
				"news"          => $news,

				// video
				"video"         => $video,
				
				// // phones
				// "phones"        => $phones,
			
			]

		);


		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([
						
						'img_one'     =>'post?img=800x900',
						
						'video'       =>'post?name=título del video&video',
						
						'phones'      =>'post?name=teléfonos y anexos&html=120',

				])
			);
		}

		$this->view->render('layout_home');


	}

}