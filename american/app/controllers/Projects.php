<?php 
namespace controllers;

class Projects extends Controller {

	var $operacion_array;
	var $tipo_array;
	var $departamento_array;
	var $provincia_array;
	var $distrito_array;

	function __construct($params){

		parent::__construct($params);


		$this->departamento_array=get_valores('id','nombre','geo_departamentos');
		$this->provincia_array=get_valores('id','nombre','geo_provincias');
		$this->distrito_array=get_valores('id','nombre','geo_distritos');

		$this->tipo_array=array(
								'1'			=> 'Departamento',
								'2'			=> 'Local Comercial',
								'3'			=> 'Depósito',
								'4'			=> 'Terreno',
								'5'			=> 'Edificio',
								'6'			=> 'Local Industrial',
								'7'			=> 'Oficina',
								'8'			=> 'Casa',
								'9'			=> 'Cochera',
						);

		$this->operacion_array=array(
								'1'			=> 'Venta',
								'2'			=> 'Alquiler',
						);
		


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

	function grid(){

		$params=$this->params;
		//post

		foreach($params as $sepa=>$param){

			if(in_array($sepa,$this->variables_busqueda)){
				// $where[$sepa]=$param;
				if($param!=''){
					if($sepa=='preciomax' and $param=='mayor500000')
						$query[]=" precio>=500000 ";
					elseif($sepa=='preciomax')
						$query[]=" precio<=$param ";
					elseif($sepa=='preciomin')
						$query[]=" precio>=$param ";
					else
						$query[]=" $sepa='$param' ";
				}
			}

		}


		if(sizeof($query)>0)
			$string_query=implode($query," and ");
		else
			$string_query=1;


		$post['name']='Cartera de Inmuebles';


		$items=select(
			'id,name,text as sub,
			tipo,operacion,precio,num_rooms,num_bathrooms,departamento,provincia,distrito
			',
			'projects',
			'where '.$string_query.'
			and visibilidad=1
			order by weight desc',
			0,
			[

				'fotos'=>['fotos'=>[
							'file,fecha_creacion|projects_photos|where id_grupo={id} order by id asc limit 0,1',
							'profot_imas',
							['get_archivo'=>'0']
							]
						],

			'url'=>['url'=>['inmueble-{name}/{id}']],

			// 'sub'=>['fecha'=>['{fecha}','2']]

			]
		);
		// prin($items);



		foreach($items as $iii=>$link){

			// $items[$iii]['sub']=dato("nombre","geo_distritos","where id=".$link['sub']);
			
			if(isset($items[$iii]['fotos']['0']['get_archivo'])){
				$items[$iii]['operacion']    =$this->operacion_array[$items[$iii]['operacion']];
				$items[$iii]['tipo']         =$this->tipo_array[$items[$iii]['tipo']];
				$items[$iii]['departamento'] =$this->departamento_array[$items[$iii]['departamento']];
				$items[$iii]['provincia']    =$this->provincia_array[$items[$iii]['provincia']];
				$items[$iii]['distrito']     =$this->distrito_array[$items[$iii]['distrito']];
				$items[$iii]['precio']    ='$'.number_format(
							$items[$iii]['precio']
							, 0, '.', ','
									);
				$items[$iii]['img']       =$items[$iii]['fotos']['0']['get_archivo'];
				unset($items[$iii]['fotos']);
			}

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

			// 'banner'=>'departamentos-en-venta-jesusmaria-peru-toratto.jpg',

			]

		);

		//render the view
		$this->view->render(
			
			'layout_projects_grid'

		);

	}


