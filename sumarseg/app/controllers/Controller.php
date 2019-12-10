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

		// menu left
		$groups=select(
						"id,url,name",
						"paginas_groups",
						"where id in (9,3)
						and visibilidad=1
						order by weight desc",0);

		foreach($groups as $group){

			$replace_menu_pre[$group['url']]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>$group['url']])
			];

		}

		foreach([
			'productos1'=>3,
			'productos2'=>2
		] as $group=>$idd){

			// menu producto1 y producto1
			$producto=fila("nombre,url","productos_grupos","where id=".$idd);
	
			$replace_menu_pre[$group]=[
				'url'   =>$producto['url'],
				'name'  =>$producto['nombre'],
				// categorias producto1
				'items' =>select(
					'nombre as name,id,url',
					'productos_subgrupos',
					'where id_grupo='.$idd.' and visibilidad=1',0,
					[
						'url'=>['url'=>[$producto['url'].'/category-{url}/{id}']],
					]
				)

			];

			foreach($replace_menu_pre[$group]['items'] as $iii=>$iitem){
				
				$replace_menu_pre[$group]['items'][$iii]['items']=select(
					'name,id,url',
					'productos_groups',
					'where id_grupo='.$replace_menu_pre[$group]['items'][$iii]['id'].' and visibilidad=1',
					0,
					[
						'url'=>['url'=>[$producto['url'].'/sub-category-{url}/{id}']],
					]
				);
		
			}			

		}

		$replace_menu_pre_top=[];

		// if($this->view->vars['web_facebook'])
		// 	$replace_menu_pre_top['facebook']=[
		// 		'url'   =>$this->view->vars['web_facebook'],
		// 		// 'name'  =>'Facebook',
		// 		'class' =>'facebook',
		// 		'target'=>'_blank'
		// 	];
	
		// if($this->view->vars['web_instagram'])
		// 	$replace_menu_pre_top['instagram']=[
		// 		'url'   =>$this->view->vars['web_instagram'],
		// 		// 'name'  =>'Instagram',
		// 		'class' =>'instagram',
		// 		'target'=>'_blank'
		// 	];


	

		// prin($replace_menu_pre['productos1']);


		// prin($replace_menu_pre);

		// $replace_menu=[];


		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',array_merge($replace_menu_pre,$replace_menu_pre_top),$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_pre,$params['uri']);


		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$replace_menu_pre);
		
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
				'theme_color'		 => '#0e4e87',

				//facebook
				'opengraph'  => true,
				
				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}