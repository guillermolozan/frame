<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
$idEmpresa=$_POST['idEmpresa'];
$sql="delete from usuario where idUsuario='$_POST[idUsuarioA]'";
mysql_query($sql) or die(mysql_error());
header("Location: usuarios.php?idEmpresa=".$idEmpresa."&&msg=3");
?>