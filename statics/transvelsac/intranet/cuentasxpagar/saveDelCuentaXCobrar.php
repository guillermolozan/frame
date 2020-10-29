<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
	$Monto = $_POST['monto'];
	$sql1 = "select * from cuotas WHERE idcuotas='$_POST[idcuotas]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	if($encontrado == '1')
	{
     	$sql="delete from amortizar where idamortizar='$_POST[idamortizar]'";
	    $rs=consulta($sql);
				
    	header("location: index.php?msg=3");
	}
?>