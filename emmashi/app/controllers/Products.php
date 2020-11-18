<?php 
namespace controllers;

class Products extends \core\controllers\Pages {


	function __construct($params){

		parent::__construct($params);

	}


	function setMessage($email,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;


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


		// prin($params); exit();


		//habitacion
		$servicio=fila(
			[
				"id",
				"nombre as name",
				"descripcion as text",
				"ficha as text2",
				"texto2 as text3",
				"id_tipo",
				"id_grupo"
			],
			// "id,name,text,text2,text3,text4",
			"productos_items",
			"where id=".$params['item'],
			0,
			[
				'url'=>['url'=>['modelo-{name}/{id}']],
			]);

			$marca=dato("nombre","productos_grupos","where id=".$servicio['id_grupo']);
			$tipo=dato("nombre","productos_tipos","where id=".$servicio['id_tipo']);
			$servicio['name']="$marca $tipo ".$servicio['name'];

			$items=explode("\n",$servicio['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$servicio['text4']=$htm;

			// $servicio['photos']
			$photos=filas('file,fecha_creacion','productos_fotos','where id_item='.$servicio['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'profot_fot',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$servicio['photos'][]=$photo['get_archivo'];

			}

		
		$servicio['open']='active';


		$post=$servicio;


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
				'value'    =>"Estoy interesado en el modelo ".$post['name']."\n".
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

			$cliente_inserted=insert(
				[
					'user'			=>"10",
					'id_usuario'	=>"1",
					'id_jefe'		=>"1",
					'user'			=>"10",
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

			$atencion_inserted=insert(
				[
					'user'			=>"10",
					'id_usuario'	=>"1",
					'id_jefe'		=>"1",
					'user'			=>"10",
					'vendedor_status'=>"1",
					'fecha_creacion'=>"now()",
					'fecha_creacion2'=>"now()",
					'visibilidad'	=>"1",
					'id_cliente'	=>$cliente_inserted['id'],
					'id_grupo'		=>$id_grupo,
					'id_item'		=>$params['item'],
					'id_status'		=>"12",
					'id_canal'		=>"4", //shi = 4 //sou = 5
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
		
		

			if(1){

			
		
				$ID=$II;
			
				$SERVER['BASE']="http://emmyatocha.com/panel/";

				// exit();
				$linea=select_fila(
		
								array(
									'fecha_creacion',
									'id',
									'id_cliente',
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
		
									'item'		=>array('fila'=>array('nombre','productos_items','where id="{id_item}"')),
		
									'cuenta'	=>array('fila'=>array('nombre,logo,fecha_creacion,dominio','envios_cuentas','where id="{id_cuenta_email}"',0,
		
											array('logo'=>array('archivo'=>array('log_imas','{fecha_creacion}','{logo}')))
		
										)
		
									),
		
								)
		
				);

				$CuentasE=select('nombre,email,logo,fecha_creacion,dominio','envios_cuentas','where 1',0,

					array('logo'=>array('archivo'=>array('log_imas','{fecha_creacion}','{logo}')))

				);

				$linea['cuenta']['logo']=($linea['id_grupo']=='4')?$CuentasE['1']['logo']:$CuentasE['0']['logo'];



				// prin($linea);exit();

				function fix_ficha($ficha){
					
					$ficha=str_replace("<table","<table  border='1' width='100%' cellspacing=0 cellpadding=4 style='border-collapse:collapse;margin-bottom:5px;font-size:11px;' ",$ficha); 
					$ficha=str_replace('<tr','<tr border="1" style="border:1px solid #ccc;"',$ficha);
					$ficha=str_replace('<td','<td border="1" style="padding:5px;"',$ficha);

					return $ficha;

				}

				$productos=select(
			
								array('id','nombre','ficha','id_grupo'),
			
								//array('id','nombre','id_grupo'),
			
								"productos_items",
			
								"where visibilidad=1 and id_grupo in (select id from productos_grupos where visibilidad=1) order by id_grupo asc, id asc",
			
								0,
			
								array(
			
									'grupo'=>array('fila'=>array('nombre','productos_grupos','where id="{id_grupo}"')),
			
									'fotos'=>array('fotos'=>array(
			
																"id,file,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id asc limit 0,100"
			
																,'profot_fot'
			
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
			
			
			
					$producto['ficha']=fix_ficha($producto['ficha']);
			
			
			
					$html='';
			
					$html.="<table width='650px' cellpadding=0 cellspacing=0 border=0  >";
			
					$html.='<tr><td style="text-align:center;font-weight:bold;color:#F10102;">'.$producto['nombre'].'</td></tr>';
			
					if(trim(strip_tags($producto['ficha']))!=''){
			
						$html.='<tr><td>'.$producto['ficha'].'</td></tr>';
			
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

					'MODELO'=>$linea['grupo']['nombre'].' '.$linea['item']['nombre'],

					'FICHA'=>"<span class=\"id_speech\"></span>".str_replace("'","\"",$Productos[$linea['id_item']]),

					//'IMPRIMIR'=>str_replace("'","\"","<a href='http://".(($linea['cuenta']['dominio'])?$linea['cuenta']['dominio']:"www.vehiculos.com.pe")."/index.php?modulo=items&tab=productos_imprimir&acc=file&id=".$linea['id_item']."&id_cliente=".$linea['id_cliente']."'>IMPRIMIR</a>"),
					'FIRMA'=>$linea['usuario']['firma'],

					'COTIZACION'=>''
										.'COTIZACIÓN: <a href="http://emmyatocha.com/panel/custom/ventas_items.php?i='.$linea['id'].'">#'.$linea['id'].'</a><br>'
										.'FECHA '.fecha_formato($linea['fecha_creacion'],'8b').'<br>'
										.'MODELO: '.$linea['grupo']['nombre'].' '.$linea['item']['nombre'].'<br>'
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
							"http://emmyatocha.com//imagenes_dir/",
							"<a href='http://emmyatocha.com/index.php?modulo=items&tab=productos_imprimir&acc=file&id_mensaje=".$insertado_mensaje['id']."&id_usuario=".$linea['id_usuario']."'>IMPRIMIR</a>",
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



				$email= new \controllers\Emails();

				if(1)
				$sended=$email->simpleSend(
					implode(",",[
						$_POST['email'],
						$linea['usuario']['email']."*",
						'guillekldc@gmail.com*',
						'wtavara@prodiserv.com*',
					]),
					'Cotización "'.$linea['grupo']['nombre'].' '.$linea['item']['nombre'].'"',
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

			// prin($this->message);

		}

		// prin($post['fotos']);





		// prin($breadcrumb);

		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords'	 => $head_keywords,
			
			'title'            => $post['name'],

			'post'             => $post,
			
			// 'menu_post'  => $menu['items'],
						
			// 'gallery'    => $gallery,
			
			// 'group_post'    => $producto['grupo']['url'],
						
			'canonical'     => $this->view->vars['baseurl'].$post['url'],
			
			// 'banner'     => $banner,

			// 'breadcrumb'		 => $breadcrumb,
			
			//form
			// 'contact'       =>$fields_reformated,
			
			'message'       => $this->message,

			//facebook
			'opengraph'			=> true,

		]);


		$this->view->render('layout_products_detail');


	}


	function grid($params){	

		//servicios
		$habitaciones['name'] ='Modelos';
		$habitaciones['url']  ='modelos';

		$habitaciones['items']=select(
			[
				"id",
				"nombre as name",
				"descripcion as text",
				"ficha as text2",
				"texto2 as text3",
			],
			"productos_items",
			" where 1 ".
			" and id_grupo=".$this->this_group." ".
			// " abd ver_home=1 ".
			// " order by weight desc".
			"",
			0,
			[
				'url'=>['url'=>['modelo-{name}/{id}']],
			]);

		foreach($habitaciones['items'] as $ii=>$hab){

			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$habitaciones['items'][$ii]['text4']=$htm;

			// $habitaciones['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'productos_fotos',
				'where id_item='.$hab['id'].' and visibilidad=1',0,[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'profot_fot',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$habitaciones['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		// $habitaciones['more']=[
		// 	'url'  =>'habitaciones',
		// 	'name' =>'ver más habitaciones'
		// ];

		$this->view->assign([

			"habitaciones"=>$habitaciones

		]);






		//Asign vars for view
		$this->view->assign([
				
			'head_title'       => $head_title,
			
			'head_description' => $head_description,

			'head_keywords' 	 => $head_keywords,
			
			'title'            => $post['name'],
			



			'canonical'  => $canonical,

		]);


		// prin($post);
			







	

		//render the view
		$this->view->render('layout_products_grid');

	}

}