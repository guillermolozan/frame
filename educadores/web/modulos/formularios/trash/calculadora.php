<?php //á

	$PAGE=$PAGES[$PARAMS['conector']]=web_render_page($PARAMS['this']);
		

//GEO	
$GEO['departamentos'] = select(
		"id,nombre"
		,"geo_departamentos"
		,"where 1 and  visibilidad='1' order by id asc limit 0,100"
		,0
		,array(
			'selected'=>array('match'=>array(
										'a'=>'{id}'
										,'b'=>'14'
										,'equal'=>'selected'
										,'else'=>''
										)
						   )				
			)
		);
		
$GEO['provincias'] = select(
		"id,nombre"
		,"geo_provincias"
		,"where 1 and  visibilidad='1' and id_departamento='14' order by id asc limit 0,100"
		,0
		,array(
			'selected'=>array('match'=>array(
										'a'=>'{id}'
										,'b'=>'8'
										,'equal'=>'selected'
										,'else'=>''
										)
						   )				
			)
		);
		
$GEO['distritos'] = select(
		"id,nombre"
		,"geo_distritos"
		,"where 1 and  visibilidad='1' and id_provincia='8' order by id asc limit 0,100"
		,0
		,array(
			'selected'=>''					   
			)
		);		

//1
$CAMPOS1 = array(
	/*
	'localizacion'=>array(
		'label'=>'Destino'
		,'campo'=>array('departamento','provincia','distrito')
		,'value'=>array('','','')
		,'control'=>'localizacion'
		,'iniciodiv'=>'destino'		
		,'findiv'=>'1'		
	)
	
	,'categorias'=>array(
		'before_inner'=>'Producto'
		,'label'=>'Categorías'
		,'campo'=>array('categorias')
		,'style'=>'width:150px;'
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'categoría 1','2'=>'categoría 2','3'=>'categoría 3','4'=>'categoría 4','5'=>'categoría 5','6'=>'categoría 6','7'=>'categoría 7','8'=>'categoría 8')
		,'iniciodiv'=>'producto'		
	)
	*/	
	'valor'=>array(
		'before_inner'=>'Paquetes'		
		,'label'=>'Valor de factura (en dólares)'
		,'campo'=>array('valor')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
		,'style'=>'width:150px;'
		,'iniciodiv'=>'paquete'				
	)	
	,'peso'=>array(
		'label'=>'Peso'
		,'style'=>'width:150px;'
		,'campo'=>array('peso')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'0-1 Kg','2'=>'1-2 Kg','3'=>'2-3 Kg','4'=>'3-4 Kg','5'=>'4-5 Kg','6'=>'5-6 Kg','7'=>'6-7 Kg','8'=>'7-8 Kg','9'=>'8-9 Kg','10'=>'9-10 Kg')
	)	
	,'primera'=>array(
		'label'=>'Importa por primera vez?'
		,'campo'=>array('primera')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
	)	
	,'nuevo'=>array(
		'label'=>'Producto Nuevo'
		,'campo'=>array('nuevo')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
	)	
	,'entrega'=>array(
		'label'=>'Entrega con delivery en Lima'
		,'campo'=>array('entrega')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
		,'findiv'=>'1'		
	)		
	/*			
	,'entrega_oficina'=>array(
		'label'=>'Entrega en Oficina de Olva'
		,'campo'=>array('entrega_oficina')
		,'tipo'=>'input_combo'
		,'opciones'=>array('0'=>'Almacén Central','1'=>'Olva Lince','2'=>'Olva Lima','3'=>'Olva San Isidro','4'=>'Olva Miraflores','5'=>'Olva Av. Uruguay','6'=>'Olva Chorrillos','7'=>'Olva Los Olivos','8'=>'Olva Callao','9'=>'Olva Vipol','10'=>'Olva Chosica','11'=>'Olva Santa Anita','12'=>'Olva San Juan de Lurigancho')
		,'findiv'=>'1'		
	)
	*/	
);


			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>($PAGE['titulo'])?$PAGE['titulo']:"Calculadora"
					,'legend'=>"<img src='".THEME_PATH.'img/particular/bloques/calculadora.jpg'."' align='absmiddle' style='margin-right:5px;'/><strong>Calculadora de Costos</strong><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Los datos con (*) son obligatorios</span>"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=app&tab=home'					
					//,'action'=>'index.php?modulo=formulario&tab=contacto'
					,'exito'=>'Gracias por su mensaje en breve nos estaremos comunicando con usted.'
					,'error'=>'Ocurrió un error en el proceso de envio'				
					,'submit'=>' type="submit" value="CALCULAR" '	
					//,'pie'=>'los campos con * son obligatorios'


/*CAMPOS-BEGIN*/
,'campos'=>$CAMPOS1
/*CAMPOS-END*/
										
			);
			
						
		
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
						
				//body_mensaje
				$body_mensaje="";
				foreach($FORM['campos'] as $CAMP){
					$data_insert[$CAMP['campo']['0']]=$_POST[$CAMP['campo']['0']];
					switch($CAMP['tipo']){
						case "input_text": $body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
						case "textarea": $body_mensaje.="<tr><td colspan=2><b>".$CAMP['label'].":</b></td></tr><tr><td colspan=2>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
					}
				}
	////////////body_administrador			
				$body_administrador ="";
				$body_administrador.="Desde la web, han enviado una solicitud de compra con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>($FORM['email_admin'])?$FORM['email_admin']:$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Solicitud de compra desde '.$PARAMETROS_EMAIL['url_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Has enviado una solicitud de compra a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
				$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_cliente.=$body_mensaje;		
				$body_cliente.="</table><br><br>";					
				$body_cliente.="Gracias por su confianza y preferencia<br><br><br>";
				$body_cliente.=$body_firma;
				//email_cliente
				$email_cliente=enviar_email(
								array(
								'emails'=>array($_POST['email'])
								,'Subject'=>"Contacto de ".$PARAMETROS_EMAIL['nombre_web']
								,'body'=>$body_cliente
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);	
				//agregar inserts adicionales			
				$data_insert=array_merge($data_insert,array(	
											'fecha_creacion'=>"now()"	
											,'fecha_edicion'=>"now()"	
											,'fecha'=>"now()"											
											,'visibilidad'=>'1'	
											));
				//insert
				$insertado=insert(
								$data_insert            
								,$FORM['tabla']
								,0
								);
				
				
				crear_email_debug(array(
									"EMAIL QUE SE LE ENVIA AL USUARIO"=>$email_cliente['debug'],
									"EMAIL QUE SE LE ENVIA AL ADMINISTRADOR"=>$email_administrador['debug']
									),"../../debug/emails_".$FORM['nombre'].".html");
								
				if( $email_cliente['todos'] and $email_administrador['todos'] ){
								
						echo json_encode(array(
									't'=>'exito'
									,'m'=>$FORM['exito']
									,'n'=>$FORM['nombre']									
									));	
								
				} else {
					
						echo json_encode(array(
									't'=>'error'
									,'m'=>$FORM['error']
									,'n'=>$FORM['nombre']
									));	
				
				}
	
	
			} else {
			
			$HEAD['titulo'] = ucfirst($FORM['nombre'])." | ".$COMMON['datos_root']['titulo_web']; 			
			$HEAD['meta_keywords'] .= procesar_keywords($COMMON['datos_root']['titulo_web']);			 
			$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);	
			
			}			




?>