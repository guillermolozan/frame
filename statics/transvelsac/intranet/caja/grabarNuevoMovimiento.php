<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$fechaActual = getdate();
$anio = $fechaActual['year'];
extract($_REQUEST);

	$TipoMovimiento = $_POST['tipomovimiento'];
	$TipoRegistro = $_POST['tiporegistro'];
	$TipoDoc = $_POST['tipodoc'];
	$IdCliProv = $_POST['idcliprov'];
	$Fecha = $_POST['fecha'];
	$Monto = $_POST['monto'];
		
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);

    $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
    $consultaConfig = consulta($sqlConfig);
    $rsConfig=leer_registro($consultaConfig);
    $serieComp=$rsConfig['serieFactura'];
    $numeroComp=$rsConfig['numeroFactura'] + 1;
    $codigoComprobante = ceros($serieComp,3)."-".ceros($numeroComp,8);
    $Serie=ceros($rsConfig['serieFactura'],3);
    $Numero=ceros($rsConfig['numeroFactura'] + 1,8);
    $sqlGrabarConfig = "UPDATE config SET serieFactura='$serieComp', numeroFactura = '$numeroComp' WHERE anio='$anio'";
	$resultadoGrabarConfig = mysql_query($sqlGrabarConfig);

	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $sql="insert into caja (tipomovimiento,tiporegistro,tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$TipoMovimiento', '$TipoRegistro', '$TipoDoc', '$Serie', '$Numero', '$IdCliProv', '0', '$TipoDoc', '$Serie', '$Numero', '$Fecha', '$Monto', '1', '$FechaActual', '$idUsuario')";
	echo $sql;
	  $resultado = mysql_query($sql);		
	if ($resultado) 
	{
		$sql = "COMMIT";
		$resultado = mysql_query($sql);
		header('Location: index.php?msg=1');
	}  else
	{
		$sql = "ROLLBACK;";
		$resultado = mysql_query($sql);
		header('Location: index.php?msg=2');
	}
?>