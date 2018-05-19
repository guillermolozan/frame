<?php //á




			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>'recomendar'
					,'legend'=>"Recomienda a un amigo"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab=recomendar'
//					,'url'=>'index.php?modulo=app&tab=home'
					,'exito'=>'Su recomendación ha sido enviada con éxito'
					,'error'=>'Ocurrió un error en al enviar su recomendación'				
//					,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_login.jpg" '
					,'submit'=>' type="submit" value="Recomendar kkiery" '
//					,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					,'pie'=>'los campos con * son obligatorios'
					,'campos'=>array(
												
						array(
							'label'=>'Nombre de tu Amigo'
							,'campo'=>array('nombre_amigo')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required']"					
						)						
						,array(
							'label'=>'Email de tu Amigo'
							,'campo'=>array('email_amigo')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required','email']"					
						)
						,array(
							'label'=>'Tu Nombre'
							,'campo'=>array('nombre_usuario')
							,'tipo'=>'input_text'
							,'validacion'=>""					
						)						
						,array(
							'label'=>'Tu Email'
							,'campo'=>array('email_usuario')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['email']"					
						)
						
						,array(
							'label'=>'Título de la página'
							,'campo'=>array('nombre_pagina')
							,'tipo'=>'input_hidden'
							,'validacion'=>""					
							,'value'=>array($HEAD['titulo'])
						)	
						,array(
							'label'=>'Dirección de la página'
							,'campo'=>array('url_pagina')
							,'tipo'=>'input_hidden'
							,'validacion'=>""					
							,'value'=>array($SERVER['BASE'].$SERVER['url'])
						)								
						
					)			
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
					case "input_text": case "input_hidden": $body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
					case "textarea": $body_mensaje.="<tr><td colspan=2><b>".$CAMP['label'].":</b></td></tr><tr><td colspan=2>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
				}
			}
////////////body_administrador			
			$body_administrador ="";
			$body_administrador.="<br>Desde la página <b>".$_POST['url_pagina']."</b>, han enviado una recomendación con los siguientes datos:<br><br>";
			$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
			$body_administrador.=$body_mensaje;		
			$body_administrador.="</table><br><br>";			
			//email_administrador
			$email_administrador=enviar_email(
							array(
							'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
							,'Subject'=>'Han enviado una Recomendación desde '.$PARAMETROS_EMAIL['url_web']
							,'body'=>$body_administrador
							//,'From'=>'info@afarmach.com'
							//,'FromName'=>'Afarmach'							
							//,'Logo'=>''
							)
						);
////////////body_cliente
			$body_cliente ="";		
			$body_cliente.="<br>Hola <b>".$_POST['nombre_usuario']."</b><br>";
			$body_cliente.="<br>Desde la página <b>".$_POST['url_pagina']."</b>, has enviado una recomendación para <b>".$_POST['nombre_amigo']."</b> con los siguientes datos:<br><br>";
			$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
			$body_cliente.=$body_mensaje;		
			$body_cliente.="</table><br><br>";
			$body_cliente.="Gracias por recomendar ".$PARAMETROS_EMAIL['nombre_web'].".<br><br><br>";
			$body_cliente.=$body_firma;
			//email_cliente
			$email_cliente=enviar_email(
							array(
							'emails'=>array($_POST['email_usuario'])
							,'Subject'=>'Has enviado una Recomendación desde '.$PARAMETROS_EMAIL['url_web']
							,'body'=>$body_cliente
							//,'From'=>'info@afarmach.com'
							//,'FromName'=>'Afarmach'							
							//,'Logo'=>''
							)
						);							
////////////body_amigo
			$body_amigo ="";		
			$body_amigo.="<br>Hola ".$_POST['nombre_amigo']."<br><br>";
			$body_amigo.="<b>".(($_POST['nombre_usuario'])?$_POST['nombre_usuario']:"Un Amigo")."</b> te recomienda visitar esta página <a href='".$_POST['url_pagina']."'>".$_POST['nombre_pagina']."</a><br><br><br>";
			$body_amigo.="Gracias.<br><br><br>";
			$body_amigo.=$body_firma;
			//email_cliente
			$email_amigo=enviar_email(
							array(
							'emails'=>array($_POST['email_amigo'])
							,'Subject'=>($_POST['nombre_usuario'])?$_POST['nombre_usuario']." te recomienda":"Un Amigo te recomienda visitar : ".$_POST['titulo']
							,'body'=>$body_amigo
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
							,$FORM['nombre']
							,0
							);
			
			crear_email_debug(array(
									"EMAIL QUE SE LE ENVIA AL USUARIO"=>$email_cliente['debug'],
									"EMAIL QUE SE LE ENVIA AL AMIGO"=>$email_amigo['debug'],
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

			
		}				

?>