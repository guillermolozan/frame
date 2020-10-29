<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$Nombre = strtoupper($_POST['nombre']);	
	$NombreCorto = strtoupper($_POST['nombrecorto']);	
	$StockMinimo=$_POST['stockminimo'];
	$idUniMed=$_POST['idunimed'];
	$idModelo=$_POST['idmodelo'];
	$idMarca=$_POST['idmarca'];
	$estado=1;
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	$idSucursal = $_SESSION['idSucursal'];	
	
	$sql4 = "INSERT INTO producto (idmodelo, idmarca, idunimed, nombre, nombrecorto, stockminimo, estado)  VALUES('$idModelo', '$idMarca', '$idUniMed', '$Nombre', '$NombreCorto', '$StockMinimo', '$estado')";
	$resultado = mysql_query($sql4);
    $ultimoregistro = mysql_insert_id();

	$sql4 = "INSERT INTO stock (idproducto, idsucursal, idunimed, stock)  VALUES('$ultimoregistro', '$idSucursal', '$idUniMed', '0')";
	$rs =consulta($sql4);

	$sql4 = "INSERT INTO equivalencias (idproducto, idunimed, equivalencia, preciocosto, precio1, stockminimo, minimo, fechareg, usuarioreg)  VALUES('$ultimoregistro', '$idUniMed', '1', '0', '0', '0', '1', '$FechaActual' , '$idUsuario')";
	$rs =consulta($sql4);

	header("Location: index.php?msg=1");
}
?>