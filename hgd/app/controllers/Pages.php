<?php 
namespace controllers;

class Pages extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}
	


	function index(){
		

		$Page=$this->loadModel('Pages');

		
		$post=$Page->getPage();


		$this->view->assign([
				
			'head_title' => $post['name'].' | '.$this->title,
			
			'title'      => $post['name'],
			
			'post'       => $post,
		

		]);


		if($post['id_grupo']!='' and $post['id_grupo']!='1'){

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);
			
			$menu       =$Page->getMenu(['item'=>$post['id_grupo']]);
			
			foreach($menu as $ii=>$men){

				$urls=explode('/',$menu[$ii]['url']);

				$menu[$ii]['url']=$urls[0];

			}

			$group      =$Page->getGroup(['item'=>$post['id_grupo']]);
			
			$menu       =$this->elements->getM($menu,$this->params['uri']);

			$this->view->assign([
				
				'menu_post'  => $menu['items'],

				'group_post' => $group,

				'breadcrumb' => $breadcrumb,

			]);

		}

		//render the view
		$this->view->render(
			
			'layout_pages'

		);

	}

}