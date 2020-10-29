<?php

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> NULL,
							'on_false'	=> $_SERVER['REQUEST_URI']
							));
							
/////////////////////

include_once("formularios/formularios.php");
	
	
	$GEO['departamentos'] = select(
			"id,nombre"
			,"geo_departamentos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'selected'=>''					   
				)
			);

		
$CAMPOS2A=array(	
	'envgen_nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('envgen_nombre')
		,'tipo'=>'input_text'
		,'before'=>'Datos del lugar de envío y persona que recibirá los productos'
		,'validacion'=>"validate['required']"
	)
	,'envgen_apellido_paterno'=>array(
		'label'=>'Apellido Paterno'
		,'campo'=>array('envgen_apellido_paterno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'envgen_apellido_materno'=>array(
		'label'=>'Apellido Materno'
		,'campo'=>array('envgen_apellido_materno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
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
		,'validacion'=>"validate['required']"
		,'rango'=>'now,+1 year'
	)
	,'envgen_intervalo_entrega'=>array(
		'label'=>'Intervalo de entrega'
		,'campo'=>array('envgen_intervalo_entrega')
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'Entre 7am y 10:30am','2'=>'Entre 9am y 11:30am','3'=>'Entre 8am y 12:30am','4'=>'Entre 2pm y 5:30pm','5'=>'Entre 6:00pm y 8pm','6'=>'Entre 6:00am y 8am (Horario Especial)')
	)
	,'envgen_si_empresa'=>array(
		'label'=>'Si el lugar de entrega es una EMPRESA indicar el área y anexo de la persona agasajada.'
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

//prin($_SESSION);	

$CAMPOS5=array(	
	'id_usuario'=>array(
		'label'=>'Usuario'
		,'campo'=>array('id_usuario')
		,'tipo'=>'input_text'
		,'value'=>array($_SESSION['login']['id'])
	),
	'pedido'=>array(
		'label'=>'Pedido'
		,'campo'=>array('pedido')
		,'tipo'=>'textarea_hidden'
		,'value'=>array(render_pedido($_SESSION['carrito']))
	)
);

$CAMPOS=array_merge($CAMPOS2A,$CAMPOS5);

//prin($CAMPOS);
					
			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Pedido"
					//,'legend'=>"Datos de Envio de Pedido"					
					,'legend'=>"Información necesaria para el envio"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']					
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'Su pedido nos ha sido enviado.'
					,'error'=>'Ocurrió un error en al enviar su pedido'		
					,'submit'=>' type="submit" value="Enviar Pedido" '	
					,'pie'=>'los campos con * son obligatorios'

/*CAMPOS-BEGIN*/
,'tabla'=>'pedidos'
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
							setTimeout(\"\$('mensaje_\"+json.n+\"').destroy(); window.location.reload(true); \",7000);							
							
					"			
	
			);
			
			
			//$FORM=pre_proceso_form($FORM);
			
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
				$body_administrador.="Desde la web, han enviado un pedido con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Pedido desde '.$PARAMETROS_EMAIL['url_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Has enviado un pedido a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
				$body_cliente.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_cliente.=$body_mensaje;		
				$body_cliente.="</table><br><br>";					
				$body_cliente.="Gracias por enviar su pedido<br><br><br>";
				$body_cliente.=$body_firma;
				//email_cliente
				$email_cliente=enviar_email(
								array(
								'emails'=>array($_POST['reg_email'])
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
				
				if( $email_cliente['todos'] and $email_administrador['todos'] and $insertado['success'] ){
								
					unset($_SESSION['carrito']);
				
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