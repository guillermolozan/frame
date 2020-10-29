<?php
//session_start();
require("../db/mysql.inc.php");
$IdUniMed = $_POST['idunimed'];
$conexion=conectar();
			$sql="delete from unimed WHERE idunimed='$IdUniMed'";
			mysql_query($sql) or die(mysql_error());
			header("Location:unimed_index.php");
?>