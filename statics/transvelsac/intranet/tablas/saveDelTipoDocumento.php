<?php
//session_start();
require("../db/mysql.inc.php");
$idTipoDocumento = $_POST['idtipodocumento'];
$conexion=conectar();
			$sql="delete from tipodocumento WHERE idtipodocumento='$idTipoDocumento'";
			mysql_query($sql) or die(mysql_error());
			header("Location:tipodocumentos_index.php");
?>