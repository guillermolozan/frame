<?php 
namespace controllers;

class Servicios extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}

	function setMessage($email,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;

		// prin($this->email);

		if($this->view->vars['email_test']){

			$this->message.= '<ul><li>pruebas</li>';
			foreach($email->files_test as $fils){
				$this->message.='<li><a target="_black" href="'.$fils['link'].'">'.$fils['link'].'</a></li>';
			}
			$this->message.='</ul>';
	
		}

	}


	function emailFields($type="text"){

		if($type=="html"){

			$html="<table>";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=
							"<tr><th><br>".
							$item['label'].
							":</th></tr>".
							"<tr><td>".
							$_POST[$name].
							"</td></tr>";
					break;
					default:
						$html.=
							"<tr><th>".
							$item['label']."</th>".
							"<td>: ".
							$_POST[$name].
							"</td></tr>";
					break;
				}	
			}

			$html.="</table>";

		} elseif($type=="html"){

			$html="\n\n";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=$item['label'].":\n".$_POST[$name]."\n\n";
					break;
					default:
						$html.=$item['label'].": ".$_POST[$name]."\n\n";
					break;
				}	
			}

			$html.="\n\n";

		}

		return $html;

	}


	function detail($params){

		// prin($params);


		$Page=$this->loadModel('Pages');

		$Page->setConfig([
						'items'=>[
							'table'  =>'productos_items',
							'fields' =>"id,nombre as name,descripcion as html,fecha_creacion",
							'url'    =>'producto/',
						],
						'debug'=>0
				]);

		$post             =$Page->getPage();

		$head_description =$Page->getDescription();

		$head_keywords 	=$Page->getKeywords();

		$head_title       =$Page->getTitle();




		$Page->setVisited();


		$post = fila(
		        "id,id_grupo,id_subgrupo,id_filtro,nombre as name,marca,descripcion as html,moneda,precio,oferta,precio_oferta,politica_legal,tags,weight,
		        adjunto,fecha_creacion"
		        ,"productos_items"
		        ,"where id='".$params['item']."'"
		        ,0
		        ,[
		        		'grupo'=>['fila'=>[
		        				'id,nombre,url',
		        				'productos_grupos',
		        				'where id={id_grupo}',0,[
									'url'=>['url'=>['{nombre}']],
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

						'url'=>['url'=>['producto/{name}/{id}']],

						'get_archivo'=>['get_archivo'=>[
										'carpeta'=>'atc_imas',
										'fecha'=>'{fecha_creacion}',
										'file'=>'{adjunto}',
										'tamano'=>'0'
										]]						

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
		$breadcrumb[]=[
			'name' =>$post['name'],
			'url'  =>$post['url'],
			'class'=>'active',
		];				




		$post['precio']=(($post['moneda']=='1')?'US$':'S/.').$post['precio'];

		$post['fotos']=select(
				'id,file,fecha_creacion',
				'productos_fotos',
				'where id_item='.$post['id'],
				0,
		 	[
				'img'=>['get_archivo'=>[
											'carpeta'=>'profot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
		 	]
		);



		//form
		$this->fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Producto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
				'required' =>'1',				
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono ',
				'required' =>'1',
			],

			'empresa'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Empresa',
			],	

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
				'required' =>'1',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
				'value' =>'Estoy interesado en el el producto '.$post['name'].'
Por favor contacten conmigo.
Gracias
'],

		];


		$fields_reformated=processFields($this->fields);

		// prin($this->view->vars);
		// 
		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				// $post['email'],
				// 'informes@detallitosmathias.com',
				// 'guillermolozan@gmail.com',
				// ,'.implode(',',$this->admin_emails),
				$this->view->vars['web_email_admin'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);

			if($sended){	$this->setMessage($email);		} 
			// else { echo 'noooo'; }

			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");

			// prin($this->message);

		}

		// prin($post['fotos']);

		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords'	 => $head_keywords,
			
			'title'            => $post['nombre'],
			
			'post'             => [
											'name' =>$post['name'],
											'html' =>$post['html'],
											'precio' =>$post['precio'],
											'img'  =>$post['fotos']['0']['img'],

											'marca' =>$post['marca'],

											// 'parts'=>'1',
											// 
											'adjunto' =>$post['get_archivo']

										],
			
			// 'menu_post'  => $menu['items'],
			
			'fotos'         => $post['fotos'],
			
			// 'gallery'    => $gallery,
			
			'group_post'    => $producto['grupo']['url'],
						
			'canonical'     => $this->view->vars['baseurl'].$post['url'],
			
			// 'banner'     => $banner,

			'breadcrumb'		 => $breadcrumb,
			
			//form
			'contact'       =>$fields_reformated,
			
			'message'       => $this->message,

			//facebook
			'opengraph'			=> true

		]);


		$this->view->render('layout_services_detail');


	}



	function oldindex($params){	

		$this->name = "Servicios";

		$Page=$this->loadModel('Pages');

		$Page->setConfig([
						'items'=>[
							'table' =>'project_galleries_photos',
							'fields'=>"id,name,text,html,fecha_creacion,foto,id_grupo",
							'dir'   =>'ser_imas_imas',
							'url'	  =>'pagina/',
							'filter'=>NULL,
						],
						'groups'=>[
							'table' =>'projects',
						]
				]);

		$post             =$Page->getPage();

		$head_description =$Page->getDescription($post);

		$head_title       =$Page->getTitle($post);

		// $banner_absolute  =$post['img'];
		// prin($post['img']);
		// unset($post['img']);
		$post2=fila('adjunto,fecha_creacion','project_galleries_photos','where id='.$post['id'],0,[
							'get_archivo'=>['get_archivo'=>[
											'carpeta'=>'atc_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{adjunto}',
											'tamano'=>'0'
											]]
			]);

		// $post2['get_archivo']=(file_exists($post2['get_archivo']))?$post2['get_archivo']:'';


		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name' =>$post['name'],

											'html' =>$post['html'],

											'img'  =>$post['img'],

											'parts'=>'1',

											'adjunto' =>$post2['get_archivo']
										],
		
		]);


		if($post['id_grupo']!='' and !$params['no-show-menu-group'] ){


			$gallery=false;


			// if($params['with_gallery']){
			
				$Photos=$this->loadModel('Photos');

				$Photos->setConfig([	
					'items'  =>['table'=>'project_galleries_photos','fields'=>'id,name,html'],
					'photos' =>['table'=>'project_galleries_photos_photos','dir'=>'galfot_imas','fields'=>'id,name,file,fecha_creacion'],
					'type'   =>'photos',	
					
				]);

				$gallery=$Photos->getItem(['order'	=>' by id asc']);

				foreach($gallery['items'] as $y=>$item){
					$gallery['items'][$y]['url']=$gallery['items'][$y]['img'];
				}

				$gallery['name']='';

				$gallery['html']='';

				// prin($gallery['items']);

			// }





			$id_grupo=dato("id_grupo","projects","where id=".$post['id_grupo'],0);

			if($id_grupo==0){

				$id_grupo=$post['id_grupo'];

			}

			$group      =$Page->getGroup(['item'=>$id_grupo]);

			$menu       =$Page->getMenu(['item'=>0]);


			// select name,id,id_grupo from paginas where id_grupo='1' and visibilidad=1 order by weight desc limit 0,12

			$menu0 = select('name,id,id_grupo','projects','where visibilidad=1 order by weight desc',0);
			// prin($menu0);

			foreach($menu0 as $ii=>$men){

				$menu0[$ii]['url']   ='#';
				$menu0[$ii]['items'] =$Page->getMenu(['item'=>$men['id']]);

			}
			
			// $menu = select('name,id,id_grupo,url','project_galleries_photos','where id_grupo='.$post['id_grupo'],1);

			$menu       =$this->elements->getM(array_merge($menu0,[]),$this->params['uri']);


			// prin($menu);
			

			$canonical  =$Page->getCanonical([

				'group'   =>$group,
				'name'    =>$post['name'],
				'id'      =>$post['id'],
			
			]);

			// prin($gallery);


		//form
		$this->fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Producto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				// 'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Nombres y Apellidos',
				'required' =>'1',				
			],
		
			// 'apellidos'=>[
			// 	'divclass' =>'col s12 l6',
			// 	'class'    =>'validate',
			// 	'label'    =>'Apellidos',
			// ],			

			'telefono'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Teléfono ',
				'required' =>'1',
			],

			'empresa'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Empresa',
			],	

			'medio'=>[
				'label'=>'¿Por qué medio nos encontró?',
				'type'  =>'select',
				'options'=>['Web','Periódico','Revista','Televisión','Panel Publicitario','Un conocido nos recomendó','Otros']
			],	

			'email'=>[
				// 'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'Email',
				'type'     =>'email',
				'required' =>'1',
			],					
	
			// 'departamento'=>[
			// 	'divclass' =>'col s12 l6',			
			// 	// 'class'    =>'validate',
			// 	'label'    =>'Departamento a cotizar',
			// ],	
			'comentario'=>[
				'divclass' =>'col s12 l12',
				'class'    =>'validate',
				'label'    =>'Mensaje',
				'type'     =>'textarea',
				'value' =>'Estoy interesado en el el producto '.$post['name'].'
Por favor contacten conmigo.
Gracias
'],

		];

		$fields_reformated=processFields($this->fields);

		// prin($this->view->vars);
		// 
		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				// $post['email'],
				// 'informes@detallitosmathias.com',
				// 'guillermolozan@gmail.com',
				// ,'.implode(',',$this->admin_emails),
				$this->view->vars['web_email_admin'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de Cotización",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Cotización",
					// 'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>"<p>Gracias por escribirnos, en breve estaremos poniéndonos en contacto con usted</p>"
				],
				[
					'name'		 =>$this->name.' para usuario'
				]
			);

			if($sended){	$this->setMessage($email);		} 
			// else { echo 'noooo'; }

			if(0)
			insert(
				array_merge(
					[
						'fecha_creacion' =>'now()',
						'fecha'          =>'now()',
					],
				$this->insertFields()
				),
				"contacto");

			// prin($this->message);

		}

					// 'items'  =>['table'=>'project_galleries_photos','fields'=>'id,name,html'],
					// 'photos' =>['table'=>'project_galleries_photos_photos','dir'=>'galfot_imas','fields'=>'id,name,file,fecha_creacion'],
					// 'type'   =>'photos',	

		$galleries[0]=array('id'=>'1','name'=>'Galería');
		$galleries[0]['imgs']=filas('file,fecha_creacion','project_galleries_photos_photos','where id_grupo='.$params['item'].' and visibilidad=1',0,[
				'get_archivo'=>['get_archivo'=>[
											'carpeta'=>'galfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]			
						]
				// 'imgs'=>['foto'=>[
				// 			'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
				// 			'profot_imas',
				// 			['get_archivo'=>'0']
				// 			]
				// 		]
				]);

		// $galleries=filas("id,name","projects_photos","where id_grupo".$params['item']." and visibilidad=1",1,[
		// 		'imgs'=>['fotos'=>[
		// 					'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
		// 					'galfot_imas',
		// 					['get_archivo'=>'0']
		// 					]
		// 				],
		// ]);

		// prin($galleries[0]['imgs']);

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
			// prin($imagess);
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
		if(sizeof($galleries[0]['imgs'])==0){
			$galleries=false;
		}


			$this->view->assign([
				
				'menu_post'  => $menu['items'],
				
				'galleries'     =>$galleries,

				// 'gallery'    => $gallery,
				
				'group_post' => $group,
				
				'breadcrumb' => $breadcrumb,
				
				'canonical'  => $canonical,
				
				// 'banner'  => $banner,
				
				//form
				'contact'    =>$fields_reformated,
				
				'message'    => $this->message,

			]);


		}

	
		// parent::split();
		// prin($params);
		if($banner_absolute!='')
			$this->view->assign(['banner_absolute'=>$banner_absolute]);
		else
			$this->view->assign(['banner'=>'foto3.png']);

		//render the view
		$this->view->render('layout_services_detail');

	}



	function grid($params){	


		// $params['item']=$fila['id'];

		$this->name = 'Grupos';

		$Page=$this->loadModel('Pages');



		/*LEFT MENU*/


		// $group      =$Page->getGroup(['item'=>$id_grupo]);
		// prin($params);
		if($params['level']=='productos' or $params['level']=='mas-vistos'){

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

			// prin($menu);


		} elseif( in_array($params['level'],['1','2','3']) ){


			$Page->setConfig([
							'items'=>[
								'table'  =>'productos_grupos',
								'fields' =>"id,nombre as name,fecha_creacion",
								// 'url'    =>'producto/',
							],
							'debug'=>0
					]);

			$post             =$Page->getPage();
			// prin($post);

			// prin($params);
			$fila=fila('id,nombre,url','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['name']=$fila['nombre'];
			$post['id']=$fila['id'];

			$id_grupo=$fila['id'];

			

			$menu =select('nombre as name,id','productos_subgrupos','where visibilidad=1 and id_grupo='.$id_grupo,0,
					[
						'url'=>['url'=>[$fila['url'].'/category-{name}/{id}']],
					]);


			// prin($params);

			// if( in_array($params['level'],['2','3']) )
			foreach($menu as $iii=> $men){

				if( 
					( in_array($params['level'],['2']) and $params['item']==$men['id'] ) 
					or 
					in_array($params['level'],['3']) 
				)
				$menu[$iii]['items']=select('nombre as name,id','productos_filtros','where visibilidad=1 and id_subgrupo='.$men['id'],0,
						[
							'url'=>['url'=>[$fila['url'].'/sub-category-{name}/{id}']],
						]);

			}

			// prin($menu);

		}




		$menu       =$this->elements->getM($menu,$params['uri']);


		// prin($menu);



		// prin($params);



		// $banner_absolute  =$post['img'];
		// unset($post['img']);


		/*ITEMS*/

		if($params['level']=='productos'){

			$post['name']='Productos';

			$where = '1';

			$canonical  =$Page->getCanonical([
				'name'    =>'productos',
			]);	


		} elseif($params['level']=='mas-vistos'){

			$post['name']='Más Vistos';

			$where = '1';

			$canonical  =$Page->getCanonical([
				'name'    =>'mas-vistos',
			]);	


		} 

		elseif($params['level']=='1'){

			$post['name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$where = " id_grupo=".$fila['id']." ";

			$canonical  =$Page->getCanonical([
				'name'    =>$post['name'],
			]);			

		} elseif($params['level']=='2'){

			$post['menu_name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['name']=dato('nombre','productos_subgrupos','where id="'.$params['item'].'"',0);

			$where = " id_subgrupo=".$params['item']." ";

			$canonical  =$Page->getCanonical([
				'group'   =>$post['menu_name'],
				'name'    =>'category-'.$post['name'],
				'id'      =>$params['item'],
			]);	

		} elseif($params['level']=='3'){

			$post['menu_name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['name']=dato('nombre','productos_filtros','where id="'.$params['item'].'"',0);

			$where = " id_filtro=".$params['item']." ";

			$canonical  =$Page->getCanonical([
				'group'   =>$post['menu_name'],
				'name'    =>'sub-category-'.$post['name'],
				'id'      =>$params['item'],
			]);	

		}

		if($params['level']=='productos'){

			//Grupos
		
			$grupos_items=select(
			"nombre as name,id",
			"productos_grupos",
			"where visibilidad=1
			order by weight desc
			limit 0,5",
			0,[

				'url'=>['url'=>['{name}']],

			]);


			foreach($grupos_items as $ii=>$item){

				$grupos_items[$ii]['items']=select(
				"nombre as name,id,precio,moneda,oferta,precio_oferta",
				"productos_items",
				"where id_grupo=".$item['id']."
				and visibilidad=1
				order by weight desc
				limit 0,3",
				0,[

					'url'=>['url'=>['producto/{name}/{id}']],

				]);

				foreach($grupos_items[$ii]['items'] as $iii=> $prod){

					if(trim($prod['precio'])!='')
						$grupos_items[$ii]['items'][$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

					$fotos=fila(
						"id,fecha_creacion,file",
						"productos_fotos",
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

					$grupos_items[$ii]['items'][$iii]['img']=$fotos['img'];


				}

			}


			$head_description =$Page->getDescription($post,items2string($grupos_items[$ii]['items']));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($grupos_items[$ii]['items']));



		} elseif($params['level']=='mas-vistos'){

			$items_productos=select(
			"nombre as name,id,precio,moneda,oferta,precio_oferta",
			"productos_items",
			"where $where
			and visibilidad=1
			order by viewed desc
			limit 0,100",
			0,[

				'url'=>['url'=>['producto/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){

				if(trim($prod['precio'])!='')
					$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$fotos=fila(
					"id,fecha_creacion,file",
					"productos_fotos",
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

				$items_productos[$iii]['img']=$fotos['img'];


			}


			$head_description =$Page->getDescription($post,items2string($items_productos));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($items_productos));

			unset($menu['items']);


 		} else {


			$items_productos=select(
			"nombre as name,id,precio,moneda,oferta,precio_oferta",
			"productos_items",
			"where $where
			and visibilidad=1
			order by weight desc
			limit 0,100",
			0,[

				'url'=>['url'=>['producto/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){

				if(trim($prod['precio'])!='')
					$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$fotos=fila(
					"id,fecha_creacion,file",
					"productos_fotos",
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
				$items_productos[$iii]['img']=$fotos['img'];


			}


			$head_description =$Page->getDescription($post,items2string($items_productos));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($items_productos));


		}

		// prin($items_productos);
		
		$head_title       =$Page->getTitle($post);



		$this->menu_left=$this->elements->getMenu($this->menu_left,$menu['items'],$params['uri']);


		//Asign vars for view
		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			
			'post'             => [
											'name'      =>$post['name'],

											'menu_name' =>($post['menu_name'])?$post['menu_name']:false,
											
											'html'      =>$post['html'],
											
											'img'       =>$post['img'],
											
											'parts'     =>'1'
										],
		
			'items'            => $items_productos,

			'grupos'				 => $grupos_items,

			'menu_post'  	    => $menu['items'],

			'menu_left'    => $this->menu_left,

		]);


		// prin($post);
			






		$this->view->assign([
						
			// 'gallery'    => $gallery,
			
			'group_post' => $group,
			
			'breadcrumb' => $breadcrumb,
			
			'canonical'  => $canonical,
			
		]);

	


		// parent::split();
		// prin($params);
		if($banner_absolute!='')
			$this->view->assign(['banner_absolute'=>$banner_absolute]);
		else
			$this->view->assign(['banner'=>'foto3.png']);

		//render the view
		$this->view->render('layout_services_grid');

	}

}