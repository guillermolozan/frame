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
														'filter'=>'and id_grupo=9',
														]
													]);
		//noticias generales
		$news=$NewsBloque->getLinks(['num'=>4]);	
		$news['name']='Notas de Interés';
		$news['more']=[
			'name'=>'ver mas notas de interés',
			'url'=>$news['items'][0]['url']
		];




		// //brochure
		// $brochure=[
		// 	'img'=>'brochure.png',
		// 	'file'=>'brochure-consorcio-esi.pdf',
		// ];

		//youtube
		$youtube=[
			'name'=>'Pasión por Servir',
			'code'=>'FxW0P7fWsuA',
		];


		//social
		$social='https://www.facebook.com/prodiserv/';










		//hosting blocks
		$hosting_blocks=fila(
			"id,name,url",
			'paginas_groups',
			'where id=8',
			0
			);

		// prin($hosting_blocks);

		$hosting_blocks['items']=select(
			"id,name,text as html",
			'paginas',
			'where id_grupo=8',
			0,
			[
				'url'=>['url'=>[$hosting_blocks['url'].'/{name}/{id}']],
			]);

		foreach($hosting_blocks['items'] as $ii=>$block){
			$lines=explode("\n",$block['html']);
			$html='<ul>';
			foreach($lines as $ll=>$line){
				if($ll+1==sizeof($lines))
					$html.='<li class="price">'.$line.'</li>';
				else					
					$html.='<li>'.$line.'</li>';
			}
			$html.='<ul>';

			$hosting_blocks['items'][$ii]['html']=$html;
			$hosting_blocks['items'][$ii]['img']='servicio'.($ii+1).'.jpg';

		}






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
						'type'=>'external_link',
						'target'=>'_blank',
						'more'=>'ver más'
					]);


			$clients=$Gallery->getItem(['item'=>'2','limit'=>'0,7']);



			$clients['parallax']='clientes.jpg';


			// prin($clients);


		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				'canonical'		 => $this->view->vars['baseurl'],

				// 'head_description'=> (isset($start['web_desc']))?$start['web_desc']:'web_desc',

				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				// 'head_title'    => $this->slogan." :: ".$this->title,
				'head_title'    => "Diseño Desarrollo Implementación y Capacitación de CRM, Páginas Web, Alquiler de Dominio y Hosting en Lima Perú :: ".$this->title,

				'head_description'=>'En PRODISERV nos especializamos en desarrollo de páginas web, sistemas crm y erp, aplicativos, dominio, hosting, marketing digital e ingeniería comercial',

				'head_keywords' => 'prodiserv,paginas web,dominio,hosting,vps,alojamiento,sistemas web,crm,erp,aplicativos, app,inteligencia de negocios,seo,marketing digital,lima,peru,ingenieria comercial,servicio tecnico',


				
				//banner
				"banner"        => $banner,
				
				//blocks
				'planes'	 	 => $hosting_blocks,

				// links
				"links"         => $links,

				// news
				// "news_one"          => $news_one,			
				// "news_two"          => $news_two,			

				// news
				"noticias"   => $news,
				"youtube"	 => $youtube,
				"social"	 => $social,
				//facebook
				'opengraph'  => true,

				//clients
				"clients"        => $clients,

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