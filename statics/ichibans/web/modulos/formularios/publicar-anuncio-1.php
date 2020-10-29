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
											,'b'=>url_decode_seo($_GET['id_grupo'])
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);
	

	
	if($_GET['id_grupo']!=''){		
	$ID=select_dato("id","productos_grupos","where nombre='".url_decode_seo($_GET['id_grupo'])."'");
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
											,'b'=>url_decode_seo($_GET['id_subgrupo'])
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)	  		
			);	
	}	
	
			
			$FORMULARIO['publicar-anuncio-1']=array(
					'nombre'=>'publicar-anuncio-1'
					,'legend'=>"ELIGE LOCALIZACIÓN Y CATEGORÍA"
					,'ajax'=>'0'
					,'action'=>'index.php'
					,'method'=>'get'
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>''
					,'error'=>'Error en el envio, por favor vuelva a intentarlo'				
					,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_siguiente.jpg" '
					,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '				
					//,'pie'=>'Si ustéd es nuevo <a href="#" class="registrece">Regístrese</a><br><a href="#">¿Olvidó su contraseña?</a>'
					,'campos'=>array(
						array(
							'campo'=>array('modulo','tab')
							,'value'=>array('pagina-formulario','publicar-anuncio-2')
							,'tipo'=>'input_hidden'
						)						
						,array(
							'label'=>'Localización'
							,'campo'=>array('id_departamento','id_provincia','id_distrito')
							,'value'=>array(urlencode($_GET['id_departamento']),urlencode($_GET['id_provincia']),urlencode($_GET['id_distrito']))
							,'control'=>'control_localizacion'
						)	
						,array(
							'label'=>'Categoría'
							,'campo'=>array('id_grupo','id_subgrupo')
							,'value'=>array(urlencode($_GET['id_grupo']),urlencode($_GET['id_subgrupo']))
							,'control'=>'control_categoria'							
						)												
						
					)			
			);
						
	//prin($HEAD['INCLUDES']['style']);	

 	$FORM=$FORMULARIO['publicar-anuncio-1'];

?>