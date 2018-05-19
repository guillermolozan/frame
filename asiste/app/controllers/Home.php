<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		

		$Page=$this->loadModel('Pages',['items'=>['filter'=>'limit 0,12']]);

		// servicios
		$servicios=[
		'name'=>'Servicios',
		'items'=>$Page->getMenu(['item'=>'1','uri'=>'pagina','more_fields'=>'text'])
		];

		foreach($servicios['items'] as $ii=>$servicio){
			$servicios['items'][$ii]['html']=nl2br($servicios['items'][$ii]['text']);
		}

		// prin($servicios);


		$bienvenidos=fila(
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

		$capacitacion=fila(
			"name,text as html,fecha_creacion,foto",
			"paginas",
			"where id='2'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										],
				'html'=>['nl2br'=>['string'=>'{html}']],
			]
		);		

		$consultoria=fila(
			"name,text as html,fecha_creacion,foto",
			"paginas",
			"where id='3'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										],
				'html'=>['nl2br'=>['string'=>'{html}']],										
			]
		);	


		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>['fields'=>'name,url,fecha_creacion,file'],
				]);

		$links=$Links->getLinks();	






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
		$news=$NewsOne->getLinks();	

		$news['name']='Notas de Interés';
		$news['more']['name']='ver mas notas de interés';
		$news['more']['url']=$news['items'][0]['url'];

		//brochure
		$brochure=[
			'img'=>'brochure2.png',
			'file'=>'brochure-asiste.pdf',
		];


		//social
		$social='https://www.facebook.com/Asiste-789247571198150';



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
				
				// posts
				"bienvenidos"   => $bienvenidos,
				"capacitacion"  => $capacitacion,
				"consultoria"   => $consultoria,
	
				// news
				"noticias"   => $news,
				"brochure"	 => $brochure,
				"social"	 => $social,
				//facebook
				'opengraph'  => true,


				// links
				"links"         => $links,
				
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