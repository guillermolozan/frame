<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;
use core\Tests as Tests;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);

		$stores	=select("url,nombre","locales");

		//menu left
			foreach($stores as $store){

				$this->menu_left[]=[
									'url'=>$store['url'],
									'name'=>$store['nombre'],
									'class'=>'local',
								 ];
			
			}

			$replace_menu_pre['locales']=[
				'url'   =>'#',
				'name'  =>'Locales',
				'items' =>$this->menu_left
			];

			$this->menu_left=$this->elements->getMenu('menu_left',$this->menu_left,$params['uri']);



		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);


		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_pre,$params['uri']);


		$web=$this->elements->getFromFile('web');


		//logo
		$logo=fila(
			"fecha_creacion,file",
			"bloques_fotos",
			"where nombre='logo'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'blofot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);


		$this->view->assign(
			[

				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,	
			//header and menu top
				'menu_top'     => $this->menu_top,
				'menu_left'    => $this->menu_left,
				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.png',
				'header_bg'		=> $logo['img'],
				// 'header_phones'=> $web['header_phones'],


			//footer
				'menu_footer'  => $this->menu_footer,


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}