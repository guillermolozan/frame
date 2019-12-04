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
		##       #### ##    ## ########    ###     ######
		##        ##  ###   ## ##         ## ##   ##    ##
		##        ##  ####  ## ##        ##   ##  ##
		##        ##  ## ## ## ######   ##     ##  ######
		##        ##  ##  #### ##       #########       ##
		##        ##  ##   ### ##       ##     ## ##    ##
		######## #### ##    ## ######## ##     ##  ######
		*/

		//subcategorias de productos 1
		$id_productos1=3;
		$productos1=fila("nombre,url","productos_grupos","where id=$id_productos1");
		$name_productos1=$productos1['nombre'];
		$url_productos1=$productos1['url'];

		$ids_categorias_productos1=getarray("id","productos_subgrupos","where id_grupo=$id_productos1",0);
		// $ids_subcategorias_productos2=getarray("id","productos_groups","where id_grupo in (".implode(',',$ids_categorias_productos1).")");

		$items_productos1=select(
			"nombre as name,id,url,id_grupo",
			'productos_subgrupos',
			"where 1
			and visibilidad=1 ".
			// " and ver_home=1 ".
			" and id_grupo=".$id_productos1." ".
			// " order by weight desc ".
			" limit 24 ",
			0
		);

		

		foreach($items_productos1 as $oo=>$itm)
		{

			// link
			$id_grupo=dato("id_grupo","productos_subgrupos","where id=".$itm['id_grupo'],0);
			
			$items_productos1[$oo]['url']=procesar_url($url_productos1.'/category-'.trim($itm['name']).'/'.$itm['id']);


			// foto
			$id_subcategoria=dato("id","productos_groups","where id_grupo=".$itm['id']);

			$items=filas("id","productos_items","where id_grupo = ".$id_subcategoria,0);
			
			$items_productos_fotos1=fila(
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
			$items_productos1[$oo]['img']=$items_productos_fotos1['img'];

		}




		$lineas=[
			'name'=>$name_productos1,
			'items'=>$items_productos1,
			// 'more'=>[
   //          'name' => 'ver más',
   //          'url' => 'productos'
   //       ]
		];
		
		$this->view->assign(["lineas" => $lineas]);








		/*
		########  ########  ######   #######  ##     ## ######## ##    ## ########     ###    ########   #######   ######
		##     ## ##       ##    ## ##     ## ###   ### ##       ###   ## ##     ##   ## ##   ##     ## ##     ## ##    ##
		##     ## ##       ##       ##     ## #### #### ##       ####  ## ##     ##  ##   ##  ##     ## ##     ## ##
		########  ######   ##       ##     ## ## ### ## ######   ## ## ## ##     ## ##     ## ##     ## ##     ##  ######
		##   ##   ##       ##       ##     ## ##     ## ##       ##  #### ##     ## ######### ##     ## ##     ##       ##
		##    ##  ##       ##    ## ##     ## ##     ## ##       ##   ### ##     ## ##     ## ##     ## ##     ## ##    ##
		##     ## ########  ######   #######  ##     ## ######## ##    ## ########  ##     ## ########   #######   ######
		*/
		
		//subcategorias de productos 2
		$id_productos2=2;
		$productos2=fila("url,nombre","productos_grupos","where id=$id_productos2");
		$name_productos2=$productos2['nombre'];
		$url_productos2=$productos2['url'];

		$ids_categorias_productos2=getarray("id","productos_subgrupos","where id_grupo=$id_productos2");
		// $ids_subcategorias_productos2=getarray("id","productos_groups","where id_grupo in (".implode(',',$ids_categorias_productos2).")");
		// prin($ids_subcategorias_productos2);

		$items_productos2=select(
			"nombre as name,id,url,id_grupo",
			'productos_subgrupos',
			"where 1
			and visibilidad=1 ".
			// " and ver_home=1 ".
			" and id_grupo=".$id_productos2." ".
			// " order by weight desc ".
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
			$id_subcategoria=dato("id","productos_groups","where id_grupo=".$itm['id']);

			$items=filas("id","productos_items","where id_grupo = ".$id_subcategoria,0);
			
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




		$importaciones=[
			'name'=>$name_productos2,
			'items'=>$items_productos2,
			'more'=>[
				'name' => 'ver más',
				'url' => 'productos2'
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
		 #######  ######## ######## ########  ########    ###     ######
		##     ## ##       ##       ##     ##    ##      ## ##   ##    ##
		##     ## ##       ##       ##     ##    ##     ##   ##  ##
		##     ## ######   ######   ########     ##    ##     ##  ######
		##     ## ##       ##       ##   ##      ##    #########       ##
		##     ## ##       ##       ##    ##     ##    ##     ## ##    ##
		 #######  ##       ######## ##     ##    ##    ##     ##  ######
		*/
			$items_productos=select(
			"nombre as name,id,precio,moneda,precio_oferta,oferta as subname",
			'productos_items_descu',
			"where 1
			and visibilidad=1
			limit 0,8",
			0,[

				'url'=>['url'=>['descuento/{name}/{id}']],

			]);

			// prin($items_productos);

			foreach($items_productos as $iii=> $prod){

				$items_productos[$iii]['precio']        =(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];
				$items_productos[$iii]['precio_oferta'] =(($prod['moneda']=='1')?'US$':'S/.').$prod['precio_oferta'];
				$items_productos[$iii]['subname']        =round($prod['subname']);

				$items_productos[$iii]['foto']=fila(
					"id,fecha_creacion,file",
					'productos_fotos_descu',
					"where id_item=".$prod['id'],
					0,
					[
						'img'=>['get_archivo'=>[
													'carpeta'=>'profot3_imas',
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												],
						]

				);


			}

		$descuentos=[];
		$descuentos['name']='Ofertas';
		$descuentos['url']=maskUrl('descuentos');
		$descuentos['more']=[
            'name' => 'ver más',
            'url' => maskUrl('descuentos')
      ];
      


		// prin($items_productos);
		foreach($items_productos as $oo=>$itm){
			$descuentos['items'][$oo]=[
				'subname'       =>($itm['subname']=='')?'':$itm['subname']."%",
				'name'          =>$itm['name'],
				'url'           =>$itm['url'],
				'precio'        =>$itm['precio'],
				'precio_oferta' =>$itm['precio_oferta'],
				'img'           =>$itm['foto']['img'],
			];
		}

		// prin($descuentos);
      $this->view->assign(["descuentos" => $descuentos]);







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
					'items'=>['fields'=>'name,url,fecha_creacion,file'],
				]);

		$links=$Links->getLinks();	
		$links['name']='Marcas';
		
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