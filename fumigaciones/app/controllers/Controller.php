<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		parent::__construct($params);

		$grouppages	= select(['id','url','name'],"paginas_groups","where id in (1,2,12)",0);

		foreach($grouppages as $i=> $group){

			$replace_menu[$group['url']]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>select(['id','name'],"paginas","where id_grupo=".$group['id']." order by weight desc",0,[
								'url'=>['url'=>[$group['url'].'/{name}/{id}']],
								'id'=>'null'
							])
			];

		}


		// $replace_menu['productos']=[
		// 	'url'=>'#',
		// 	'name'=>'Productos',
		// 	'items'=>select(
		// 				"id,name",
		// 				"pages_photos",
		// 				"where 1",0,
		// 				[
		// 				'url'=>['url'=>['productos-{name}/{id}']],
		// 				])
		// ];

		// $replace_menu['capacitaciones']=fila("id,name","paginas","where id=7",0,
		// 	[
		// 		'url'=>['url'=>['pagina/{name}/{id}']],
		// 		'id'=>'null'
		// 	]);

		//menu top
			$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu,$params['uri']);


		//menu left
			$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu,$params['uri']);



		//menu footer
			$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);





		//web
		$web=$this->elements->getFromFile('web');


		// phones
		$phones=fila(
			"name,html,fecha_creacion,foto",
			"paginas",
			"where id='8'",
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


		// prin($this->view->vars);


		$this->view->assign(
			[

				'build_css'        => $this->view->vars['build_css'].'?5'.$this->static_build,
				'build_js'         => $this->view->vars['build_js'].'?5'.$this->static_build,
			//header and menu top
				'menu_top'     => $this->menu_top,
				'menu_left'    => $this->menu_left,
				// 'logo'         => $this->config['img_logo'],
				'logo'         => 'logo.png',
				// 'header_bg'		=> $header_bg['img'],
				// 'header_phones'=> $web['header_phones'],


			//footer
				'menu_footer'  => $this->menu_footer,

				'footer_pre'			=> $footer_pre


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}