	function detail(){


		// parent::detail();
		$params = $this->params;


		//post
		$post=fila(
			"id,fecha_creacion,name,html,fecha,text,html_acabados,lat,lon,area,
			tipo,operacion,precio,num_rooms,num_bathrooms,departamento,provincia,distrito,
			address,phone,email",
			"projects",
			"where id='".$params['item']."'",
			0,
			[
				// 'sub'=>['fecha'=>['{fecha}','2']],
				// 'img'=>['get_archivo'=>[
				// 							'carpeta'=>'pro_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{file}',
				// 							'tamano'=>'0'
				// 							]
				// 						],

				// 'banner'=>['get_archivo'=>[
				// 							'carpeta'=>'pro_imas',
				// 							'fecha'=>'{fecha_creacion}',
				// 							'file'=>'{file_banner}',
				// 							'tamano'=>'0'
				// 							]
				// 						],

				// 'departamento'=>['dato'=>['nombre','geo_departamento','where id={departamento}']],
				// 'provincia'=>['dato'=>['nombre','geo_provincia','where id={provincia}']],
				// 'distrito'=>['dato'=>['nombre','geo_distritos','where id={distrito}']],

			]
		);

		$post['operacion']    =$this->operacion_array[$post['operacion']];
		$post['tipo']         =$this->tipo_array[$post['tipo']];
		$post['departamento'] =$this->departamento_array[$post['departamento']];
		$post['provincia']    =$this->provincia_array[$post['provincia']];
		$post['distrito']     =$this->distrito_array[$post['distrito']];
		$post['precio']    ='$ '.number_format(
					$post['precio']
					, 2, '.', ','
							);

		$parte=parse_url($post['video']);
		parse_str($parte['query'], $output);
		$post['video']=$output['v'];


		// prin($post);

		// $galleries=filas("id,name","projects_photos","where id_grupo".$params['item']." and visibilidad=1",1,[
		// 		'imgs'=>['fotos'=>[
		// 					'file,fecha_creacion|galleries_photos_photos|where id_grupo={id} order by id asc',
		// 					'galfot_imas',
		// 					['get_archivo'=>'0']
		// 					]
		// 				],
		// ]);

		$galleries[0]=array('id'=>'1','name'=>'Galería');
		$galleries[0]['imgs']=filas('file,fecha_creacion','projects_photos','where id_grupo='.$params['item'].' and visibilidad=1',0,[
				'img'=>['get_archivo'=>[
											'carpeta'=>'profot_imas',
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

		// prin($galleries);

		// $levels=filas(
		// 	"id,nombre,file,fecha_creacion,comun",
		// 	"productos_tipos",
		// 	"where id_item=".$params['item']." order by weight desc",
		// 	0,
		// 	[
		// 		'img'=>['get_archivo'=>[
		// 									'carpeta'=>'profottip_imas',
		// 									'fecha'=>'{fecha_creacion}',
		// 									'file'=>'{file}',
		// 									'tamano'=>'0'
		// 									]
		// 								]			
		// 	]
		// );

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
		$this->fields=[
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
				'value' =>'Estoy interesado en el inmueble '.$post['name'].' con código: '.$post['id'].'
Por favor contacten conmigo.
Gracias
',
			],

		];

		$fields_reformated=processFields($this->fields);



		if($_SERVER['REQUEST_METHOD']=='POST'){

			$email= new \controllers\Emails($this->view);

			$sended=$email->send(
				$post['email'],
				// 'guillermolozan@gmail.com',
				// .','.implode(',',$this->admin_emails),
				"Mensaje de Consulta de Inmueble",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Consulta de Inmueble",
					'subtitle'   =>'Se recibió un mensaje desde la web '.$this->view->vars['web_name'],
					'html'       =>$this->emailFields('html')
				],
				[
					'name'		 =>$this->name.' para administrador'
				]
			);

			$sended_response=$email->send(
				$_POST['email'],
				"Mensaje de Consulta de Inmueble",
				[
					'name_right' =>$this->view->vars['web_name'],
					'title'      =>"Consulta de Inmueble",
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

		// prin($galleries[0]);

		//asing vars
		$this->view->assign(
			[

				'head_title'=> $post['name'].' | '.$this->title,
			
				'post'=>[
					// 'type'       =>'photos',				
					'name'          =>$post['name'],
					'html'          =>$post['html'],
					// 'html2'      =>$post['html_acabados'],
					'phone'         =>$post['phone'],
					'email'         =>$post['email'],
					'video'         =>$post['video'],
					
					// 'depas'      =>$prods,
					// 'niveles'    =>$levs,
					
					// 'foto'       =>$foto_level,
					
					'galleries'     =>$galleries,
					// 'items'      =>$items
					// ,
					'tipo'          =>$post['tipo'],
					'operacion'     =>$post['operacion'],
					'video'         =>$post['video'],
					'departamento'  =>$post['departamento'],
					'provincia'     =>$post['provincia'],
					'distrito'      =>$post['distrito'],
					'precio'        =>$post['precio'],
					
					'num_rooms'     =>$post['num_rooms'],
					'num_bathrooms' =>$post['num_bathrooms'],
					'area'          =>$post['area'],
					
				],

				'fotos'			=> $galleries[0]['imgs'],

				'map'	=>[
					'lat'  =>$post['lat'],
					'lon'  =>$post['lon'],
					'name' =>$post['name'],
					'text' =>$post['address']
				],

				'canonical'     => $this->view->vars['baseurl'].$post['url'],				

				'contact'         =>$fields_reformated,
				
				'message'		=> $this->message,

				'banner_absolute' =>$post['banner'],

				//facebook
				'opengraph'			=> true

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
