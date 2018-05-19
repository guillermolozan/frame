<?php //á

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> NULL,
							'on_false'	=> $_SERVER['REQUEST_URI']
							));

	$PAGE=$PAGES[$PARAMS['conector']]=web_render_page($PARAMS['this']);

//1
$CAMPOS1 = array(
	'fecha_compra'=>array(
		'label'=>'Fecha'
		,'campo'=>array('fecha_compra')
		,'tipo'=>'input_fecha'
		,'validacion'=>"validate['required']"
		,'rango'=>'now,+1 year'
	)
	,'direccion_web'=>array(
		'label'=>'Dirección Web'
		,'campo'=>array('direccion_web')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'producto'=>array(
		'label'=>'Descripción del producto'
		,'campo'=>array('producto')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)	
	,'precio'=>array(
		'label'=>'Precio'
		,'campo'=>array('precio')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'peso'=>array(
		'label'=>'Peso aproximado'
		,'campo'=>array('peso')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)			
	,'dimensiones'=>array(
		'label'=>'Dimensiones'
		,'campo'=>array('dim_ancho','dim_largo','dim_altura')
		,'value'=>array('','','')
		,'control'=>'dimensiones'
	)	
	,'id_usuario'=>array(
		'label'=>'Usuario'
		,'campo'=>array('id_usuario')
		,'tipo'=>'input_hidden'
		,'value'=>array($_SESSION['login']['id'])
	)		
);

		
			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>($PAGE['titulo'])?$PAGE['titulo']:"Contacto"
					,'legend'=>"Déjanos tu Mensaje"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=app&tab=home'					
					//,'action'=>'index.php?modulo=formulario&tab=contacto'
					,'exito'=>'Gracias por enviar su pedido en breve nos estaremos comunicando con usted.'
					,'error'=>'Ocurrió un error en el proceso de envío'				
					,'submit'=>' type="submit" value="Aceptar" '	
					,'pie'=>'los campos con * son obligatorios'
					/*CAMPOS-BEGIN*/
										
,'tabla'=>'compramosporti'
,'campos'=>$CAMPOS1

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
				$body_administrador.="Desde la web, han enviado un mensaje de contacto con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Contacto desde '.$PARAMETROS_EMAIL['url_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Has enviado un mensaje a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
				$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_cliente.=$body_mensaje;		
				$body_cliente.="</table><br><br>";					
				$body_cliente.="Gracias por contactarte con nosotros<br><br><br>";
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