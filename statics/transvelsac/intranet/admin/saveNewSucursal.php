<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idempresa=$_POST['idempresa'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono = $_POST['telefono'];
	$pweb=$_POST['pweb'];
	$sql3 = "INSERT INTO sucursal (idempresa, nombre, direccion, telefono, pweb)  VALUES('$idempresa', '$nombre', '$direccion', '$telefono', '$pweb')";
	
	$rs = mysql_query($sql3);
	header("Location:sedes.php?idEmpresa=".$idempresa."&&msg=1");
}
?> 