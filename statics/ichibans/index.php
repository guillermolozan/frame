<?php //á

$web_path="web"; //ruta de la carpeta web 

$panel_path="panel"; //ruta de la carpeta modulos 

include($panel_path."/lib/compresionInicio.php"); //compresion

if(isset($_GET['buscar'])){ 
	$_GET['modulo']='items';
	$_GET['tab']='productos';
	$_GET['acc']='list';
} /*else {
	$_GET['modulo']='app';
	$_GET['tab']='home';
} */

$file = $_GET['modulo'].".php"; //define modulo a incluir

include($web_path."/includes.php"); // includes de web

include("driver.php");

chdir($root_dir);

include($panel_path."/lib/compresionFinal.php"); //compresion

?>