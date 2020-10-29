<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
    $sql = "DELETE FROM rango_grupo WHERE idRangoGrupo='$idRangoGrupo'";
    $rs=consulta($sql);
    $sql = "DELETE FROM rangos_utilidad WHERE idRangoGrupo='$idRangoGrupo'";
    $rs1=consulta($sql);
	header("Location:rangoGrupos.php");
?>