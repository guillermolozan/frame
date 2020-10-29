<?php //á

	$GEO['departamentos'] = select(
			"id,nombre"
			,"geo_departamentos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )
				,'selected'=>array('match'=>array(
											'a'=>'{nombre}'
											,'b'=>url_decode_seo($_GET['id_departamento'])
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);
	
	if($_GET['id_departamento']!=''){		
	$ID=select_dato("id","geo_departamentos","where nombre='".url_decode_seo($_GET['id_departamento'])."'");
	$GEO['provincias'] = select(
			"id,nombre"
			,"geo_provincias"
			,"where id_departamento='".$ID."' and visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )
				,'selected'=>array('match'=>array(
											'a'=>'{nombre}'
											,'b'=>url_decode_seo($_GET['id_provincia'])
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);	
	}			
			
	if($_GET['id_provincia']!=''){		
	$ID=select_dato("id","geo_provincias","where nombre='".url_decode_seo($_GET['id_provincia'])."'");
	$GEO['distritos'] = select(
			"id,nombre"
			,"geo_distritos"
			,"where id_provincia='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )
				,'selected'=>array('match'=>array(
											'a'=>'{nombre}'
											,'b'=>url_decode_seo($_GET['id_distrito'])
											,'equal'=>'selected'
											,'else'=>''
											)
							   )
				)				  		
			);		
	}



	$ITEMS['categorias'] = select(
			"id,nombre"
			,"productos_grupos"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )
				,'selected'=>array('match'=>array(
											'a'=>'{id}'
											,'b'=>$_GET['categoria']
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);
	
	if($_GET['categoria']!=''){		
	$ID=select_dato("id","productos_grupos","where nombre='".url_decode_seo($_GET['categoria'])."'");
	$ITEMS['subcategorias'] = select(
			"id,nombre"
			,"productos_subgrupos"
			,"where id_grupo='".$ID."' and visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )
				,'selected'=>array('match'=>array(
											'a'=>'{id}'
											,'b'=>$_GET['subcategoria']
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);	
	}	
		

			$FORMULARIO['publicar-anuncio']=array(
					'nombre'=>'publicar-anuncio'
					,'legend'=>"Publicar Anuncio"
					,'ajax'=>'1'
					,'action'=>'ajax.php?mode=form&tab=publicar-anuncio'
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>''
					,'error'=>'Error en el envio, por favor vuelva a intentarlo'				
					,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_publicar-anuncio.jpg" '
					//,'pie'=>'Si ustéd es nuevo <a href="#" class="registrece">Regístrese</a><br><a href="#">¿Olvidó su contraseña?</a>'
					,'campos'=>array(
						array(
							'label'=>'Localización'
							,'campo'=>array('departamento','provincia','distrito')
							,'control'=>'control_localizacion'
						)	
						,array(
							'label'=>'Categoría'
							,'campo'=>array('categorias','subcategoria')
							,'control'=>'control_categoria'							
						)												
						,array(
							'label'=>'Tipo de aviso'
							,'campo'=>array('tipo')
							,'tipo'=>'input_radio'
							,'opciones'=>array('1'=>'Ofrezco','2'=>'Busco')
							,'value'=>"1"
						)					
						,array(
							'label'=>'Título'
							,'campo'=>array('titulo')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required']"
							,'value'=>'titulo'
						)						
						,array(
							'label'=>'Descripción'
							,'campo'=>array('descripcion')
							,'tipo'=>'textarea'
							,'validacion'=>"validate['required']"
							,'value'=>'descripcion'
						)
						,array(
							'label'=>'Precio'
							,'campo'=>array('precio')
							,'control'=>'control_precio'
							)						
						,array(
							'label'=>'Tu eres'
							,'campo'=>array('tipo_anunciante')
							,'tipo'=>'input_radio'
							,'opciones'=>array('1'=>'Un Individuo','2'=>'Un Negocio / Empresa')
							,'value'=>"1"
						)												
						,array(
							'label'=>'Teléfono'
							,'campo'=>array('telefono')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['phone']"
							,'value'=>'2618859'
						)
						,array(
							'label'=>'E-mail'
							,'campo'=>array('email')
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required','email']"
							,'value'=>'asteruchi@hotmail.com'
						)

						
					)			
			);
					
$HEAD['INCLUDES']['style'][]='#control_localizacion{ top:47px; left:183px;}';			
$HEAD['INCLUDES']['style'][]='#control_categoria{ top:78px; left:183px;}';		
//prin($HEAD['INCLUDES']['style']);	

			$FORM=$FORMULARIO['publicar-anuncio'];

?>