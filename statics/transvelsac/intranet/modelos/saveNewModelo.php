<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$nomModelo0 = strtoupper($_POST['nombre']);	
	$nomModelo = preg_replace("/ +/"," ",trim($nomModelo0));
	$sql4 = "INSERT INTO modelo (nombre)  VALUES('$nomModelo')";
	$rs = consulta($sql4);
	header("Location:index.php?msg=1");
}
?>