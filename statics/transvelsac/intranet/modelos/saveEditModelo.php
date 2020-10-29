<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idModelo=$_POST['idmodelo'];
	$nomModelo0 = strtoupper($_POST['nombre']);	
	$nomModelo = preg_replace("/ +/"," ",trim($nomModelo0));
	$sql3 = "UPDATE modelo SET nombre='$nomModelo' WHERE idmodelo='$idModelo'";
	$rs = consulta($sql3);
	header("Location:index.php?msg=2");
}
?>