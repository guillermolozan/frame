<?php
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();

$idComprobante=$_POST['idComprobante'];
$sql = "SET AUTOCOMMIT=0;";
$resultado = mysql_query($sql); 

$sql = "BEGIN;";
$resultado = mysql_query($sql);

$instruccion = "SELECT * FROM det_comprobante WHERE COMPROBANTE_idComprobante='$idComprobante'";
$consulta = consulta($instruccion);
while($rs3 = leer_registro($consulta))
{
  $idPagoCliente = $rs3['PAGO_CLIENTE_idPagoCliente'];
  $sql = "SELECT * FROM pago_cliente WHERE idPagoCliente='$idPagoCliente'";
  $consulta1 = consulta($sql);
  while($rs = leer_registro($consulta1))
  {
	  $tmpidComprobante = $rs['COMPROBANTE_idComprobante'];
	  $sql="UPDATE comprobante SET estado='No Pagado' WHERE idComprobante='$tmpidComprobante'";
	  $rsql=consulta($sql);
      $sql2 = "UPDATE pago_cliente SET estadoPago=0 WHERE idPagoCliente='$idPagoCliente'";
      $consulta2=consulta($sql2);
  }
}

$sql3="DELETE FROM pago_cliente WHERE COMPROBANTE_idComprobante = '$idComprobante'";
echo "$sql3"."<br>";
$resultado = mysql_query($sql3);

$sql2 = "DELETE FROM det_comprobante WHERE COMPROBANTE_idComprobante = '$idComprobante'";
echo "$sql2"."<br>";
$resultado = mysql_query($sql2);

$sql="DELETE FROM comprobante WHERE idComprobante = '$idComprobante'";
echo "$sql"."<br>";
$resultado = mysql_query($sql);

if ($resultado) {
	echo 'OK';
	$sql = "COMMIT";
	$resultado = mysql_query($sql);
	header('Location: index.php?msg=3');
}
else
{
	echo 'MAL';
	$sql = "ROLLBACK;";
	$resultado = mysql_query($sql);
	header("location: index.php?msg=4");
}
			
?>