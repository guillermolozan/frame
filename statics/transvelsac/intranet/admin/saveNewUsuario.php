<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idSucursalA=$_POST['idsucursal'];
	$idEmpresa=$_POST['idempresa'];
	$codUsuario0 = $_POST['codUsuario'];	
	$codUsuarioA = preg_replace("/ +/"," ",trim($codUsuario0));
	$nomUsuario0 = ucwords(strtolower($_POST['nomUsuario']));
	$nomUsuarioA = preg_replace("/ +/"," ",trim($nomUsuario0));
	$idRolA = $_POST['idrol'];
	$contrasena=$_POST['contrasena'];
	$fechaIngreso = $_POST['datepicker'];
	$fechaAlta=fechaAlta('DH');
	$estadoUsuario='1';
	$sql3 = "INSERT INTO usuario (idrol, idsucursal, codUsuario, nomUsuario, fechaAlta, contrasena, estadoUsuario, fechaIngreso)  VALUES('$idRolA', '$idSucursalA', '$codUsuarioA', '$nomUsuarioA', '$fechaAlta', '$contrasena', '$estadoUsuario','$fechaIngreso')";
	
	$rs = mysql_query($sql3);
	header("Location:usuarios.php?idEmpresa=".$idEmpresa."&&msg=1");
}
?> 