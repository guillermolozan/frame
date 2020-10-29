<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$idMarca=$_POST['idmarca'];					
	$nomMarca0 = strtoupper($_POST['nombre']);					
	$nomMarca=preg_replace("/ +/"," ",trim($nomMarca0));
	$sql3 = "UPDATE marca SET nombre='$nomMarca' WHERE idmarca='$idMarca'";
	$rs = consulta($sql3);
						
	header("Location:index.php?msg=2");
}
?>