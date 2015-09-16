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
		$news_one=$NewsOne->getLinks();	
		$news_one['name']='Notas de Interés';
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




		//hosting blocks
		$hosting_blocks=select(
			"id,name,text as html",
			'paginas',
			'where id_grupo=8',
			0,
			[
				'url'=>['url'=>['planes-hosting/{name}/{id}']],
			]);

		foreach($hosting_blocks as $ii=>$block){
			$lines=explode("\n",$block['html']);
			$html='<ul>';
			foreach($lines as $ll=>$line){
				if($ll+1==sizeof($lines))
					$html.='<li class="price">'.$line.'</li>';
				else					
					$html.='<li>'.$line.'</li>';
			}
			$html.='<ul>';
			$hosting_blocks[$ii]['html']=$html;
		}



		$this->view->assign(
			[
				'is_home'       => true,
				
				'title'         => $this->title,
				
				//head
				// 'head_title'    => $this->title. ( ($this->slogan)?' - '.$this->slogan:'' ),
				'head_title'    => $this->slogan." :: ".$this->title,

				//clients
				"clients"        => $clients,
				
				//banner
				"banner"        => $banner,
				
				//blocks
				'line_two'	 	 => $hosting_blocks,

				// links
				"links"         => $links,

				// news
				"news_one"          => $news_one,			
				"news_two"          => $news_two,			

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