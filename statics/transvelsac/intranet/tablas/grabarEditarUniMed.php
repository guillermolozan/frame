<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$IdUniMed = $_POST['idunimed'];
	$Nombre = strtoupper($_POST['nombre']);
	$Abreviatura = strtoupper($_POST['abreviatura']);
	
	$sqlConsulta = "UPDATE unimed SET nombre='$Nombre', abreviatura='$Abreviatura' WHERE idunimed='$IdUniMed'";
			
	$rs = mysql_query($sqlConsulta);
	header("Location:unimed_index.php");
}

?>

