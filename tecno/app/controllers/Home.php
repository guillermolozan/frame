<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){



		/*
		########     ###    ##    ## ##    ## ######## ########
		##     ##   ## ##   ###   ## ###   ## ##       ##     ##
		##     ##  ##   ##  ####  ## ####  ## ##       ##     ##
		########  ##     ## ## ## ## ## ## ## ######   ########
		##     ## ######### ##  #### ##  #### ##       ##   ##
		##     ## ##     ## ##   ### ##   ### ##       ##    ##
		########  ##     ## ##    ## ##    ## ######## ##     ##
		*/
		$Banner=$this->loadModel('Banners');
		$banner=$Banner->getItems();
		
		$this->view->assign(["banner" => $banner]);







		/*
		##       #### ########  ########   #######   ######
		##        ##  ##     ## ##     ## ##     ## ##    ##
		##        ##  ##     ## ##     ## ##     ## ##
		##        ##  ########  ########  ##     ##  ######
		##        ##  ##     ## ##   ##   ##     ##       ##
		##        ##  ##     ## ##    ##  ##     ## ##    ##
		######## #### ########  ##     ##  #######   ######
		*/
		
		$libros=$this->view->vars['menu_top']['1'];
		$libros['items'][0]['img']='tecno/public/img/icono-manuales.jpg';
		$libros['items'][1]['img']='tecno/public/img/icono-descargar-pdf.jpg';
		$libros['items'][2]['img']='tecno/public/img/icono-youtube.jpg';
		
		// prin($libros);

		$this->view->assign(["libros" => $libros]);



		/*
		##     ## ######## ##    ## ########    ###     ######
		##     ## ##       ###   ##    ##      ## ##   ##    ##
		##     ## ##       ####  ##    ##     ##   ##  ##
		##     ## ######   ## ## ##    ##    ##     ##  ######
		 ##   ##  ##       ##  ####    ##    #########       ##
		  ## ##   ##       ##   ###    ##    ##     ## ##    ##
		   ###    ######## ##    ##    ##    ##     ##  ######
		*/

		$ventas=$this->view->vars['menu_top']['2'];
		$ventas['items'][0]['img']='tecno/public/img/icono-libros.jpg';
		$ventas['items'][1]['img']='tecno/public/img/icono-cursos.jpg';
		$ventas['items'][2]['img']='tecno/public/img/icono-servicios.jpg';

		$this->view->assign(["ventas" => $ventas]);







		/*
		##     ## ######## ##    ## ##     ##
		###   ### ##       ###   ## ##     ##
		#### #### ##       ####  ## ##     ##
		## ### ## ######   ## ## ## ##     ##
		##     ## ##       ##  #### ##     ##
		##     ## ##       ##   ### ##     ##
		##     ## ######## ##    ##  #######
		*/
		$menu =select('nombre as name,id,url','productos_grupos','where visibilidad=1',0,
				[
					'url'=>['url'=>['{url}']],
				]);


		foreach($menu as $iii=> $men){

			$menu[$iii]['items']=select('nombre as name,id','productos_subgrupos','where visibilidad=1 and id_grupo='.$men['id'],0,
					[
						'url'=>['url'=>[$men['url'].'/category-{name}/{id}']],
					]);

		}


		foreach($this->menu_left as $iii=>$ite){
			if(in_array($ite['url'],['productos','importaciones','descuentos'])){
				unset($this->menu_left[$iii]);
			}
		}

		$menu=[
					['name'  =>'Productos',
					'url'   =>'#',
					'items' =>$menu],
					[
					'name'  =>'Importaciones',
					'url'   =>'importaciones',
					],
					[
					'name'  =>'Descuentos',
					'url'   =>'descuentos',
					],					
			];
		

		$this->menu_left=$this->elements->getMenu($this->menu_left,$menu,$params['uri']);

	




		/*
		##       #### ##    ## ##    ##  ######
		##        ##  ###   ## ##   ##  ##    ##
		##        ##  ####  ## ##  ##   ##
		##        ##  ## ## ## #####     ######
		##        ##  ##  #### ##  ##         ##
		##        ##  ##   ### ##   ##  ##    ##
		######## #### ##    ## ##    ##  ######
		*/
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>[
						'fields'=>'name,url,fecha_creacion,file',
						'target'=>'_blank'
					],
				]);

		$links=$Links->getLinks();	
		$links['name']='Enlaces';
		
		$this->view->assign(["links" => $links]);












         


		/*
		######## #### ##    ##    ###    ##       ##       ##    ##
		##        ##  ###   ##   ## ##   ##       ##        ##  ##
		##        ##  ####  ##  ##   ##  ##       ##         ####
		######    ##  ## ## ## ##     ## ##       ##          ##
		##        ##  ##  #### ######### ##       ##          ##
		##        ##  ##   ### ##     ## ##       ##          ##
		##       #### ##    ## ##     ## ######## ########    ##
		*/

		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title . ( ($this->view->vars['web_slogan'])? ' - '.$this->view->vars['web_slogan']:'' ),				
				
				//menu
				// 'menu_left'    => $this->menu_left,



				



			]

		);




		$this->view->render('layout_home');


	}

}