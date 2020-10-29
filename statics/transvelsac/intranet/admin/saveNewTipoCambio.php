<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$valor = $_POST['valor'];
	$fecha = $_POST['datepicker'];
	$sql = "BEGIN;";
	$resultado = mysql_query($sql); 
    $sql="SELECT valor FROM tipo_cambio WHERE SUBSTR(fechaAlta,1,10)=SUBSTR('$fecha',1,10)";
    $result=consulta($sql);
    if (numero_registros($result) > 0) {
	  $sql = "UPDATE tipo_cambio SET valor='$valor' WHERE SUBSTR(fechaAlta,1,10)=SUBSTR('$fecha',1,10)";
	  $result = consulta($sql);
    } else {
	  $sql1 = "INSERT INTO tipo_cambio (valor, fechaAlta) VALUES ('$valor', '$fecha')";
	  $rs = consulta($sql1);
    }
	$sql = "COMMIT";
	$resultado = mysql_query($sql); 
    mysql_free_result($result);
	header("Location:tipo_cambio.php?alter=1");
}
?>

