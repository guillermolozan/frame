<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		







		//noticias tecnológicas
		// $news_two=$NewsTwo->getLinks();	
		// $news_two['name']='Noticias Tecnológicas';
		// $news_two['more']['url']=$news_two['items'][0]['url'];


		// prin($news);




		//banner
		// $Banner=$this->loadModel('Banners');

		// $banner=$Banner->getItems();

		$banner=select(
			"fecha_creacion,file,name,small,url",
			"banners_fotos_fotos",
			"where id_grupo=1 order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'banfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],
				'small'=>['get_archivo'=>[
											'carpeta'=>'banfotsmall_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{small}',
											'tamano'=>'0'
											]
										],										
// 
				// 'url'=>['url'=>['pagina/{name}/{id}']],

			]									
		);
		// prin($banner);





		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>[
						'fields'=>'id,name,fecha_creacion,file,distrito,status',
						'table'=>'projects',
						'dir'	=> 'pro_imas',
						'name'	=> 'Proyectos'
					],
				]);

		$links=$Links->getLinks();	

		$status=[
				'1'			=> 'Entrega Inmediata',
				'2'			=> 'Preventa',
				'3'			=> 'En Construcción',
				'4'			=> 'En Venta'
		];

		foreach($links['items'] as $iii=>$link){
			$links['items'][$iii]['distrito']=dato("nombre","geo_distritos","where id=".$link['distrito']);
			$links['items'][$iii]['url']='proyectos-en-venta/'.procesar_url($link['name']).'/'.$link['id'];
			$links['items'][$iii]['status']=$status[$links['items'][$iii]['status']];
		}


		// $links['items']=array_merge($links['items'],$links['items'],$links['items'],$links['items'],$links['items']);


		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				// 'head_title'    => $this->slogan." :: ".$this->title,
				'head_title'    => 'Connect Brands',
				
				//banner
				"banner"        => $banner,
				
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