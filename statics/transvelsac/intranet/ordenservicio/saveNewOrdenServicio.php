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
	
	$Placa = $_POST['placa'];
	$Descripcion = $_POST['descripcion'];
	$Kilometraje = $_POST['kilometraje'];
	$Fecha = $_POST['fecha'];
	$Fecha = fechaAGrabar($Fecha);
	
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
	
    $nTotal = round($nTotal * 100) / 100;

    $fechaActual = date('Y-m-d');
	$FechaActual = fechaAlta('DH');
	$idUsuario = $_SESSION['idUsuario'];	
	
    $adc="INSERT INTO ordencab (placa, fecha, monto, descripcion, kilometraje, fechareg, usuarioreg) VALUES ('$Placa', '$Fecha', '$nTotal', '$Descripcion', '$Kilometraje', '$FechaActual', '$idUsuario')";	
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
	    $adc1="INSERT INTO ordendet (idordencab, idproducto, idunimed, cantidad, precio) VALUES ('$ultimoregistro', '$idProducto', '$IdUniMed', '$Cantidad', '$Precio')";	
		$resultado = mysql_query($adc1);
		
		$sqlStock = "SELECT SUM(equivalencias.equivalencia * stock.stock) as stocktotal, equivalencias.idunimed, equivalencias.equivalencia from equivalencias LEFT JOIN stock ON equivalencias.idproducto=stock.idproducto AND equivalencias.idunimed=stock.idunimed WHERE equivalencias.idproducto='$idProducto' GROUP BY equivalencias.idproducto ";
        $consultaStock = consulta($sqlStock);
        $rsStock=leer_registro($consultaStock);
        $StockTotal=$rsStock['stocktotal'];
	
		$sqlEquivalencia = "SELECT equivalencias.equivalencia from equivalencias LEFT JOIN stock ON equivalencias.idproducto=stock.idproducto AND equivalencias.idunimed=stock.idunimed WHERE equivalencias.idproducto='$idProducto' AND equivalencias.idunimed='$IdUniMed' ";
		echo $sqlEquivalencia;
        $consultaEquivalencia = consulta($sqlEquivalencia);
        $rsEquivalencia=leer_registro($consultaEquivalencia);
        $Equivalencia=$rsEquivalencia['equivalencia'];
		
		$sqlMinimo = "SELECT idunimed from equivalencias WHERE idproducto='$idProducto' AND minimo='1' ";
        $consultaMinimo = consulta($sqlMinimo);
        $rsMinimo=leer_registro($consultaMinimo);
        $IdUniMedMinimo=$rsMinimo['idunimed'];
	
	    $CantidadVenta = $Cantidad * $Equivalencia;
		if ($CantidadVenta <= $StockTotal) {
		  $StockFinal = $StockTotal - $CantidadVenta;
  	      $adc1="UPDATE stock SET stock='0' WHERE idproducto='$idProducto' ";	
		  $resultado = mysql_query($adc1);
		  
  	      $adc1="UPDATE stock SET stock='$StockFinal' WHERE idproducto='$idProducto' AND idunimed='$IdUniMedMinimo' ";	
		  $resultado = mysql_query($adc1);
			
		} else {
		  $StockFinal = $CantidadVenta - $StockTotal;
  	      $adc1="UPDATE stock SET stock='0' WHERE idproducto='$idProducto' ";	
		  $resultado = mysql_query($adc1);
		  
  	      $adc1="UPDATE stock SET stock='$StockFinal' WHERE idproducto='$idProducto' AND idunimed='$IdUniMedMinimo' ";	
		  $resultado = mysql_query($adc1);			
			
		}		
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