<?php 
namespace core\models;

class Photos extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}


	function getConfig(){

		$config=[
				'name'	=>'Galerías de Fotos',
				'items'  =>[
					'table'=>'galleries_photos',
					'fields'=>'id,name,html'
				],
				'photos' =>[
					'table'=>'galleries_photos_photos',
					'dir'=>'galfot_imas',
					'fields'=>'id,name,file,fecha_creacion',
					'file'=>'file'
				],
				'url'    =>'galeria-fotos',
				'more'    =>false,
				'type'   =>'photos',
			];
		// prin($config);
		foreach($this->config as $one=>$two)
			if(is_array($two))
				foreach($two as $three=>$four)
					$config[$one][$three]=$four;
			else
				$config[$one]=$two;

		return $config;
	}


	//galeria de galerias
	function getItems($params=[]){

		$params=array_merge($this->params,$params);

		$config=$this->getConfig();

		$name=$config['name'];

		
		// //only for data test
		// if($this->data_test){

		// 	return $this->data_tests->getData([
		// 		// 'type'  =>'photos',
		// 		'name'  =>$name,
		// 		'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13&url=galeria-fotos'
		// 	]);

		// }
		// //
		// prin($config);

		// prin(__METHOD__);

		$items=select(
			$config['items']['fields'],
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

				'url'=>['url'=>[$config['url'].'-{name}/{id}']],
			]
		);


		//asing vars
		return [

			'name'  =>$name,
			'items' =>$items,
								
		];

	
	}



	// galeria
	function getItem($params=[]){


		$params=array_merge($this->params,$params);

		$config=$this->getConfig();

		//only for data test
		// if($this->data_test){

		// 	return $this->data_tests->getData([
		// 		'name'  =>'Galería de fotos',
		// 		'html'  =>'Galería de fotos',				
		// 		'type'  =>$config['type'],
		// 		'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13'.( ($config['type']=='photos')?'':'&url='.$config['url'].'-'.$config['url'].'/[N]')
		// 	]);

		// }
		//
		

		if($params['item']){

			$item=fila(
				$config['items']['fields'],
				$config['items']['table'],
				"where visibilidad=1 and id=".$params['item'],
				0
				/*[
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

				]*/

			);

		} else {

			$item['name']=$config['name'];

		}

		$item['items']=select(
			$config['photos']['fields'],
			$config['photos']['table'],
			"where visibilidad=1 and ".
			(($params['item'])?'id_grupo='.$params['item']:'1').
			' '.
			(isset($params['order'])?'order '.$params['order']:' order by weight desc').			
			' '.
			(isset($params['limit'])?'limit '.$params['limit']:'').
			'',
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>$config['photos']['dir'],
											'fecha'=>'{fecha_creacion}',
											'file'=>'{'.$config['photos']['file'].'}',
											// 'tamano'=>'2'
											]
										],				
			]
		);


		if(
			$config['type']!='photos' and 
			$config['type']!='external_link'
			){

			foreach($item['items'] as $ii=>$value){

				$item['items'][$ii]['url']=$config['url'].'-'.procesar_url($value['name'].'/').$value['id'];

			}

		}


		if($config['target']=='_blank'){

			foreach($item['items'] as $ii=>$value){

				$item['items'][$ii]['target']='_blank';

			}

		}


		if($config['more']!=false)
		$more=[
					'name' =>$config['more'],
					'url'  =>$config['url'].'-'.procesar_url($item['name'].'/'.$params['item'])
				];


		//asing vars
		
		$ret=$item;

			$ret['type']=$config['type'];
			
			$ret['more']=$more;

		return $ret;

	}	

}
