<?php
//session_start();
require("../db/mysql.inc.php");
$idChofer = $_POST['idchofer'];
$conexion=conectar();
			$sql="delete from choferes WHERE idchofer='$idChofer'";
			mysql_query($sql) or die(mysql_error());
			header("Location:choferes_index.php");
?>