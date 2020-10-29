<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCajaVendedor.php");
CheckNivel();
$idCliente=$_GET['idCliente'];
$instruccion = "SELECT * from cliente where idCliente='$idCliente'"; 
$consulta = consulta($instruccion);
$resultado = leer_registro($consulta);
$bloqueado=$resultado['bloqueado'];

if ( $bloqueado==0 ){		
	$sql="UPDATE cliente SET bloqueado=1 WHERE idCliente='$idCliente'";
	$rsql=consulta($sql);
	header("Location:index.php?msg=2");
}else{
	$sql="UPDATE cliente SET bloqueado=0 WHERE idCliente='$idCliente'";
	$rsql=consulta($sql);
	header("Location:index.php?msg=2");
}
?>