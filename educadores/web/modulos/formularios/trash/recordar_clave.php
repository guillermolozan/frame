<?php //á

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> $COMMON['url_home'],
							'on_false'	=> NULL
							));
/////////////////////


			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Olvidó su contraseña"					
					,'legend'=>"Ingrese su email, y su contraseña será enviada a su correo"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>$COMMON['url_login']
					,'exito'=>'Su contraseña ha sido enviada al email <b>'.$_POST['email'].'</b>'
					,'error'=>'El email <b>'.$_POST['email'].'</b> aún no ha sido registrado en nuestro sistema.'				
					//,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_login.jpg" '
					,'submit'=>' type="submit" value="Enviar" '						
					//,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					//,'pie'=>'Si usted es nuevo <a href="'.$COMMON['url_registro'].'" >Regístrese</a><br>Si olvidó su contraseña <a href="'.$COMMON['url_olvido_clave'].'">haga clic aquí</a>'
					,'campos'=>array(
						array(
							'label'=>'EMAIL'
							,'campo'=>array('email')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required','email']"
							)						
						/*
						,array(
							'label'=>'No cerrar sesión'
							,'campo'=>array('mantener_sesion')
							,'tipo'=>'input_check'
						)
						*/
						
					)

					,'complete'=>"							

							var json=JSON.decode(ee,true);
							new Element('div', {
								'class': 'mensaje mensaje_'+json.t,
								'html': json.m,
								'id': 'mensaje_'+json.n										
							}).inject(\$(json.n+'_form_body'), 'before');
							\$0(json.n+'_form_body');
							setTimeout(\"\$('mensaje_\"+json.n+\"').destroy(); if('\"+json.t+\"'=='error'){\$1('\"+json.n+\"_form_body');}else{if('\"+json.u+\"'!=''){	location.href='\"+json.u+\"'; } else { location.reload(); } } \",10000);							
							
					"											
			);
//			prin($COMMON);			
			if($_SERVER['REQUEST_METHOD']=='POST'){
						
				$return = select_dato(
						"id"
						,"usuarios"
						,"where email=\"".$_POST['email']."\"  and  visibilidad='1' "
						,0
						);
						
				$datos = select_fila(
						"nombre,password"
						,"usuarios"
						,"where email=\"".$_POST['email']."\"  and  visibilidad='1' "
						,0
						);						
						
				$verificado=($return=='')?false:true;
				
				if($verificado){
										
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$datos['nombre']."<br><br>";
				$body_cliente.="Tu Clave de usuario de ".$COMMON['datos_root']['titulo_web']." es <b>".$datos['password']."</b><br><br><br>";				
				$body_cliente.=$body_firma;
				//email_cliente
				$email_cliente=enviar_email(
								array(
								'emails'=>array($_POST['email'])
								,'Subject'=>"Recordatorio de Clave"
								,'body'=>$body_cliente
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);					
				
				crear_email_debug(array(
									"EMAIL QUE SE LE ENVIA AL USUARIO"=>$email_cliente['debug']
									),"../../debug/emails_".$FORM['nombre'].".html");				
					
					echo json_encode(array(
								't'=>'exito'
								,'u'=>$FORM['url']
								,'m'=>$FORM['exito']
								,'n'=>$FORM['nombre']
								));	
											
				} else {
				
					unset($_SESSION['login']);
					echo json_encode(array(
								't'=>'error'
								,'m'=>$FORM['error']
								,'n'=>$FORM['nombre']
								));						
				
				}
				
	
	
			} 

?>