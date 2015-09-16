<?php 
namespace core\models;

class Videos extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}

	function getItems(){

		$params=$this->params;


		$name='Galerías de Videos';


		//only for data test
		if($this->data_test){

			return $this->data_tests->getData([

				'name'  =>$name,
				'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13&url=galeria-videos'

			]);

		}




		$items=select(
			"id,name",
			'galleries_videos',
			"where 1",
			0,
			[
				'video'=>['dato'=>['video','galleries_videos_videos','where id_grupo={id}']],

				'img'=>'http://i.ytimg.com/vi/{video}/mqdefault.jpg',

				'url'=>['url'=>['galeria-videos-{name}/{id}']],

			]
		);


		return [

			'name'  =>$name,
			'items' =>$items,

		];




	}


	function getItem(){

		$params=$this->params;


		//only for data test
		if($this->data_test){

			return $this->data_tests->getData([
				'name'  =>'Galería de videos',
				'type'  =>'videos',
				'items' =>'gallery?video&name=video&number=13&img'
			]);

		}


		$item=fila(
			"id,name,html",
			'galleries_videos',
			"where id='".$params['item']."'",0
		);

		$items=select(
			"name,video",
			"galleries_videos_videos",
			"where id_grupo=".$item['id'],
			0	
		);

		$type='videos';



		//asing vars

		return [

				'type'  =>$type,
				'name'  =>$item['name'],
				'html'  =>$item['html'],
				'items' =>$items,

		];

	

	}



}
