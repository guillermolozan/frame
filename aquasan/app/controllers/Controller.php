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


		/*
		888888 8b    d8 88""Yb 88""Yb 888888 .dP"Y8    db
		88__   88b  d88 88__dP 88__dP 88__   `Ybo."   dPYb
		88""   88YbdP88 88"""  88"Yb  88""   o.`Y8b  dP__Yb
		888888 88 YY 88 88     88  Yb 888888 8bodP' dP""""Yb
		*/
		if(0)
		$groups=select(
			"id,url,name",
			"paginas_groups",
			"where id in (3)
			and visibilidad=1
			order by weight desc",0);

		if(0)
		foreach($groups as $group){

			$replace_menu_pre[$group['url']]=[
				'url'   =>'#',
				'name'  =>strtoupper($group['name']),
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>$group['url']])
			];

		}

		/*
		.dP"Y8 888888 88""Yb Yb    dP 88  dP""b8 88  dP"Yb  .dP"Y8
		`Ybo." 88__   88__dP  Yb  dP  88 dP   `" 88 dP   Yb `Ybo."
		o.`Y8b 88""   88"Yb    YbdP   88 Yb      88 Yb   dP o.`Y8b
		8bodP' 888888 88  Yb    YP    88  YboodP 88  YbodP  8bodP'
		*/
	
		if(0)
		$servicios=select(
			"id,name",
			"projects",
			"where
			visibilidad=1
			order by weight desc",0,[
			'url'=>['url'=>['servicio-{name}/{id}']],
			]);

		if(0)
		$replace_menu_pre['servicios']=[
		'url'   =>'#',
		'name'  =>'SERVICIOS',
		'items' =>$servicios
		];

		/*
		88""Yb 88""Yb  dP"Yb  8888b.  88   88  dP""b8 888888  dP"Yb  .dP"Y8
		88__dP 88__dP dP   Yb  8I  Yb 88   88 dP   `"   88   dP   Yb `Ybo."
		88"""  88"Yb  Yb   dP  8I  dY Y8   8P Yb        88   Yb   dP o.`Y8b
		88     88  Yb  YbodP  8888Y"  `YbodP'  YboodP   88    YbodP  8bodP'
		*/

		if(0)
		foreach([
			'productos'=>2,
			// 'productos2'=>2
		] as $group=>$idd){

			// menu producto1 y producto1
			$producto=fila(
				"nombre,url",
				"productos_grupos",
				"where id=".$idd,
				0
			);
	
			$replace_menu_pre[$group]=[
				'url'   =>$producto['url'],
				'name'  =>$producto['nombre'],
				// categorias producto1
				'items' =>select(
					'nombre as name,id,url',
					'productos_subgrupos',
					'where id_grupo='.$idd.' and visibilidad=1',
					0,
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
				




		

		/*
		88""Yb 88      dP"Yb   dP""b8
		88__dP 88     dP   Yb dP   `"
		88""Yb 88  .o Yb   dP Yb  "88
		88oodP 88ood8  YbodP   YboodP
		*/		
		$replace_menu_pre['blogs']=[
			'url' =>'posts-articulos-de-interes/1',
			'name'=>'Artículos de interés',
			/*
			'items'=>select(
				'id,name',
				'posts_groups',
				'where 1
				order by weight desc',
				"0:menu de categorias",
				[
					'url'=>['url'=>['posts-{name}/{id}']],
				]
			)		
			*/				
		];

		
		


		
		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',array_merge($replace_menu_pre),$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',array_merge($replace_menu_pre),$params['uri']);


		//menu footer
			
			// $replace_menu_pre_footer=$replace_menu_pre;

			// $this->menu_footer=$this->elements->getMenu('menu_footer',array_merge($replace_menu_pre_footer));
			$this->menu_footer=$this->elements->getMenu('menu_top',array_merge($replace_menu_pre),$params['uri']);
		
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

		$FooterBanner=$this->loadModel('Banners');
		$footer_banner=$FooterBanner->getItems(['item'=>'banner_footer']);


		/*
		##     ## #### ########  ########  #######
		##     ##  ##  ##     ## ##       ##     ##
		##     ##  ##  ##     ## ##       ##     ##
		##     ##  ##  ##     ## ######   ##     ##
		 ##   ##   ##  ##     ## ##       ##     ##
		  ## ##    ##  ##     ## ##       ##     ##
		   ###    #### ########  ########  #######
		*/
		$video=fila("video,name","galleries_videos_videos","where id=34");

		
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
				'theme_color'		 => '#4FDFFA',

				//facebook
				// 'opengraph'  => true,
				
				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',
				
				'footer_special'	=>[
					'video'=>$video['video'],
					'name'=>$video['name'],
					// 'banner'=>$footer_banner,
				]

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}