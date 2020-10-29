<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$dni = strtoupper($_POST['dni']);
	$Nombre = strtoupper($_POST['nombre']);
	$licenciaconducir = $_POST['licenciaconducir'];
	
    $sqlConsulta = "INSERT INTO choferes (dni, nombre, licenciaconducir) VALUES ('$dni', '$Nombre', '$licenciaconducir')";
	  $rs = mysql_query($sqlConsulta);
	  header("Location:choferes_index.php");
}

?>

