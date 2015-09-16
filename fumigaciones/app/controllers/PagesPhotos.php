<?php 
namespace controllers;

class PagesPhotos extends \controllers\Controller {


	function __construct($params){

		parent::__construct($params);

	}


	function grid(){

		// call Photos Model
		$Gallery=$this->loadModel('Photos');

		$Gallery->setConfig([
					'items'  =>['table'=>'pages_photos'],
					'photos' =>['table'=>'pages_photos_photos','dir'=>'profot_imas'],
					'url'		=>'producto',
					'type'	=>''
				]);


		$gallery=$Gallery->getItem();


		$this->view->assign([

			'head_title'=> $gallery['name'].' | '.$this->title,

			'gallery'=>[
							// 'type'  =>'photos',
							'html'  =>$gallery['html'],
							'name'  =>$gallery['name'],
							'items' =>$gallery['items'],
							]

			]

		);


		//render the view
		$this->view->render(
			
			'layout_galleries'

		);		


	}	


	function detail(){


		$Page=$this->loadModel('Pages');

		$Page->setConfig([
				'items'=>[
					'fields' =>'name,html as text,fecha_creacion,file as foto,id_grupo',
					'table'  =>'pages_photos_photos',
					'dir'    =>'profot_imas',
					'url'		=>'producto'
				],
				'groups'=>[
					'table'	=>'pages_photos'
				]
			]);

		$post  =$Page->getPage();

		
		$menu  =$Page->getMenu(['item'=>$post['id_grupo']]);

		$menu  =$this->elements->getM($menu,$this->params['uri']);

		
		$group =$Page->getGroup(['item'=>$post['id_grupo']]);
		


		$this->view->assign([
				
			'head_title' => $post['name'].' | '.$this->title,
			
			'title'      => $post['name'],
			
			'post'       => $post,
			
			'menu_post'  => $menu['items'],

			'group_post' => $group,

		]);

		//render the view
		$this->view->render(
			
			'layout_pages'

		);


	}


}
