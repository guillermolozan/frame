<?php //á
//prin($PARAMS);
include_once("formularios/formularios.php");


			$FORM=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Postula para Proveedor"
					,'legend'=>"Ingrese sus datos"
					,'ajax'=>'1'
					,'method'=>'post'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					//,'url'=>'index.php?modulo=pagina-static&tab=final-registro'
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'El formulario ha sido enviado con éxito.'
					,'error'=>'Error en el envio, por favor vuelva a intentarlo'				
					//,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviar.jpg" '
					,'submit'=>' type="submit" value="Enviar" '											
					//,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					,'pie'=>'Los campos con * son obligatorios'
/*CAMPOS-BEGIN*/
,'tabla'=>'proveedores'
,'campos'=>array(

	'razon_social'=>array(
		'label'=>'Razón Social'
		,'validacion'=>"validate['required']"
	)
	,'ruc'=>array(
		'label'=>'N° de RUC'
		,'validacion'=>"validate['required']"
	)
	,'representante_legal'=>array(
		'label'=>'Nombre del representante legal'
		,'validacion'=>"validate['required']"
	)	
	,'actividad'=>array(
		'label'=>'Actividad de la empresa'
		,'tipo'=>'textarea'		
	)
	,'tipo'=>array(
		'label'=>'Tipo de empresa'
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'MYPE','2'=>'PYME','3'=>'Mediana','4'=>'Grande')		
	)	
	,'rubro'=>array(
		'label'=>'Rubro'
	)
	,'contacto_nombre'=>array(
		'label'=>'Persona de contacto'
	)
	,'servicios'=>array(
		'label'=>'Principales servicios ofrecidos'
	)				
	,'n_trabajadores'=>array(
		'label'=>'Número de Trabajadores'
	)
	,'facturacion_anual'=>array(
		'label'=>'Facturación anual'	
	)
	,'direccion'=>array(
		'label'=>'Dirección'
	)
	,'provincia'=>array(
		'label'=>'Provincia'
	)		
	,'distrito'=>array(
		'label'=>'Distrito'
	)
	,'website'=>array(
		'label'=>'Página Web'
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
	
			$FORM=pre_proceso_form($FORM);
			
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
				
				//data_insert								
				$insertado=campos_insert($FORM,$_POST,array(	
											'fecha_creacion'=>"now()"	
											,'fecha_edicion'=>"now()"	
											,'visibilidad'=>'1'	
											),0);
								
				//body_mensaje				
				$body_mensaje=campos_email($FORM['campos'],$_POST);	
													
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


//prin($FORMULARIO['contacto']);
$FORMULARIO[$PARAMS['conector']]=$FORM;
?>