<?php //á

/*ESQUINAS*/

$HEAD['INCLUDES']['css'][]='css/bloques/bloque_cuadro_4/css.css';

/*BLOQUE CARRITO*/

	$HEAD['INCLUDES']['style'][]='#bloque_carrito .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_carrito { height: auto !important; height:50px; }';

	
/*BLOQUE MARCAS*/

	$HEAD['INCLUDES']['style'][]='#bloque_marcas .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_marcas { height: 189px !important; }';
	
	include("bloques/bloque_marcas.php");

/*BLOQUE MARCAS 2*/

	$HEAD['INCLUDES']['style'][]='#bloque_marcas2 .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_marcas2 { height: 189px !important; }';
			
	include("bloques/bloque_marcas2.php");
	
/*BLOQUE PUBLICIDAD*/	
	
//	web_render_swf("publicidad.swf","bloque_publicidad_elemento_1","","198x175");
	
	
	
?>