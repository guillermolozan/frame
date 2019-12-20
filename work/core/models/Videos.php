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
		// if($this->data_test){

		// 	return $this->data_tests->getData([

		// 		'name'  =>$name,
		// 		'items' =>'gallery?img&dims=700x700&name=photo 700x700&number=13&url=galeria-videos'

		// 	]);

		// }




		$items=select(
			"id,name",
			'galleries_videos',
			"where 
			visibilidad=1
			order by weight desc ",
			0,
			[
				'video'=>['dato'=>['video','galleries_videos_videos','where id_grupo={id}']],

				'img'=>'https://i.ytimg.com/vi/{video}/mqdefault.jpg',

				'url'=>['url'=>['galeria-videos-{name}/{id}']],

			]
		);


		return [

			'name'  =>$name,
			'items' =>$items,

		];




	}


	function getItem($params=[]){

		$params=array_merge($this->params,$params);

		$params['type']=($params['type'])?$params['type']:'videos';

		//only for data test
		// if($this->data_test){

		// 	return $this->data_tests->getData([
		// 		'name'  =>'Galería de videos',
		// 		'type'  =>'videos',
		// 		'items' =>'gallery?video&name=video&number=13&img'
		// 	]);

		// }


		$item=fila(
			"id,name,html",
			'galleries_videos',
			"where 
			id='".$params['item']."'
			",
			0
		);

		$items=select(
			"name,video,id",
			"galleries_videos_videos",
			"where id_grupo=".$item['id']." 
			and visibilidad=1
			order by weight desc ".
			(($params['limit'])?'limit '.$params['limit']:"limit 0,100"),
			0
		);

		$type='videos';

		if($params['type']=='links'){

			foreach($items as $ii=>$ite){
			
				$items[$ii]['img']  ='https://i.ytimg.com/vi/'.$ite['video'].'/hqdefault.jpg';
				$items[$ii]['url'] ='video/'.$ite['id'];

			}

			$type='links';

		}

		//asing vars

		return [

				'type'  =>$type,
				'name'  =>$item['name'],
				'html'  =>$item['html'],
				'items' =>$items,

		];

	

	}



	function getVideo($params=[]){

		$params=array_merge($this->params,$params);

		$item=fila(
			"name,video,id",
			"galleries_videos_videos",
			"where id=".$params['item']." ",
			0
		);
		
		return $item;

	}

	function getTitle($post=null){

		$post=($post)?$post:$this->post;
		// return ucfirst(strtolower(trim($post['name'])))." | ".$this->title;
		return trim($post['name'])." | ".$this->title;

	}


}
