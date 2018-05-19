<?php //á
 
			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>'Inscripción'
					,'legend'=>"Si tienes un negocio. Incríbete Gratis."
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=app&tab=home'					
					//,'action'=>'index.php?modulo=formulario&tab=contacto'
					,'exito'=>'Gracias por inscribirse.'
					,'error'=>'Ocurrió un error en el proceso de envio'				
					,'submit'=>' type="submit" value="Inscribir" '	
					,'pie'=>'los campos con * son obligatorios'

/*CAMPOS-BEGIN*/
,'tabla'=>'inscripciones'
,'campos'=>array(
	'nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('nombre')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'ciudad'=>array(
		'label'=>'Ciudad'
		,'campo'=>array('ciudad')
		,'tipo'=>'input_text'
	)
	,'pais'=>array(
		'label'=>'País'
		,'campo'=>array('pais')
		,'tipo'=>'input_text'
	)
	,'email'=>array(
		'label'=>'Email'
		,'campo'=>array('email')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'empresa'=>array(
		'label'=>'Empresa'
		,'campo'=>array('empresa')
		,'tipo'=>'input_text'
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
				$body_administrador.="Desde la web, se han inscrito al formulario de comerciantes con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Incripción al formulario de comerciantes desde '.$PARAMETROS_EMAIL['nombre_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Te has inscrito a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
				$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_cliente.=$body_mensaje;		
				$body_cliente.="</table><br><br>";					
				$body_cliente.="Gracias por tu preferencia<br><br><br>";
				$body_cliente.=$body_firma;
				//email_cliente
				$email_cliente=enviar_email(
								array(
								'emails'=>array($_POST['email'])
								,'Subject'=>"Inscripción a ".$PARAMETROS_EMAIL['nombre_web']
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
									"PARA EL USUARIO"=>$email_cliente['debug'],
									"PARA EL ADMINISTRADOR"=>$email_administrador['debug']
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