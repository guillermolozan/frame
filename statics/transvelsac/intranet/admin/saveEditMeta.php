<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$idMeta=$_POST['idMeta'];
	$montoMeta=$_POST['montoMeta'];
	$fechaModif=fechaAlta('D');
	$sql3 = "UPDATE meta_venta SET montoMeta='$montoMeta', fechaModif='$fechaModif' WHERE idMeta='$idMeta'";
	$result=consulta($sql3);
	
	header("Location:meta_venta.php?alter=2");
}
?>

