<?php

// VERIFICAR LOGIN //
web_verificar_sesion(array(
							'on_true'	=> NULL,
							'on_false'	=> $COMMON['url_home']
							));
/////////////////////
	


			
$CAMPOS=array(
	'nombre'=>array(
		'label'=>'Nombre'
		,'campo'=>array('nombre')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'apellidos_paterno'=>array(
		'label'=>'Apellidos Paterno'
		,'campo'=>array('apellidos_paterno')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'apellidos_materno'=>array(
		'label'=>'Apellidos Materno'
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
		,'tipo'=>'input_text'
		,'validacion'=>"validate['email','required']"
	)


);				


					
			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Editar Datos"
					,'legend'=>""					
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']		
					,'url'=>(!empty($_SESSION['redir_after_login']))?$_SESSION['redir_after_login']:''								
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>'Su Datos han sido guardados exitosamente.'
					,'error'=>'Ocurrió un error en al enviar su registro'		
					,'submit'=>' type="submit" value="Enviar" '	
					,'pie'=>'los campos con * son obligatorios'

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

			//
			foreach($FORM['campos'] as $CAMP){
				foreach($CAMP['campo'] as $CM){
					$Campos[]=$CM;
				}
			}
			
			$CARGA = select_fila(
					$Campos
					,$FORM['tabla']
					,"where id=\"".$_SESSION['login']['id']."\" "
					,0
					);
			
			foreach($FORM['campos'] as $CAMP){
				foreach($CAMP['campo'] as $CM){
					$FORMULARIO[$PARAMS['conector']]['campos'][$CM]['value'][]=$CARGA[$CM];
				}
			}

			$GEO['departamentos'] = select(
					"id,nombre"
					,"geo_departamentos"
					,"where 1 and  visibilidad='1' order by id asc limit 0,100"
					,0
					,array(
						'selected'=>array('match'=>array(
													'a'=>'{id}'
													,'b'=>$CARGA['departamento']
													,'equal'=>'selected'
													,'else'=>''
													)
									   )				
						)
					);
					
			if($CARGA['departamento']!=''){							
			$GEO['provincias'] = select(
					"id,nombre"
					,"geo_provincias"
					,"where id_departamento='".$CARGA['departamento']."' and  visibilidad='1' order by id asc limit 0,100"
					,0
					,array(
						'selected'=>array('match'=>array(
													'a'=>'{id}'
													,'b'=>$CARGA['provincia']
													,'equal'=>'selected'
													,'else'=>''
													)
									   )				
						)
					);	
			}
					
			if($CARGA['provincia']!=''){							
			$GEO['distritos'] = select(
					"id,nombre"
					,"geo_distritos"
					,"where id_provincia='".$CARGA['provincia']."' and  visibilidad='1' order by id asc limit 0,100"
					,0
					,array(
						'selected'=>array('match'=>array(
													'a'=>'{id}'
													,'b'=>$CARGA['distrito']
													,'equal'=>'selected'
													,'else'=>''
													)
									   )				
						)
					);				
			}
			
			//prin($GEO);
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
												
				foreach($Campos as $CM){
						$data[$CM]=$_POST[$CM];
				}
				unset($data['check_user_password']);	
									
				$update = update(
						$data
						,$FORM['tabla']
						,"where id=\"".$_SESSION['login']['id']."\" "
						,0
						);
										
				if($update){
					
						echo json_encode(array(
									't'=>'exito'
									,'m'=>$FORM['exito']
									,'u'=>$FORM['url']
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