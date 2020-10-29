<?php //á

			$FORM=$FORMULARIO[$PARAMS['conector']]=array(
					'nombre'=>$PARAMS['conector']
					,'titulo'=>"Registrarse"
					,'legend'=>"Ingrese sus datos"
					,'ajax'=>'1'
					,'method'=>'post'
					,'action'=>'ajax.php?mode=form&tab='.$PARAMS['this'].'&name='.$PARAMS['conector']
					,'url'=>'index.php?modulo=pagina-static&tab=final-registro'
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>''
					,'error'=>'Error en el envio, por favor vuelva a intentarlo'				
					//,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviar.jpg" '
					,'submit'=>' type="submit" value="Enviar" '											
					//,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '					
					,'pie'=>'Los campos con * son obligatorios'
/*CAMPOS-BEGIN*/
,'tabla'=>'usuarios'
,'campos'=>array(
	'fecha'=>array(
		'label'=>'Fecha'
		,'campo'=>array('fecha')
		,'tipo'=>'input_fecha'
		,'validacion'=>"validate['required']"
	)
	,'apellidos'=>array(
		'label'=>'Apellidos'
		,'campo'=>array('apellidos')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'nombre'=>array(
		'label'=>'Nombres'
		,'campo'=>array('nombre')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'fecha_nacimiento'=>array(
		'label'=>'Fecha de nacimiento'
		,'campo'=>array('fecha_nacimiento')
		,'tipo'=>'input_fecha'
		,'validacion'=>"validate['required']"
	)
	,'genero'=>array(
		'label'=>'Sexo'
		,'campo'=>array('genero')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'masculino','2'=>'femenino')
	)
	,'direccion'=>array(
		'label'=>'Dirección'
		,'campo'=>array('direccion')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'email'=>array(
		'label'=>'Email'
		,'campo'=>array('email')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['required']"
	)
	,'telefono_fijo'=>array(
		'label'=>'Teléfono Fijo'
		,'campo'=>array('telefono_fijo')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'telefono_movil'=>array(
		'label'=>'Celular'
		,'campo'=>array('telefono_movil')
		,'tipo'=>'input_text'
		,'validacion'=>"validate['phone']"
	)
	,'estado_civil'=>array(
		'label'=>'Estado Civil'
		,'campo'=>array('estado_civil')
		,'tipo'=>'input_radio'
		,'opciones'=>array('1'=>'masculino','2'=>'femenino','1'=>'Soltero','2'=>'Casado','3'=>'Viudo','4'=>'Divorciado')
	)
	,'grado_instruccion'=>array(
		'label'=>'Grado de Instrucción o Profesión'
		,'campo'=>array('grado_instruccion')
		,'tipo'=>'textarea'
	)
	,'centros_estudios'=>array(
		'label'=>'Centros de Estudio'
		,'campo'=>array('centros_estudios')
		,'tipo'=>'textarea'
	)
	,'software_domina'=>array(
		'label'=>'Software que Domina'
		,'campo'=>array('software_domina')
		,'tipo'=>'textarea'
	)
	,'experiencia_laboral'=>array(
		'label'=>'Experiencia Laboral'
		,'campo'=>array('experiencia_laboral')
		,'tipo'=>'textarea'
	)
)
/*CAMPOS-END*/




				,'complete'=>"
						var json=JSON.decode(ee,true);
						if(json.t=='error'){
						new Element('div', {
							'class': 'mensaje mensaje_'+json.t,
							'html': json.m,
							'id': 'mensaje_'+json.n										
						}).inject($(json.n+'_form_body'), 'before');
						$0(json.n+'_form_body');
						} else if(json.t=='exito'){
							location.href=json.u;
						}
			"
			);
	
	
	
			if($_SERVER['REQUEST_METHOD']=='POST'){

			$insertado=insert(array(	
			'fecha_creacion'=>"now()"	
			,'fecha_edicion'=>"now()"	
			
			,'tipo_anunciante'=>$_POST['tipo_anunciante']	
			,'nombre'=>$_POST['nombre']	
			,'apellidos'=>$_POST['apellidos']	
			,'nombre_empresa'=>$_POST['nombre_empresa']
			,'genero'=>$_POST['genero']	
			,'fecha_nacimiento'=>$_POST['fecha_nacimiento']
			,'email'=>$_POST['email']	
			
			,'password'=>$_POST['password']	
			,'website'=>$_POST['website']
			,'telefono_fijo'=>$_POST['telefono_fijo']	
			,'telefono_movil'=>$_POST['telefono_movil']	

			,'pais'=>$_POST['pais']	
			,'departamento'=>select_dato("id","geo_departamentos","where nombre='".url_decode_seo($_POST['id_departamento'])."'",0)	
			,'provincia'=>select_dato("id","geo_provincias","where nombre='".url_decode_seo($_POST['id_provincia'])."'",0)	
			,'distrito'=>select_dato("id","geo_distritos","where nombre='".url_decode_seo($_POST['id_distrito'])."'",0)	
							
			,'visibilidad'=>'1'	
			)            
            ,"usuarios"
            ,0);			

			if( $insertado['success'] ){
			
				$ret = web_grabar_imagen(
									$_POST['foto_1']
									,array(
										'prefijo'=>'usuario',
										'carpeta'=>'usuario_imas',
										'tamanos'=>'70x70,128x135,328x235'
									)
								);
								
				update(array("file"=>$ret,"fecha_creacion"=>"now()"),"usuarios","where id='".$insertado['id']."' ",0);								
			
			}
			
				if( $insertado['success'] ){
						
						$_SESSION['login']=select_fila(
						"id,nombre,apellidos,nombre_empresa,tipo_anunciante,email,pais,departamento,provincia,distrito"
						,"usuarios"
						,"where id='".$insertado['id']."'"
						,0
						);				
						$_SESSION['login']['status']=1;
						
					if(isset($_SESSION['publicar']['usuario_temp'])){
					
						$actualizado=update(array(      
								'anunciante'=>$insertado['id']	
								)    
							  ,"productos_items"
							  ,"where anunciante='".$_SESSION['publicar']['usuario_temp']."'"
							  ,0);

						if( $actualizado['success'] ){
						
							unset($_SESSION['publicar']['usuario_temp']);
							
							$FORM['url']='index.php?modulo=pagina-static&tab=final-publicacion';
											
						}	
																		  
					} 
					
					echo json_encode(array(
								't'=>'exito'
								,'u'=>$FORM['url']
								,'n'=>$FORM['nombre']									
								));					
					
				} else {
				
					echo json_encode(array(
								't'=>'error'
								,'m'=>$FORM['error']
								,'n'=>$FORM['nombre']
								));														
				}	

			} 
				

?>