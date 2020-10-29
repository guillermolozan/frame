<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idChofer = $_POST['idchofer'];
	$Nombre = strtoupper($_POST['nombre']);
	$dni = $_POST['dni'];
	$licenciaconducir = strtoupper($_POST['licenciaconducir']);
	
	$sqlConsulta = "UPDATE choferes SET nombre='$Nombre', dni='$dni', licenciaconducir='$licenciaconducir' WHERE idchofer='$idChofer'";
			
	$rs = mysql_query($sqlConsulta);
	header("Location:choferes_index.php");
}

?>

