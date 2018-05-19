<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {

	var $variables_busqueda;

	function __construct($params){

		// global $start;

		$this->variables_busqueda=[
			'operacion','tipo','departamento','provincia','distrito',
			'preciomin','preciomax','dormitorios','baños'
		];

		parent::__construct($params);


		$Page=$this->loadModel('Pages');

		// menu left
		$groups_left=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,2,3)
						and visibilidad=1
						order by weight desc",0);


		foreach($groups_left as $group){

			$replace_menu_left_pre[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	

		$replace_menu_left=[
			$replace_menu_left_pre[0],
			$replace_menu_left_pre[1],
			$replace_menu_left_pre[2],
		];

		$replace_menu_left['inmuebles']='INMUEBLES EN CARTERA';

		$replace_menu_left['contactenos']='CONTACTO';

		$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_left,$params['uri']);



		// menu top
		$groups_top=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,2,3)
						and visibilidad=1
						order by weight desc",0);

		foreach($groups_top as $group){

			$replace_menu_top_pre[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	
		

		$replace_menu_top=[
			$replace_menu_top_pre[0],
			$replace_menu_top_pre[1],
			$replace_menu_top_pre[2],
		];


		$replace_menu_top['inmuebles']='INMUEBLES EN CARTERA';

		$replace_menu_top['contactenos']='CONTACTO';

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



		//SEARCHES
		



		$searches['operacion']=[
			'options'=>[
				['i'=>'1', 'l'=>'Venta'],
				['i'=>'2', 'l'=>'Alquiler'],
			]
		];


		$searches['tipo']=[
			'options' =>[
				['i'=>'1', 'l'=>'Departamento'],
				['i'=>'2', 'l'=>'Local Comercial'],
				['i'=>'3', 'l'=>'Depósito'],
				['i'=>'4', 'l'=>'Terreno'],
				['i'=>'5', 'l'=>'Edificio'],
				['i'=>'6', 'l'=>'Local Industrial'],
				['i'=>'7', 'l'=>'Oficina'],
				['i'=>'8', 'l'=>'Casa'],
				['i'=>'9', 'l'=>'Cochera'],			
			]
		];


		$searches['num_rooms']=[
			'options' =>[
				['i'=>'1', 'l'=>'1'],
				['i'=>'2', 'l'=>'2'],
				['i'=>'3', 'l'=>'3'],
				['i'=>'4', 'l'=>'4'],
				['i'=>'5', 'l'=>'5'],
				['i'=>'6', 'l'=>'6'],		
			]
		];

		$searches['num_bathrooms']=[
			'options' =>[
				['i'=>'0'	,'l'=>'0'],
				['i'=>'0.5'	,'l'=>'1/2'],
				['i'=>'1'	,'l'=>'1'],
				['i'=>'1.5'	,'l'=>'1 1/2'],
				['i'=>'2'	,'l'=>'2'],
				['i'=>'2.5'	,'l'=>'2 1/2'],
				['i'=>'3'	,'l'=>'3'],
				['i'=>'3.5'	,'l'=>'3 1/2'],
				['i'=>'4'	,'l'=>'4'],
				['i'=>'5'	,'l'=>'5'],
				['i'=>'6'	,'l'=>'6']			
			]
		];		



		$searches['preciomin']=[
			'options' =>[
				['i'=>'0'	,'l'=>'$ 0'],	
				['i'=>'25000'	,'l'=>'$ 25.000'],	
				['i'=>'50000'	,'l'=>'$ 50.000'],	
				['i'=>'100000'	,'l'=>'$ 100.000'],	
				['i'=>'150000'	,'l'=>'$ 150.000'],	
				['i'=>'200000'	,'l'=>'$ 200.000'],	
				['i'=>'250000'	,'l'=>'$ 250.000'],	
				['i'=>'300000'	,'l'=>'$ 300.000'],	
				['i'=>'350000'	,'l'=>'$ 350.000'],	
				['i'=>'400000'	,'l'=>'$ 400.000'],	
				['i'=>'450000'	,'l'=>'$ 450.000'],	
				['i'=>'500000'	,'l'=>'$ 500.000'],	
			]
		];		



		$searches['preciomax']=[
			'options' =>[
				['i'=>'50000'	,'l'=>'$ 50.000'],	
				['i'=>'100000'	,'l'=>'$ 100.000'],	
				['i'=>'150000'	,'l'=>'$ 150.000'],	
				['i'=>'200000'	,'l'=>'$ 200.000'],	
				['i'=>'250000'	,'l'=>'$ 250.000'],	
				['i'=>'300000'	,'l'=>'$ 300.000'],	
				['i'=>'350000'	,'l'=>'$ 350.000'],	
				['i'=>'400000'	,'l'=>'$ 400.000'],	
				['i'=>'450000'	,'l'=>'$ 450.000'],	
				['i'=>'500000'	,'l'=>'$ 500.000'],	
				['i'=>'mayor500000'	,'l'=>'mayor a $ 500.000'],	
			]
		];	

		$searches['departamento']=[
			'options' =>select(
						"id as i,nombre as l",
						"geo_departamentos",
						"where visibilidad=1
						order by nombre asc",0)
		];			

		$searches['provincia']['options']=[];
		if($params['departamento']!=''){

			$searches['provincia']=[
				'options' =>select(
							"id as i,nombre as l",
							"geo_provincias",
							"where id_departamento=".$params['departamento']." and visibilidad=1
							order by nombre asc",0)
			];		

		}

		$searches['distrito']['options']=[];

		if($params['provincia']!=''){

			$searches['distrito']=[
				'options' =>select(
							"id as i,nombre as l",
							"geo_distritos",
							"where id_provincia=".$params['provincia']." and visibilidad=1
							order by nombre asc",0)
			];		

		}

		// prin($params);

		foreach($params as $sepa=>$param){

			if(in_array($sepa,$this->variables_busqueda)){
				$searches[$sepa]['select']=$param;
			}

		}

		// prin($searches);

		//
		$static_build=8;

		$this->view->assign(
			[
				
				//header and menu top
				'menu_top'         => $this->menu_top,
				'menu_left'        => $this->menu_left,
				// 'logo'          => $this->config['img_logo'],
				'logo'             => 'logo.png',
				// 'header_bg'     => $header_bg['img'],
				// 'header_phones' => $web['header_phones'],
				'icon'             => 'icon.png?'.$static_build,
				'build_css'        => $this->view->vars['build_css'].'?'.$static_build,
				'build_js'         => $this->view->vars['build_js'].'?'.$static_build,		
				//prefooter
				'menu_prefooter'   => $prefooter,
				//footer
				'menu_footer'      => $this->menu_footer,
				
				//searches
				'searches'         => $searches,

				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',
				

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}