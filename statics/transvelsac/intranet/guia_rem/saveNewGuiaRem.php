<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
extract($_REQUEST);

if ($_SESSION['carro']!="")
  { 
	$carro=$_SESSION['carro'];
	$Numero=$_POST['numero'];
	$Serie=$_POST['serie'];
	$fechaEmision=fechaAGrabar($_POST['fechaemision']);
	$fechaInicio=fechaAGrabar($_POST['fechainicio']);
	$puntoPartida=$_POST['puntopartida'];
	$IdRemitente=$_POST['idremitente'];
	$NombreRemitente=$_POST['nombreremitente'];
	$RucRemitente=$_POST['rucremitente'];
	
	$Destino=$_POST['destino'];
	$rucDestino=$_POST['rucdestino'];
	$dniDestino=$_POST['dnidestino'];
	$puntoLlegada=$_POST['puntollegada'];
	$nomTransportista=$_POST['nombretransportista'];
	$rucTransportista=$_POST['ructransportista'];
	$licenciaConducir=$_POST['licenciaconducir'];
	$marca=$_POST['marca'];
	$placa=$_POST['placa'];
	$motivo=$_POST['motivo'];
		
	$idUsuario=$_SESSION['idUsuario'];
	$idEmpresa=$_SESSION['idEmpresa'];
	$idSucursal=$_SESSION['idSucursal'];
	$estadoGuia='1';

	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);
	
	$sqlTipoDoc="UPDATE tipodocumento SET numero='$Numero' WHERE idtipodoc='GR'";
	
	$sql1 = "insert into guiacab 
	(idsucursal, serie, numero,  fechaemision, fechainicio, destino, rucdestino, dnidestino, puntopartida, puntollegada,
	idmotivo, ructransportista, nombretransportista, marca, placa, licenciaconducir, estado, idremitente, nombreremitente, rucremitente, idusuario)
	values ('$idSucursal', '$Serie',  '$Numero', '$fechaEmision', '$fechaInicio', '$Destino', '$rucDestino', '$dniDestino', '$puntoPartida', 
	'$puntoLlegada', '$motivo', '$rucTransportista', '$nomTransportista', '$marca', '$placa', '$licenciaConducir',
	'$estadoGuia', '$IdRemitente', '$NombreRemitente', '$RucRemitente', '$idUsuario'	);";
	$resultado = mysql_query($sql1); 
    $ultimoregistro = mysql_insert_id();
		
  	foreach($carro as $k => $v)
	{
		$Producto= $v['producto'];
		$Cantidad= $v['cantidad'];
		$Precio= $v['precio'];
		$IdUniMed= $v['idunimed'];
		$Total=$v['total'];
	    $adc1="INSERT INTO guiadet (idguiacab, producto, cantidad, precio, idunimed, subtotal) VALUES ('$ultimoregistro', '$Producto', '$Cantidad', '$Precio', '$IdUniMed', '$Total')";	
		$resultado = mysql_query($adc1);
	};
				
	if ($resultado)	{
		$sql = "COMMIT";
		$resultado = mysql_query($sql);
		header('Location: index.php?msg=1');
	} else	{
		$sql = "ROLLBACK;";	
		$resultado = mysql_query($sql);
		header('Location: index.php?msg=2');
	}
  }
?>