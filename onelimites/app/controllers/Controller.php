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



		$this->menu_left=$this->elements->getMenu('menu_left',[],$params['uri']);


		$this->menu_top_in=$this->elements->getMenu('menu_top',[],$params['uri']);


		//Grupos
		$grupos_items=select(
			"nombre as name,id,url,url as class",
			"productos_grupos",
			"where visibilidad=1
			order by weight desc
			limit 0,5",
			0,
			[
				'url'=>['url'=>['{url}']],
			]
		);

		$menu_center=$this->elements->getM($grupos_items,$params['uri']);

		$this->menu_center=$menu_center['items'];




		foreach($this->menu_top_in as $ii=>$item){

			if($ii==0){ 
				$this->menu_top_out[]=$item; 
				foreach($this->menu_center as $item2){
					$this->menu_top_out[]=$item2;
				}
			} else {
				$this->menu_top_out[]=$item;
			}

		}
		// prin($this->menu_top_out);




		foreach($grupos_items as $ii=>$item){

			$grupos_items[$ii]['url']='#'.$grupos_items[$ii]['url'];

		}

		$menu_home=$this->elements->getM($grupos_items);

		$this->menu_home=$menu_home['items'];

		//menu footer
		
		/*
		$this->menu_footer=$this->elements->getMenu('menu_footer',$this->menu_footer);
		

			$this->menu_footer['1']['url']=$this->menu_top['1']['items']['0']['url']; //empresa
			$this->menu_footer['2']['url']=$this->menu_top['2']['items']['0']['url']; //servicios
			$this->menu_footer['3']['url']=$this->menu_top['3']['items']['0']['url']; //productos
		*/
	

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



/*
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
*/
		


 



		// prin($this->menu_top_in);
		// prin($this->menu_top_out);

		// $static_build=255;

		// prin($this->view->vars['is_home']);

		$this->view->assign(
			[
			
				// 'icon'             => 'icon.png?'.$static_build,
				'build_css'    => $this->view->vars['build_css'].'?'.$this->static_build,
				'build_js'     => $this->view->vars['build_js'].'?'.$this->static_build,				
				//prefooter
				//header and menu top
				'menu_top_in'      => $this->menu_top_in,
				'menu_top_out'     => $this->menu_top_out,

				'menu_left'        => $this->menu_left,
				// 'menu_center'      => $this->menu_center,
				'menu_home'      	 => $this->menu_home,
				
				// 'logo'          => $this->config['img_logo'],
				'logo'             => 'logo_new.png'.'?'.$static_build,
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
				
				//facebook
				'opengraph'			=> true

			]

		);


		$this->view->setOption('jadeCompiled',true);


	}


}