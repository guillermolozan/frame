<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);


		$replace_menu['empresa']=[
			'url'=>'#',
			'name'=>'Empresa',
			'items'=>select(
						"url,name",
						"paginas",
						"where type=2
						order by weight desc",0)
		];




		$replace_menu['proyectos']=[
			'url'=>'#',
			'name'=>'Proyectos',
			'items'=>select(
						"id,name",
						"projects_groups",
						"where 1 order by weight desc",0,
						[
						'url'=>['url'=>['proyectos-{name}/{id}']],
						])
		];



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

			//header and menu top
				'menu_top'     => $this->menu_top,
				'menu_left'    => $this->menu_left,
				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.png',
				// 'header_bg'		=> $header_bg['img'],
				// 'header_phones'=> $web['header_phones'],


			//footer
				'menu_footer'  => $this->menu_footer,


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}