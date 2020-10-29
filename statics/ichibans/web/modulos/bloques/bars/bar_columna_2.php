<?php //á

/*ESQUINAS*/

$HEAD['INCLUDES']['css'][]='css/bloques/bloque_cuadro_4/css.css';

/*BLOQUE CARRITO*/

	$HEAD['INCLUDES']['style'][]='#bloque_carrito .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_carrito { height: auto !important; height:50px; }';

/*BLOQUE ARBOL CATEGORIAS*/

	/*STYLE*/

	$HEAD['INCLUDES']['style'][]='#bloque_arbol_categorias .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_arbol_categorias { height: auto !important; height: 189px; }';

	$HEAD['INCLUDES']['css'][]='css/arboles/arbol_1/css.css';
	
	include("items/bloque_arbol_categorias.php");


	
?>