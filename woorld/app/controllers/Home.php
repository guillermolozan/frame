<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){
		
		//banner
		$Banner=$this->loadModel('Banners');
		$banner=$Banner->getItems();
		// prin($banner);














		// marcas
		$Gallery=$this->loadModel('Photos');

			$Gallery->setConfig([
						'photos'=>[
							'fields'=>'id,name,file,fecha_creacion,url'
						],
						'type'=>'link',
						'more'=>'ver más'
					]);


			$clients=$Gallery->getItem(['item'=>'2','limit'=>'0,12']);

			foreach($clients['items'] as $ii=>$item){

				$clients['items'][$ii]['url']=false;

			}

			// $clients['parallax']='fondo-clientes.png';




		//lineas
			$items_productos=select(
			"nombre as name,id_subgrupo,id",
			'productos_filtros',
			"where 1
			and visibilidad=1
			and ver_home=1
			limit 0,9",
			0);

			foreach($items_productos as $oo=>$itm)
			{
				$id_grupo=dato("id_grupo","productos_subgrupos","where id=".$itm['id_subgrupo']);
				// prin($id_grupo);
				$name_grupo=dato("url","productos_grupos","where id=".$id_grupo);

				$items_productos[$oo]['url']=procesar_url($name_grupo.'/sub-category-'.trim($itm['name']).'/'.$itm['id']);

				$items=filas("id","productos_items","where id_filtro=".$itm['id'],0);
				

				$items_productos_fotos=fila(
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
				// prin($items_productos_fotos);
				$items_productos[$oo]['img']=$items_productos_fotos['img'];

			}



		$lineas=[
			'name'=>'Líneas de Productos',
			'items'=>$items_productos,
			// 'more'=>[
   //          'name' => 'ver más',
   //          'url' => 'productos'
   //       ]
		];
		// prin($lineas);




		//importaciones
			$items_productos=select(
			"nombre as name,id,precio,moneda",
			'productos_items_impor',
			"where 1
			and visibilidad=1
			limit 0,20",
			0,[

				'url'=>['url'=>['importado/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){

				$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$items_productos[$iii]['foto']=fila(
					"id,fecha_creacion,file",
					'productos_fotos_impor',
					"where id_item=".$prod['id'],
					0,
					[
						'img'=>['get_archivo'=>[
													'carpeta'=>'profot2_imas',
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												],
						]

				);


			}

		$importaciones=[];
		$importaciones['name']='Importaciones';
		$importaciones['url']='importaciones';
		$importaciones['more']=[
            'name' => 'ver más',
            'url' => 'importaciones'
      ];

		foreach($items_productos as $oo=>$itm){
			$importaciones['items'][$oo]=[
				'name'=>$itm['name'],
				'url'=>$itm['url'],
				'img'=>$itm['foto']['img'],
			];
		}
		// prin($items);



		//descuentos
			$items_productos=select(
			"nombre as name,id,precio,moneda,oferta as subname",
			'productos_items_descu',
			"where 1
			and visibilidad=1
			limit 0,8",
			0,[

				'url'=>['url'=>['descuento/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){

				$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

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
		$descuentos['name']='Descuentos';
		$descuentos['url']='descuentos';		
		$descuentos['more']=[
            'name' => 'ver más',
            'url' => 'descuentos'
      ];


		foreach($items_productos as $oo=>$itm){
			$descuentos['items'][$oo]=[
				'subname' =>($itm['subname']=='')?'':$itm['subname']."%",
				'name'   =>$itm['name'],
				'url'    =>$itm['url'],
				'img'    =>$itm['foto']['img'],
			];
		}



		$menu =select('nombre as name,id,url','productos_grupos','where visibilidad=1',0,
				[
					'url'=>['url'=>['{url}']],
				]);


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

		$this->menu_left=$this->elements->getMenu($this->menu_left,$menu,$params['uri']);

	
		// prin($this->menu_left[4]);

		// prin($menu);
		// prin($descuentos);


		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title . ( ($this->slogan)? ' - '.$this->slogan:'' ),
	
				
				//banner
				"banner"     => $banner,
				

				//bievenido
				"post"       => $welcome,


				//blocks
				'planes'     => $blocks_planes,
				
				// news
				"noticias"   => $news,
				"brochure"	 => $brochure,
				"social"	 => $social,
				//facebook
				'opengraph'  => true,
				
				//clients
				"clients"    => $clients,
				
				// productos
				"importaciones"      => $importaciones,
				"lineas"      => $lineas,
				"descuentos"      => $descuentos,
				
				//menu
				'menu_left'    => $this->menu_left,


			]

		);


		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([

		
				])
			);
		}

		$this->view->render('layout_home');


	}

}