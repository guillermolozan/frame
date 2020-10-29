<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

if(isset($_POST['btnGuardar']))
{	
	$Placa = strtoupper($_POST['placa']);
	$Remolque = $_POST['remolque'];
	$IdClase = $_POST['idclase'];
	$IdMarca = $_POST['idmarca'];
	$IdModelo = $_POST['idmodelo'];
	$IdTimon = $_POST['idtimon'];
	$IdUso = $_POST['iduso'];
	$IdCombustible = $_POST['idcombustible'];
	$Anio = $_POST['anio'];
	$Color = $_POST['color'];
	$NMotor = $_POST['nmotor'];
	$Serie = $_POST['serie'];
	$NAsientos = $_POST['nasientos'];
	$NPasajeros = $_POST['npasajeros'];
	$ConfiguracionVehicular = $_POST['configuracionvehicular'];
	$CertificadoInscripcion = $_POST['certificadoinscripcion'];
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $sqlConsulta = "UPDATE vehiculos SET remolque='$Remolque', idclase='$IdClase', idmarca='$IdMarca', idmodelo='$IdModelo', idtimon='$IdTimon', iduso='$IdUso', idcombustible='$IdCombustible', anio='$Anio', color='$Color', nmotor='$NMotor', serie='$Serie', nasientos='$NAsientos', npasajeros='$NPasajeros', configuracionvehicular='$ConfiguracionVehicular', certificadoinscripcion='$CertificadoInscripcion' WHERE placa='$Placa'";
	  $rs = mysql_query($sqlConsulta);
	  header("Location:vehiculos_index.php");
}

?>

