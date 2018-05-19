<?php //á
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");
	if($vars['GENERAL']['esclavo']!='1'){	
		include("config/tablas.php");
	}
	include("lib/sesion.php");	
	include("lib/playmemory.php");
?>