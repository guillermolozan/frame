<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
$idPagoCliente=$_GET['idPagoCliente'];
$instruccion = "SELECT * from pago_cliente where idPagoCliente='$idPagoCliente'"; 
$consulta = consulta($instruccion);
$resultado = leer_registro($consulta);
$estado=$resultado['estadoPago'];
$idComprobante=$resultado['COMPROBANTE_idComprobante'];
$fechaPagoReal = date('Y-m-d');

if ( $estado==0 ){		
	
	$sql="UPDATE pago_cliente SET estadoPago=1,fechaPagoReal='$fechaPagoReal' WHERE idPagoCliente='$idPagoCliente'";
	$rsql=consulta($sql);
	
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
					
	header("Location:cancelarFactura.php?idComprobante=".$idComprobante);
}else{
	$sql="UPDATE pago_cliente SET estadoPago=0 WHERE idPagoCliente='$idPagoCliente'";
	$rsql=consulta($sql);
	
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
	
	header("Location:cancelarFactura.php?idComprobante=".$idComprobante);
}
?>