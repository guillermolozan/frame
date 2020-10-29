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
		##      ## ######## ##        ######   #######  ##     ## ########
		##  ##  ## ##       ##       ##    ## ##     ## ###   ### ##
		##  ##  ## ##       ##       ##       ##     ## #### #### ##
		##  ##  ## ######   ##       ##       ##     ## ## ### ## ######
		##  ##  ## ##       ##       ##       ##     ## ##     ## ##
		##  ##  ## ##       ##       ##    ## ##     ## ##     ## ##
		###  ###  ######## ########  ######   #######  ##     ## ########
		*/		
		$welcome=dato("html","paginas","where id=1");
		$this->view->assign(["welcome" => $welcome]);




		/*
		########  ########   #######  ########  ##     ##  ######  ########  #######   ######
		##     ## ##     ## ##     ## ##     ## ##     ## ##    ##    ##    ##     ## ##    ##
		##     ## ##     ## ##     ## ##     ## ##     ## ##          ##    ##     ## ##
		########  ########  ##     ## ##     ## ##     ## ##          ##    ##     ##  ######
		##        ##   ##   ##     ## ##     ## ##     ## ##          ##    ##     ##       ##
		##        ##    ##  ##     ## ##     ## ##     ## ##    ##    ##    ##     ## ##    ##
		##        ##     ##  #######  ########   #######   ######     ##     #######   ######
		*/
		
		//subcategorias de productos 2
		$id_productos2=2;
		$productos2=fila("url,nombre","productos_grupos","where id=$id_productos2");
		$name_productos2=$productos2['nombre'];
		$url_productos2=$productos2['url'];

		$ids_categorias_productos2=getarray("id","productos_subgrupos","where id_grupo=$id_productos2");
		// $ids_subcategorias_productos2=getarray("id","productos_groups","where id_grupo in (".implode(',',$ids_categorias_productos2).")");
		// prin($ids_subcategorias_productos2);

		// get categorias
		$items_productos2=select(
			"nombre as name,id,url,id_grupo",
			'productos_subgrupos',
			"where 1
			and visibilidad=1 ".
			" and ver_home=1 ".
			" and id_grupo=".$id_productos2." ".
			" order by weight desc ".
			" limit 24 ",
			0
		);

		// prin($items_productos2);
		

		foreach($items_productos2 as $oo=>$itm)
		{
			// link
			$id_grupo=dato("id_grupo","productos_subgrupos","where id=".$itm['id_grupo'],0);

			$items_productos2[$oo]['url']=procesar_url($url_productos2.'/category-'.trim($itm['name']).'/'.$itm['id']);


			// foto
			$id_subcategorias=filas("id","productos_groups","where id_grupo=".$itm['id'],0);
			
			foreach($id_subcategorias as $id_subcategoria){
				$id_subcategoria2[]=$id_subcategoria['id'];
			}

			$items=filas("id","productos_items","where ver_home=1 and id_grupo in  (".implode(',',$id_subcategoria2).")",0);
			unset($id_subcategoria2);

			$items_productos_fotos2=fila(
				"id,fecha_creacion,file",
				'productos_fotos',
				"where id_item=".$items[0]['id'],
				0,
				[
					'img'=>['get_archivo'=>[
												'carpeta'=>'profot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]
											],
					]

			);
			$items_productos2[$oo]['img']=$items_productos_fotos2['img'];

		}


		// $items_productos2=array_slice($items_productos2,0,2);

		$importaciones=[
			'name'=>$name_productos2,
			'items'=>$items_productos2,
			'url'=>$url_productos2,
			'more'=>[
				'name' => 'ver más',
				'url'=>$url_productos2,
			]
		];
		
		/*
		$importaciones=[];
		$importaciones['name']='Recomendados';
		$importaciones['url']=maskUrl('recomendados');
		$importaciones['more']=[
            'name' => 'ver más',
            'url' => maskUrl('recomendados')
    	];

		foreach($items_productos as $oo=>$itm){
			$importaciones['items'][$oo]=[
				'name' =>$itm['name'],
				'url'  =>$itm['url'],
				'img'  =>$itm['foto']['img'],
				'precio' =>$itm['precio'],
			];
		}
		*/


		$this->view->assign(["importaciones" => $importaciones]);


		
		/*
		 ######  ######## ########  ##     ## ####  ######  ####  #######   ######
		##    ## ##       ##     ## ##     ##  ##  ##    ##  ##  ##     ## ##    ##
		##       ##       ##     ## ##     ##  ##  ##        ##  ##     ## ##
		 ######  ######   ########  ##     ##  ##  ##        ##  ##     ##  ######
		      ## ##       ##   ##    ##   ##   ##  ##        ##  ##     ##       ##
		##    ## ##       ##    ##    ## ##    ##  ##    ##  ##  ##     ## ##    ##
		 ######  ######## ##     ##    ###    ####  ######  ####  #######   ######
		*/
		$servicios['name'] ='Servicios';
		$servicios['url']  ='servicios';

		$servicios['items']=select("id,name,text,text2,text3,text4",
			"projects","where ver_home=1 order by weight desc",0,[
				'url'=>['url'=>['servicio-{name}/{id}']],
			]);

		foreach($servicios['items'] as $ii=>$hab){

			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$servicios['items'][$ii]['text4']=$htm;

			// $servicios['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'projects_photos',
				'where id_grupo='.$hab['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'serfot_imas',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$servicios['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		$servicios['more']=[
			'url'  =>'servicios',
			'name' =>'ver más servicios'
		];


		$this->view->assign(["habitaciones"=>$servicios]);





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