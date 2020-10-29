<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
		$sql="delete from marca where idmarca='$_POST[idMarca]'";
		$rs=consulta($sql);
		header("location: index.php?msg=3");		
?>