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


		// menu top / left
		$Page->setConfig([
					'items'=>[
						// 'fields'=>'name,fecha_creacion,file',
						'table'=>'projects',
						// 'dir'	=> 'pro_imas',
						// 'name'	=> 'Proyectos'
					],
		]);

		$replace_menu_top_pre['proyectos-en-venta']=[
			'url'   =>'#',
			'name'  =>'PROYECTOS EN VENTA',
			'items' =>$Page->getMenu(['item'=>'','uri'=>'proyectos-en-venta'])
		];


		$replace_menu_left_pre['proyectos-en-venta']=$replace_menu_top_pre['proyectos-en-venta'];



		$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_left_pre,$params['uri']);



		$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_top_pre,$params['uri']);		

		// $replace_menu['galeria-fotos-staff/1']='STAFF';

		// $replace_menu[]=[
		// 	'url'		=>'promociones/promocion-de-pagina-web-administrable/50',
		// 	'name'	=>'PROMOCIONES',
		// 	'aclass'	=>'promociones'
		// ];



		// $replace_menu['contactenos']='Contactenos';


		// prin($replace_menu);

		// $replace_menu['empresa']=[
		// 	'url'=>'#',
		// 	'name'=>'Empresa',
		// 	'items'=>select(
		// 				"url,name",
		// 				"paginas",
		// 				"where type=2
		// 				order by weight desc",0)
		// ];








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


		$groups_footer=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,2,3,4,5,6)
						and visibilidad=1
						order by weight desc",0);


		$Page=$this->loadModel('Pages',['items'=>['filter'=>'limit 0,12']]);


		foreach($groups_footer as $group){

			$menutop[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	


		// $menutop=[
		// 	$menutop[1],
		// 	$menutop[2],
		// 	$menutop[3],
		// 	$menutop[4],
		// 	$menutop[8],
		// 	$menutop[5],
		// ];


		$menutop[3]['ulcss']='col s6 m3';
		$menutop[4]['ulcss']='col s6 m5';
		$menutop[5]['ulcss']='col s12 m4';

		$ee=0;

		foreach($menutop as $ii=>$item){

			$pre[]=$item;//['name'=>$item['name'],'url'=>'#'];

			foreach($item['items'] as $ite){
				$pre[]=$ite;					
			}
			if($item['ulcss']!='' or ($ii+1==sizeof($menutop))){ 
				$prefooter[$ee++]=['items'=>$pre,'ulcss'=>($item['ulcss'])?$item['ulcss']:'col s2'];
				unset($pre);
			}

		}

		$static_build=83;

		$this->view->assign(
			[
			//header and menu top
				'menu_top'      => $this->menu_top,
				'menu_left'     => $this->menu_left,
				// 'logo'          => $this->config['img_logo'],
				'logo'          => 'logo.jpg',
				// 'header_bg'		 => $header_bg['img'],
				// 'header_phones' => $web['header_phones'],
				'icon'       	 => 'icon.png?'.$static_build,
				'build_css'		 => $this->view->vars['build_css'].'?'.$static_build,
				'build_js'		 => $this->view->vars['build_js'].'?'.$static_build,				
			//prefooter
				'menu_prefooter'=>$prefooter,
			//footer
				'menu_footer'   => $this->menu_footer,


			]

		);
		

		$this->view->setOption('jadeCompiled',true);


	}


}