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

		$this->$params=$params;

		if(hay("productos_grupos","where url='".$params['level']."'",0)) $params['level']='producto';

		switch($params['level']){
			case "producto":
				$tabla_items ='productos_items';
				$tabla_fotos ='productos_fotos';
				$dir_fotos   ='profot_imas';
				$name_items  ='PRODUCTOS';
				$url_items   ='productos';
				$campos_items ="codigo,id_grupo,id_subgrupo,id,nombre as name,marca,descripcion as html,moneda,tags,weight,
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
				$campos_items ="codigo,id_grupo,id_subgrupo,id,nombre as name,marca,descripcion as html,moneda,tags,weight,oferta,
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

		$head_description =$Page->getDescription();

		$head_keywords 	  =$Page->getKeywords();

		$head_title       =$Page->getTitle();
		
		$canonical 		  =$Page->getCanonical();
		// $canonical		  =;
		// $routes = new Routes();
		// $routes_items=$routes->get_routes();
		// prin($routes_items);

		$Page->setVisited();




		$breadcrumb[]=[
			'name' =>$name_items,
			'url'  =>$url_items,
		];

		/*
		if(
			$params['level']=='descuento' 
			or $params['level']=='importado' 
			){
			if(0)
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

			if(0)
			$post = fila(
			        "codigo,id,id_grupo,id_subgrupo,id_filtro,nombre as name,marca,descripcion as html,moneda,tags,weight,
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
		*/




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




		/*
		########  #######  ########  ##     ##
		##       ##     ## ##     ## ###   ###
		##       ##     ## ##     ## #### ####
		######   ##     ## ########  ## ### ##
		##       ##     ## ##   ##   ##     ##
		##       ##     ## ##    ##  ##     ##
		##        #######  ##     ## ##     ##
		*/
		$this->fields=[
			'proyecto'=>[
				// 'divclass' =>'col s12 l5',
				'label'    =>'Producto',
				'value'    =>$post['name'],
				'hidden'   =>'1',
				// 'disabled' =>'1'
			],
			'nombre'=>[
				'divclass' =>'col s12 l5',
				'class'    =>'validate',
				'label'    =>'Nombres',
				'required' =>'1',				
			],
			'apellidos'=>[
				'divclass' =>'col s12 l5',
				'class'    =>'validate',
				'label'    =>'Apellidos',
				'required' =>'1',				
			],			
			'genero'=>[
				'divclass' =>'col s12 l2',
				'label'=>'Género',
				'type'  =>'select',
				'options'=>[
					'masculino',
					'femenino',
				],
				'required' =>'1',				
			],	
			'dni'=>[
				// 'divclass' =>'col s12 l6',			
				'class'    =>'validate',
				'label'    =>'DNI',
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

			'ciudad'=>[
				// 'divclass' =>'col s12 l6',
				'label'    =>'Ciudad',
			],	

			// 'medio'=>[
			// 	'label'=>'Seleccione medio de pago',
			// 	'type'  =>'select',
			// 	'options'=>[
			// 		'Depósito a cuenta',
			// 		'Pago Link',
			// 		'Pago Efectivo contra entrega',
			// 	]
			// ],	

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
				'value'    =>"Estoy interesado en el producto ".$post['name']."\n".
				"Por favor contacten conmigo.\n".
				"Gracias"],

		];



		$fields_reformated=processFields($this->fields);
		$this->view->assign([	
			'form_fields'    =>$fields_reformated,
			'form_name'      =>'service',
			'form_button'    =>'ENVIAR',
			'form_title'     =>'Cotizar',
		]);
		// prin($this->view->vars);
		// 
		
		if($_SERVER['REQUEST_METHOD']=='POST'){


			$genero=['masculino'=>'1','femenino'=>'2'];

			$id_grupo=dato("id_grupo","productos_items","where id=".$params['item'],0);

			/*
			 dP""b8 88     88 888888 88b 88 888888 888888
			dP   `" 88     88 88__   88Yb88   88   88__
			Yb      88  .o 88 88""   88 Y88   88   88""
			 YboodP 88ood8 88 888888 88  Y8   88   888888
			*/
			$cliente_inserted=insert(
				[
					'user'			=>"10",
					'id_usuario'	=>"1",
					'id_jefe'		=>"1",


					'tipo_cliente'	=>"1",
					'nombre'		=>$_POST['nombre'],
					'apellidos'		=>$_POST['apellidos'],
					'email'			=>$_POST['email'],
					'dni'			=>$_POST['dni'],
					'direccion'		=>$_POST['ciudad'],
					'genero'		=>$genero[$_POST['genero']],
					'cliente_celular'=>$_POST['telefono'],
					'fecha_creacion'=>"now()",
					'visibilidad'	=>"1",
				],
				'clientes',
				0
			);

			/*
			   db    888888 888888 88b 88  dP""b8 88  dP"Yb  88b 88
			  dPYb     88   88__   88Yb88 dP   `" 88 dP   Yb 88Yb88
			 dP__Yb    88   88""   88 Y88 Yb      88 Yb   dP 88 Y88
			dP""""Yb   88   888888 88  Y8  YboodP 88  YbodP  88  Y8
			*/
			$atencion_inserted=insert(
				[
					'user'			=>"10",
					'id_usuario'	=>"1",
					'id_jefe'		=>"1",
					'vendedor_status'=>"1",


					'fecha_creacion'=>"now()",
					'fecha_creacion2'=>"now()",
					'visibilidad'	=>"1",
					'id_cliente'	=>$cliente_inserted['id'],

					'id_grupo'		=>$post['id_grupo'],
					'id_subgrupo'	=>$post['id_subgrupo'],
					'id_item'		=>$params['item'],
					
					'id_status'		=>"12", // interesado
					'id_canal'		=>"5", // formulario de ardyss

					'mensaje'		=>$_POST['comentario'],
					// 'alerta'		=>"1",
				],
				'ventas_items',
				0
			);	
			// prin($cliente_inserted);
			// prin($atencion_inserted);
			// exit();





			$II=$atencion_inserted['id'];
		

			$Cuenta=fila('nombre,email,logo,fecha_creacion,dominio','envios_cuentas','where 1',0,

				array('logo'=>array('archivo'=>array('log_imas','{fecha_creacion}','{logo}')))

			);

			/*
			888888 88b 88 Yb    dP 88  dP"Yb
			88__   88Yb88  Yb  dP  88 dP   Yb
			88""   88 Y88   YbdP   88 Yb   dP
			888888 88  Y8    YP    88  YbodP
			*/
			if(1){
				
				$ID=$II;
				$SERVER['BASE']="http://".$Cuenta['dominio']."/panel/";
				// exit();
				$linea=select_fila(
		
					array(
						'fecha_creacion',
						'id',
						'id_cliente',
						'id_subgrupo',
						'id_grupo',
						'id_item',
						'id_usuario',
						'id_status',
						'id_cuenta_email',
						// 'copia'
					),
					'ventas_items',
					'where id='.$ID,
					0,
					array(
						'cliente'	=>array('fila'=>array('nombre,apellidos,genero,email,tipo_cliente','clientes','where id="{id_cliente}"')),
						'usuario'	=>array('fila'=>array('id_jefe,nombre,apellidos,genero,email,firma','usuarios','where id="{id_usuario}"')),
						'grupo'		=>array('fila'=>array('nombre','productos_grupos','where id="{id_grupo}"')),
						'subgrupo'  =>array('fila'=>array('nombre','productos_subgrupos','where id="{id_subgrupo}"')),
						'item'		=>array('fila'=>array('nombre','productos_items','where id="{id_item}"')),
						'cuenta'	=>array('fila'=>array('nombre,logo,fecha_creacion,dominio','envios_cuentas','where id="{id_cuenta_email}"',0,
								array('logo'=>array('archivo'=>array('log_imas','{fecha_creacion}','{logo}')))
							)
						),
					)
				);




				$linea['cuenta']=$Cuenta;

				
				// prinx($linea);

				// prin($linea);exit();
				function fix_ficha($ficha){
					
					$ficha=str_replace("<table","<table  border='1' width='100%' cellspacing=0 cellpadding=4 style='border-collapse:collapse;margin-bottom:5px;font-size:11px;' ",$ficha); 
					$ficha=str_replace('<tr','<tr border="1" style="border:1px solid #ccc;"',$ficha);
					$ficha=str_replace('<td','<td border="1" style="padding:5px;"',$ficha);
					return $ficha;

				}

				$productos=select(
					array('id','nombre','marca','codigo','descripcion','precio','url','oferta','precio_oferta','ficha','id_grupo','id_subgrupo'),
					"productos_items",
					// "where visibilidad=1 and id_grupo in (select id from productos_grupos where visibilidad=1) order by id_grupo asc, id asc",
					"where id= ".$linea['id_item'],
					0,
					array(
						'grupo'=>array('fila'=>array('nombre','productos_grupos','where id="{id_grupo}"')),
						'subgrupo'=>array('fila'=>array('nombre','productos_subgrupos','where id="{id_subgrupo}"')),
						'fotos'=>array(
							'fotos'=>array(
								"id,file,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id asc limit 0,100"
								,'profot_imas'
								,array(
									'archivo'=>'1',
									'thumb'=>'3,260x200,0',
									'box'=>'4'
									//'atributos'=>'3,624x600,0'
								)
							)
						)
					)
				);


				$tableProps='width="100%" cellpadding="0" cellspacing="0" border="0" ';			

				foreach($productos as $pp=>$producto){
					
					$ficha ="<table>";
					$ficha.=($producto['codigo']!='')?"<tr><td width='100px'>Código</td><td>".$producto['codigo']."</td></tr>":"";
					$ficha.=($producto['marca']!='')?"<tr><td>Marca</td><td>".$producto['marca']."</td></tr>":"";
					$ficha.=($producto['grupo']['nombre']!='' or $producto['subgrupo']['nombre']!='')?"<tr><td>Grupo</td><td>".$producto['grupo']['nombre']." - ".$producto['subgrupo']['nombre']."</td></tr>":"";
					$ficha.="<tr><td colspan=2>".$producto['descripcion']."</td></tr>";

					if($producto['precio_oferta']!=''){
						$ficha.=($producto['precio']!='S/.')?"<tr><td>PRECIO</td><td style='text-decoration:line-through;'>S/.".$producto['precio']."</td></tr>":"";
						$ficha.=($producto['oferta']!='')?"<tr><td>OFERTA</td><td>S/.".$producto['oferta']."</td></tr>":"";
						$ficha.=($producto['precio_oferta']!='S/.')?"<tr><td>PRECIO CON DESCUENTO</td><td>S/.".$producto['precio_oferta']."</td></tr>":"";
					} else {
						$ficha.=($producto['precio']!='S/.')?"<tr><td>PRECIO</td><td>S/.".$producto['precio']."</td></tr>":"";
					}
					$ficha.="</table>";

					$ficha=fix_ficha($ficha);

					
					$html='';
			
					$html.="<table width='650px' cellpadding=0 cellspacing=0 border=0  >";
			
					$html.='<tr><td style="text-align:center;font-weight:bold;color:#F10102;">'.$producto['nombre'].'</td></tr>';
			
					if(trim(strip_tags($ficha))!=''){
			
						$html.='<tr><td>'.$ficha.'</td></tr>';
			
					}
			
					$html.='<tr><td>';
			

					if(sizeof($producto['fotos'])>0){
			
						$html.="<table $tableProps >";
			
						$ttt=0;
			
						foreach($producto['fotos'] as $t=>$foto){
							
							$foto['thumb']=str_replace('src="/','src="http://',$foto['thumb']);
							
							if($ttt==0){ $html.='<tr>'; }
			
							$html.="<td align=center valign=middle style=\"border:1px solid #999 !important;\"><a href='".$foto['box']."'><img ".$foto['thumb']." /></a></td>";
			
							if($ttt==1){ $html.='</tr>'; }
			
							if($ttt==1){ $ttt=0; } else { $ttt=1; }
			
						}
			
						$html.="</table><br>";
			
					}
			
					$html.='</td></tr>';
			
					$html.='<tr><td height="5"></td></tr>';
			
					$html.='</table>';
			
			
			
					$Productos[$producto['id']]=str_replace("\\\"","\"",$html);
			
			
				}
				// prin($linea);

				$speech=dato("texto",'speeches','where id=50');
			
				// echo $speech;
			
				$replaces=array(

					'ESTIMADO'=>($linea['cliente']['tipo_cliente']=='2')?'Estimados':(($linea['cliente']['genero']=='2')?'Estimada':'Estimado'),

					'SR'=>($linea['cliente']['tipo_cliente']=='2')?'Sres.':(($linea['cliente']['genero']=='2')?'Sra.':'Sr.'),                     

					//'VENDEDOR_NOMBRE'=>$linea['usuario']['nombre'].' '.$linea['usuario']['apellidos'],

					//'VENDEDOR'=>(($linea['usuario']['genero']=='2')?'la Srta.':'el Sr.')." ".$linea['usuario']['nombre'].' '.$linea['usuario']['apellidos'],

					'VENDEDOR'=>$linea['usuario']['nombre'].' '.$linea['usuario']['apellidos'],

					//'CLIENTE_NOMBRE'=>$linea['cliente']['nombre'].' '.$linea['cliente']['apellidos'],

					//'CLIENTE'=>(($linea['cliente']['genero']=='2')?'Srta.':'Sr.')." ".$linea['cliente']['nombre'].' '.$linea['cliente']['apellidos'],

					'CLIENTE'=>strtoupper($linea['cliente']['nombre'].' '.$linea['cliente']['apellidos']),

					'MODELO'=>$linea['grupo']['nombre'].' - '.$linea['subgrupo']['nombre'].' : '.$linea['item']['nombre'],

					'FICHA'=>"<span class=\"id_speech\"></span>".str_replace("'","\"",$Productos[$linea['id_item']]),

					//'IMPRIMIR'=>str_replace("'","\"","<a href='http://".(($linea['cuenta']['dominio'])?$linea['cuenta']['dominio']:"www.vehiculos.com.pe")."/index.php?modulo=items&tab=productos_imprimir&acc=file&id=".$linea['id_item']."&id_cliente=".$linea['id_cliente']."'>IMPRIMIR</a>"),
					'FIRMA'=>$linea['usuario']['firma'],

					'COTIZACION'=>''
						.'COTIZACIÓN: <a href="http://'.$Cuenta['dominio'].'/panel/custom/ventas_items.php?i='.$linea['id'].'">#'.$linea['id'].'</a><br>'
						.'FECHA '.fecha_formato($linea['fecha_creacion'],'8b').'<br>'
						.'MODELO: '.$linea['grupo']['nombre'].' - '.$linea['subgrupo']['nombre'].' : '.$linea['item']['nombre'].'<br>'
						.'CLIENTE: '.strtoupper($linea['cliente']['nombre'].' '.$linea['cliente']['apellidos'])


				);

			
				foreach($replaces as $fromm => $tooo)
					$speech=str_replace('['.$fromm.']', $tooo, $speech);
			

					

					// $unos=between($speech,"<!--","-->");

					// $ID_SPEECH=dato("id","speeches","where nombre='".$unos[1]."'",0);
		
					/*
					88""Yb 888888  dP""b8 88 88""Yb 88
					88__dP 88__   dP   `" 88 88__dP 88
					88"Yb  88""   Yb      88 88""Yb 88
					88  Yb 888888  YboodP 88 88oodP 88
					*/
					insert(
						[
							"fecha_creacion"=>"now()",
							"id_grupo"	=>	$atencion_inserted['id'],
							"tipo"		=>	"2",
							"id_usuario"=>	"1",
							"texto"		=>	$_POST['comentario'],
							"user"		=>	"10",
						]
						,"ventas_mensajes"
						,0
					);

					/*
					888888 88b 88 Yb    dP 88 888888
					88__   88Yb88  Yb  dP  88 88__
					88""   88 Y88   YbdP   88 88""
					888888 88  Y8    YP    88 888888
					*/
					$insertado_mensaje=insert(
						[
							"fecha_creacion"=>"now()",
							"id_grupo"	=>	$atencion_inserted['id'],
							"tipo"		=>	"1",
							"id_usuario"=>	"1",
							"user"		=>	"10",

						]
						,"ventas_mensajes"
						,0
					);


					$speech=str_replace(
						array(
							"../imagenes_dir/",
							"[IMPRIMIR]",
						)
						,array(
							"http://".$Cuenta['dominio']."//imagenes_dir/",
							"<a href='http://".$Cuenta['dominio']."/imprimir-coti/".$atencion_inserted['id']."'>IMPRIMIR</a>",
						),
						$speech
					);

					$xxxta='<div><strong><b>ENVIO AUTOMÁTICO<br /></b></strong></div>';
		

					update(
						array(
							'texto'=>$xxxta.$speech,
						),
						"ventas_mensajes",
						"where id='".$insertado_mensaje['id']."'",
						0
					);

					/*
					   db    88     888888 88""Yb 888888    db
					  dPYb   88     88__   88__dP   88     dPYb
					 dP__Yb  88  .o 88""   88"Yb    88    dP__Yb
					dP""""Yb 88ood8 888888 88  Yb   88   dP""""Yb
					*/
					insert(
						[
							"fecha_creacion"=>"now()",
							"id_grupo"	=>	$atencion_inserted['id'],
							"texto"		=>	"Primer contacto",
							"tipo"		=>	"3",
							"id_usuario"=>	"1",
							"user"		=>	"10",
							"alerta"		=>	"1",
							"alerta_fecha"=>date("Y-m-d h:m:s",\strtotime("+30 min")),
						]
						,"ventas_mensajes"
						,0
					);												



				// $email= new \controllers\Emails();
				$email= new \controllers\Emails($this->view);


				if(1)
				$sended=$email->simpleSend(
					implode(",",[
						$_POST['email'],
						$linea['usuario']['email']."*",
						'guillekldc@gmail.com*',
						'wtavara@prodiserv.com*',
					]),
					'Cotización "'.$linea['grupo']['nombre'].' - '.$linea['subgrupo']['nombre'].' : '.$linea['item']['nombre'].'"',
					'<div><img src="http:'.$linea['cuenta']['logo'].'" border=0 style="width:200px;" /></div>'.
					$speech,
					$linea['usuario']['email'],
					$linea['usuario']['nombre']." ".$linea['usuario']['apellidos']
				);



				if($sended){	$this->setMessage($email,"Cotización enviada con éxito.");	} 


				// prin($options);

				// prin($url);


				// exit();

			
			   
			
			}


		}

		
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
			
			'head_description' => $head_description,

			'head_keywords'	   => $head_keywords,
			
			'title'            => $post['nombre'],
			
			'post'             => [
									'name' =>$post['name'],
									'html' =>$post['html'],
									'precio' =>$post['precio'],
									'img'  =>$post['fotos']['0']['img'],

									'marca' =>$post['marca'],
									'codigo' =>$post['codigo'],

									// 'parts'=>'1',
									// 
									'adjunto' =>$post['get_archivo'],

									'oferta' =>round($post['oferta']),

								],
			
			// 'menu_post'  => $menu['items'],
			
			'fotos'         => $post['fotos'],
			
			// 'gallery'    => $gallery,
			
			'group_post'    => $producto['grupo']['url'],
						
			'canonical'     => $canonical,
			
			// 'banner'     => $banner,

			'breadcrumb'	 => $breadcrumb,
			
			//form
			// 'contact'       =>$fields_reformated,
			'fields1'			=> [
				$fields_reformated[0],
				$fields_reformated[1],
				$fields_reformated[2],
				$fields_reformated[3],
				$fields_reformated[4],
				$fields_reformated[5],
				$fields_reformated[6],
			],

			'fields2'			=> [
				$fields_reformated[7],
				$fields_reformated[8]
			],


			'message'       => $this->message,

			//facebook
			// 'opengraph'			=> true,

			//menu
			'menu_left'    => $this->menu_left,

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
				'value' =>"Estoy interesado en el el producto ".$post['name']."\n".
			"Por favor contacten conmigo.\n".
			"Gracias\n".
			""],

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

		// prin($params);
		// $params['level']=3;
		// prin($params);

		// $params['item']=$fila['id'];

		$this->name = 'Grupos';

		$Page=$this->loadModel('Pages');


		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////// LEFT MENU ////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////

		/*
		##     ## ######## ##    ## ##     ##    ##       ######## ######## ########
		###   ### ##       ###   ## ##     ##    ##       ##       ##          ##
		#### #### ##       ####  ## ##     ##    ##       ##       ##          ##
		## ### ## ######   ## ## ## ##     ##    ##       ######   ######      ##
		##     ## ##       ##  #### ##     ##    ##       ##       ##          ##
		##     ## ##       ##   ### ##     ##    ##       ##       ##          ##
		##     ## ######## ##    ##  #######     ######## ######## ##          ##
		*/

		// $group      =$Page->getGroup(['item'=>$id_grupo]);
		// prin($params);
		if(
			$params['level']=='productos' 
			// or $params['level']=='mas-vistos'
		){


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


		} elseif( in_array($params['level'],['1','2']) ){


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
			// prin($fila);

			$post['name']=$fila['nombre'];
			$post['id']=$fila['id'];

			$id_grupo=$fila['id'];

			
			// prin($params['level']);

			$menu =select('nombre as name,id','productos_subgrupos','where visibilidad=1 and id_grupo='.$id_grupo,0,
					[
						'url'=>['url'=>[$fila['url'].'/category-{name}/{id}']],
					]);

			// prin($menu);


			if( in_array($params['level'],['3']) )
			$daditem=dato("id_subgrupo","productos_filtros","where id=".$params['item']);

			// prin($menu);

			// prin($params);

			// if( in_array($params['level'],['2','3']) )
			foreach($menu as $iii=> $men){

				if( 
					( 
						1
						and in_array($params['level'],['2']) 
						// and $params['item']==$men['id'] 
					) or 
					(
						in_array($params['level'],['3']) 
						and $daditem==$men['id'] 
					)
				)

				$menu[$iii]['items']=select('nombre as name,id','productos_items','where visibilidad=1 and id_subgrupo='.$men['id'],0,
						[
							'url'=>['url'=>[$fila['url'].'/{name}/{id}']],
						]);

			}




			// prin($menu);

			if( in_array($params['level'],['1','2']) ){

				// prin($menu);

				$menu=[[
					'name'  =>$post['name'],
					'url'   =>'#',
					'items' =>$menu,
					'class' =>'active'
				]];


			}



			$categorias=filas('id,nombre,url','productos_grupos','where 1',0);
			// prin($categorias);
			
			foreach($categorias as $fil){
				
				// prin($fil);

				$id_grupo=$fila['id'];
				
				// prin($params['level']);

				$menuleft =select('nombre as name,id','productos_subgrupos','where visibilidad=1 and id_grupo='.$fil['id'],0,
						[
							'url'=>['url'=>[$fil['url'].'/category-{name}/{id}']],
						]);


				if( in_array($params['level'],['3']) )
				$daditem=dato("id_subgrupo","productos_filtros","where id=".$params['item']);


				// prin($menuleft);

				// prin($params);

				// if( in_array($params['level'],['2','3']) )
				foreach($menuleft as $iii=> $men){

					if( 
						( 
							in_array($params['level'],['2']) 
							and $params['item']==$men['id'] 
						) or 
						(
							in_array($params['level'],['3']) 
							and $daditem==$men['id'] 
						)
					)

					$menuleft[$iii]['items']=select('nombre as name,id','productos_filtros','where visibilidad=1 and id_subgrupo='.$men['id'],0,
							[
								'url'=>['url'=>[$fil['url'].'/{name}/{id}']],
							]);

				}

				// prin($menuleft);

				if( in_array($params['level'],['1','2']) ){

					// prin($menu);
					$menuleftfinal[]=[
						'name'  =>$fil['nombre'],
						'url'   =>'#',
						'items' =>$menuleft,
						'class' =>'active'
					];

				}
				
				unset($menuleft);


			}



		}


		// prin($menuleftfinal);


		$menu       = $this->elements->getM($menu,$params['uri']);

		// prin($menuleftfinal);

		$menuleftfinal       = $this->elements->getM($menuleftfinal,$params['uri']);



		// foreach($menu['items'] as $ii=>$itemmenu){
		// 	foreach($itemmenu['items'] as $kk=>$itemmenu2){
		// 		foreach($itemmenu2['items'] as $jj=>$item){
		// 		// prin($item);
		// 		list($uno,$url,$id)=explode("/",$item['url']);
		// 		$url=select_dato("url","productos_items","where id=".$id);
      //       $menu['items'][$ii]['items'][$kk]['items'][$jj]['url']=$url.".html";
            
		// 		}
		// 	}
		// }

      // prin($menu['items']);

		$this->view->assign(['menu_post' => $menu['items']]);




		// prin($menuleftfinal);

		// prin($menu);



		// prin($params);



		// $banner_absolute  =$post['img'];
		// unset($post['img']);

		 
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////// BREADCRUMBS //////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////
		
		/*
		########  ########  ########    ###    ########   ######  ########  ##     ## ##     ## ########
		##     ## ##     ## ##         ## ##   ##     ## ##    ## ##     ## ##     ## ###   ### ##     ##
		##     ## ##     ## ##        ##   ##  ##     ## ##       ##     ## ##     ## #### #### ##     ##
		########  ########  ######   ##     ## ##     ## ##       ########  ##     ## ## ### ## ########
		##     ## ##   ##   ##       ######### ##     ## ##       ##   ##   ##     ## ##     ## ##     ##
		##     ## ##    ##  ##       ##     ## ##     ## ##    ## ##    ##  ##     ## ##     ## ##     ##
		########  ##     ## ######## ##     ## ########   ######  ##     ##  #######  ##     ## ########
		*/

		if($params['level']=='productos'){


			$post['name']='Productos';

			$where = '1';

			$canonical  =$Page->getCanonical([
				'name'    =>'productos',
			]);	


			$breadcrumb[]=[
				'name' =>'Productos',
				'url'  =>maskUrl('productos'),
			];



		} elseif($params['level']=='importaciones'){


			$post['name']='Importaciones';

			$where = '1';

			$canonical  =$Page->getCanonical([
				'name'    =>'importaciones',
			]);

			$breadcrumb[]=[
				'name' =>'Importados',
				'url'  =>maskUrl('importaciones'),
			];


		} elseif($params['level']=='descuentos'){


			$post['name']='Descuentos';

			$where = '1';

			$canonical  =$Page->getCanonical([
				'name'    =>'descuentos',
			]);	


			$breadcrumb[]=[
				'name' =>'Descuentos',
				'url'  =>maskUrl('descuentos'),
			];

		// } elseif($params['level']=='mas-vistos'){


		// 	$post['name']='Más Vistos';

		// 	$where = '1';

		// 	$canonical  =$Page->getCanonical([
		// 		'name'    =>'mas-vistos',
		// 	]);	


		} elseif($params['level']=='1'){


			$post['name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['url']=dato('url','productos_grupos','where url="'.$params['grup'].'"',0);

			$where = " id_grupo=".$fila['id']." ";

			$canonical  =$Page->getCanonical([
				'name'    =>$post['name'],
			]);

			$breadcrumb[]=[
				'name' =>'Productos',
				'url'  =>maskUrl('productos'),
			];

			$breadcrumb[]=[
				'name' =>$post['name'],
				'url'  =>maskUrl($post['url']),
			];			

			// $breadcrumb[]=[
			// 	'name' =>$post['grupo']['nombre'],
			// 	'url'  =>$post['grupo']['url'],
			// ];

			// $breadcrumb[]=[
			// 	'name' =>$post['cat']['nombre'],
			// 	'url'  =>$post['cat']['url'],
			// ];

			// if($post['subcat']['nombre'])
			// $breadcrumb[]=[
			// 	'name' =>$post['subcat']['nombre'],
			// 	'url'  =>$post['subcat']['url'],
			// ];

		} elseif($params['level']=='2'){


			$post['menu_name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['menu_url']=dato('url','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['name']=dato('nombre','productos_subgrupos','where id="'.$params['item'].'"',0);

			$post['url']=dato('url','productos_subgrupos','where id="'.$params['item'].'"',0);

			$where = " id_subgrupo=".$params['item']." ";

			$canonical  =$Page->getCanonical([
				'group'   =>$post['menu_name'],
				'name'    =>'category-'.$post['name'],
				'id'      =>$params['item'],
			]);	

			$breadcrumb[]=[
				'name' =>'Productos',
				'url'  =>maskUrl('productos'),
			];

			$breadcrumb[]=[
				'name' =>$post['menu_name'],
				'url'  =>maskUrl($post['menu_url']),
			];	

			// prin($post);
			$breadcrumb[]=[
				'name' =>$post['name'],
				'url'  =>procesar_url($post['menu_url']."/category-".$post['name']."/".$params['item']),
			];	

		} elseif($params['level']=='3'){


			$post['menu_name']=dato('nombre','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['menu_url']=dato('url','productos_grupos','where url="'.$params['grup'].'"',0);

			$post['name']=dato('nombre','productos_filtros','where id="'.$params['item'].'"',0);

			$id_sub=dato('id_subgrupo','productos_filtros','where id="'.$params['item'].'"',0);
			
			$name_sub=dato('nombre','productos_subgrupos','where id="'.$id_sub.'"',0);

			$where = " id_filtro=".$params['item']." ";

			$canonical  =$Page->getCanonical([
				'group'   =>$post['menu_name'],
				'name'    =>'sub-category-'.$post['name'],
				'id'      =>$params['item'],
			]);

			$breadcrumb[]=[
				'name' =>'Productos',
				'url'  =>maskUrl('productos'),
			];

			$breadcrumb[]=[
				'name' =>$post['menu_name'],
				'url'  =>maskUrl($post['menu_url']),
			];	

			$breadcrumb[]=[
				'name' =>$name_sub,
				'url'  =>procesar_url($post['menu_url']."/category-".$name_sub."/".$id_sub),
			];	

			// prin($post);
			$breadcrumb[]=[
				'name' =>$post['name'],
				'url'  =>procesar_url($post['menu_url']."/sub-category-".$post['name']."/".$params['item']),
			];	

		}



		/////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////// GRID ///////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////
		
		/*
		 ######   ########  #### ########
		##    ##  ##     ##  ##  ##     ##
		##        ##     ##  ##  ##     ##
		##   #### ########   ##  ##     ##
		##    ##  ##   ##    ##  ##     ##
		##    ##  ##    ##   ##  ##     ##
		 ######   ##     ## #### ########
		*/

		if($params['level']=='productos'){

			//Grupos
			$grupos_items=select(
			"nombre as name,id,url",
			"productos_grupos",
			"where visibilidad=1
			order by weight desc
			limit 0,5",
			0,[

				'url'=>['url'=>['{url}']],

			]);

		

			foreach($grupos_items as $ii=>$item){



				$grupos_items[$ii]['items']=select(
				"nombre as name,id,precio,moneda",
				"productos_items",
				"where id_grupo=".$item['id']."
				and visibilidad=1
				order by weight desc
				limit 0,3",
				0,[

					'url'=>['url'=>[$item['name'].'/{name}/{id}']],

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

			// prin($grupos_items);


			$head_description =$Page->getDescription($post,items2string($grupos_items[$ii]['productos']));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($grupos_items[$ii]['productos']));




		} elseif($params['level']=='2'){

		   $grupos_array=get_valores("id","url","productos_grupos","");

			$items_productos=select(
			"nombre as name,id,precio,moneda,id_grupo",
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


				$items_productos[$iii]['url']=procesar_url($grupos_array[$prod['id_grupo']].'/'.$prod['name'].'/'.$prod['id']);


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

			// prin($items_productos);
			// prin($grupos_items);


			$head_description =$Page->getDescription($post,items2string($grupos_items[$ii]['productos']));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($grupos_items[$ii]['productos']));

			
		/*
		8888b.  888888 .dP"Y8  dP""b8 88   88 888888 88b 88 888888  dP"Yb  .dP"Y8
		 8I  Yb 88__   `Ybo." dP   `" 88   88 88__   88Yb88   88   dP   Yb `Ybo."
		 8I  dY 88""   o.`Y8b Yb      Y8   8P 88""   88 Y88   88   Yb   dP o.`Y8b
		8888Y"  888888 8bodP'  YboodP `YbodP' 888888 88  Y8   88    YbodP  8bodP'
		*/
		} elseif(
			$params['level']=='importaciones'
			or $params['level']=='descuentos'
		){


			$tabla_items=($params['level']=='importaciones')?'productos_items_impor':'productos_items';

			$tabla_fotos=($params['level']=='importaciones')?'productos_fotos_impor':'productos_fotos';

			$dir_fotos=($params['level']=='importaciones')?'profot2_imas':'profot_imas';

			$url_item=($params['level']=='importaciones')?'importado':'descuentos';

			$tabla_campos=($params['level']=='importaciones')?"nombre as name,id,precio,moneda":"nombre as name,id,precio,precio_oferta,moneda,oferta as subname";



			$items_productos=select(
			$tabla_campos,
			$tabla_items,
			"where $where
			and visibilidad=1
			and id_grupo=4
			and id_subgrupo=7
			order by viewed desc
			limit 0,100",
			0,[

				'url'=>['url'=>[$url_item.'/{name}/{id}']],

			]);

			foreach($items_productos as $iii=> $prod){


				if(trim($prod['precio'])!='')
					$items_productos[$iii]['precio']=(($prod['moneda']=='1')?'US$':'S/.').$prod['precio'];

				$items_productos[$iii]['subname']=round($prod['subname']);


				if($params['level']=='descuentos'){

					$items_productos[$iii]['subname']=$items_productos[$iii]['precio']." -".round($prod['subname']);

					$items_productos[$iii]['precio'] =(($prod['moneda']=='1')?'US$':'S/.').$prod['precio_oferta'];

				}


				$fotos=fila(
					"id,fecha_creacion,file",
					$tabla_fotos,
					"where id_item=".$prod['id'],
					0,
					[
						'img'=>['get_archivo'=>[
													'carpeta'=>$dir_fotos,
													'fecha'=>'{fecha_creacion}',
													'file'=>'{file}',
													'tamano'=>'0'
													]
												],
						]

				);

				$items_productos[$iii]['img']=$fotos['img'];


			}


			// prin($items_productos);

			$head_description =$Page->getDescription($post,items2string($items_productos));
			
			$head_keywords 	=$Page->getKeywords($post,items2string($items_productos));

			unset($menu['items']);


 		} else {


			$items_productos=select(
			"nombre as name,id,precio,moneda",
			"productos_items",
			"where $where
			and visibilidad=1
			order by weight desc
			limit 0,100",
			0,[

				'url'=>['url'=>[$params['grup'].'/{name}/{id}']],

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


		// foreach($items_productos as $ii=>$item){

		// 	list($uno,$url,$id)=explode("/",$item['url']);
		// 	$url=select_dato("url","productos_items","where id=".$id);
		// 	$items_productos[$ii]['url']=$url.".html";

		// }

		$this->view->assign(['items' => $items_productos]);



		// prin($items_productos);
		
		$head_title       =$Page->getTitle($post);


		$this->menu_left=$this->elements->getMenu($this->menu_left,$menuleftfinal['items'],$params['uri']);

		$this->view->assign(['menu_left'    => $this->menu_left,]);


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
		

			'grupos'				 => $grupos_items,


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