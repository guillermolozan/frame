<?php

//  REDIRECCIONAR A LOGIN //
if($_GET['redir']!=''){

	$_SESSION['redir_after_login']=$_GET['redir'];
	redireccionar_a($SERVER['BASE'].$COMMON['url_login']);
				
}

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> $COMMON['url_home'],
							'on_false'	=> NULL
							));
/////////////////////

	
	$GEO['departamentos'] = select(
			"id,nombre"
			,"geo_departamentos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'selected'=>''					   
				)
			);

			
$CAMPOS=array(
	'nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('nombre')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'apellidos_paterno'=>array(
		'label'=>'Apellido Paterno'
		,'campo'=>array('apellidos_paterno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'apellidos_materno'=>array(
		'label'=>'Apellido Materno'
		,'campo'=>array('apellidos_materno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'genero'=>array(
		'label'=>'Género'
		,'campo'=>array('genero')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'Hombre','2'=>'Mujer')
	)
	,'dni'=>array(
		'label'=>'Documento de Identidad DNI'
		,'campo'=>array('dni')
		,'tipo'=>'input_text'
	)
	,'fecha_nacimiento'=>array(
		'label'=>'Fecha de nacimiento'
		,'campo'=>array('fecha_nacimiento')
		,'tipo'=>'input_fecha'
		,'rango'=>'-90 years,-17 years'		
//		,'validacion'=>"validate['required']"
	)
	,'direccion'=>array(
		'label'=>'Dirección'
		,'campo'=>array('direccion')
		,'tipo'=>'input_text'
	)
	,'localizacion'=>array(
		'label'=>'Localización'
		,'campo'=>array('departamento','provincia','distrito')
		,'value'=>array('','','')
		,'control'=>'localizacion'
	)
	,'forma_contacto'=>array(
		'label'=>'¿Cómo nos has conocido?'
		,'campo'=>array('forma_contacto')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'periódico','2'=>'revista','3'=>'guía telefónica','4'=>'radio','5'=>'poster','6'=>'web','7'=>'eventos/promociones','8'=>'recomendaciones','9'=>'precio cliente','10'=>'no sabe / otros')
	)
	,'telefono_casa'=>array(
		'label'=>'Teléfono Casa'
		,'campo'=>array('telefono_casa')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'telefono_oficina'=>array(
		'label'=>'Teléfono Oficina'
		,'campo'=>array('telefono_oficina')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'telefono_celular'=>array(
		'label'=>'Celular'
		,'campo'=>array('telefono_celular')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'promociones'=>array(
		'label'=>'¿Recibir Promociones?'
		,'campo'=>array('promociones')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'Si','0'=>'No')
	)
	,'email'=>array(
		'label'=>'E-mail del Cliente'
		,'campo'=>array('email')
		,'before'=>'Información para ingresar a la cuenta'
		,'tipo'=>'input_text'
		,'validacion'=>"validate['email','required']"
		,'check_unique'=>"{t:'usuarios',w:'email',f:'este email ya ha sido registrado'}"
	)
	,'password'=>array(
		'label'=>'Password'
		,'tipo'=>'input_password'
		,'campo'=>array('password')
		,'validacion'=>"validate['required']"							
		,'value'=>array($CARGAR['password'])
	)
	,'check_user_password'=>array(
		'label'=>'Confirmar Password'
		,'tipo'=>'input_password'
		,'campo'=>array('check_user_password')
		,'validacion'=>"validate['required','confirm[password]']"							
		,'value'=>array($CARGAR['check_user_password'])
	)	

);				

//prin($CAMPOS);
					
			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Registro"
					,'legend'=>"Registrese en Olva Compras"					
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']		
					,'url'=>(!empty($_SESSION['redir_after_login']))?$_SESSION['redir_after_login']:''								
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'Su registro ha sido enviado con éxito.'
					,'error'=>'Ocurrió un error en al enviar su registro'		
					,'submit'=>' type="submit" value="Aceptar Condiciones y Registrar" '	
					,'pie'=>'los campos con * son obligatorios'
					,'condiciones'=>select_dato("texto","paginas","where pagina='terminos_y_condiciones'",0)

/*CAMPOS-BEGIN*/
,'tabla'=>'usuarios'
,'campos'=>$CAMPOS
/*CAMPOS-END*/


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
			
		
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
						
				//body_mensaje
				$body_mensaje="";
				foreach($FORM['campos'] as $CAMP){
					foreach($CAMP['campo'] as $CM){
						$data_insert[$CM]=$_POST[$CM];
					}
					switch($CAMP['tipo']){
						case "input_text":	$body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
						case "textarea": case "textarea_hidden": $body_mensaje.="<tr><td colspan=2><b>".$CAMP['label'].":</b></td></tr><tr><td colspan=2>".$_POST[$CAMP['campo']['0']]."</td></tr>"; break;
					}
				}
	////////////body_administrador			
				$body_administrador ="";
				$body_administrador.="Desde la web, se han registrado con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Registro  desde '.$PARAMETROS_EMAIL['url_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Has enviado tu información de registro a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
				$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_cliente.=$body_mensaje;		
				$body_cliente.="</table><br><br>";					
				$body_cliente.="Gracias por registrarse<br><br><br>";
				$body_cliente.=$body_firma;
				//email_cliente
				$email_cliente=enviar_email(
								array(
								'emails'=>array($_POST['email'])
								,'Subject'=>"Registro de ".$PARAMETROS_EMAIL['nombre_web']
								,'body'=>$body_cliente
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);	
				
							
				unset($data_insert['check_user_password']);
				//agregar inserts adicionales			
				$data_insert=array_merge($data_insert,array(	
											'fecha_creacion'=>"now()"	
											,'fecha_edicion'=>"now()"	
											//,'fecha'=>"now()"											
											,'visibilidad'=>'1'	
											));
				//insert
				$insertado=insert(
								$data_insert            
								,$FORM['tabla']
								,0
								);
								
				$_SESSION['login']=select_fila(
				"id,nombre,email"
				,"usuarios"
				,"where id='".$insertado['id']."'"
				,0
				);				
				$_SESSION['login']['status']=1;								
				
				
				crear_email_debug(array(
									"EMAIL QUE SE LE ENVIA AL USUARIO"=>$email_cliente['debug'],
									"EMAIL QUE SE LE ENVIA AL ADMINISTRADOR"=>$email_administrador['debug']
									),"../../debug/emails_".$FORM['nombre'].".html");
								
				if( $email_cliente['todos'] and $email_administrador['todos'] ){
			
					unset($_SESSION['carrito']);
				
					echo json_encode(array(
								't'=>'exito'
								,'u'=>$FORM['url']									
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