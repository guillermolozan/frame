<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);

		$replace_menu=[];

		$replace_menu['empresa']=[
			'url'=>'#',
			'name'=>'Nosotros',
			'items'=>select(
						"url,name",
						"paginas",
						"where id_grupo=2
						order by weight desc",0)
		];




		// $replace_menu['proyectos']=[
		// 	'url'=>'#',
		// 	'name'=>'Proyectos',
		// 	'items'=>select(
		// 				"id,name",
		// 				"projects_groups",
		// 				"where 1 order by weight desc",0,
		// 				[
		// 				'url'=>['url'=>['proyectos-{name}/{id}']],
		// 				])
		// ];



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



		// phones
		$phones=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where id='2'",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'pag_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'2'
											]
										]
			]
		);

		

		$parts=explode('<hr />',$phones['html']);
		$numparts=sizeof($parts);
		if($numparts==0){
			$html='';
		} elseif($numparts>4){
			$html =$parts[0];
			$html.=$parts[1];
			$html.=$parts[2];
			unset($parts[0],$parts[1],$parts[2]);
			$html.=implode("<br>",$parts);
		} else {
			$html='';
			foreach($parts as $part)
				$html.='<div class="col s12 l'. (12/$numparts) .'">'.$part.'</div>';
		}

		$footer_pre=$html;


		

		$this->view->assign(
			[

			//header and menu top
				'menu_top'     => $this->menu_top,
				'menu_left'    => $this->menu_left,
				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.jpg',
				// 'header_bg'		=> $header_bg['img'],
				// 'header_phones'=> $web['header_phones'],


			//footer
				'menu_footer'  => $this->menu_footer,

				"footer_pre"	  =>$footer_pre,


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}