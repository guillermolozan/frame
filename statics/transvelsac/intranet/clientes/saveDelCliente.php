<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCajaVendedor.php");
CheckNivel();
			$sql="delete from cliente where idCliente='$_POST[idCliente]'";
			mysql_query($sql) or die(mysql_error());
			header("location: index.php?msg=3");
?>