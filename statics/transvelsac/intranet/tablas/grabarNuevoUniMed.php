<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$Nombre = strtoupper($_POST['nombre']);
	$Abreviatura = strtoupper($_POST['abreviatura']);
	
    $sqlConsulta = "INSERT INTO unimed (nombre, abreviatura) VALUES ('$Nombre', '$Abreviatura')";
	  $rs = mysql_query($sqlConsulta);
	  header("Location:unimed_index.php");
}

?>

