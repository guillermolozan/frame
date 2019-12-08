<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){


		parent::__construct($params);


			$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'items'  =>[
							'table'=>'eventos_photos'
							,'fields'=>'id,name,fecha'
						],
					'photos' =>[
						'table'=>'eventos_photos_photos',
						'dir'=>'evefot_imas'
					],
						'url'		=>'evento',
						'type'	=>'link'
					]);

			$gallery=$Gallery->getItems([
				// 'item'=>'1',
				'limit'=>'0,4'
			]);

			// prin($gallery['items'][0]);


		$replace_menu=[];

		$replace_menu[$gallery['items'][0]['url']]='Social';
		$replace_menu['contactenos']='Contáctenos';

		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu,$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu,$params['uri']);


		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);
		




		//web
		$web=$this->elements->getFromFile('web');


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
				'icon'       	=> 'icon.jpg'.'?'.$this->static_build,

				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,	
			//header and menu top
				'menu_top'     => $this->menu_top,

				'menu_left'    => $this->menu_left,

				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.jpg?1',

				'icon'       	=> 'icon.jpg?1',

				// 'header_bg'		=> $header_bg['img'],
				
				// 'header_phones'=> $web['header_phones'],

			//footer
				'menu_footer'  => $this->menu_footer,

				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}