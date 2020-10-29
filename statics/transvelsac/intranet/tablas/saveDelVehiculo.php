<?php
//session_start();
require("../db/mysql.inc.php");
$Placa = $_POST['placa'];
$conexion=conectar();
			$sql="delete from vehiculos WHERE placa='$Placa'";
			mysql_query($sql) or die(mysql_error());
			header("Location:vehiculos_index.php");
?>