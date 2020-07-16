<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {

	function __construct($params){
		
		parent::__construct($params);

		/*
		##     ## ######## ##    ## ##     ##
		###   ### ##       ###   ## ##     ##
		#### #### ##       ####  ## ##     ##
		## ### ## ######   ## ## ## ##     ##
		##     ## ##       ##  #### ##     ##
		##     ## ##       ##   ### ##     ##
		##     ## ######## ##    ##  #######
		*/
		$Page=$this->loadModel('Pages');


	
		// $replace_menu_pre['libros']=[
		// 	'url'	=>'ventas/category-libros/19',
		// 	'name'  =>'LIBROS',
		// ];


		/*

		// Manuales y Pdfs
		$replace_menu_pre['libros']=[
			// 'url'   =>maskUrl('libros'),
			'url'	=>'libros',
			'name'  =>'LIBROS',
			'items' =>select('nombre as name,id,url','productos_subgrupos','where id_grupo=4 and visibilidad=1',0,
			[
				'url'=>['url'=>['libros/category-{url}/{id}']],
			])

		];
		
		// videos
		$replace_menu_pre['libros']['items'][]=[
			'name' => 'Videos',
			'url' => 'videos'
		];

		*/
		


		// libros
		$replace_menu_pre['ventas']=[
			// 'url'   =>maskUrl('libros'),
			'url'	=>'ventas',
			'name'  =>'Productos',
			'items' =>select('nombre as name,id,url','productos_subgrupos','where id_grupo=5 and visibilidad=1',0,
			[
				'url'=>['url'=>['ventas/category-{url}/{id}']],
			])

		];


		// cursos
		$groups=$Page->getMenuGroup(
			[
				'where'=>'id in (33)',
				// 'where'=>'id in (4)'
			]
		);		

		foreach($groups as $group){

			// $has_home=hay("paginas","where visibilidad=1 and weight='-1' and id_grupo=".$group['id'],0);
			// prin($group['id']);
			$replace_menu_pre_sub2[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu([
					'item'=>$group['id'],
					'uri'=>'cursos',
					'sub'	 => "id_grupo={id_grupo}",
				]
				,0
				)
			];

		}

		// prin($replace_menu_pre_sub2);

		// $replace_menu_pre['ventas']['items'][]=$replace_menu_pre_sub2['0']['items']['1'];
		$replace_menu_pre['ventas']['items'][]=$replace_menu_pre_sub2['0'];


		// exit();
		// servicios
		$groups=select(
			"id,url,name",
			"paginas_groups",
			"where id in (3)
			and visibilidad=1
			order by weight desc",
			0);

		foreach($groups as $group){

			$replace_menu_pre_sub[$group['url']]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>$group['url']])
			];

		}		
		$replace_menu_pre['ventas']['items'][]=$replace_menu_pre_sub['servicios'];


					
		$replace_menu_pre['blogs']=[
			'url' =>'#',
			'name'=>'Blog',
			'items'=>select(
				'id,name',
				'projects_groups',
				'where 1
				order by weight desc',
				"0:menu de categorias",
				[
					'url'=>['url'=>['posts-{name}/{id}']],
				]
			)						
		];

		
		


		
		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',array_merge($replace_menu_pre),$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',array_merge($replace_menu_pre),$params['uri']);


		//menu footer
			
			$replace_menu_pre_footer=$replace_menu_pre;
			

			$this->menu_footer=$this->elements->getMenu('menu_footer',array_merge($replace_menu_pre_footer));
		
      $this->view->assign(
			[
			// menus
			'menu_top'     => $this->menu_top,

            'menu_left'    => $this->menu_left,

            'menu_footer' 	=> $this->menu_footer,

         ]
      );





		//web
		// $web=$this->elements->getFromFile('web');


		//header_bg
		// $header_bg=fila(
		// 	"fecha_creacion,file",
		// 	"bloques_fotos",
		// 	"where nombre='logo'",
		// 	0,
		// 	[
		// 		'img'=>['get_archivo'=>[
		// 									'carpeta'=>'blofot_imas',
		// 									'fecha'=>'{fecha_creacion}',
		// 									'file'=>'{file}',
		// 									'tamano'=>'0'
		// 									]
		// 								]	
		// 	]									
		// 	);

		$this->view->assign(
			[

				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,	

				// 'logo'         => $this->config['img_logo'],
				'logo'         => $this->view->vars['web_logo'].'?'.$this->static_build,
				'icon'         => $this->view->vars['web_ico'].'?'.$this->static_build,

				// 'header_bg'		=> $header_bg['img'],
				
				// 'header_phones'=> $web['header_phones'],

            //footer
				'theme_color'		 => '#052F6C',

				//facebook
				'opengraph'  => true,
				
				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}