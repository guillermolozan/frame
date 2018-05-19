<?php 
namespace controllers;

class Projects extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function grid(){

		$params=$this->params;
		//post
		

		$post['name']='Proyectos Entregados';

		$items=select(
			'id,name,fecha_creacion,text,fecha,file,distrito as sub',
			'projects_done',
			'where 1
			order by weight desc',
			0,
			[

			'img'=>['get_archivo'=>[
										'carpeta'=>'prodo_imas',
										'fecha'=>'{fecha_creacion}',
										'file'=>'{file}',
										'tamano'=>'0'
										]
									],	

			// 'url'=>['url'=>['proyecto-{name}/{id}']],

			// 'sub'=>['fecha'=>['{fecha}','2']]

			]
		);



		foreach($items as $iii=>$link){

			$items[$iii]['sub']=dato("nombre","geo_distritos","where id=".$link['sub']);

		}
		
		// $items=array_map(function($value){

		// 	$value['img']=$value['img']['get_archivo'];
		// 	$value['more']=['name'=>'leer mas','url'=>$value['url']];

		// 	return $value;

		// },$items);

		// prin($items);


		//asing vars
		$this->view->assign([

			'head_title'=> $post['name'].' | '.$this->title,

			'gallery'=>[
							'type'  =>'links',
							'name'  =>$post['name'],
							// 'html'  =>$gallery['html'],
							'items' =>$items,
							],

			'banner'=>'departamentos-venta-lince-jesus-maria .jpg',

			]

		);

