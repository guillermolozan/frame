<?php 
namespace core\models;

class Pages extends \controllers\Controller {

	function __construc(&$scope){

		parent::__construct($scope);

	}


	function getConfig(){

		$config=[
			'items'=>[
				'table' =>'news',
				'fields'=>"name,html,fecha_creacion,foto",
				'dir'   =>'new_imas',
				'url'	  =>'noticia-'
			],
			'name'=>'Notas de Interés',
			'url'=>'',
			// 'groups'=>[
			// 	'table' =>'paginas_groups',
			// ]
		];

		foreach($this->config as $one=>$two)
			if(is_array($two))
				foreach($two as $three=>$four)
					$config[$one][$three]=$four;
			else
				$config[$one]=$two;

		return $config;

	}


	function getItems(){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);



		//only for data test
		if($this->data_test){

			return $this->data_tests->getData([
				'head_title' =>'Noticias',
				'news.name'  =>'Noticias',
				'news.items' =>'gallery?img&dims=500x500&name=noticia&text=200&sub=50&number=13&url=noticia',
			]);

		}




		$items=select(
			$config['items']['fields'],
			$config['items']['table'],
			'where 1
			order by weight desc',
			0,
			[

				'img'=>['get_archivo'=>[
											'carpeta'=>$config['items']['dir'],
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										],

			'url'=>['url'=>[$config['items']['url'].'{name}/{id}']],

			'sub'=>['fecha'=>['{fecha}','2']]			

			]
		);

		$items=array_map(function($value){

			$value['more']=['name'=>'leer más','url'=>$value['url']];

			return $value;

		},$items);


		$news_dates=$ev2=[];
		foreach($items as $ii=>$event)
		{
			$class=substr($event['fecha'],0,7);
			$items[$ii]['class']=$class;
			$news_dates[$class]=fecha_formato($class.'-01 00:00:00',4);
		}
		foreach($news_dates as $ii=>$val){
			$ev2[]=['option'=>$ii,'val'=>$val];
		}
		$news_dates=$ev2;

		// prin($news_dates);

		// exit();

		//asing vars
		return [

				'head_title'=> $config['name'].' | '.$this->title,

				'grid'=>[
								'name' =>$config['name'],
								'url'	 =>$config['url'],
								'items'=>$items,
								'dates'=>$news_dates,
								],
			];

	

	}


	function getItem(){

		return $this->getPage();

	}


	function getLinks($params=['num'=>'7']){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		if($this->data_test){

			return $this->data_tests->getData([
				
				'name'  =>'Noticias',
				'items' =>'gallery?name=50&number=4&url=noticia-noticia/[N]',

			]);
			
		}

		// news
		$news=[
		'name'=>'Noticias',
		'items'=>select(
			"name,id",
			$config['items']['table'],
			"where 1
			order by weight desc
			limit 0,3",
			0,
			[
			'url'=>['url'=>['noticia-{name}/{id}']],
			]
		),
		'more'=>[
					'name'=>'ver más noticias',
					'url'=>'noticias'
					]
		];	

		return $news;


	}


}
