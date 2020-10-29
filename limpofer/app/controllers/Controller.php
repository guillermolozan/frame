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
						"where id in (9)
						and visibilidad=1
						order by weight desc",0);
		
		foreach($groups as $group){

			$replace_menu_pre[$group['url']]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>$group['url']])
			];

		}	


		
		$replace_menu_pre['productos']=[
			'url'   =>maskUrl('productos'),
			'name'  =>'PRODUCTOS',
			'items' =>select('nombre as name,id,url','productos_subgrupos','where id_grupo=3 and visibilidad=1',0,
			[
				'url'=>['url'=>['productos/category-{url}/{id}']],
			])

		];

		$replace_menu_pre['letras']=[
			'url'   =>maskUrl('letras'),
			'name'  =>'LETRAS',
			'items' =>select('nombre as name,id,url','productos_subgrupos','where id_grupo=2 and visibilidad=1',0,
			[
				'url'=>['url'=>['letras/category-{url}/{id}']],
			])

		];

		$replace_menu_pre_top=$replace_menu_pre;

		// prin($replace_menu_pre);

		// $replace_menu=[];


		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_pre_top,$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_pre,$params['uri']);


		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);


		
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
				'icon'       	=> $this->view->vars['web_ico'].'?'.$this->static_build,

				// 'header_bg'		=> $header_bg['img'],
				
				// 'header_phones'=> $web['header_phones'],

            //footer
				
				//facebook
				// 'opengraph'  => true,
				
				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}