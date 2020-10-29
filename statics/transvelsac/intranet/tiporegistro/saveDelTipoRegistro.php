<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
	$sql1 = "select * from tiporegistro WHERE idtiporegistro='$_POST[idtiporegistro]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	if($encontrado == '1')
	{
     	$sql="delete from tiporegistro where idtiporegistro='$_POST[idtiporegistro]'";
	    $rs=consulta($sql);
    	header("location: index.php?msg=3");
	}
?>