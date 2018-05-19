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
		$NewsBloque=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=3',
														]
													]);
		//noticias generales
		$news=$NewsBloque->getLinks();	
		$news['name']='Notas de Interés';
		$news['more']=[
			'name'=>'ver mas notas de interés',
			'url'=>$news['items'][0]['url']
		];




		//brochure
		$brochure=[
			'img'  =>'brochure.png?1',
			'file' =>'brochure-consorcio-esi.pdf',
		];


		//social
		$social='https://www.facebook.com/ConsorcioESI/';


		// home
		$welcome=fila(
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




		// blocks planes
		$blocks_planes=fila(
			"id,name",
			'paginas_groups',
			'where id=8',
			0
			);

		$blocks_planes['items']=select(
			"id,name,text as html",
			'paginas',
			'where id_grupo=8',
			0,
			[
				'url'=>['url'=>['servicios/{name}/{id}']],
			]);

		foreach($blocks_planes['items'] as $ii=>$block){
			$lines=explode("\n",$block['html']);
			$html='<ul>';
			foreach($lines as $ll=>$line)				
				$html.='<li>'.$line.'</li>';
			$html.='</ul>';
			$blocks_planes['items'][$ii]['html']=$html;
		}






		// clients
		$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'photos'=>[
							'fields'=>'id,name,file,fecha_creacion,url'
						],
						'type'=>'link',
						'more'=>'ver más'
					]);


			$clients=$Gallery->getItem(['item'=>'2','limit'=>'0,12']);

			foreach($clients['items'] as $ii=>$item){

				$clients['items'][$ii]['url']=false;

			}

			$clients['parallax']='fondo-clientes.png';




		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>['fields'=>'name,url,fecha_creacion,file'],
				]);

		$links=$Links->getLinks();	






		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title.' - Soluciones Integrales',
	
				
				//banner
				"banner"     => $banner,
				

				//bievenido
				"post"       => $welcome,


				//blocks
				'planes'     => $blocks_planes,
				
				// news
				"noticias"   => $news,
				"brochure"	 => $brochure,
				"social"	 => $social,
				//facebook
				'opengraph'  => true,
				
				//clients
				"clients"    => $clients,
				
				// links
				"links"      => $links,
				


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