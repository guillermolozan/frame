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
	$idSucursal=$_SESSION['idSucursal'];
	$estado='1';
	$idEmpresa=$_SESSION['idEmpresa'];
	
	$IdCliente = $_POST['idcliente'];
	$RazonSocial = $_POST['razonsocial'];
	$Direccion = $_POST['direccion'];
	$Adelanto = 0;
	$TipoCompra = $_POST['tipocompra'];
    $Serie=ceros($_POST['serie'],3);
    $Numero=ceros($_POST['numero'],8);
    if(isset($Adelanto)){
    	$Adelanto = $_POST['adelanto'];
	}
	
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
	$nIGV = $nTotal / 1.18;
	$nImporteTotal = $nTotal - $nIGV;
	
    $nTotal = round($nTotal * 100) / 100;
    $nIGV = round($nIGV * 100) / 100;
    $nImporteTotal = round($nImporteTotal * 100) / 100;

    $fechaActual = date('Y-m-d');
    $importeInteres = 0;
    $Saldo = 0;
	if ($TipoCompra=='1') {
	  $estadoPago = '1';
	  $nCuotas = '1';
	} else {
	  $Saldo= $nImporteTotal - $Adelanto;
	  $estadoPago = '0';
	  $nCuotas = 2;
	}
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $adc="INSERT INTO comprascab (idtipodoc, idsucursal, serie, numero, fecha, idproveedor, proveedor, monto, igv, adelanto, tipocompra, cancelado, saldo, fechareg, usuarioreg) VALUES ('FA', '$idSucursal', '$Serie', '$Numero', '$fechaActual', '$IdCliente', '$RazonSocial', '$nImporteTotal', '$nIGV', '$Adelanto', '$TipoCompra', '$estadoPago', '$Saldo', '$FechaActual', '$idUsuario')";	
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
	    $adc1="INSERT INTO comprasdet (idcomprascab, idproducto, idunimed, cantidad, precio, subtotal) VALUES ('$ultimoregistro', '$idProducto', '$IdUniMed', '$Cantidad', '$Precio', '$Total')";	
		$resultado = mysql_query($adc1);
		
        $sqlStock = "SELECT stock FROM stock WHERE idproducto='$idProducto' AND idunimed='$IdUniMed' AND idsucursal='$idSucursal' ";
        $consultaStock = consulta($sqlStock);
        $rsStock=leer_registro($consultaStock);
        $StockActual=$rsStock['stock'];
		$NuevoStock = $StockActual + $Cantidad;
		$upStock = "UPDATE stock SET stock='$NuevoStock' WHERE idproducto='$idProducto' AND idunimed='$IdUniMed' AND idsucursal='$idSucursal' ";
		echo $upStock;
		$resultado = mysql_query($upStock);
		
	};

	if ($TipoCompra=='1') {
	  $sql="insert into caja (idsucursal, tipomovimiento, tiporegistro, tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$idSucursal', '2', '3', 'FA', '$Serie', '$Numero', '$IdCliente', '$ultimoregistro', 'FA', '$Serie', '$Numero', '$fechaActual', '$nImporteTotal', '1', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);		
	} else {
	  $sql="insert into caja (idsucursal, tipomovimiento,tiporegistro,tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$idSucursal', '2', '3', 'FA', '$Serie', '$Numero', '$IdCliente', '$ultimoregistro', 'FA', '$Serie', '$Numero', '$fechaActual', '$Adelanto', '1', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);		
	  
	  $sql="insert into cuotascompra (idcomprascab, fechageneracion, fechavencimiento, monto, saldo, fechareg, usuarioreg) values ('$ultimoregistro', '$fechaActual', '$fechaActual', '$Saldo', '$Saldo', '$FechaActual', '$idUsuario')";
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