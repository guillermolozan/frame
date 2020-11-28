<?php 
namespace controllers;

class Imprimir extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}


	function detail($params){

		

		$producto=fila(
			[
				"id_item",
				"id_grupo",
				"id_subgrupo",
			],
			"ventas_items",
			"where id=".$params['item']
		);

		$params['level']=($producto['id_grupo']=='2')?"descuento":"producto";
		
		$params['classbody']=str_replace("p-imprimir","p-imprimir p-producto",$params['classbody']);

		$params['cotizacion']=$params['item'];

		$params['item']=$producto['id_item'];

		// prin($params);

		$this->$params=$params;

		// if(hay("productos_grupos","where url='".$params['level']."'",0)) $params['level']='producto';

		switch($params['level']){
			case "producto":
				$tabla_items ='productos_items';
				$tabla_fotos ='productos_fotos';
				$dir_fotos   ='profot_imas';
				$name_items  ='PRODUCTOS';
				$url_items   ='productos';
				$campos_items ="id_grupo,id_subgrupo,id,nombre as name,marca,descripcion as html,moneda,tags,weight,
			        adjunto,fecha_creacion,url,title,meta_description,meta_keywords";
			break;
			case "importado":
				$tabla_items ='productos_items_impor';
				$tabla_fotos ='productos_fotos_impor';
				$dir_fotos   ='profot2_imas';
				$name_items  ='IMPORTACIONES';
				$url_items   ='importaciones';
				$campos_items ="id_grupo,id_subgrupo,id,nombre as name,marca,descripcion as html,moneda,tags,weight,
			        adjunto,fecha_creacion";			
			break;
			case "descuento":
				$tabla_items ='productos_items';
				$tabla_fotos ='productos_fotos';
				$dir_fotos   ='profot_imas';
				$name_items  ='DESCUENTOS';
				$url_items   ='descuentos';
				$campos_items ="id_grupo,id_subgrupo,id,nombre as name,marca,descripcion as html,moneda,tags,weight,oferta,
			        adjunto,fecha_creacion,title,meta_description,meta_keywords";
			break;
		}

		$Page=$this->loadModel('Pages');

		$Page->setConfig([
						'items'=>[
							'table'  =>$tabla_items,
							'fields' =>$campos_items,
							'url'    =>$params['level'].'/',
						],
						'debug'=>0
				]);

		$post             =$Page->getPage();

		// $head_description =$Page->getDescription();

		// $head_keywords 	  =$Page->getKeywords();

		$head_title       =$Page->getTitle();
		
		$canonical 		  =$Page->getCanonical();
		// $canonical		  =;
		// $routes = new Routes();
		// $routes_items=$routes->get_routes();
		// prin($routes_items);

		// $Page->setVisited();




		$breadcrumb[]=[
			'name' =>$name_items,
			'url'  =>$url_items,
		];


		if(
			$params['level']=='descuento' 
			or $params['level']=='importado' 
			){

			$post = fila(
			        $campos_items
			        ,$tabla_items
			        ,"where id='".$params['item']."'"
			        ,0
			        ,[
							'url'=>['url'=>[$params['level'].'/{name}/{id}']],
			        ]
			);

		} else {

			$post = fila(
			        "id,id_grupo,id_subgrupo,id_filtro,nombre as name,marca,descripcion as html,moneda,tags,weight,
			        adjunto,fecha_creacion"
			        ,$tabla_items
			        ,"where id='".$params['item']."'"
			        ,0
			        ,[
			        		'grupo'=>['fila'=>[
			        				'id,nombre,url',
			        				'productos_grupos',
			        				'where id={id_grupo}',0,[
										'url'=>['url'=>['{url}']],
			        				]
			        		]],
			        		'cat'=>['fila'=>[
			        				'id,nombre',
			        				'productos_subgrupos',
			        				'where id={id_subgrupo}'
			        		]],
			        		'subcat'=>['fila'=>[
			        				'id,nombre',
			        				'productos_filtros',
			        				'where id={id_filtro}'
			        		]],

							'url'=>['url'=>[$params['level'].'/{name}/{id}']],

							// 'get_archivo'=>['get_archivo'=>[
							// 				'carpeta'=>'atc_imas',
							// 				'fecha'=>'{fecha_creacion}',
							// 				'file'=>'{adjunto}',
							// 				'tamano'=>'0'
							// 				]]						

			        ]
			);


			$post['cat']['url']=procesar_url($post['grupo']['url']."/category-".$post['cat']['nombre']."/".$post['cat']['id']);


			$post['subcat']['url']=procesar_url($post['grupo']['url']."/sub-category-".$post['subcat']['nombre']."/".$post['subcat']['id']);


			$breadcrumb[]=[
				'name' =>$post['grupo']['nombre'],
				'url'  =>$post['grupo']['url'],
			];

			$breadcrumb[]=[
				'name' =>$post['cat']['nombre'],
				'url'  =>$post['cat']['url'],
			];

			if($post['subcat']['nombre'])
			$breadcrumb[]=[
				'name' =>$post['subcat']['nombre'],
				'url'  =>$post['subcat']['url'],
			];


		}





		$breadcrumb[]=[
			'name' =>$post['name'],
			'url'  =>$post['url'],
			'class'=>'active',
		];				



		$breadcrumb=$this->elements->getBreadcrumb($breadcrumb);



		$post['precio']=(($post['moneda']=='1')?'US$':'S/.').$post['precio'];

		$post['fotos']=select(
				'id,file,fecha_creacion',
				$tabla_fotos,
				'where id_item='.$post['id'],
				0,
		 	[
				'img'=>['get_archivo'=>[
											'carpeta'=>$dir_fotos,
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
		 	]
		);






		
		// prin($post['fotos']);



		//MENU
		$menu =select(
			'nombre as name,id,url',
			'productos_grupos',
			'where visibilidad=1',
			0,
			[
				'url'=>['url'=>['{url}']],
			]
		);


		// if(0)
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
		// prin($menu);

		$this->menu_left=$this->elements->getMenu($this->menu_left,[$menu],$params['uri']);


		// prin($fields_reformated);

		// prin($breadcrumb);

		$this->view->assign([
				
			'head_title'       => $head_title,
			
			// 'head_description' => $head_description,

			// 'head_keywords'	   => $head_keywords,
			
			'title'            => $post['nombre'],
			
			'post'             => [
									'name' =>$post['name'],
									'html' =>$post['html'],
									'precio' =>$post['precio'],
									'img'  =>$post['fotos']['0']['img'],

									'marca' =>$post['marca'],

									// 'parts'=>'1',
									// 
									'adjunto' =>$post['get_archivo'],

									'oferta' =>round($post['oferta']),

								],
			
			// 'menu_post'  => $menu['items'],
			
			'fotos'         => $post['fotos'],
			
			// 'gallery'    => $gallery,
			
			'group_post'    => $producto['grupo']['url'],
						
			// 'canonical'     => $canonical,
			
			// 'banner'     => $banner,

			'breadcrumb'	 => $breadcrumb,
			
			//form


			'opengraph'     => 0,

			'classbody'		=> $params['classbody'],

			'cotizacion'	=> $params['cotizacion'],

		]);

		
		$this->view->render('layout_print_detail');


	}



}