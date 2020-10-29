<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idTipoDocumento = $_POST['idtipodocumento'];
	$Nombre = strtoupper($_POST['nombre']);
	
	$sqlConsulta = "UPDATE tipodocumento SET nombre='$Nombre' WHERE idtipodocumento='$idTipoDocumento'";
			
	$rs = mysql_query($sqlConsulta);
	header("Location:tipodocumentos_index.php");
}

?>

