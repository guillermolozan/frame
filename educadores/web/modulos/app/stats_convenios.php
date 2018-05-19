<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];



$object=array();

//$object=web_render_page($_GET['page'],$filtro_where);

//$OBJECT['pages']=$object;

$HEAD['INCLUDES']['js'][]='js/swfobject.js';

//////////////////HEADER/////////////////////

$HEAD['titulo'] = ucwords(strtolower("Herramienta de Estadística de Negociación"))." | ".$COMMON['datos_root']['titulo_web'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

?>