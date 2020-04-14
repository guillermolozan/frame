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
		/*
		$groups_left=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,2,3,4,5,6,8,13,9,32)
						and visibilidad=1
						order by weight desc",
						0
					);
		*/
		
		$groups_left=$Page->getMenuGroup(
			[
				'where'=>'id in (1,2,3,4,5,6,8,32)',
				// 'where'=>'id in (4)'
			]
		);		
		

		foreach($groups_left as $group){

			$has_home=hay("paginas","where visibilidad=1 and weight='-1' and id_grupo=".$group['id'],0);

			$replace_menu_left_pre[]=[
				'url'   =>($has_home)?$group['url']:'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu([
					'item'=>$group['id'],
					'uri'=>'pagina',
					'sub'	 => "id_grupo={id_grupo}",
				],0)
			];

		}

		$replace_menu_left=[
			$replace_menu_left_pre[1], // nosotros
			$replace_menu_left_pre[0], // tavara
			$replace_menu_left_pre[4], // academy
			$replace_menu_left_pre[2], // paginas web
			$replace_menu_left_pre[7], // hosting
			$replace_menu_left_pre[5], // marketing
			$replace_menu_left_pre[6], // servicios empresariales
			$replace_menu_left_pre[3], // crm erp
		];

		// $replace_menu_left['contactenos']='CONTÁCTENOS';

		$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_left,$params['uri']);

		
		// prin($this->menu_left);exit();

		// menu top

		$groups_top=$Page->getMenuGroup(
			[
				'where'=>'id in (1,2,3,4,5,6,8,32)',
				// 'where'=>'id in (4)'
			]
		);
	

		foreach($groups_top as $group)
		{

			$has_home=hay("paginas","where visibilidad=1 and weight='-1' and id_grupo=".$group['id'],0);

			$replace_menu_top_pre[]=[
				'url'   =>($has_home)?$group['url']:'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(
					[
						'item' =>$group['id'],
						'uri'  =>$group['url'],
						'sub'	 => "id_grupo={id_grupo}",
					],0
				),
			];

		}

		// prin($replace_menu_top_pre);


		// $replace_menu_top_pre[3]['items'][0]['items'][]=$replace_menu_top_pre[3];
		
		// prin($replace_menu_top_pre[0]);
		
		// prin($replace_menu_top_pre);


		// $replace_menu_top_pre[0]['name']='Ing. Walter Távara';
		

		$replace_menu_top=[
			$replace_menu_top_pre[1], // nosotros
			$replace_menu_top_pre[0], // tavara
			$replace_menu_top_pre[4], // academy
			$replace_menu_top_pre[2], // paginas web
			$replace_menu_top_pre[7], // hosting
			$replace_menu_top_pre[5], // marketing
			$replace_menu_top_pre[6], // servicios empresariales
			$replace_menu_top_pre[3], // crm erp
		];


		// $replace_menu_top['contactenos']='CONTÁCTENOS';

		$this->menu_top=$this->elements->getMenu('menu_top',$replace_menu_top,$params['uri']);		

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
						"where id in (1,2,3,4,5,6,8)
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


		$menutop=[
			$menutop[1],
			$menutop[2],
			$menutop[3],
			$menutop[6],
			$menutop[4],
			$menutop[5],
		];


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


		$this->view->assign(
			[

				'build_css'        => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'         => $this->view->vars['build_js'].'?'.$this->static_build,		
			//header and menu top
				'menu_top'     	   => $this->menu_top,
				'menu_left'    	   => $this->menu_top,
				// 'logo'         => $this->config['img_logo'],
				'logo'         	   => 'logo.jpg?1',
				// 'header_bg'		=> $header_bg['img'],
				// 'header_phones'=> $web['header_phones'],
				'icon'      	   => 'icon.jpg',
			//prefooter
				'menu_prefooter'   =>$prefooter,

				'theme_color'		 => '#0e4e87',

			//footer
				'menu_footer'      => $this->menu_footer,


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}