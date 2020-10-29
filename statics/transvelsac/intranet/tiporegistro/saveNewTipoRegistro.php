<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnGuardar']))
{	
	$Nombrre = strtoupper($_POST['nombre']);					
	$sql4 = "INSERT INTO tiporegistro (nombre)  VALUES('$Nombrre')";
    $rs = mysql_query($sql4);
	header("Location:index.php?msg=1");
}
?>