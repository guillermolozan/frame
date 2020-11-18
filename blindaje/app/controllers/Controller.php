<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {

	function __construct($params){
		
		parent::__construct($params);

		$this->pipe = "::";


		/*
		##     ## ######## ##    ## ##     ##
		###   ### ##       ###   ## ##     ##
		#### #### ##       ####  ## ##     ##
		## ### ## ######   ## ## ## ##     ##
		##     ## ##       ##  #### ##     ##
		##     ## ##       ##   ### ##     ##
		##     ## ######## ##    ##  #######
		*/
		//menu top
		$this->menu_top=$this->elements->getMenu('menu_top',[],$params['uri']);
			
		// //menu left
		// 	$this->menu_left=$this->elements->getMenu('menu_left',array_merge($replace_menu_pre),$params['uri']);


		// //menu footer
			
		// 	$replace_menu_pre_footer=$replace_menu_pre;
			

		// 	$this->menu_footer=$this->elements->getMenu('menu_footer',array_merge($replace_menu_pre_footer));
		
		$this->view->assign(
		[
			// menus
			'menu_top'     => $this->menu_top,

			// 'menu_left'    => $this->menu_left,

			// 'menu_footer' 	=> $this->menu_footer,

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

				/*
				8b    d8  dP"Yb  88""Yb 88 88     888888
				88b  d88 dP   Yb 88__dP 88 88     88__
				88YbdP88 Yb   dP 88""Yb 88 88  .o 88""
				88 YY 88  YbodP  88oodP 88 88ood8 888888
				*/
				'theme_color'		 => '#065f99',

				/*
				888888    db     dP""b8 888888 88""Yb  dP"Yb   dP"Yb  88  dP
				88__     dPYb   dP   `" 88__   88__dP dP   Yb dP   Yb 88odP
				88""    dP__Yb  Yb      88""   88""Yb Yb   dP Yb   dP 88"Yb
				88     dP""""Yb  YboodP 888888 88oodP  YbodP   YbodP  88  Yb
				*/
				// 'opengraph'  => true,
				
			

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}