		//render the view
		$this->view->render(
			
			'layout_galleries'

		);

	}


	function detail(){


		// parent::detail();
		$params = $this->params;


		//post
		$post=fila(
			"id,fecha_creacion,name,html,fecha,file_banner,file,text,html_acabados,lat,lon,distrito,address,phone,email,video",
			"projects",
			"where id='".$params['item']."'",
			0,
			[
				// 'sub'=>['fecha'=>['{fecha}','2']],
				'img'=>['get_archivo'=>[
											'carpeta'=>'pro_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],

				'banner'=>['get_archivo'=>[
											'carpeta'=>'pro_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file_banner}',
											'tamano'=>'0'
											]
										],

				'distrito'=>['dato'=>['nombre','geo_distritos','where id={distrito}']],

			]
		);


		$parte=parse_url($post['video']);
		parse_str($parte['query'], $output);
		$post['video']=$output['v'];



		$galleries=filas("id,name","galleries_photos","where id_item=".$params['item']." and visibilidad=1",0,[
				'imgs'=>['fotos'=>[
							'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
							'galfot_imas',
							['get_archivo'=>'0']
							]
						],
		]);


		$thereIsPlanos=0;

		foreach($galleries as $iii=>$gallery){
			if(strtolower($gallery['name'])=='planos'){
				$thereIsPlanos=1;
			}
			foreach($gallery['imgs'] as $yy=>$img){
				if($yy==0)
					$galleries[$iii]['img']=$img['get_archivo'];
				$imagess[]=['src'=>$img['get_archivo']];
			}
			$galleries[$iii]['items']=json_encode($imagess);
			unset($imagess);
		}

		$gfirst=[];
		foreach($galleries as $iii=>$gallery){
			if($gallery['name']=="Galería"){
				$gfirst[]=$gallery;
				unset($galleries[$iii]);
			}
		}
		$galleries=array_merge($gfirst,$galleries);

		// prin($galleries);

		$levels=filas(
			"id,nombre,file,fecha_creacion,comun",
			"productos_tipos",
			"where id_item=".$params['item']." order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'profottip_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]			
			]
		);

		$levelcomun=[];
		// prin($levels);
		foreach($levels as $i=>$level){

			if($level['comun']=='1'){
				$levelcomun[]=[
					'href'   =>$level['img'],
					'nombre' =>$level['nombre'],
					'title'  =>"Plano ".$level['nombre'],
					'set'    =>'niv_'.$level['id'],
				];				
			}

			$lelel=[
				'href'   =>$level['img'],
				'nombre' =>$level['nombre'],
				'title'  =>"Plano ".$level['nombre'],
				'set'    =>'niv_'.$level['id'],
			];

			$levs[$level['id']]=$lelel;
			if($i==0)
				$foto_level=$lelel;

		}


		// prin($levs);


		$status=[
			'0'=> 'Libre',
			'1'=> 'Separado',
			'2'=> 'Vendido',
		];

		$products=filas(
			"id,numero,nombre,area_total,status,novedad,id_items_tipo",
			"productos_items_items",
			"where id_item=".$params['item']." 
			and status=0
			order by numero desc",0,
			[
				'imgs'=>['fotos'=>[
							'file,fecha_creacion|productos_fotos_fotos|where id_item={id}',
							'profot_imas',
							['get_archivo'=>'0']
							]
						],
			]
		);

		// prin($products);

		$leven=true;
		foreach($products as $iii=> $product){

			// foreach($product['imgs'] as $img){
			// 	$photos[]=$img;
			// }

			$piso=intval($product['numero']/100);
			$subnum=$product['numero']%100;

			$prods[$piso]['nombre'] =$levs[$product['id_items_tipo']]['nombre'];
			$prods[$piso]['title']  =$levs[$product['id_items_tipo']]['title'];
			$prods[$piso]['set']    =$levs[$product['id_items_tipo']]['set'];
			$prods[$piso]['href']   =$levs[$product['id_items_tipo']]['href'];

				$dep['title']  =$product['nombre']." - ".$status[$product['status']]."<span class='".strtolower($status[$product['status']])."'></span>";
				$dep['status'] =strtolower($status[$product['status']]);
				$dep['name']   =$product['nombre'];
				$dep['area']   =$product['area_total'];
				$dep['numero'] =$product['numero'];
				$dep['class']  =strtolower($status[$product['status']])." niv_".$product['id_items_tipo'];
				$dep['set']    ="dep_".$product['id'];

				if($iii==0){

					$dep['style']  ="display:block;";
					$dep['active'] ="active";

				}


				if($product['imgs'][0]['get_archivo'])
					$dep['photos'][]   =[
						'href'=>$product['imgs'][0]['get_archivo'],
						'title'=>$dep['title']
					];

				if($leven){
					foreach($levelcomun as $leco){
						$dep['photos'][]   =[
							'href'=>$leco['href'],
							'title'=>$leco['nombre'],
						];					
					}
					$leven=false;
				}

				if(0)
				if($levs[$product['id_items_tipo']]){
					$dep['photos'][]   =[
						'href'=>$levs[$product['id_items_tipo']]['href'],
						'title'=>$levs[$product['id_items_tipo']]['title']
					];
				}


			$prods[$piso]['items'][]=$dep;
			unset($dep);
			$delelevs[$product['id_items_tipo']]=$product['id_items_tipo'];

		}	


		if(!$thereIsPlanos){

		$gallery_depas=['id'=>'1000','name'=>'Planos','img'=>''];

		$yyy=0;
		foreach($prods as $jjj=>$prod){
			foreach($prod['items'] as $iii=>$gallery){
				foreach($gallery['photos'] as $yy=>$img){
					if($img['href']!=''){
						if($yyy==0){
							$gallery_depas['img']=$img['href'];
							$yyy++;
						}
						$gallery_depas['imgs'][]=$img['href'];
						$imagess[]=['src'=>$img['href']];
					}
				}
			}
		}
		$gallery_depas['items']=json_encode($imagess);
		unset($imagess);

		// prin($gallery_depas);
		if($gallery_depas['img'])
			$galleries[]=$gallery_depas;

		}

		// prin($thereIsPlanos);

		foreach($delelevs as $lv){
			unset($levs[$lv]);
		}

		//form
		$fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Proyecto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Fijo',
			],

			'celular'=>[
				'divclass' =>'col s12 l6',
				'label'    =>'Teléfono Móvil',
			],	

			'email'=>[
				'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
			],					
	
			'departamento'=>[
				'divclass' =>'col s12 l6',			
				// 'class'    =>'validate',
				'label'    =>'Departamento a cotizar',
			],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
			],

		];

		$fields_reformated=processFields($fields);




		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,
			
				'post'=>[
					// 'type'  =>'photos',				
					'name'     =>$post['name'],
					'html'     =>$post['html'],
					// 'html2'    =>$post['html_acabados'],
					'phone'    =>$post['phone'],
					'email'    =>$post['email'],
					'video'    =>$post['video'],
					
					'depas'    =>$prods,
					'niveles'  =>$levs,

					'foto'	  =>$foto_level,

					'galleries'=>$galleries,
					// 'items' =>$items,
				],

				'map'	=>[
					'lat'  =>$post['lat'],
					'lon'  =>$post['lon'],
					'name' =>$post['name'],
					'text' =>$post['address']
				],

				'contact'         =>$fields_reformated,
				
				'banner_absolute' =>$post['banner'],
			]
		);

		//only for data test
		if($this->data_test){
			$this->view->assign(
				$this->data_tests->getData([
					'project.name'=>$params['uri'],
					'project.text'=>400,
					'project.items'=>'gallery?img&dims=450x450&name=photo 450x450&number=6'					
				])
			);
		}

		//render the view
		$this->view->render(
			
			'layout_projects_detail'

		);		

	}



}
