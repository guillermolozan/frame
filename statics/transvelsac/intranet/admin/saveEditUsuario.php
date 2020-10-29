<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idSucursalA=$_POST['idsucursal'];
	$idEmpresa=$_POST['idempresa'];
	$idUsuario=$_POST['idusuario'];
	$codUsuario0 = $_POST['codUsuario'];	
	$codUsuario = preg_replace("/ +/"," ",trim($codUsuario0));
	$nomUsuario0 = ucwords(strtolower($_POST['nomUsuario']));
	$nomUsuario = preg_replace("/ +/"," ",trim($nomUsuario0));
	$idRol = $_POST['idrol'];
	$contrasena=$_POST['contrasena'];
	$fechaIngreso = $_POST['datepicker'];
	
	if(!empty($contrasena))
	{
	  $sql3 = "UPDATE usuario SET nomUsuario='$nomUsuario', codUsuario='$codUsuario', idrol='$idRol', contrasena='$contrasena', fechaIngreso='$fechaIngreso' WHERE idusuario='$idUsuario'";
	}
	else
	{
	  $sql3 = "UPDATE usuario SET nomUsuario='$nomUsuario', codUsuario='$codUsuario', idrol='$idRol', fechaIngreso='$fechaIngreso',  WHERE idusuario='$idUsuario'";
	}
	echo $sql3;
	$rs = mysql_query($sql3);
	header("Location:usuarios.php?idEmpresa=".$idEmpresa."&&msg=2");
}
?>