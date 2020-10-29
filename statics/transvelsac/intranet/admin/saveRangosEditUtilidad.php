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
    $sql = "UPDATE rango_grupo SET rangoDescripcion='$rangoDescripcion', rangoObs='$rangoObs' WHERE idRangoGrupo='$idRangoGrupo'";
    $rs=consulta($sql);
    $sql = "DELETE FROM rangos_utilidad WHERE idRangoGrupo='$idRangoGrupo'";
    $rs=consulta($sql);
    $ultimoregistro = $idRangoGrupo;
	for($i=0;$i<10;$i++)    
	{
      $sql = "INSERT rangos_utilidad (idRangoGrupo,minimo,maximo,porcentaje) VALUES ('$ultimoregistro', '$minMargen[$i]', '$maxMargen[$i]', '$porcentajeDscto[$i]')";
   	  $rs1=consulta($sql);
	}
	header("Location:rangoGrupos.php");
}
?>