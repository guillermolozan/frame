<?php //á

			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>'Cotización'
					,'legend'=>"Déjenos su mensaje"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=app&tab=home'					
					//,'action'=>'index.php?modulo=formulario&tab=contacto'
					,'exito'=>'Gracias por su comentario en breve nos estaremos comunicando con usted.'
					,'error'=>'Ocurrió un error en el proceso de envio'				
					,'submit'=>' type="submit" value="Enviar Mensaje" '	
					,'pie'=>'los campos con * son obligatorios'
/*CAMPOS-BEGIN*/
,'tabla'=>'cotizaciones'
,'campos'=>array(
	'nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('nombre')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'email'=>array(
		'label'=>'Email'
		,'campo'=>array('email')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)	
	,'telefono'=>array(
		'label'=>'Teléfono'
		,'campo'=>array('telefono')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'celular'=>array(
		'label'=>'Celular'
		,'campo'=>array('celular')
		,'tipo'=>'input_text'
	)
	,'n_adultos'=>array(
		'label'=>'Nro de Adultos'
		,'campo'=>array('n_adultos')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8')
		,'value'=>'1'
	)
	,'n_ninos'=>array(
		'label'=>'Nro de Niños'
		,'campo'=>array('n_ninos')
		,'tipo'=>'input_combo'
		,'opciones'=>array('0'=>'0','1'=>'1','2'=>'2','3'=>'3')
		,'value'=>'0'
	)
	,'salida'=>array(
		'label'=>'Fecha de Salida'
		,'campo'=>array('salida')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'retorno'=>array(
		'label'=>'Fecha de Retorno'
		,'campo'=>array('retorno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'incluye_aereo'=>array(
		'label'=>'Incluye Aéreo'
		,'campo'=>array('incluye_aereo')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
	)
	,'incluye_alojamiento'=>array(
		'label'=>'Incluye Alojamiento'
		,'campo'=>array('incluye_alojamiento')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
	)
	,'incluye_tours'=>array(
		'label'=>'Incluye Tours'
		,'campo'=>array('incluye_tours')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'si','0'=>'no')
	)
	,'comentario'=>array(
		'label'=>'Comentario'
		,'campo'=>array('comentario')
		,'tipo'=>'textarea'
		,'validacion'=>"validate['required']"
	)
)
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
				$body_administrador.="Desde la web, han enviado una cotización con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Cotización desde '.$PARAMETROS_EMAIL['url_web']
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
				$body_cliente.="Gracias por enviar tu cotización con nosotros<br><br><br>";
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
			
					if($FORM['ajax']){
					
						echo json_encode(array(
									't'=>'exito'
									,'m'=>$FORM['exito']
									,'n'=>$FORM['nombre']									
									));	
									
					} else {			
					
						$_SESSION[$FORM['nombre'].'_mensaje']=$FORM['exito'];
						$_SESSION[$FORM['nombre'].'_tipo_mensaje']='exito';				
						redir($SERVER['BASE'].procesar_url($FORM['action']));								
						
					}
								
				} else {
	
					if($FORM['ajax']){
					
						echo json_encode(array(
									't'=>'error'
									,'m'=>$FORM['error']
									,'n'=>$FORM['nombre']
									));	
									
					} else {			
					
						$_SESSION[$FORM['nombre'].'_mensaje']=$FORM['error'];
						$_SESSION[$FORM['nombre'].'_tipo_mensaje']='error';				
						redir($SERVER['BASE'].procesar_url($FORM['action']));								
						
					}						
				
				}
	
	
			} else {
			
			$HEAD['titulo'] = ucfirst($FORM['nombre'])." | ".$COMMON['datos_root']['titulo_web']; 			
			$HEAD['meta_keywords'] .= procesar_keywords($COMMON['datos_root']['titulo_web']);			 
			$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);	
			
			}			




?>