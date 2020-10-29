<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript">

	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
	$(function() {
		$("#datepicker1").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
</script>
</head>
<body>
   <div id="container">
   <div id="datos">
     <?php
		include("../menuSecund.php");
	 ?>
   </div>
   <div id="menu"><?php include("../menu.php") ?></div>
   <div id="mainContent">
   <p class="titulo">Buscar Datos</p>
   <div id="busqueda" >
   <form method="post" action="cuadrecaja.php" name="frmBuscarVenta" id="frmBuscarVenta" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
   	<label>Tipo de Comprobante 
    <select name="idTipoComprobante" id="idTipoComprobante">
       	<option value="0">Seleccione</option>
       	<option value="1">Factura</option>
      	<option value="2">Boleta</option>
       	<option value="3">Recibo</option>
    </select>	</label>
   	<label>&nbsp;Rango de fecha desde :</label>
    <input type="text" name="fechaIni" id="datepicker" readonly="readonly" size="10" value="<?php echo $fechaIni;?>"/>&nbsp;Hasta
	<input type="text" name="fechaFin" id="datepicker1" readonly="readonly" size="10" value="<?php echo $fechaFin;?>"/>&nbsp;&nbsp;
    <input type="submit" id="buscarVenta" name="buscarVenta" value="Calcular" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   </form></div>
   <p class="titulo">Resultado del Calculo</p>
   <table width="50%" align="center" style="margin:0 10px;">
       <tr>
       <?php
		$sqlE="SELECT EMPRESA_idEmpresa FROM sucursal WHERE idSucursal = '$_SESSION[idSucursal]'";
 	    $consultaE = consulta($sqlE);
		while($rsE = leer_registro($consultaE))
		{
           $idEmpresa = $rsE['EMPRESA_idEmpresa'];
		}
	    $consultaBase = "SELECT cp.tipoComprobProv,sum(pp.importe) as importeTotal FROM pago_prov pp LEFT JOIN comprobante_prov cp ON pp.COMPROBANTE_PROV_idComprobProv = cp.idComprobProv ";
	if(isset($_POST['buscarVenta'])) 
	{	$buscarVenta= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
	}
	else 
		{$buscarVenta='0';}
	
	if(isset($_GET['BVenta'])) 
		{$BVenta= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
	}
	else 
		{$BVenta='0';}
		
	$filtro = "";
	
  if($buscarVenta=='1' or $BVenta=='1')	
  {
	if(isset($fechaIni) and $fechaIni != "")
	{
		if(isset($fechaFin) and $fechaFin != "")
		{	if($filtro != "")
			{
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . " pp.fechaPagoReal BETWEEN '$fechaIni' AND '$fechaFin' ";
			$cadena2="fechaIni=".$fechaIni;
			$cadena3="fechaFin=".$fechaFin;
		}
		else
		{
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "fecha >= '$fechaIni'";
			$cadena2="fechaIni=".$fechaIni;
		}
	}
	elseif(isset($fechaFin) and $fechaFin != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
		}
		$filtro = $filtro . " " . "fecha <= '$fechaFin'";
		$cadena3="fechaFin=".$fechaFin;
	}
  }
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	
	$filtro1 = " cp.idEmpresa='$idEmpresa'";
	
	if($filtro == ""){
		$filtro = " " . "WHERE" . $filtro1;
	}
	else {
		$filtro = $filtro. " " . "AND" . $filtro1;
	}
	
	$instruccion1= $consultaBase . $filtro;
	$q = consulta($instruccion1);
	$total_registros = numero_registros($q);
	$registros=15;
	if (!isset($_GET['pagina'])) { 
    	$inicio = 0; 
	    $pagina = 1;
		$con='0'; 
	} 
	else { 
		$pagina=$_GET['pagina'];
    	$inicio = ($pagina - 1) * $registros; 
		$con=($pagina-1)*$registros;
	} 
	$up="DESC";
	$orden="cp.tipoComprobProv";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
    $estado = "1";
	$instruccion = $instruccion1 ." AND estadoPago=$estado GROUP BY cp.tipoComprobProv ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
  ?>
     <td height="10" colspan="2">
       <div align="left" style="width:300px; float:left"><b>Egresos por Compras: </b></div>
       </td>
       </tr>
          <tr>
            <td width="20%" align="center" class="title"><div align="center" >Item</div></td>
            <td width="40%" align="center" class="title"><div align="center">Tipo Comp.</div></td>
            <td width="40%" align="center" class="title"><div align="center">Monto</div></td>
          </tr>
      <?php
		    $montoTotal = 0;
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
	  ?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['tipoComprobProv']; ?></td>    
            <td class="tdcont" align="right"><?php echo redondeado($rs['importeTotal']); ?>&nbsp;&nbsp;</td>
          </tr>
        <?php		
             $montoTotal = $montoTotal + $rs['importeTotal'];
	       }
	       mysql_free_result($q);
	       mysql_free_result($consulta);	
	    ?>
  <tr> 
     <td colspan="0" >&nbsp;&nbsp;</td>
     <td colspan="0" class="title" >&nbsp;&nbsp;TOTAL COMPRAS</td>
     <td class="tdcont" align="right">S/. <?php echo redondeado($montoTotal);?></td>
  </tr>
 </table><br />
 <table width="80%" align="center" style="margin:0 10px;">
  <tr>
  <?php 
	if(isset($_POST['buscarVenta'])) 
	{	$buscarVenta= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
	}
	else {$buscarVenta='0';}
	if(isset($_GET['BVenta'])) 
		{$BVenta= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
	}
	else {$BVenta='0';}
		
	$filtro = " pp.estadoPago=1 ";
	$filtroComp = " estado=1 ";
	
  if($buscarVenta=='1' or $BVenta=='1')	
  {
	if(isset($fechaIni) and $fechaIni != "")
	{
		if(isset($fechaFin) and $fechaFin != "")
		{	
		    if($filtro != "")
			{
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . " pp.fechaPagoReal BETWEEN '$fechaIni' AND '$fechaFin' ";
			$cadena2="fechaIni=".$fechaIni;
			$cadena3="fechaFin=".$fechaFin;
		    if($filtroComp != "")
			{
				$filtroComp .= " " . "AND";
			}
			$filtroComp = $filtroComp . " " . " fecha BETWEEN '$fechaIni' AND '$fechaFin' ";
		}
		else
		{
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "pp.fechaPagoReal >= '$fechaIni'";
			$cadena2="fechaIni=".$fechaIni;
		}
	}
	elseif(isset($fechaFin) and $fechaFin != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
		}
		$filtro = $filtro . " " . "pp.fechaPagoReal <= '$fechaFin'";
		$cadena3="fechaFin=".$fechaFin;
	}
   }
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	$filtro1 = " idSucursalE='$_SESSION[idSucursal]'";
	if($filtroComp != ""){
		$filtroComp = " " . "WHERE" . $filtroComp;
	}
	$filtroComp1 = " idSucursalE='$_SESSION[idSucursal]'";
	if($filtro == ""){
		$filtro = " " . "WHERE" . $filtro1;
	}
	else {
		$filtro = $filtro. " " . "AND" . $filtro1;
	}
	if($filtroComp == ""){
		$filtroComp = " " . "WHERE" . $filtroComp1;
	}
	else {
		$filtroComp = $filtroComp. " " . "AND" . $filtroComp1;
	}
	$filtro = $filtro." AND estadoPago=$estado ";
	$consultaBase = "SELECT tipoComprobante,sum(importeTotal) as importeTotal FROM comprobante ".$filtroComp." GROUP BY tipoComprobante";
	
	$instruccion1= $consultaBase;
	$q = consulta($instruccion1);
	$total_registros = numero_registros($q);
	$registros=15;
	if (!isset($_GET['pagina'])) { 
    	$inicio = 0; 
	    $pagina = 1;
		$con='0'; 
	} 
	else { 
		$pagina=$_GET['pagina'];
    	$inicio = ($pagina - 1) * $registros; 
		$con=($pagina-1)*$registros;
	} 
	$up="DESC";
	$orden="tipoComprobante";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
  ?>
    <td height="20" colspan="5">
    <div align="left" style="width:300px; float:left"><b>Ingresos por Ventas: </b></div>
     </td>
     </tr>
          <tr>
            <td width="10%" align="center" class="title"><div align="center" >Item</div></td>
            <td width="30%" align="center" class="title"><div align="center">Tipo Comp.</div></td>
            <td width="20%" align="center" class="title"><div align="center">Monto</div></td>
          </tr>
    <?php
		    $montoTotalC = 0;
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
	?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['tipoComprobante']; ?></td>    
            <td class="tdcont" align="right"><?php echo redondeado($rs['importeTotal']); ?>&nbsp;&nbsp;</td>
          </tr>
    <?php		
             $montoTotalC = $montoTotalC + $rs['importeTotal'];
	       }
	       mysql_free_result($q);
	       mysql_free_result($consulta);	
	?>
  		  <tr> 
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" class="title" >&nbsp;&nbsp;TOTAL COMPRAS</td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoTotalC);?></td>
         </tr>
      </table><br />
      
      <table width="50%" align="center" style="margin:0 10px;">
		 <tr> 
           <td colspan="1" class="title" >&nbsp;&nbsp;SALDO (Ingresos - Egresos) --> </td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoTotalC - $montoTotal);?></td>
         </tr>
      </table>
      <!-- end #mainContent -->
      </div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>