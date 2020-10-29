<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idProducto = $_POST['idproducto'];	
	$idUniMed=$_POST['idunimed'];
	$Equivalencia=$_POST['equivalencia'];
	$PrecioCosto=$_POST['preciocosto'];
	$Precio1=$_POST['precio1'];
	$StockMinimo=$_POST['stockminimo'];
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
    $estado=0;
    if(isset($_POST['minimo'])) {
    	$minimo=$_POST['minimo'];
	    if ($minimo=='1') {
    	  $estado=1;
	    } else {
    	  $estado=0;
	    }
	}
	
	$sql4 = "INSERT INTO equivalencias (idproducto, idunimed, equivalencia, preciocosto, precio1, stockminimo, minimo, fechareg, usuarioreg)  VALUES('$idProducto', '$idUniMed', '$Equivalencia', '$PrecioCosto', '$Precio1', '$StockMinimo', '$estado', '$FechaActual', '$idUsuario')";
	$resultado = mysql_query($sql4);

	$sqlStock = "INSERT INTO stock (idproducto, idunimed, stock)  VALUES('$idProducto', '$idUniMed', '0')";
	$resultado = mysql_query($sqlStock);

	header("Location: index.php?msg=1");
}
?>