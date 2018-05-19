<?php //á
//prin($PARAMS);
include_once("formularios/formularios.php");


	$FORM=array(
			'nombre'=>$PARAMS['conector']
			,'titulo'=>"Consultas"
			,'legend'=>"Déjanos tu Consulta"
			,'ajax'=>'1'
			,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
			//,'url'=>'index.php?modulo=app&tab=home'					
			//,'action'=>'index.php?modulo=formulario&tab=contacto'
			,'exito'=>'Gracias por su consulta en breve nos estaremos comunicando con usted.'
			,'error'=>'Ocurrió un error en el proceso de envio'				
			,'submit'=>' type="submit" value="Enviar Consulta" '	
			,'pie'=>'los campos con * son obligatorios'
,'tabla'=>'consultas_items'

			/*CAMPOS-BEGIN*/
										
,'campos'=>array(
	'nombre'=>array(
		'label'=>'Nombre'
		,'validacion'=>"validate['required']"
	)	
	,'dni'=>array(
		'label'=>'DNI'
		,'validacion'=>"validate['required']"
		,'style'=>'width:60px;'
	)	
	,'genero'=>array(
		'label'=>'Género'
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'Masculino','2'=>'Femenino')
		,'next'=>1
	)
	,'telefonos'=>array(
		'label'=>'Teléfonos'
		,'validacion'=>"validate['phone']"
	)
	,'email'=>array(
		'label'=>'E-mail'
		,'validacion'=>"validate['required','email']"
	)
	,'condicion'=>array(
		'label'=>'Condición'
		,'tipo'=>'input_combo'
		,'opciones'=>array('T'=>'Trabajador','E'=>'Ex Trabajador')	
	),
	'empresa'=>array(
		'label'=>'Empresa'
		,'validacion'=>"validate['required']"
	),
	'trabajo_anios'=>array(
		'label'=>'Servicio Años',
		'style'=>'width:30px;'
	),
	'trabajo_meses'=>array(
		'label'=>'Meses',
		'next'=>'1',
		'style'=>'width:30px;'
	),
	'relacion'=>array(
		'label'=>'Relación',
		'tipo'=>'input_combo',
		'opciones'		=>array(
				'AFINOAP'		=> 'Afiliado No Aportante',
				'NOAFILI'		=> 'No Afiliado',
				'AFIAPOR'		=> 'Afiliado Aportante'
		),		
	),		
	'dirigente'=>array(
		'label'=>'Es dirigente',		
		'tipo'=>'check'
	),
	'id_razon_social'=>array(
		'label'=>'Organismo Sindical'
		,'tipo'=>'combo'
		,'opciones'=>opciones("id,nombre","razones_sociales","where visibilidad=1")	
	),
	'sindical'=>array(
		'label'=>'Sindicalizado',		
		'tipo'=>'check'
	),
	'id_sector'=>array(
		'label'=>'Sector'
		,'tipo'=>'combo'
		,'opciones'=>opciones("id,nombre","sectores","")
	),	
	'id_sector_prod'=>array(
		'label'=>'Sector de Producción'
		,'tipo'=>'combo'
		,'opciones'=>opciones("id,nombre","sector_prod","")	
	),	
	'tipo'=>array(
		'label'=>'Tipo de Consulta'
		,'tipo'=>'combo'
		,'opciones'=>opciones("id,nombre","tip_consultas","")	
	),	
	'texto'=>array(
		'label'=>'Consulta'
		,'tipo'=>'textarea'
		,'validacion'=>"validate['required'] autoinput"
		,'style'=>'height:160px;'
		//,'value'=>array('')
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
				$body_administrador.="Desde la web, han enviado una consulta con los siguientes datos:<br><br>";
				$body_administrador.="<table style='font:inherit;' cellspacing=0 cellpadding=0 border=0><tr><td style='width:120px;'></td><td></td></tr>";
				$body_administrador.=$body_mensaje;		
				$body_administrador.="</table><br><br><br>";			
				//email_administrador
				$email_administrador=enviar_email(
								array(
								'emails'=>$PARAMETROS_EMAIL['emailsAdmin']
								,'Subject'=>'Consulta desde '.$PARAMETROS_EMAIL['url_web']
								,'body'=>$body_administrador
								//,'From'=>'info@afarmach.com'
								//,'FromName'=>'Afarmach'							
								//,'Logo'=>''
								)
							);
	////////////body_cliente
				$body_cliente ="";		
				$body_cliente.="<br>Hola ".$_POST['nombre']."<br><br>";
				$body_cliente.="Has enviado una consulta a ".$PARAMETROS_EMAIL['nombre_web']." con los siguienes datos:<br><br><br>";
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
											,'fecha_consulta'=>"now()"											
											,'visibilidad'=>'1'	
											));
				//insert
				unset($data_insert['texto']);
				$insertado=insert(
								$data_insert            
								,$FORM['tabla']
								,0
								);
				
				$insertado2=insert(
								array(
								'fecha_creacion'=>"now()"	
								,'fecha_edicion'=>"now()"	
								,'fecha_opinion'=>"now()"											
								,'fecha_derivado'=>"now()"											
								,'fecha_atencion'=>"now()"											
								,'visibilidad'=>'1'									
								,'id_abogado'=>'5'									
								,'id_item'=>$insertado['id']									
								,'texto'=>$_POST['texto']									
								)           
								,'consultas_seguimientos'
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

$FORM['panel']='CONSULTAS_ITEMS';

$FORMULARIO[$PARAMS['conector']]=$FORM;

?>