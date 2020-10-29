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
		 dP""b8  dP"Yb  88b 88 888888 888888 Yb  dP 888888
		dP   `" dP   Yb 88Yb88   88   88__    YbdP    88
		Yb      Yb   dP 88 Y88   88   88""    dPYb    88
		 YboodP  YbodP  88  Y8   88   888888 dP  Yb   88
		*/
		$this->this_group=1;
		$this->other_group=2;


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
		8b    d8  dP"Yb  8888b.  888888 88      dP"Yb  .dP"Y8
		88b  d88 dP   Yb  8I  Yb 88__   88     dP   Yb `Ybo."
		88YbdP88 Yb   dP  8I  dY 88""   88  .o Yb   dP o.`Y8b
		88 YY 88  YbodP  8888Y"  888888 88ood8  YbodP  8bodP'
		*/
		$servicios=select(
			[
				"id",
				"nombre as name"
			],
			"productos_items",
			"where
			visibilidad=1 ".
			" and id_grupo=".$this->this_group." ".
			// " order by weight desc"
			"",
			0,
			[
				'url'=>['url'=>['modelo-{name}/{id}']],
			]
		);
		
		if(0)
		$replace_menu_pre['modelos']=[
		'url'   =>'#',
		'name'  =>'MODELOS',
		'items' =>$servicios
		];

		foreach($servicios as $servicio){
			$replace_menu_pre[]=[
				'url'  =>$servicio['url'],
				'name' =>$servicio['name']
			];			
		}
		// VIDEOS
		$replace_menu_pre[]=[
			'url'  =>'videos',
			'name' =>'Videos'
		];	
		// CONTACTENOS
		$replace_menu_pre[]=[
			'url'  =>'contactenos',
			'name' =>'Contáctenos'
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
				'theme_color'		 => '#000000',

				//facebook
				'opengraph'  => true,
				
				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}