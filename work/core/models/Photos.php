<?php 
namespace core\models;

class Photos extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}


	function getConfig(){

		$config=[
				'items'  =>['table'=>'galleries_photos','fields'=>'id,name,html'],
				'photos' =>['table'=>'galleries_photos_photos','dir'=>'galfot_imas','fields'=>'id,name,file,fecha_creacion'],
				'url'    =>'galeria-fotos',
				'type'   =>'photos',
			];

		foreach($this->config as $one=>$two)
			foreach($two as $three=>$four)
				$config[$one][$three]=$four;

		return $config;
	}


	function getItems($params=[]){

		$params=array_merge($this->params,$params);

		$config=$this->getConfig();


		$name='Galerías de Fotos';


		//only for data test
		if($this->data_test){

			return $this->data_tests->getData([
				// 'type'  =>'photos',
				'name'  =>$name,
				'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13&url=galeria-fotos'
			]);

		}




		// prin(__METHOD__);

		$items=select(
			"id,name",
			$config['items']['table'],
			"where 1",
			0,
			[
				'img'=>[
					'foto'=>[
						'file,fecha_creacion|'.$config['photos']['table'].'|where id_grupo={id} order by weight desc',
						$config['photos']['dir']
					]
				],

				'url'=>['url'=>['galeria-fotos-{name}/{id}']],
			]
		);


		//asing vars
		return [

			'name'  =>$name,
			'items' =>$items,
								
		];

	
	}




	function getItem($params=[]){


		$params=array_merge($this->params,$params);


		$config=$this->getConfig();

		//only for data test
		if($this->data_test){

			return $this->data_tests->getData([
				'name'  =>'Galería de fotos',
				'html'  =>'Galería de fotos',				
				'type'  =>$config['type'],
				'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13'.( ($config['type']=='photos')?'':'&url='.$config['url'].'-'.$config['url'].'/[N]')
			]);

		}
		

		$item=fila(
			$config['items']['fields'],
			$config['items']['table'],
			"where id=".$params['item'],
			0,
			[
				'items'=>[
					'fotos'=>[
						$config['photos']['fields'].'|'.$config['photos']['table'].'|where id_grupo={id} '.
						'order by weight desc '.
						(isset($params['limit'])?'limit '.$params['limit']:'')
						,
						$config['photos']['dir'],
						['img'=>'0']
					],

				],

			]

		);

		if($config['type']!='photos'){

			foreach($item['items'] as $ii=>$value){

				$item['items'][$ii]['url']=$config['url'].'-'.procesar_url($value['name'].'/').$value['id'];				

			}

		}


		//asing vars
		return [

			'type'  =>$config['type'],
			'name'  =>$item['name'],
			'html'  =>$item['html'],
			'items' =>$item['items'],

		];


	}	

}
