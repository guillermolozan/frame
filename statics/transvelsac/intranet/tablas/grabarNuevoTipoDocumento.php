<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$IdTipoDoc = strtoupper($_POST['idtipodoc']);
	$Nombre = strtoupper($_POST['nombre']);
	$Serie = $_POST['serie'];
	$Numero = $_POST['numero'];
	
    $sqlConsulta = "INSERT INTO tipodocumento (idtipodoc, nombre, serie, numero) VALUES ('$IdTipoDoc', '$Nombre', '$Serie', '$Numero')";
	  $rs = mysql_query($sqlConsulta);
	  header("Location:tipodocumentos_index.php");
}

?>

