<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		



		// clients
		$Gallery=$this->loadModel('Photos');

		$Gallery->setConfig([
					'photos'=>['fields'=>'id,name,file,fecha_creacion,url'],
				]);


		$gallery=$Gallery->getItem(['item'=>'2','limit'=>'0,6']);

		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}

		$clients=$gallery['items'];



		//news
		$NewsOne=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=9',
														]
													]);

		//noticias generales
		$news_one=$NewsOne->getLinks(['num'=>3]);
		$news_one['name']='Notas de Interés';
		$news_one['more']['name']='ver mas notas de interés';
		$news_one['more']['url']=$news_one['items'][0]['url'];

		$NewsTwo=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=10',
														]
													]);

		//noticias tecnológicas
		// $news_two=$NewsTwo->getLinks();	
		// $news_two['name']='Noticias Tecnológicas';
		// $news_two['more']['url']=$news_two['items'][0]['url'];


		// prin($news);




		//banner
		$Banner=$this->loadModel('Banners');

		$banner=$Banner->getItems();

		foreach($banner as $bb=>$ann){
			if($ann['url']=='pagina//'){
				$banner[$bb]['url']=false;
				// unset($banner[$bb]['url']);
			} else {
				$banner[$bb]['url']=str_replace('pagina/', '', $banner[$bb]['url']);
			}
		}
		// prin($banner);




		// bienvenido
		$post=fila(
			"name,text as html,fecha_creacion,foto",
			"paginas",
			"where id='17'",
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

		$post['html']=nl2br($post['html']);

		
		//iconos
		$id_servicio=dato("id","paginas","where id_grupo=2 order by weight desc, id asc",0);
		
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

		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				
				// 'head_title'    => $this->slogan." :: ".$this->title,
				'head_title'    => $this->title,

				// post
				"post"          => $post,

				//iconos
				"iconos"        => $iconos,

				//clients
				// "clients"        => $clients,
				
				//banner
				"slides"        => $banner,
				
				//blocks
				// 'line_two'	 	 => $hosting_blocks,

				// links
				// "links"         => $links,

				// news
				// "news_one"          => $news_one,			
				// "news_two"          => $news_two,			

				'opengraph'			=> true

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