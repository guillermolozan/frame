<?php 
namespace core\models;

class Banners extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}


	function getConfig(){

		$config=[
			'items'=>[
				'table' =>'banners_fotos_fotos',
				'fields'=>"fecha_creacion,file,name,url",
				'dir'   =>'banfot_imas',
			],
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
   

	function getItems($params=['item'=>'banner_main']){


      $config=$this->getConfig();

		$params=array_merge($this->params,$params);
		// if($this->data_test){

		// 	return $this->data_tests->getData(
		// 		'gallery?img&dims=1400x400&name=photo 1400x400&number=8&class'
		// 	);
			
		// }


            
		// banner
		$id_banner=dato("id","banners_fotos","where name='".$params['item']."'",0);

		$banner=select(
			$config['items']['fields'],
			$config['items']['table'],
			"where id_grupo=".$id_banner."
			and visibilidad=1
			order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>$config['items']['dir'],
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],

				// 'url'=>['url'=>['pagina/{name}/{banner}']],

			]									
		);


		$banner=array_map(function($value){

			$value['url']=str_replace([$this->view->vars['url_rem']],['/'],$value['url']);
			$class=['left-align','right-align','center-align'];
			$value['class']=$class[array_rand($class)];
			return $value;

		},$banner);


		return $banner;



	}





}
