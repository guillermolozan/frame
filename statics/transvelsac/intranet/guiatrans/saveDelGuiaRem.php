<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
$idGuia=$_POST['idGuia'];
		 
$sql = "SET AUTOCOMMIT=0;";
$resultado = mysql_query($sql); 

$sql = "BEGIN;";
$resultado = mysql_query($sql);


 $sql="UPDATE guia_remision SET estadoGuia=0 WHERE idGuia= '$idGuia' ;";
//echo "$sql";
$resultado = mysql_query($sql);
  
 if ($resultado) {
//echo 'OK';
//echo '<br>';
$sql = "COMMIT";
$resultado = mysql_query($sql);
header('Location: index.php?msg=3');
}
else
{
//echo 'MAL';
//echo '<br>';
//echo 'SE EJECUTA EL ROOLBACK';
//echo '<br>'; 
$sql = "ROLLBACK;";
$resultado = mysql_query($sql);
header("location: index.php?msg=4");
}
	
			
?>