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
						'fields'=>'id,name,fecha_creacion,file',
						'table'=>'projects',
						'dir'	=> 'pro_imas',
						'name'	=> 'Proyectos'
					],
				]);

		$links=$Links->getLinks();	


		foreach($links['items'] as $iii=>$link){
			$links['items'][$iii]['url']='curso/'.procesar_url($link['name']).'/'.$link['id'];
		}


		// $links['items']=array_merge($links['items'],$links['items'],$links['items'],$links['items'],$links['items']);


		$map=[
				'lat'     =>'-12.0904317',
				'lon'     =>'-77.042317',
				'name'    =>'Creatiu',
				// 'text'    =>"<strong>Creatiu</strong><br>"
				];


		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				// 'head_title'    => $this->slogan." :: ".$this->title,
				'head_title'    => 'Creatiu Training Group',
				
				//banner
				"banner"        => $banner,
				
				// links
				"links"         => $links,
		
				// map
				"map"         => $map,
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