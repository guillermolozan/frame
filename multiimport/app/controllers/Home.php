<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		
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
			"fecha_creacion,bg,bgmovil,file,filecentro,foto_descripcion as name,url,
			texto2,texto3",
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
		
		/*
		$banner=array_map(function($value){

			$class=['left-align','right-align','center-align'];
			$value['class']=$class[array_rand($class)];
			return $value;

		},$banner);
		*/

		// prin($banner);
		//presentación
		$HomeText=$this->loadModel('Pages');
		$presentacion=$HomeText->getPage(['item'=>'9']);	


		//noticias tecnológicas
		// $news_two=$NewsTwo->getLinks();	
		// $news_two['name']='Noticias Tecnológicas';
		// $news_two['more']['url']=$news_two['items'][0]['url'];


		// prin($news);




		//banner
		// $Banner=$this->loadModel('Banners');

		// $banner=$Banner->getItems();





		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				// 'canonical'		 => ($this->view->vars['baseurl'])?$this->view->vars['baseurl']:'',

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				'head_title'    => $this->title,
				
				
				// text
				"post"          => $presentacion,		


				"slides"    	=> $banner,
					

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