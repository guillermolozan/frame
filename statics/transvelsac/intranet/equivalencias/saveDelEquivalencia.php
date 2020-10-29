<?php
//session_start();
require("../db/mysql.inc.php");
$idEquivalencia = $_POST['idequivalencia'];
$conexion=conectar();
			$sql="delete from equivalencias WHERE idequivalencia='$idEquivalencia'";
			mysql_query($sql) or die(mysql_error());
			header("Location:index.php");
?>