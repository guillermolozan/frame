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

		// menu left
		$groups=select(
						"id,url,name",
						"paginas_groups",
						"where id in (8,9)
						and visibilidad=1
						order by weight desc",0);

		


		foreach($groups as $group){

			$replace_menu_pre[$group['url']]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>$group['url']])
			];

		}	
		$habitaciones=select(
						"id,name",
						"projects",
						"where
						visibilidad=1
						order by weight desc",0,[
						'url'=>['url'=>['habitacion-{name}/{id}']],
						]);

		$replace_menu_pre['habitaciones']=[
			'url'   =>'#',
			'name'  =>'HABITACIONES',
			'items' =>$habitaciones
		];


		// prin($replace_menu_pre);

		// $replace_menu=[];


		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_pre,$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_pre,$params['uri']);

		
		//menu footer
			$this->menu_prefooter=$this->elements->getMenu('menu_footer',$replace_menu_pre,$params['uri']);
			unset($this->menu_prefooter[5]);

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

		$this->menu_footer['prodiserv']['name']='Site created by: PRODISERV';


		$this->view->assign(
			[
				'icon'       	=> 'icon.jpg'.'?'.$this->static_build,

				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,	
			//header and menu top
				'menu_top'     => $this->menu_top,

				'menu_left'    => $this->menu_left,

				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.png?6',

				'icon'       	=> 'ico.png?7',

				// 'header_bg'		=> $header_bg['img'],
				
				// 'header_phones'=> $web['header_phones'],

			//footer
				'menu_prefooter'  => $this->menu_prefooter,

				'menu_footer' 	   => $this->menu_footer,

				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}