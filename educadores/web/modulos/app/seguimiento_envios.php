<?php //á

$object=array();

$object['titulo']='Seguimiento de envios';


//////////////////HEADER/////////////////////

$HEAD['titulo'] = ucwords(strtolower($object['titulo']))." | ".$COMMON['datos_root']['titulo_web'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

$object['styles']='pages';

$OBJECT[$PARAMS['this']]=$object;
?>
