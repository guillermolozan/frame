<?php //á


/*ESQUINAS*/

$HEAD['INCLUDES']['css'][]='css/bloques/bloque_cuadro_5/css.css';
	

/*FORMULARIO RECOMENDAR*/	

	$HEAD['INCLUDES']['style'][]='#bloque_recomendar .div_borde { min-height: 379px; height:auto !important; height:379px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_recomendar { width:245px; }';
	
	include("formularios/formularios.php");

	
/*BLOQUE VIDEOS*/

	$HEAD['INCLUDES']['style'][]='#bloque_videos .div_borde{ min-height: 379px; height:auto !important; height:379px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_videos { width:342px; }';

	$HEAD['INCLUDES']['css'][]='css/listados/listado_1/css.css';
	
	include("bloques/bloque_videos.php");
		

/*BLOQUE NOVEDADES*/

	$HEAD['INCLUDES']['style'][]='#bloque_ofertas .div_borde{ min-height: 379px; height:auto !important; height:379px; }';
	$HEAD['INCLUDES']['style'][]='#bloque_ofertas { width:250px; }';

	$HEAD['INCLUDES']['css'][]='css/listados/listado_2/css.css';

	include("bloques/bloque_novedades.php");
	
	
?>