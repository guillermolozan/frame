<?php //á

//////////////////HEADER/////////////////////

// $PAGINA=$PAGE[$PARAMS['this']]=web_render_page('bienvenido');
$pagina='bienvenido';
$PAGINA=$PAGE[$PARAMS['this']]=fila(
		"id,pagina,titulo,texto,foto,foto_descripcion,fecha_creacion"
		,"paginas"
		,"where pagina='".$pagina."' and  visibilidad='1' $filtro "
		,0
		,array(
				'carpeta'=>'pag_imas'
				,'tamano'=>'2'
				,'dimensionado'=>'350x350'
				//,'centrado'=>'1'
				,'get_atributos'=>array('get_atributos'=>array(
											'carpeta'=>'{carpeta}'
											,'fecha'=>'{fecha_creacion}'
											,'file'=>'{foto}'
											,'tamano'=>'{tamano}'
											,'dimensionado'=>'{dimensionado}'
											//,'centrado'=>'{centrado}'
											)
										)
			  )
		);


$HEAD['titulo_H1'] = $COMMON['datos_root']['titulo_home'];

$HEAD['titulo'] = $HEAD['titulo_H1'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

?>