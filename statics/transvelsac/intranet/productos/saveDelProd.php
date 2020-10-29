<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

	$sql1 = "select * from producto WHERE idProducto='$_POST[idproducto]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	
	if($encontrado == '1'){
		$sql1="delete from stock where idproducto='$_POST[idproducto]'";
		consulta($sql1);
		$sql2="delete from equivalencias where idproducto='$_POST[idproducto]'";
		consulta($sql2);
		$sql="delete from producto where idproducto='$_POST[idproducto]'";
		consulta($sql);
		header("location: index.php?msg=3");	
	}
?>