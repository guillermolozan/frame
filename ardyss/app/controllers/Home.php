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
      
      $this->view->assign(["banner" => $banner]);

		// prin($banner);


            
      // downloads
		$Downloads=$this->loadModel('Banners');
      $Downloads->setConfig([
         // 'items'=>['fields'=>'fecha_creacion,file,name,url,adjunto'],
         'items'=>['fields'=>'fecha_creacion,file,name,url'],
      ]);
      $downloads=$Downloads->getItems(['item'=>'descargas']);      

      foreach($downloads as $iii=>$ddd){

         // $downloads[$iii]['url']='download/'.get_imagen('doc_fil',$ddd['fecha_creacion'],$ddd['adjunto']);
         $downloads[$iii]['url']='download/'.$ddd['url'];

      }
      $this->view->assign(["downloads" => $downloads]);

      // prin($downloads);



		//productos ardyss
			$items_productos=select(
			"nombre as name,id_subgrupo,id,precio,moneda",
			'productos_items',
			"where 1
			and visibilidad=1 ".
			" and ver_home=1 ".
			" and id_grupo=3 ".
			" order by weight desc ".
			" limit 24 ",
         0);
         

			foreach($items_productos as $oo=>$itm)
			{
				$id_grupo=dato("id_grupo","productos_subgrupos","where id=".$itm['id_subgrupo']);
				// prin($id_grupo);
				$name_grupo=dato("url","productos_grupos","where id=".$id_grupo);

				$items_productos[$oo]['url']=procesar_url($name_grupo.'/sub-category-'.trim($itm['name']).'/'.$itm['id']);

				$items=filas("id","productos_items","where id_filtro=".$itm['id'],0);
				

				$items_productos[$oo]['precio']=(($itm['moneda']=='1')?'US$':'S/.').$itm['precio'];


				$items_productos_fotos=fila(
					"id,fecha_creacion,file",
					'productos_fotos',
					"where id_item=".$itm['id'],
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


		foreach($items_productos as $ii=>$item){

			list($uno,$url,$id)=explode("/",$item['url']);
			$url=select_dato("url","productos_items","where id=".$id);
			$items_productos[$ii]['url']=$url.".html";

		}


		$lineas=[
			'name'=>'Productos Ardyss',
			'items'=>$items_productos,
			// 'more'=>[
   //          'name' => 'ver más',
   //          'url' => 'productos'
   //       ]
		];

		$this->view->assign(["lineas" => $lineas]);








		//recomendados
			$items_productos=select(
			"nombre as name,id,precio,moneda",
			'productos_items',
			"where 1
			and id_grupo=2
			and visibilidad=1
			and ver_home=1
			limit 0,20",
			0,[

				'url'=>['url'=>['importado/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){

				$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$items_productos[$iii]['foto']=fila(
					"id,fecha_creacion,file",
					'productos_fotos',
					"where id_item=".$prod['id'],
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


			}


		foreach($items_productos as $ii=>$item){

			list($uno,$url,$id)=explode("/",$item['url']);
			$url=select_dato("url","productos_items","where id=".$id);
			$items_productos[$ii]['url']=$url.".html";

		}


		$importaciones=[];
		$importaciones['name']='Recomendados';
		$importaciones['url']='recomendados';
		$importaciones['more']=[
            'name' => 'ver más',
            'url' => 'recomendados'
      ];

		foreach($items_productos as $oo=>$itm){
			$importaciones['items'][$oo]=[
				'name' =>$itm['name'],
				'url'  =>$itm['url'],
				'img'  =>$itm['foto']['img'],
				'precio' =>$itm['precio'],
			];
		}


		$this->view->assign(["importaciones" => $importaciones]);








		//descuentos
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
		$descuentos['name']='Descuentos';
		$descuentos['url']='descuentos';		
		$descuentos['more']=[
            'name' => 'ver más',
            'url' => 'descuentos'
      ];
      



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


      $this->view->assign(["descuentos" => $descuentos]);







		// menu
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

	




		//links
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>['fields'=>'name,url,fecha_creacion,file'],
				]);

		$links=$Links->getLinks();	

		$this->view->assign(["links" => $links]);




		//news
		$NewsOne=$this->loadModel('Pages',[
													'items'=>[
														'filter'=>'and id_grupo=3',
														]
													]);

		//noticias generales
		$news=$NewsOne->getLinks();	

		$news['name']='Notas de Interés';
		$news['more']['name']='ver mas notas de interés';
		$news['more']['url']=$news['items'][0]['url'];

		$this->view->assign(["noticias" => $news]);




		//brochure
		// $brochure=[
		// 	'img'=>'brochure2.png',
		// 	'file'=>'brochure-asiste.pdf',
      // ];
      
      // $this->view->assign(["brochure" => $brochure]);




		//social
		$social='https://www.facebook.com/prendas.ardyss';

		$this->view->assign(["social" => $social]);





		// videos
		$Videos=$this->loadModel('Videos');

			$gallery=$Videos->getItem([
				'item'  =>'1',
				'limit' =>'0,4',
				// 'type'  =>'videos'
			]);
			// prin($gallery);

			$gallery['more']=[
				'url'  =>'videos',
				'name' =>'galería de videos'
			];

		$this->view->assign(["block_gallery_videos" => $gallery]);


         



		// renders

		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title . ( ($this->slogan)? ' - '.$this->slogan:'' ),
	
				
				


				
				
				//menu
				// 'menu_left'    => $this->menu_left,


				//facebook
				'opengraph'  => true,
				



			]

		);




		$this->view->render('layout_home');


	}

}