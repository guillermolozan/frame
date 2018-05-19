<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		


		$servicios['items']=select(
			"fecha_creacion,name,text,id,foto",
			"paginas",
			"where visibilidad=1 and id_grupo=4 
			order by weight desc
			limit 0,6",
			0,
			[

				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										],
																	
			]									
			);



		foreach($servicios['items'] as $ii=>$servicio){
			// $servicios['items'][$ii]['html']=nl2br($servicios['items'][$ii]['text']);
			$servicios['items'][$ii]['url']='servicios/'.
														str_replace(' ','-',strtolower($servicios['items'][$ii]['name'])).
														'/'.
														$servicios['items'][$ii]['id'];
		}

		$servicios['more']=$servicios['items'][0]['url'];


		$Videos=$this->loadModel('Videos');

		$Videos->params['item']='1';
		$Videos->params['limit']='limit 0,4';

		$gallery=$Videos->getItem();

		$this->view->assign([

			// 'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>$gallery['type'],
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],
							'items' =>$gallery['items'],
							]

			]

		);

		// servicios
		$videos=[
		'name'=>'Videos',
		'items'=>$gallery['items'],
		];



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

		//news
		$NewsOne=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=3',
														]
													]);


		//noticias generales
		$news_one=$NewsOne->getLinks();	
		$news_one['name']='Notas de Interés';
		$news_one['more']['name']='ver mas notas de interés';
		$news_one['more']['url']=$news_one['items'][0]['url'];

		$NewsTwo=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=10',
														]
													]);


		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				'head_title'    => $this->title." :: ".$this->slogan,

				
				//banner
				"slides"        => $banner,

				//menu
				"servicios"     => $servicios,
				
	

				// links
				"videos"         => $videos,
				
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