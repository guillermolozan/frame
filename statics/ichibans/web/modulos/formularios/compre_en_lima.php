<?php //á

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> NULL,
							'on_false'	=> $_SERVER['REQUEST_URI']
							));

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
	'fecha_compra'=>array(
		'label'=>'Fecha'
		,'campo'=>array('fecha_compra')
		,'tipo'=>'input_fecha'
		,'validacion'=>"validate['required']"
		,'rango'=>'now,+1 year'
		,'before'=>'Datos de su compra'		
	)
	,'lugar'=>array(
		'label'=>'Lugar de Compra'
		,'campo'=>array('lugar')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'Lima','2'=>'USA')
		,'value'=>'1'
	)
	,'tienda'=>array(
		'label'=>'Tienda'
		,'campo'=>array('tienda')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'codigo_transaccion'=>array(
		'label'=>'Código de transacción'
		,'campo'=>array('codigo_transaccion')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'peso'=>array(
		'label'=>'Peso'
		,'campo'=>array('peso')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'valor'=>array(
		'label'=>'Valor'
		,'campo'=>array('valor')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'dimensiones'=>array(
		'label'=>'Dimensiones'
		,'campo'=>array('dim_ancho','dim_largo','dim_altura')
		,'value'=>array('','','')
		,'control'=>'dimensiones'
	)
	,'unidades'=>array(
		'label'=>'Unidades'
		,'campo'=>array('unidades')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'comentario'=>array(
		'label'=>'Comentario'
		,'campo'=>array('comentario')
		,'tipo'=>'textarea'
	)	
	,'id_usuario'=>array(
		'label'=>'Usuario'
		,'campo'=>array('id_usuario')
		,'tipo'=>'input_hidden'
		,'value'=>array($_SESSION['login']['id'])
	)		
);


//2
$CAMPOS2=array(
	'envgen_nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('envgen_nombre')
		,'tipo'=>'input_text'
		,'before'=>'Datos de envío'
	)
	,'envgen_apellido_paterno'=>array(
		'label'=>'Apellido Paterno'
		,'campo'=>array('envgen_apellido_paterno')
		,'tipo'=>'input_text'
	)
	,'envgen_apellido_materno'=>array(
		'label'=>'Apellido Materno'
		,'campo'=>array('envgen_apellido_materno')
		,'tipo'=>'input_text'
	)	
	,'envgen_direccion'=>array(
		'label'=>'Dirección Exacta'
		,'campo'=>array('envgen_direccion')
		,'tipo'=>'input_text'
	)
	,'envgen_localizacion'=>array(
		'label'=>'Localización'
		,'campo'=>array('envgen_departamento','envgen_provincia','envgen_distrito')
		,'value'=>array('','','')
		,'control'=>'envgen_localizacion'
	)	
	,'envgen_telefono_fijo'=>array(
		'label'=>'Teléfono'
		,'campo'=>array('envgen_telefono_fijo')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'envgen_telefono_celular'=>array(
		'label'=>'Celular'
		,'campo'=>array('envgen_telefono_celular')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'envgen_ref_lugar'=>array(
		'label'=>'Referente al Lugar'
		,'campo'=>array('envgen_ref_lugar')
		,'tipo'=>'textarea'
		,'after'=>"favor sea especifico con las indicaciones, avenidas, centros comerciales, entre otros."
	)
	,'envgen_fecha_entrega'=>array(
		'label'=>'Fecha de entrega'
		,'campo'=>array('envgen_fecha_entrega')
		,'tipo'=>'input_fecha'
		,'before'=>'Otras consideraciones para el envio'
//		,'validacion'=>"validate['required']"
		,'rango_anio'=>(date('n')>10)?'now,+1 year':'now,now'
		//,'rango_mes'=>'now,+6 month'		
	)
	,'envgen_intervalo_entrega'=>array(
		'label'=>'Intervalo de entrega'
		,'campo'=>array('envgen_intervalo_entrega')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'Entre 7am y 10:30am','2'=>'Entre 9am y 11:30am','3'=>'Entre 8am y 12:30am','4'=>'Entre 2pm y 5:30pm','5'=>'Entre 6:00pm y 8pm','6'=>'Entre 6:00am y 8am (Horario Especial)')
	)
	,'envgen_si_empresa'=>array(
		'label'=>'Si el lugar de entrega es una EMPRESA indicar el área y anexo de la persona que recibirá los productos.'
		,'campo'=>array('envgen_si_empresa')
		,'tipo'=>'textarea'
	)
	,'envgen_comentario'=>array(
		'label'=>'Comentario'
		,'campo'=>array('envgen_comentario')
		,'tipo'=>'textarea'
		,'after'=>"Ingrese un comentario acerca de la orden (sugerencia, anotacion, observacion, etc)"
	)

);

//4
$CAMPOS4=array(	
	'pag_tipo_documento'=>array(
		'label'=>'¿Qué solicita?'
		,'campo'=>array('pag_tipo_documento')
		,'tipo'=>'input_radio'
		,'before'=>'Pago'
		,'opciones'=>array('1'=>'Boleta','2'=>'Factura')
	)
	,'pag_direccion'=>array(
		'label'=>'Dirección de la facturación'
		,'campo'=>array('pag_direccion')
		,'tipo'=>'input_text'
	)
	,'pag_direccion_ref'=>array(
		'label'=>'Referente al Lugar'
		,'campo'=>array('pag_direccion_ref')
		,'tipo'=>'textarea'
		,'after'=>'Favor ser específico con las indicaciones, avenidas, centros'
	)
	,'pag_factura_ruc'=>array(
		'label'=>'Factura RUC'
		,'campo'=>array('pag_factura_ruc')
		,'tipo'=>'input_text'
	)
	,'pag_factura_razonsocial'=>array(
		'label'=>'Factura Razón Social'
		,'campo'=>array('pag_factura_razonsocial')
		,'tipo'=>'input_text'
	)
	,'pag_factura_direccion'=>array(
		'label'=>'Factura Dirección'
		,'campo'=>array('pag_factura_direccion')
		,'tipo'=>'input_text'
	)
	,'pag_factura_localizacion'=>array(
		'label'=>'Localización'
		,'campo'=>array('pag_factura_departamento','pag_factura_provincia','pag_factura_distrito')
		,'value'=>array('','','')
		,'control'=>'pag_factura_localizacion'
	)
	,'pag_factura_contacto'=>array(
		'label'=>'Contacto'
		,'campo'=>array('pag_factura_contacto')
		,'tipo'=>'input_text'
	)
	,'pag_factura_telefono'=>array(
		'label'=>'Teléfono'
		,'campo'=>array('pag_factura_telefono')
		,'tipo'=>'input_text'
	)
);	



			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>($PAGE['titulo'])?$PAGE['titulo']:"Contacto"
					//,'legend'=>"Infórmenos"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=app&tab=home'					
					//,'action'=>'index.php?modulo=formulario&tab=contacto'
					,'exito'=>'Gracias por su mensaje en breve nos estaremos comunicando con usted.'
					,'error'=>'Ocurrió un error en el proceso de envio'				
					,'submit'=>' type="submit" value="COMPRE" '	
					,'pie'=>'los campos con * son obligatorios'
					,'email_admin'=>array('lima@olvacompras.com')


/*CAMPOS-BEGIN*/
,'tabla'=>'compras'
,'campos'=>array_merge($CAMPOS1,$CAMPOS2,$CAMPOS4)
/*CAMPOS-END*/
					
					,'complete'=>"							

							var json=JSON.decode(ee,true);
							new Element('div', {
								'class': 'mensaje mensaje_'+json.t,
								'html': json.m,
								'id': 'mensaje_'+json.n										
							}).inject(\$(json.n+'_form_body'), 'before');
							\$0(json.n+'_form_body');
							setTimeout(\"\$('mensaje_\"+json.n+\"').destroy(); \$1('\"+json.n+\"_form_body'); \",7000);							
							
					"							
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