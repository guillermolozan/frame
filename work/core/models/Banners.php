<?php 
namespace core\models;

class Banners extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}

	function getItems($params=['item'=>'banner_main']){


		if($this->data_test){

			return $this->data_tests->getData(
				'gallery?img&dims=1400x400&name=photo 1400x400&number=8&class'
			);
			
		}


		// banner
		$id_banner=dato("id","banners_fotos","where name='".$params['item']."'",0);

		$banner=select(
			"fecha_creacion,file,name",
			"banners_fotos_fotos",
			"where id_grupo=".$id_banner." order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'banfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],

				'url'=>['url'=>['pagina/{name}/{id}']],

			]									
		);



		$banner=array_map(function($value){

			$class=['left-align','right-align','center-align'];
			$value['class']=$class[array_rand($class)];
			return $value;

		},$banner);


		return $banner;



	}





}
