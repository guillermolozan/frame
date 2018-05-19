<?php 
namespace controllers;

use core\Models as Models;
use core\Elements as Elements;
use core\Views as Views;
use core\Server as Server;

class Controller extends \core\Controller {


	function __construct($params){

		global $start;

		parent::__construct($params);




		//Servicios
		$servicios_items=select(
			"name,id,url",
			"projects",
			"where visibilidad=1
			order by weight desc
			limit 0,20",
			0);


		foreach($servicios_items as $ii=>$servicio){

			
			// $serv=fila('id,name','project_galleries_photos','where id_grupo='.$servicios_items[$ii]['id'].' order by id asc limit 0,1 ',0);
			// $servicios_items[$ii]['html']=nl2br($servicios_items[$ii]['text']);
			$servicios_items[$ii]['url']=$servicio['url'].'/'.$servicio['id'];
														// str_replace([' ','.'],['-'.''],strtolower($serv['name'])).
														// '/'.
														// $serv['id'];
			
		
		}

		// prin($servicios_items);


		$group_pages=select(
						"id,url,name",
						"paginas_groups",
						"where id in (1,5)
						and visibilidad=1
						order by weight asc",
						0);



		$Page=$this->loadModel('Pages');

		// menu left
		foreach($group_pages as $group){

			$replace_menu_left[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	

		$replace_menu_left[]=[
			'url'   =>'#',
			'name'  =>'Productos',
			'items' =>$servicios_items
		];

		// $replace_menu_top['pagina/quienes-somos/4']='Quienes Somos';
		if(0)
			$replace_menu_left['galeria-fotos-marcas/1']='Marcas';
		$replace_menu_left['galeria-fotos-clientes/2']='Clientes';
		// $replace_menu_left['testimonios']='Testimonios';
		// $replace_menu_left['haga-su-reserva']='Haga su Reserva';
		// $replace_menu_left['eventos']='Eventos';
		// $replace_menu_left['galeria-videos-videos/1']='VIDEOS';
		// $replace_menu_left['clientes']='CLIENTES';
		$replace_menu_left['contactenos']='Contáctenos';

		// $facebook=[
		// 	'name'   => 'Faceboook',
		// 	'aclass'	=> 'facebook',
		// 	'target' => '_blank',
		// 	'url'   => "https://www.facebook.com/Asiste-789247571198150"
		// ];


		// $replace_menu_left['facebook']=$facebook;


		$this->menu_left=$this->elements->getMenu('menu_left',$replace_menu_left,$params['uri']);


		// $replace_menu_top['pagina/empresa/20']='Empresa';










		$Page=$this->loadModel('Pages');

		// menu left
		foreach($group_pages as $group){

			$replace_menu_top[]=[
				'url'   =>'#',
				'name'  =>$group['name'],
				'items' =>$Page->getMenu(['item'=>$group['id'],'uri'=>'pagina'])
			];

		}	

		$replace_menu_top[]=[
			'url'   =>'#',
			'name'  =>'Productos',
			'items' =>$servicios_items
		];

		// prin($servicios_items);


		// $replace_menu_top['haga-su-reserva']='Haga su Reserva';
		if(0)
			$replace_menu_top['galeria-fotos-marcas/1']='Marcas';
		$replace_menu_top['galeria-fotos-clientes/2']='Clientes';
		// $replace_menu_top['testimonios']='Testimonios'	;
		// $replace_menu_top['galeria-fotos-fotos/1']='Galería';
		// $replace_menu_top['clientes']='CLIENTES';
		// $replace_menu_top['testimonios']='Testimonios';
		$replace_menu_top['contactenos']='Contáctenos';

		// $replace_menu_top['facebook']=[
		// 	'name'  =>'facebook',
		// 	'class' =>'facebook',
		// 	'url'   =>'facebook'
		// ];

		// $replace_menu_top['twitter']=[
		// 	'name'  =>'twitter',
		// 	'class' =>'twitter',
		// 	'url'   =>'twitter'
		// ];

		// $replace_menu_top['pagina/quienes-somos/4']='Quienes Somos';

		// $replace_menu_top['facebook']=$facebook;



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
		

			$this->menu_footer['1']['url']=$this->menu_top['1']['items']['0']['url']; //empresa
			$this->menu_footer['2']['url']=$this->menu_top['2']['items']['0']['url']; //servicios
			$this->menu_footer['3']['url']=$this->menu_top['3']['items']['0']['url']; //productos


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



		$this->view->assign(
			[
			
				// 'icon'             => 'icon.png?'.$static_build,
				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,				
				//prefooter
				//header and menu top
				'menu_top'         => $this->menu_top,
				'menu_left'        => $this->menu_left,
				// 'logo'          => $this->config['img_logo'],
				'logo'             => 'logo.jpg',
				// 'header_bg'     => $header_bg['img'],
				// 'header_phones' => $web['header_phones'],
				'icon'             => 'icon.jpg'.'?'.$static_build,
				//prefooter
				// 'menu_prefooter'   =>$prefooter,
				//footer
				'menu_footer'      => $this->menu_footer,
				
				//links
				'first_empresa'    =>$replace_menu_top[0]['items'][0]['url'],
				'first_servicio'   =>$replace_menu_top[1]['items'][0]['url'],

				'categories'		 =>$this->categories,

				//gmap
				'gmap_key'			 => 'AIzaSyDsA0HccVmhVLNFpys3BZZlmOemTq-peBA',
				


			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}