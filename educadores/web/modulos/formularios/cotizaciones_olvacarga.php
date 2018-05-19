<?php
include_once("formularios/formularios.php");

$CAMPOS=array(	
	'nombre'=>array(
		'label'=>'Nombre o Razón Social',
		'validacion'=>"validate['required']",
	)
	,'ruc'=>array(
		'label'=>'N° RUC',
		'after'=>'Sólo en caso de ser empresa',
	)
	,'contacto_nombre'=>array(
		'label'=>'Persona de Contacto',
		'after'=>'Datos del lugar de envío y persona que recibirá los productos',
	)	
	,'contacto_cargo'=>array(
		'label'=>'Cargo',
	)
	,'telefono'=>array(
		'label'=>'Teléfono',
		'validacion'=>"validate['phone']",		
	)
	,'celular'=>array(
		'label'=>'Celular',
		'validacion'=>"validate['phone']",		
	)	
	,'email'=>array(
		'label'=>'Correo Electrónico',
		'validacion'=>"validate['required','email']",		
	)
	
	
	,'carga_dimensiones'=>array(
		'before'=>'Datos de la carga a enviar',
		'label'=>'Dimensiones',
	)
	,'carga_peso'=>array(
		'label'=>'Peso',
	)	
	,'carga_bultos'=>array(
		'label'=>'Cantidad de Bultos',
	)		
	,'carga_valor'=>array(
		'label'=>'Valor de contenido',
	)		
	,'tiempo_entrega'=>array(
		'label'=>'Tiempo de entrega(días)',
	)
	,'direccion_recojo'=>array(
		'label'=>'Dirección de recojo',
	)	
	,'requiere_cuadrilla'=>array(
		'label'=>'Requiere cuadrilla',
		'tipo'=>'check',
	)	
	,'requiere_resguardo'=>array(
		'label'=>'Requiere Resguardo',
		'tipo'=>'check',
	)	
	,'requiere_montacarga'=>array(
		'label'=>'Requiere Montacarga',
		'tipo'=>'check',
	)			
	,'observaciones'=>array(
		'label'=>'Observaciones',
		'tipo'=>'textarea',
	)				

);

//prin($CAMPOS);
					
			$FORM=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Cotizaciones"
					//,'legend'=>"Datos de Envio de Pedido"					
					,'legend'=>"Cotizaciones para empresas o grandes envios"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']					
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'Su cotización nos ha sido enviado con éxito.'
					,'error'=>'Ocurrió un error en al enviar su cotización'		
					,'submit'=>' type="submit" value="Enviar Cotización" '	
					,'pie'=>'los campos con * son obligatorios'

/*CAMPOS-BEGIN*/
,'tabla'=>'cotizaciones_carga'
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


//prin($FORMULARIO['contacto']);
$FORMULARIO[$PARAMS['conector']]=$FORM;
?>