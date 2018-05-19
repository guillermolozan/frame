<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$OBJECT[$PARAMS['this']]=web_render_page('home',$filtro_where);
		
//////////////////HEADER/////////////////////

$HEAD['titulo_H1'] = $COMMON['datos_root']['titulo_home'];

$HEAD['titulo'] = $HEAD['titulo_H1'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

	  																					
?>