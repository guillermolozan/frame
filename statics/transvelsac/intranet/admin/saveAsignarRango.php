<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
    $idRangoUtilidad = $_GET['idRangoUtilidad'];
    $idModelo = $_GET['idModelo'];
    $sql = "UPDATE modelo SET RANGO_GRUPO_idRangoGrupo='$idRangoUtilidad' WHERE idModelo='$idModelo'";
    $rs=consulta($sql);
//	header("Location:rangoModeloGrupos.php");
?>