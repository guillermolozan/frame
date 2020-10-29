<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
$fechaActual = getdate();
$anio = $fechaActual['year'];
if(isset($_POST['btnGuardar']))
{	
	$idSucursalE=$_SESSION['idSucursal'];
	$cuota = $_POST['cuota'];
	$idCliente = $_POST['idCliente'];
    $fechaPagoReal = date('Y-m-d');
    $idComprobante = 0;
	$nMontoDoc = 0;
	for($i=0;$i < count($cuota);$i++)    
	{
	  $idPagoCliente = $cuota[$i];
      $instruccion = "UPDATE pago_cliente SET estadoPago=1,fechaPagoReal='$fechaPagoReal' WHERE idPagoCliente='$idPagoCliente'";
      $consulta=consulta($instruccion);
      $tmpMontoCuota = 0;
  	  $sql = "SELECT * FROM pago_cliente WHERE idPagoCliente='$idPagoCliente'";
	  $consulta1 = consulta($sql);
	  while($rs = leer_registro($consulta1))
	  {
	    $idComprobante = $rs['COMPROBANTE_idComprobante'];
        $tmpMontoCuota = $rs['importe'];
	  }
	  $nMontoDoc = $nMontoDoc + $tmpMontoCuota;

	  $sql4 = "SELECT * FROM pago_cliente WHERE COMPROBANTE_idComprobante='$idComprobante' and estadoPago=0";
	  $result4=consulta($sql4);
	  $rs4=leer_registro($result4);
	  $num=numero_registros($result4);
	  if($num==0)
	  {
		$sql="UPDATE comprobante SET estado='Pagado' WHERE idComprobante='$idComprobante'";
		$rsql=consulta($sql);
	  }
	  else
	  {
		$sql="UPDATE comprobante SET estado='No Pagado' WHERE idComprobante='$idComprobante'";
		$rsql=consulta($sql);
	  }
	}
	
    $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
    $consultaConfig = consulta($sqlConfig);
    $rsConfig=leer_registro($consultaConfig);
    $serieComp=$rsConfig['serieRecibo'];
    $numeroComp=$rsConfig['numeroRecibo'] + 1;
    $codigoComprobante = ceros($serieComp,3)."-".ceros($numeroComp,6);
    $sqlGrabarConfig = "UPDATE config SET serieRecibo='$serieComp', numeroRecibo='$numeroComp' WHERE anio='$anio'";
	$resultadoGrabarConfig = mysql_query($sqlGrabarConfig);
    $fechaActual = date('Y-m-d');
    $adc="INSERT INTO comprobante (CLIENTE_idCliente, PEDIDO_idPedido, tipoComprobante, serieComp, numeroComp, codComprobante, fecha, importeNeto, importeIGV, importeInteres, descuento, importeTotal, importeInicial, importeSaldo, tipoInteres, tasaInteres, tipoCalculoUtilidad, estado, cuotas, anulado, idSucursalE, idVendedor) VALUES ('$idCliente', '0', 'Recibo', '$serieComp', '$numeroComp', '$codigoComprobante', '$fechaActual', '$nMontoDoc', '0', '0', '0', '$nMontoDoc', '0', '0', '1', '0', '0', '1', '1', '0', '$idSucursalE', '0')";	
	$resultado = mysql_query($adc);
    $ultimoregistro = mysql_insert_id();
	for($i=0;$i < count($cuota);$i++)    
	{
	  $idPagoCliente = $cuota[$i];
  	  $sql = "SELECT * FROM pago_cliente WHERE idPagoCliente='$idPagoCliente'";
	  $consulta1 = consulta($sql);
      $valorEntrada = 0;
	  while($rs = leer_registro($consulta1))
	  {
        $valorEntrada = $rs['importe'];
	  }
	  $adc1="INSERT INTO det_comprobante (COMPROBANTE_idComprobante, precioVenta, cantidad, importe, idProducto,PAGO_CLIENTE_idPagoCliente) VALUES ('$ultimoregistro', '0', '1', '$valorEntrada', '0','$idPagoCliente')";	
	  $resultado = mysql_query($adc1);
    }	

	header("Location:index.php");
}
?>