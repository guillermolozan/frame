<?php 
namespace controllers;

class News extends \core\controllers\News {

	function __construct($params){

		parent::__construct($params);


		$this->custom=[
					'items'=>[
						'fields'=>'id,name,fecha_creacion,html as text,fecha,foto',
						'url' =>'avances-de-obra/'
					],
					'name'=>'Avances de Obra',
					'url' =>'avances-de-obra'
				];



	}

	function grid($params){


		$News=$this->loadModel('News');

		$News->setConfig($this->custom);

		$vars=$News->getItems();



			
			unset($vars['grid']['dates']);

			$vars['grid']['items']=array_map(function($value){

				// $value['img']=$value['img']['get_archivo'];
				$value['more']=['name'=>'LEER MÁS','url'=>$value['url'],'class'=>'btn waves-effect waves-blue'];

				$value['text']=limit_string(html_entity_decode(strip_tags($value['text'])),350);

				return $value;

			},$vars['grid']['items']);




		$this->view->assign($vars);

		$this->view->assign(['banner'=>'banner1.jpg']);

		//render the view
		$this->view->render('layout_news_grid');


	}

	function detail(){


		$Page=$this->loadModel('News');

		$this->custom=[
					'items'=>[
						'fields'=>'id,name,fecha_creacion,html,fecha,foto',
					],
				];

		$Page->setConfig($this->custom);
		
		$post=$Page->getItem();

			$post['imgfirst']=true;

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

		//render the view
		$this->view->render('layout_news_detail');	

	}



}
