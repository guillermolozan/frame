<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();


if(isset($_POST['btnGuardar']))
{	
	$nomMarca0 = strtoupper($_POST['nombre']);					
	$nomMarca=preg_replace("/ +/"," ",trim($nomMarca0));
		
	$sql4 = "INSERT INTO marca (nombre) VALUES('$nomMarca')";
	$rs = consulta($sql4);
	header("Location:index.php?msg=1");
}

?>

