<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$fechaActual = getdate();
$anio = $fechaActual['year'];
extract($_REQUEST);

if ($_SESSION['carro']=="")
  { 
	header("Location:newFacturaNormal.php?".SID);
  }	else
  {
	$carro=$_SESSION['carro'];
	$idSucursalE=$_SESSION['idSucursal'];
	$estado='1';
	$idEmpresa=$_SESSION['idEmpresa'];
	
	$IdCliente = $_POST['idcliente'];
	$RazonSocial = $_POST['razonsocial'];
	$Direccion = $_POST['direccion'];
	$Adelanto = $_POST['adelanto'];
	$TipoVenta = $_POST['tipoventa'];
    if(!isset($Adelanto)){$Adelanto=0;}
	
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);

    $nTotal=0;
	foreach($carro as $k => $v)
	{
	  $nCantidad= $v['cantidad'];
	  $nPrecio= $v['precio'];
	  $nTotal=$nTotal + ($nCantidad*$nPrecio);
	};
	$nImporteTotal = $nTotal;
	$nTotal = $nTotal / 1.18;
	$nIGV = $nImporteTotal - $nTotal;
	
    $nTotal = round($nTotal * 100) / 100;
    $nIGV = round($nIGV * 100) / 100;
    $nImporteTotal = round($nImporteTotal * 100) / 100;

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

    $fechaActual = date('Y-m-d');
    $importeInteres = 0;
    $Saldo = 0;
	if ($TipoVenta=='1') {
	  $estadoPago = '1';
	  $nCuotas = '1';
	} else {
	  $Saldo= $nImporteTotal - $Adelanto;
	  $estadoPago = '0';
	  $nCuotas = 2;
	}
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $adc="INSERT INTO ventascab (idsucursal, idtipodoc, serie, numero, fecha, idcliente, cliente, monto, igv, tipoventa, cancelado, saldo, fechareg, usuarioreg) VALUES ('$idSucursalE', 'FA', '$Serie', '$Numero', '$fechaActual', '$IdCliente', '$RazonSocial', '$nImporteTotal', '$nIGV', '$TipoVenta', '$estadoPago', '$Saldo', '$FechaActual', '$idUsuario')";	
	$resultado = mysql_query($adc);
    $ultimoregistro = mysql_insert_id();
	foreach($carro as $k => $v)
	{
		$idProducto= $v['idproducto'];
		$Producto= $v['producto'];
		$Cantidad= $v['cantidad'];
		$Precio= $v['precio'];
		$IdUniMed= $v['idunimed'];
		$Total=$v['total'];
        if(!isset($idProducto)){$idProducto=0;}
        if($idProducto=='') {$idProducto=0;}
	    $adc1="INSERT INTO ventasdet (idventascab, idproducto, producto, idunimed, cantidad, precio, subtotal) VALUES ('$ultimoregistro', '$idProducto', '$Producto', '$IdUniMed', '$Cantidad', '$Precio', '$Total')";	
		$resultado = mysql_query($adc1);
	};

	if ($TipoVenta=='1') {
	  $sql="insert into caja (idsucursal, tipomovimiento,tiporegistro,tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$idSucursalE', '1', '1', 'FA', '$Serie', '$Numero', '$IdCliente', '$ultimoregistro', 'FA', '$Serie', '$Numero', '$fechaActual', '$nImporteTotal', '1', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);		
	} else {
	  $sql="insert into caja (idsucursal, tipomovimiento,tiporegistro,tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$idSucursalE', '1', '1', 'FA', '$Serie', '$Numero', '$IdCliente', '$ultimoregistro', 'FA', '$Serie', '$Numero', '$fechaActual', '$Adelanto', '1', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);		
	  
	  $sql="insert into cuotas (idventascab, fechageneracion, fechavencimiento, monto, saldo, fechareg, usuarioreg) values ('$ultimoregistro', '$fechaActual', '$fechaActual', '$Saldo', '$Saldo', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);		
	}
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