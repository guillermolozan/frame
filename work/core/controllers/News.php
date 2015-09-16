<?php 
namespace core\controllers;

class News extends \controllers\Controller {

	function grid(){


		$News=$this->loadModel('News');


		$this->view->assign(
			$News->getItems()
		);

	

	}


	function detail(){


		$Page=$this->loadModel('News');

		
		$post=$Page->getItem();

		$menu=$Page->getMenu(['item'=>'']);

		$group='Noticias';


		$menu=$this->elements->getM($menu,$this->params['uri']);

		$this->view->assign([
				
			'head_title' => $post['name'].' | '.$this->title,
			
			'title'      => $post['name'],
			
			'post'       => $post,
			
			'menu_post'  => $menu['items'],

			'group_post' => $group,

		]);



	}



}
