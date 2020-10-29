<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idTipoRegistro=$_POST['idtiporegistro'];					
	$Nombre = strtoupper($_POST['nombre']);					
	
	$sql3 = "UPDATE tiporegistro SET nombre='$Nombre' WHERE idtiporegistro='$idTipoRegistro'";
	$rs = mysql_query($sql3);
							
	header("Location:index.php?msg=2");
}
?>