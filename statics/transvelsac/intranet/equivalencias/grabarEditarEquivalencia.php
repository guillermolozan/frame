<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idEquivalencia = $_POST['idequivalencia'];	
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
	
	$sql4 = "UPDATE equivalencias SET  idunimed='$idUniMed', equivalencia='$Equivalencia', preciocosto='$PrecioCosto', precio1='$Precio1', stockminimo='$StockMinimo', minimo='$estado', fechareg='$FechaActual', usuarioreg='$idUsuario' WHERE idequivalencia='$idEquivalencia'";
	$resultado = mysql_query($sql4);

	header("Location: index.php?msg=1");
}
?>