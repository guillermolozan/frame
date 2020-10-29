<?php //á

	$PAGINA=$PAGE[$PARAMS['this']]=web_render_page($_GET['page']);
	
//////////////////HEADER/////////////////////

$HEAD['titulo'] = ucwords(strtolower($PAGINA['titulo']))." | ".$COMMON['datos_root']['titulo_web'];

//$HEAD['meta_keywords'] = procesar_keywords(implode(" ",$concat['concat_nombre']));
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);
 
//$HEAD['meta_descripcion'] = procesar_description($COMMON['datos_root']['titulo_web']);		
//$HEAD['meta_keywords'] = implode(",",$concat['concat_nombre']);

?>
