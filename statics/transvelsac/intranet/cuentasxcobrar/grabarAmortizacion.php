<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$fechaActual = getdate();
extract($_REQUEST);
	
	$IdCuotas = $_POST['idcuotas'];
	$IdCliente = $_POST['idcliente'];
	$IdTipoDoc = $_POST['idtipodoc'];
	$idSucursal=$_SESSION['idSucursal'];
	$Serie = $_POST['serie'];
	$Numero = $_POST['numero'];
	$Fecha = $_POST['fecha'];
	$Monto = $_POST['monto'];
	
	$sql = "SET AUTOCOMMIT=0;";
	$resultado = mysql_query($sql); 
	$sql = "BEGIN;";
	$resultado = mysql_query($sql);

	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $adc="INSERT INTO amortizar (idcuotas, idtipodoc, serie, numero, fecha, monto, fechareg, usuarioreg) VALUES ('$IdCuotas','$IdTipoDoc', '$Serie', '$Numero', '$Fecha', '$Monto', '$FechaActual', '$idUsuario')";	
	echo $adc;
	$resultado = mysql_query($adc);
		
    $sqlSaldo="SELECT monto, saldo, idventascab FROM cuotas WHERE idcuotas='$IdCuotas'";	
	$resultDeuda = mysql_query($sqlSaldo);
    $MontoDeuda = 0;
	$Saldo = 0;
	$IdVentasCab = 0;
    while($rsDeuda = leer_registro($resultDeuda)) {
  	  $MontoDeuda = $rsDeuda['monto'];
	  $Saldo = $rsDeuda['saldo'];
	  $IdVentasCab = $rsDeuda['idventascab'];
    }
	$Saldo = $Saldo - $Monto;
	$Cancelado=0;
	if ($Saldo<=0) {
    	$Cancelado=1;
		$Saldo = 0;
        $adc="UPDATE ventascab SET cancelado='$Cancelado' WHERE idventascab='$IdVentasCab'";
	    $resultado = mysql_query($adc);
	}
	
    $adc="UPDATE cuotas SET saldo='$Saldo', cancelado='$Cancelado' WHERE idcuotas='$IdCuotas'";
	$resultado = mysql_query($adc);
	
	  $sql="insert into caja (idsucursal, tipomovimiento,tiporegistro,tipodoc, serie, numero, idcliprov, iddocumentoorigen, tipodocdo, seriedo, numerodo, fecha, monto, tipopagocobro, fechareg, usuarioreg) values ('$idSucursal', '1', '1', '$IdTipoDoc', '$Serie', '$Numero', '$IdCliente', '$IdVentasCab', '$IdTipoDoc', '$Serie', '$Numero', '$Fecha', '$Monto', '1', '$FechaActual', '$idUsuario')";
	  $resultado = mysql_query($sql);	
	
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
?>