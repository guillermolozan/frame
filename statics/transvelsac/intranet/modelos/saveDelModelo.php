<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
			$sql="delete from modelo where idmodelo='$_POST[idmodelo]'";
			consulta($sql);
			header("location: index.php?msg=3");
?>