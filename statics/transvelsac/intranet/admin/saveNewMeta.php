<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$montoMeta=$_POST['montoMeta'];
	$nomMes=$_POST['nomMes'];
	$anio=$_POST['anio'];
	$mes=$_POST['mes'];
	$dia=$_POST['dia'];
	//$dia=$dia+1;
	$fechaModif=fechaAlta('D');
	
	$sql3 = "INSERT INTO meta_venta (idMeta, montoMeta, mes, anio, numMes, diaInicio, fechaModif) VALUES('', '$montoMeta', '$nomMes', '$anio', '$mes', '$dia', '$fechaModif')";
	$result=consulta($sql3);
	header("Location:meta_venta.php?alter=1");
}
?>

