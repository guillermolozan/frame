<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
	$Monto = $_POST['monto'];
	$sql1 = "select * from amortizar WHERE idamortizar='$_POST[idamortizar]'"; 
	$registro = consulta($sql1);
	$reg = leer_registro($registro);
	$encontrado = numero_registros($registro);
	if($encontrado == '1')
	{
     	$sql="delete from amortizar where idamortizar='$_POST[idamortizar]'";
	    $rs=consulta($sql);
		
      $sqlSaldo="SELECT monto, saldo FROM cuotas WHERE idcuotas='$_POST[idcuotas]'";
	  $resultDeuda = mysql_query($sqlSaldo);
      $MontoDeuda = 0;
	  $Saldo = 0;
      while($rsDeuda = leer_registro($resultDeuda)) {
  	    $MontoDeuda = $rsDeuda['monto'];
  	    $Saldo = $rsDeuda['saldo'];
      }
  	  $Saldo = $Saldo + $Monto;
	  $Cancelado=0;
	  if ($Saldo<=0) {
    	$Cancelado=1;
		$Saldo = 0;
	  }
	
      $adc="UPDATE cuotas SET saldo='$Saldo', cancelado='$Cancelado' WHERE idcuotas='$_POST[idcuotas]'";
	  $resultado = mysql_query($adc);
		
		
    	header("location: index.php?msg=3");
	}
?>