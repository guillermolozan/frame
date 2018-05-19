<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);


		$Page=$this->loadModel('Pages');




		// menu blocks
		$groups_blocks=select(
						"id,url,name",
						"paginas_groups",
						"where id!='24'
						and visibilidad=1
						order by weight desc",0);

		foreach($groups_blocks as $group){

			$replace_menu_blocks[]=[
				// 'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	


		$this->menu_blocks=$this->elements->getMenu(NULL,$replace_menu_blocks,$params['uri']);





		// menu left
		$groups_left=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,2,3)
						and visibilidad=1
						order by weight desc",0);

		foreach($groups_left as $group){

			$replace_menu_left_pre[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	

		$replace_menu_left=[
			'pagina/presentacion/86'=>'Presentación',
			$replace_menu_left_pre[0],
			$replace_menu_left_pre[1],
			$replace_menu_left_pre[2],
			'pagina/enlaces-de-interes/87'=>'Enlaces de Interés',
			'contactenos'=>'Contáctenos',
		];


		$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_left,$params['uri']);





		// menu top
		$groups_top=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1)
						and visibilidad=1
						order by weight desc",0);

		foreach($groups_top as $group){

			$replace_menu_top_pre[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	
		
		$replace_menu_top=[
			'pagina/presentacion/86'=>'Presentación',
			$replace_menu_top_pre[0],
			// $replace_menu_top_pre[1],
			// $replace_menu_top_pre[2],
			'pagina/enlaces-de-interes/87'=>'Enlaces de Interés',
			'contactenos'=>'Contáctenos',
		];

		$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_top,$params['uri']);		








		//menu footer
		// $this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);
		


		// photos
		$Photos=$this->loadModel('Photos');

		$Photos->setConfig([
					'photos'=>[
						'table'	=>'galleries_photos_photos',
						'fields'	=>'id,name,file,fecha_creacion,url'
					],
				]);

		$gallery=$Photos->getItem(['item'=>'1']);
		
		foreach($gallery['items'] as $ii=>$item){

			$gallery['items'][$ii]['target']='_blank';

		}


		// videos
		$Videos=$this->loadModel('Videos');

		$videos=$Videos->getItem([
			'item'=>'1',
			'type'=>'links'
		]);



		$this->view->assign(
			[
				
				'build_css'            => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'             => $this->view->vars['build_js'].'?'.$this->static_build,	
				//header and menu top
				'menu_top'             => $this->menu_top,
				'menu_left'            => $this->menu_left,
				// 'logo'              => $this->config['img_logo'],
				'logo'                 => 'logo.jpg',
				// 'header_bg'         => $header_bg['img'],
				// 'header_phones'     => $web['header_phones'],
				'icon'                 => 'icon.jpg'.'?'.$this->static_build,
				//menu_blocks
				'menu_blocks'          => $this->menu_blocks,
				'post'                 => $post,
				'block_gallery_photos' => $gallery,
				'block_gallery_videos' => $videos,
				//footer
				'menu_footer'       => $this->menu_footer,
				
				'opengraph'            => true


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}