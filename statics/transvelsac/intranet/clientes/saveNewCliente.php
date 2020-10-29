<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
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
	$idEmpresa=$_SESSION['idEmpresa'];
		
	$sql4 = "INSERT INTO cliente (razonsocial, direccion, ruc, celular, email, contacto, cargo, telefono1, telefono2, idempresa, bloqueado) VALUES('$nomCliente', '$direccion', '$ruc', '$celular', '$email', '$contacto', '$cargo', '$telefono1', '$telefono2', '$idEmpresa', '$bloqueado')";
	$rs = mysql_query($sql4);
	header("Location:index.php?msg=1");
}

?>

