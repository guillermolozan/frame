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
	
    $sqlConsulta = "INSERT INTO vehiculos (placa, remolque, idclase, idmarca, idmodelo, idtimon, iduso, idcombustible, anio, color, nmotor, serie, nasientos, npasajeros, configuracionvehicular, certificadoinscripcion, fechareg, usuarioreg) VALUES ('$Placa', '$Remolque', '$IdClase', '$IdMarca', '$IdModelo', '$IdTimon', '$IdUso', '$IdCombustible', '$Anio', '$Color', '$NMotor', '$Serie', '$NAsientos', '$NPasajeros', '$ConfiguracionVehicular', '$CertificadoInscripcion', '$FechaActual', '$idUsuario')";
	  $rs = mysql_query($sqlConsulta);
	  header("Location:vehiculos_index.php");
}

?>

