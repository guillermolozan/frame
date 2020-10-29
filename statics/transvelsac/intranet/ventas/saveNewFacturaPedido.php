<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionVendedor.php");
CheckNivel();
$fecha = getdate();
$anio = $fecha['year'];

extract($_REQUEST);

if ($_SESSION['carro']=="")
  { 
	header("Location:newFacturaPedido.php?".SID);
  }	else
  {
	$carro=$_SESSION['carro'];
	$idSucursalE=$_SESSION['idSucursal'];
	$fecha=$fecha;
	$estado='1';
	$idEmpresa=$_SESSION['idEmpresa'];
	$suma=0;
	foreach($carro as $k => $v)
	{
   		$suma=$suma+$v['total'];
	}
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);

    $nTotal=0;
	foreach($carro as $k => $v)
	{
		$nCantidad= $v['cantidad'];
		$nPrecio= $v['costoUnit'];
		$nTotal=$nTotal + ($nCantidad*$nPrecio);
	};
	$nIGV = $nTotal*0.19;
	$nImporteTotal = $nTotal*1.19;
    $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
    $consultaConfig = consulta($sqlConfig);
    $rsConfig=leer_registro($consultaConfig);
    $serieComp=$rsConfig['serieFactura'];
    $numeroComp=$rsConfig['numeroFactura'] + 1;
    $codigoComprobante = ceros($serieComp,3)."-".ceros($numeroComp,6);
    $sqlGrabarConfig = "UPDATE config SET serieFactura='$serieComp', numeroFactura = '$numeroComp' WHERE anio='$anio'";
	$resultadoGrabarConfig = mysql_query($sqlGrabarConfig);

    $adc="INSERT INTO comprobante 
(CLIENTE_idCliente,PEDIDO_idPedido, tipoComprobante, serieComp, numeroComp, codComprobante, fecha, importeNeto, importeIGV, descuento, importeTotal, importeInicial, importeSaldo, estado, cuotas, anulado, idSucursalE, idVendedor) VALUES ('$idCliente', '0', 'Factura', '$serieComp', '$numeroComp', '$codigoComprobante', '$fecha', '$nTotal', '$nIGV', '0', '$nImporteTotal', '$nImporteTotal', '0', '1','1','0','$idSucursalE','$idVendedor')";	
	$resultado = mysql_query($adc);
    $ultimoregistro = mysql_insert_id();
	foreach($carro as $k => $v)
	{
		$PRODUCTO_idProducto= $v['idProducto'];
		$cantEntrada= $v['cantidad'];
		$costoU= $v['costoUnit'];
		$valorEntrada=$v['total'];
		$idSerie="";
	    $adc1="INSERT INTO det_comprobante (COMPROBANTE_idComprobante, precioVenta, cantidad, importe, idProducto, idSerie) VALUES ('$ultimoregistro', '$costoU', '$cantEntrada', '$valorEntrada', '$PRODUCTO_idProducto','$idSerie')";	
		$resultado = mysql_query($adc1);
		$idUbicacion=$_SESSION['idSucursal'];
	};
	if ($resultado) 
	{
		$sql = "COMMIT";
		$resultado = mysql_query($sql);
		$_SESSION['carro']="";
		unset($_SESSION['carro']);
		header('Location: index.php?msg=1');
	}  else
	{
		$sql = "ROLLBACK;";
		$resultado = mysql_query($sql);
		$_SESSION['carro']="";
		unset($_SESSION['carro']);
		header('Location: index.php?msg=2');
	}
}
?>