<?php
include_once("formularios/formularios.php");
							


		
$CAMPOS_0=array(	
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
	,'tipo_servicio'=>array(
		'label'=>'Seleccione un tipo de servicio'
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'Envios/Distribución','2'=>'Gestión/Trámites','3'=>'Outsourcing')
	)

);
	
$CAMPOS_1=array(	
	'envio_servicio'=>array(
		'label'=>'Servicio',
		'before_inner'=>'Envío / distribución',				
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'servicio envios permanentes',
			'2'=>'servicio envio única vez',
			'3'=>'servicio de distribución única vez',
			'4'=>'servicio de distribución permanente',
			'5'=>'otros',
			'6'=>'servicios varios'
		),		
		//,'validacion'=>"validate['required']"
		'iniciodiv'=>'sub_form_1',
	),
	'que_enviar'=>array(
		'label'=>'¿Qué desea enviar?',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'envío de sobres',
			'2'=>'envío de paquetes',
			'3'=>'envío de sobres y paquetes',
			'4'=>'mercadería',
			'5'=>'sobre+paquetes+mercadería',
			'6'=>'otros'
		),	
	),
	'envio_valor'=>array(
		'label'=>'¿el valor de contenido se encuentre entre?',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'S/1 a S/300',
			'2'=>'S/300 a S/600',
			'3'=>'S/600 a S/1,000',
			'4'=>'S/1,000 a S/2,000',
			'5'=>'S/2,000 a S/3,000',
			'6'=>'S/3,000 a S/5,000',			
			'7'=>'S/5,000 a S/10,000',			
			'8'=>'S/2,000 a más',
		),	
	),
	'envio_frecuencia'=>array(
		'label'=>'Frecuencia de envío',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'un vez a la semana',
			'2'=>'2 veces a la semana',
			'3'=>'3 veces a la semana',
			'4'=>'díario',
			'5'=>'única vez',
			'6'=>'esporádico'
		),	
	),	
	'envio_catidad'=>array(
		'label'=>'Cantidad de envíos mensuales',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'1-100',
			'2'=>'101-500',
			'3'=>'501-1000',
			'4'=>'1001-a más',
			'5'=>'única vez',
		),	
	),
	'tiempo_entrega'=>array(
		'label'=>'¿Cúal es el tiempo de entrega que desea para su envío?',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'menos de 24 horas',
			'2'=>'24hrs',
			'3'=>'48hrs',
			'4'=>'72hrs',
			'5'=>'lo que demores el servicio',
			'6'=>'varios tiempos según cada servicio',			
		),
	),	
	'servicios_complementarios'=>array(
		'label'=>'¿Desea servicios complementarios?',
		'tipo'=>'input_multi_simple',
		'opciones'=>array(
			'etiquetado',
			'embolsado',
			'ensombrado',
			'compaginado',
			'picking',
			'packing',	
			'impresión',
			'contac center',
			'embalaje en madera',						
			'embalaje',									
		),
		'findiv'=>'1',			
	),				

);

$CAMPOS_2=array(	
	'servicio_requerido'=>array(
		'label'=>'Servicio Requerido',
		'before_inner'=>'Gestión / trámites',						
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'verificación laboral',
			'2'=>'verificación domiciliaria',
			'3'=>'recojo y entrega de cheques',
			'4'=>'recojo y entrega de letras',
			'5'=>'recojo y entrega de facturas',
			'7'=>'partida de bautizo',
			'8'=>'partida de confirmación',
			'9'=>'partida de matrimonio',
			'10'=>'partida de naciomiento',
			'11'=>'partida de defunción',
			'12'=>'copia de minuta',
			'13'=>'cartas notaría',	
			'14'=>'compra de bases para licitaciones',
			'15'=>'representación en concurso público',
			'16'=>'representación en adjudicaciones directas',
			'17'=>'recojo de muestras',
			'18'=>'recojo de comprobantes de retención',
			'19'=>'certificado de estudios',	
			'20'=>'compra de formato de título',
			'21'=>'títulos de propiedad',
			'22'=>'título vehícular',
			'23'=>'duplicado de tarjeta de propiedad',						
		),		
		//,'validacion'=>"validate['required']"
		'iniciodiv'=>'sub_form_2',
	),
	'tramites_frecuencia'=>array(
		'label'=>'Frecuencia',
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'única vez',
			'2'=>'frecuentemente',
		),	
	),
	'tramite_direccion'=>array(
		'label'=>'Dirección donde ser realiza el servicio',
	),
	'tramite_provincia'=>array(
		'label'=>'Provincia',
	),	
	'tramite_fecha'=>array(
		'label'=>'Fecha requerida para la gestión',
		'tipo'=>'input_fecha',
		'rango_anio'=>(date('n')>10)?'now,+1 year':'now,now',		
	),
	'tramite_observaciones'=>array(
		'label'=>'Observaciones',
		'tipo'=>'textarea',		
		'findiv'=>'1',			
	),	

);


$CAMPOS_3=array(	
	'outsourcing_mortizados'=>array(
		'label'=>'Mortizados',
		'before_inner'=>'Outsourcing',		
		'iniciodiv'=>'sub_form_3',
	),
	'outsourcing_mensajero_interno'=>array(
		'label'=>'Mensajero Interno',
	),
	'outsourcing_mensajero_externo'=>array(
		'label'=>'Mensajero externo',		
	),
	'outsourcing_coordinador'=>array(
		'label'=>'Coordinador de mesa de partes',
	),			
	'oursourcing_tiempo'=>array(
		'label'=>'Tiempo del requerimiento',		
		'tipo'=>'input_combo',
		'opciones'=>array(
			'1'=>'6 meses',
			'2'=>'1 año',
			'3'=>'2 años',					
		),		
		//,'validacion'=>"validate['required']"
	),
	'outsourcing_observaciones'=>array(
		'label'=>'Observaciones',
		'tipo'=>'textarea',		
		'findiv'=>'1',			
	),	
);	


		$CAMPOS=array_merge($CAMPOS_0,$CAMPOS_1,$CAMPOS_2,$CAMPOS_3);		

//prin($CAMPOS);
					
			$FORM=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Cotizaciones"
					//,'legend'=>"Datos de Envio de Pedido"					
					,'legend'=>"Cotizaciones para empreas o grandes envios"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']					
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'Su cotización nos ha sido enviado con éxito.'
					,'error'=>'Ocurrió un error en al enviar su cotización'		
					,'submit'=>' type="submit" value="Enviar Cotización" '	
					,'pie'=>'los campos con * son obligatorios'

/*CAMPOS-BEGIN*/
,'tabla'=>'cotizaciones'
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