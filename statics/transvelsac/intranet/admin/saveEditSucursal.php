<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idSucursal=$_POST['idsucursal'];
	$nomSucursal0 = strtoupper($_POST['nombre']);	
	$nomSucursal = preg_replace("/ +/"," ",trim($nomSucursal0));
	$dirSucursal0 = ucwords(strtolower($_POST['direccion']));
	$dirSucursal = preg_replace("/ +/"," ",trim($dirSucursal0));
	$telefSucursal=$_POST['telefono'];
	$webSucursal=strtolower(trim($_POST['pweb']));
	
	$sql = "select * from sucursal WHERE idSucursal='$idSucursal'"; 
	$result=consulta($sql);
	$rs=leer_registro($result);
	$encontrado = numero_registros($result);
	
	if($encontrado == '1'){
		$archivo=$rs['imgSucursal'];
		$nombre_real=$rs['codSucursal'];
	}
	$sql3 = "UPDATE sucursal SET nombre='$nomSucursal', direccion='$dirSucursal', telefono='$telefSucursal', pweb='$webSucursal' WHERE idsucursal='$idSucursal'";
	$result=consulta($sql3);	
	header("Location:sucursal.php?idSucursal=".$idSucursal."&&msg=2");
}
?>

