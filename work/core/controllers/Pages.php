<?php 
namespace core\controllers;

class Pages extends \controllers\Controller {

	function index(){


		$Page=$this->loadModel('Pages');

		
		$post=$Page->getPage();


		$this->view->assign([
				
			'head_title' => $post['name'].' | '.$this->title,
			
			'title'      => $post['name'],
			
			'post'       => $post,
		

		]);


		if($post['id_grupo']!=''){

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);
			
			$menu       =$Page->getMenu(['item'=>$post['id_grupo']]);
			
			$group      =$Page->getGroup(['item'=>$post['id_grupo']]);
			
			$menu       =$this->elements->getM($menu,$this->params['uri']);

			$this->view->assign([
				
				'menu_post'  => $menu['items'],

				'group_post' => $group,

				'breadcrumb' => $breadcrumb,

			]);

		}

	}

}