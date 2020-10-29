<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$nomProd0 = strtoupper($_POST['nombre']);	
	$nomProd = preg_replace("/ +/"," ",trim($nomProd0));
	$descCorta0 = strtoupper($_POST['nombrecorto']);	
	$descCorta = preg_replace("/ +/"," ",trim($descCorta0));
	$stockMinimo=$_POST['stockminimo'];
	$estadoProd = $_POST['estado'];
	
	$idModelo=$_POST['idmodelo'];
	$idMarca=$_POST['idmarca'];
	$idProducto=$_POST['idproducto'];
	
	$sql4 = "UPDATE producto SET nombre='$nomProd', nombrecorto='$descCorta', stockminimo='$stockMinimo', idmodelo='$idModelo', idmarca='$idMarca', estado='$estadoProd' WHERE idproducto='$idProducto' ";
	$rs = consulta($sql4);
		
	header("Location:index.php?msg=2");
}
?>