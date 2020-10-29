<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idEmpresa=$_POST['idempresa'];
	$nomEmpresa0 = strtoupper($_POST['razonsocial']);	
	$nomEmpresa = preg_replace("/ +/"," ",trim($nomEmpresa0));
	$dirEmpresa0 = ucwords(strtolower($_POST['direccion']));
	$dirEmpresa = preg_replace("/ +/"," ",trim($dirEmpresa0));
	$rucEmpresa = $_POST['ruc'];
	$telefEmpresa=$_POST['telefono'];

	$sql3 = "UPDATE empresa SET razonsocial='$nomEmpresa', direccion='$dirEmpresa', ruc='$rucEmpresa', telefono='$telefEmpresa' WHERE idempresa='$idEmpresa'";
	$result=consulta($sql3);
	header("Location:empresa.php?idEmpresa=".$idEmpresa."&&msg=2");
}
?>

