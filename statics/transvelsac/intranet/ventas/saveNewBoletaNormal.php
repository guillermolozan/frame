<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$fechaActual = getdate();
$anio = $fechaActual['year'];
extract($_REQUEST);

if ($_SESSION['carro']=="")
{ 
	header("Location:newBoletaNormal.php?".SID);
}
else
{
	$carro=$_SESSION['carro'];
	$idSucursalE=$_SESSION['idSucursal'];
	$fecha=$fecha;
	$estado='1';
	$idEmpresa=$_SESSION['idEmpresa'];
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);
	
    $nTotal=0;
	foreach($carro as $k => $v)
	{
      if ($calculoMargen=="1") {
		$nCantidad= $v['cantidad'];
		$nPrecio= $v['precioCompra'];
	  } else {
		$nCantidad= $v['cantidad'];
		$nPrecio= $v['precioVenta'];
	  }
	  $nTotal=$nTotal + ($nCantidad*$nPrecio);
	};
	$nIGV = 0;
    if ($calculoMargen=="1") {
       $valor = $nTotal;
	   $porcentaje = calPorcentajeTotal($valor);
       $nTotal = ($nTotal * (1 + ($porcentaje/100)));
    }
	$nImporteTotal = $nTotal;
    $nTotal = round($nTotal * 100) / 100;
    $nImporteTotalSinInteres = $nImporteTotal;
    $nImporteTotal = round($nImporteTotal * 100) / 100;

    $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
    $consultaConfig = consulta($sqlConfig);
    $rsConfig=leer_registro($consultaConfig);
	$serieComp=$rsConfig['serieBoleta'];
	$numeroComp=$rsConfig['numeroBoleta'] + 1;
	$codigoComprobante = ceros($serieComp,3)."-".ceros($numeroComp,6);
    $sqlGrabarConfig = "UPDATE config SET serieBoleta='$serieComp', numeroBoleta='$numeroComp' WHERE anio='$anio'";
	$resultadoGrabarConfig = mysql_query($sqlGrabarConfig);

    $fechaActual = date('Y-m-d');
    $importeInteres = 0;
	if ($TipoVenta=='1') {
	  $tipoInteres=1;
	  $estadoPago = '1';
	  $nCuotas = '1';
	} else {
	  $estadoPago = '0';
	  $nCuotas = $nroCuotas;
	}
    $adc="INSERT INTO comprobante (CLIENTE_idCliente, PEDIDO_idPedido, tipoComprobante, serieComp, numeroComp, codComprobante, fecha, importeNeto, importeIGV, importeInteres, descuento, importeTotal, importeInicial, importeSaldo, tipoInteres, tasaInteres, tipoCalculoUtilidad, estado, cuotas, anulado, idSucursalE, idVendedor) VALUES ('$idCliente', '0', 'Boleta', '$serieComp', '$numeroComp', '$codigoComprobante', '$fechaActual', '$nTotal', '$nIGV', '$importeInteres', '0', '$nImporteTotal', '0', '0', '$tipoInteres', '$tasaInteres', '$calculoMargen', '$estadoPago', '$nCuotas', '0', '$idSucursalE', '$idVendedor')";	
	$resultado = mysql_query($adc);
    $ultimoregistro = mysql_insert_id();
	foreach($carro as $k => $v)
	{
		$PRODUCTO_idProducto= $v['idProducto'];
		$cantEntrada= $v['cantidad'];
		$costoU= $v['costoUnit'];
		$valorEntrada=$v['total'];
		$idSerie=$v['IdSerie'];
	    $adc1="INSERT INTO det_comprobante (COMPROBANTE_idComprobante, precioVenta, cantidad, importe, idProducto, idSerie) VALUES ('$ultimoregistro', '$costoU', '$cantEntrada', '$valorEntrada', '$PRODUCTO_idProducto','$idSerie')";	
		$resultado = mysql_query($adc1);
	};
	if ($TipoVenta!='1') {
      $pagos[]=array();
      $fechas[]=array();
      for ( $i = 1 ; $i <= $nroCuotas ; $i ++) {
        $a="pago".$i;
	    $xx =$$a;
        $pagos[$i]=$xx;
      };
      for ( $i = 1 ; $i <= $nroCuotas ; $i ++) {
        $b="fecha".$i;
	    $xx =$$b;
        $fechas[$i]=$xx;
      };
      $tmpTotalconIntereses = 0;
	  for ( $i = 1 ; $i <= $nroCuotas ; $i ++)
	  {
	    $npago = $pagos[$i];
	    $dfechaOld = $fechas[$i];
		
		$dia = substr($dfechaOld, 0, 2);
		$mes = substr($dfechaOld, 3, 2);
		$anyo = substr($dfechaOld, 6, 4);		
	    $dfecha = "$anyo-$mes-$dia";
		if ($npago > 0) {
		  $sql="insert into pago_cliente (COMPROBANTE_idComprobante,importe,fechaVencimiento)
				values ('$ultimoregistro', '$npago', '$dfecha')";
		  $resultado = mysql_query($sql);
		  $tmpTotalconIntereses = $tmpTotalconIntereses + $npago;
		}
	  };
	  $dfecha = date("Y-m-d",time());
      $tmpTotalconIntereses = $tmpTotalconIntereses + $cuotaInicial;
      $importeInteres = $tmpTotalconIntereses - $nImporteTotalSinInteres;
      $importeInteres = round($importeInteres * 100) / 100;
	  $sql="insert into pago_cliente (COMPROBANTE_idComprobante,importe,fechaVencimiento)
			values ('$ultimoregistro', '$cuotaInicial', '$dfecha')";
	  $resultado = mysql_query($sql);
      $sqlGrabarConfig = "UPDATE comprobante SET importeInteres='$importeInteres' WHERE idComprobante='$ultimoregistro'";
	  $resultado = mysql_query($sqlGrabarConfig);
     }
		if ($resultado) 
		{
			$sql = "COMMIT";
			$resultado = mysql_query($sql);
			$_SESSION['carro']="";
			unset($_SESSION['carro']);
			header('Location: index.php?msg=1');
		}
		else
		{
			$sql = "ROLLBACK;";
			$resultado = mysql_query($sql);
			$_SESSION['carro']="";
			unset($_SESSION['carro']);
			header('Location: index.php?msg=2');
		}
	}
?>