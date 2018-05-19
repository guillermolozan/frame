<?php 
namespace core\controllers;

class Videos extends \controllers\Controller {


	function grid(){


		$Videos=$this->loadModel('Videos');

		$gallery=$Videos->getItems();

		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);


	}


	function detail(){


		$Videos=$this->loadModel('Videos');


		$gallery=$Videos->getItem();
		
		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>$gallery['type'],
							'name'  =>$gallery['name'],
							'html'  =>$gallery['html'],
							'items' =>$gallery['items'],
							]

			]

		);
	

	}



	function post($params){

		$Video=$this->loadModel('Videos');
		
		$video             	=$Video->getVideo(['id'=>$params['item']]);

		$video['name']=($video['name'])?$video['name']:'video '.$params['item'];
		// prin($video);
				
		// $head_description =$Page->getDescription($post);

		// $head_keywords    =$Page->getKeywords($post);
		
		$head_title       =$Video->getTitle($video);



		$this->view->assign([

			'head_title'       => $head_title,

			// 'head_description' => $head_description,

			// 'head_keywords' 	 => $head_keywords,
			
			'title'            => $video['name'],
			
			'post'             => [
											'name' =>$video['name'],

											'video'=>$video['video'],
										],
		
		]);


	}


}
