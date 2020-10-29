<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
if(isset($_POST['btnGuardar']))
{	
	$idMargen = $_POST['idMargen'];
	$porcentajeDscto = $_POST['porcentajeDscto'];
	$minMargen = $_POST['minMargen'];
	$maxMargen = $_POST['maxMargen'];
    $sql = "INSERT rango_grupo (rangoDescripcion,rangoObs) VALUES ('$rangoDescripcion','$rangoObs')";
    $rs=consulta($sql);
    $ultimoregistro = mysql_insert_id();
	for($i=0;$i<10;$i++)    
	{
      $sql = "INSERT rangos_utilidad (idRangoGrupo,minimo,maximo,porcentaje) VALUES ('$ultimoregistro', '$minMargen[$i]', '$maxMargen[$i]', '$porcentajeDscto[$i]')";
   	  $rs1=consulta($sql);
	}
	header("Location:rangoGrupos.php");
}
?>