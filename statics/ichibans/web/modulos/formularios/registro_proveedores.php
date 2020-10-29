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
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'rubro 1','2'=>'rubro 2')		
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
		,'tipo'=>'input_combo'
		,'opciones'=>array('1'=>'intervalo de montos 1','2'=>'intervalo de montos 2')			
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
	,'web'=>array(
		'label'=>'Página Web'
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
	
			$FORM=pre_proceso_form($FORM);
	
	
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
				

$FORMULARIO[$PARAMS['conector']]=$FORM;

?>