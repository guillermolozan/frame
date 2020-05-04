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
		##     ## ######## ##    ## ########    ###     ######
		##     ## ##       ###   ##    ##      ## ##   ##    ##
		##     ## ##       ####  ##    ##     ##   ##  ##
		##     ## ######   ## ## ##    ##    ##     ##  ######
		 ##   ##  ##       ##  ####    ##    #########       ##
		  ## ##   ##       ##   ###    ##    ##     ## ##    ##
		   ###    ######## ##    ##    ##    ##     ##  ######
		*/
		
		$ventas=$this->view->vars['menu_top']['2'];
		$ventas['items'][0]['img']=$this->view->vars['pub_img_abs'].'/icono-libros.jpg';


		$ventas['items'][1]['img']=$this->view->vars['pub_img_abs'].'/icono-cursos.jpg';

		$grupos=opciones("id,name as nombre","paginas_groups","where id_grupo=33",0);
		$item_curso=fila("id,weight,name,id_grupo","paginas","where id_grupo in (select id from paginas_groups where id_grupo=33) order by weight desc limit 0,1",0);

		$ventas['items'][1]['url']=procesar_url($grupos[$item_curso['id_grupo']]."/".$item_curso['name']."/".$item_curso['id']);

		unset($ventas['items'][1]['items']);

		$ventas['items'][2]['img']=$this->view->vars['pub_img_abs'].'/icono-servicios.jpg';
		$ventas['items'][2]['url']=$ventas['items'][2]['items'][0]['url'];

		unset($ventas['items'][2]['items']);


		$this->view->assign(["libros" => $ventas]);



	


		/*
		##     ## #### ########  ########  #######   ######
		##     ##  ##  ##     ## ##       ##     ## ##    ##
		##     ##  ##  ##     ## ##       ##     ## ##
		##     ##  ##  ##     ## ######   ##     ##  ######
		 ##   ##   ##  ##     ## ##       ##     ##       ##
		  ## ##    ##  ##     ## ##       ##     ## ##    ##
		   ###    #### ########  ########  #######   ######
		*/
		$Videos=$this->loadModel('Videos');

			// $gallery=$Videos->getItem([
			// 	'item'  =>'1',
			// 	'limit' =>'0,4',
			// 	// 'type'  =>'videos'
			// ]);


			$gallery2=$Videos->getItems([
				'limit' =>'0,4',
			]);

			$gallery['name']='galería de videos';
		
			$gallery['items']=$gallery2['items'];

			unset($gallery['type']);

			$gallery['more']=[
				'url'  =>maskUrl('videos'),
				'name' =>'ver más'
			];


		$this->view->assign(["block_gallery_videos" => $gallery]);







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