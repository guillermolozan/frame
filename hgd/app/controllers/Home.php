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

		$news['name']='Notas de Interés';

		$news['more']['name']='ver más notas';



		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>['fields'=>'name,url,fecha_creacion,file'],
				]);

		$links=$Links->getLinks();	



		// home
		$post=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where url='home'",
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
			"name,html,fecha_creacion,foto",
			"paginas",
			"where url='phones'",
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


		// projects_groups
		$project_groups=[
		'name'=>'Experiencias',
		'items'=>select(
			"name,id",
			"projects_groups",
			"where 1
			order by weight desc",
			0,
			[
			'url'=>['url'=>['proyectos-{name}/{id}']],
			]
		)];


		// projects
		$projects=[
		'name'=>'Últimos Proyectos',
		'items'=>select(
			"name,id,id_grupo",
			"projects",
			"where 1
			order by weight desc
			limit 0,4",
			0,
			[
			'url'=>['url'=>['proyecto-{name}/{id}']],
			'pre'=>['dato'=>['name','projects_groups','where id={id_grupo}',0]]
			]
		),
		'more'=>[
					'name'=>'ver más proyectos',
					'url'=>'proyectos'
					]
		];	



		// video
		$video=fila(
			"name,video",
			"galleries_videos_videos",
			"where id_grupo=0",
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
				
				//project_groups
				"project_groups" => $project_groups,
				
				// post
				"post"          => $post,
				
				// projects
				"projects"      => $projects,
				
				// news
				"news"          => $news,
				
				// links
				"links"         => $links,
				
				// video
				"video"         => $video,
				
				// phones
				"phones"        => $phones,
			
			]

		);


		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

					
					'project_groups.name'  =>'Experiencias',
					'project_groups.items' =>'gallery?name=tipo de proyecto&number=6&url=proyectos',

					'post'					 =>'post?name=Home&text=1000',
					
					'projects.name'           =>'Últimos Proyectos',
					'projects.items'          =>'gallery?name=noticia&text=80&number=4&url=noticia',


					'video'					 =>'post?name=título del video&video',
					'phones'					 =>'post?name=teléfonos y anexos&text=120',

				])
			);
		}

		$this->view->render('layout_home');


	}

}