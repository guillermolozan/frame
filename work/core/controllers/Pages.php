<?php 
namespace core\controllers;

use core\vendor\SimpleDom as SimpleDom;

class Pages extends \controllers\Controller {


	function index_nogroup($params){

		$params['no-show-menu-group']=1;

		$this->index($params);

	}

	function split(){

		$Page=$this->loadModel('Pages');

		$post             =$Page->getPage();

		// echo "<textarea>".$post['html']."</textarea>";

		$html=explode("<hr />",$post['html']);

		$parts=sizeof($html);

		$this->view->assign(['post'=>[
			'name' =>$post['name'],
			'img'  =>$post['img'],			
			'html'=>($parts==1)?$html[0]:$html,
			'parts'=>$parts]]
		);

	}


	function index($params){


		$Page=$this->loadModel('Pages');
		
		$post             =$Page->getPage();
				
		$head_description =$Page->getDescription($post);

		$head_keywords    =$Page->getKeywords($post);
		
		$head_title       =$Page->getTitle($post);



		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1'
										],
		
		]);


		if($post['id_grupo']!='' and !$params['no-show-menu-group'] ){

			$gallery=false;

			if($params['with_gallery']){
			
				$Photos=$this->loadModel('Photos');

				$Photos->setConfig([	
					'items'  =>['table'=>'paginas','fields'=>'id,name,html'],
					'photos' =>['table'=>'paginas_photos','dir'=>'pagfot_imas','fields'=>'id,name,file,fecha_creacion'],
					'type'   =>'photos',					
				]);

				$gallery=$Photos->getItem();

				$gallery['name']='';

				$gallery['html']='';

			}

			$breadcrumb =$Page->getBreadcrumb(['item'=>$post['id_grupo'],'id'=>$this->params['item']]);
			
			// prin($post['id_grupo']);
			// $menu       =$Page->getMenu(['item'=>$post['id_grupo']]);

			// if($post['id_grupo']==19) $post['id_grupo']=4;

			// $id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$post['id_grupo']);

			// if( is_numeric($id_grupo) and $id_grupo>0){ $post['id_grupo']=$id_grupo; }

			$post['id_grupo']=$Page->getIdGroup(['id_grupo'=>$post['id_grupo']]);

			// prin($post['id_grupo']);

			$groups_top=$Page->getMenuGroup(['where'=>'id='.$post['id_grupo']]);
			// prin($groups_top);

			foreach($groups_top as $group)
			{				

				// $menu[]=[
				// 	'url'   =>'#',
				// 	'name'  =>$group['name'],
				// 	'items' =>$Page->getMenu(
				// 		[
				// 			'item' =>$group['id'],
				// 			'uri'  =>$group['url'],
				// 			'sub'	 => "id_grupo={id_grupo}",
				// 		]
				// 	)
				// ];


				$menu=$Page->getMenu(
					[
						'item' =>$group['id'],
						'uri'  =>$group['url'],
						'sub'	 => "id_grupo={id_grupo}",
					]
				);

			}				

			// if($post['id_grupo']==4){
			// 	prin($menu);
			// }

			$group      =$Page->getGroup(['item'=>$post['id_grupo']]);
			
			$menu       =$this->elements->getM($menu,$this->params['uri']);
			
			// prin($menu);

			$canonical  =$Page->getCanonical([

				'group'   =>$group,
				'name'    =>$post['name'],
				'id'      =>$post['id'],
			
			]);

			// prin($gallery);

			$this->view->assign([
				
				'menu_post'  => $menu['items'],
								
				'group_post' => $group,
				
				'breadcrumb' => $breadcrumb,
				
				'canonical'  => $canonical,

			]);

			if($gallery)
				$this->view->assign(['gallery'=>$gallery]);			


		}

	}

	function collapsible($html){

		$dom = new SimpleDom();

	   // $dom->load($html);

		return $html;

	}

}