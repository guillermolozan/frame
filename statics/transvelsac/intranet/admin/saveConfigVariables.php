<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$anio=$_POST['anio'];
	$guiaremision = $_POST['guiaremision'];	
	$guiatransportista = $_POST['guiatransportista'];	
	$igv = $_POST['igv'];	
	
    $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
    $consultaConfig = consulta($sqlConfig);
    if (numero_registros($consultaConfig) > 0) {
	  $sql3 = "UPDATE config SET guiaremision='$guiaremision', guiatransportista='$guiatransportista', igv='$igv' WHERE anio='$anio'";
	} else {
      $sql3 = "INSERT INTO config (anio, guiaremision, guiatransportista,igv) VALUES ('$anio', '$guiaremision', '$guiatransportista', '$igv')";
	}
    $result=consulta($sql3);
	header("Location:configuracion.php?msg=2");
}
?>

