<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idCliente=$_POST['idcliente'];
	$nomCliente0 = strtoupper($_POST['razonsocial']);	
	$nomCliente = preg_replace("/ +/"," ",trim($nomCliente0));
	$ruc = $_POST['ruc'];
	$direccion0 = ucwords(strtolower($_POST['direccion']));
	$direccion = preg_replace("/ +/"," ",trim($direccion0));
	$telefono1 = $_POST['telefono1'];
	$telefono2 = $_POST['telefono2'];
	$email = strtolower($_POST['email']);
	$contacto0 = ucwords(strtolower($_POST['contacto']));
	$contacto = preg_replace("/ +/"," ",trim($contacto0));
	$cargo0 = strtoupper($_POST['cargo']);
	$cargo = preg_replace("/ +/"," ",trim($cargo0));
	$celular = $_POST['celular'];
	$bloqueado = '1';
	$sql3 = "UPDATE cliente SET razonsocial='$nomCliente', ruc='$ruc', direccion='$direccion', telefono1='$telefono1', telefono2='$telefono2', email='$email', contacto='$contacto', cargo='$cargo', celular='$celular', bloqueado='$bloqueado' WHERE idcliente='$idCliente'";
	$rs = mysql_query($sql3);
	
	header("Location:index.php?msg=2");
}

?>

