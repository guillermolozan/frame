<?php //á
//prin($ITEMS['categorias']);

$THIS=$PARAMS['this'];

$PAGES[$PARAMS['this']]=web_render_page($PARAMS['this']);

$HEAD['titulo'] = ucwords(strtolower($PAGINA['titulo']))." | ".$COMMON['datos_root']['titulo_web'];

	$PAGE=$PAGES[$PARAMS['conector']]=web_render_page($PARAMS['this']);


?>