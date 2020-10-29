<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
$fechaIni = date('d-m-Y');
$fechaFin = date('d-m-Y');
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
$documento = 1;
$modoconsulta = 1;
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}

function ejecutarDocum($valor)
{
   if ($valor==1) {
    $documento = 1;
  }
  if ($valor==2) {
    $documento = 2;
  }
  if ($valor==3) {
    $documento = 3;
  }
}
function modoConsulta($valor)
{
  if ($valor==1) {
    $modoconsulta = 1;
  }
  if ($valor==2) {
    $modoconsulta = 2;
  }
}
function cargarDocum()
{
      window.open('newOrdenServicio.php', '_self');
}
function visualizarDocum($idComprobante,$tipoComprobante,$tipoCalculoUtilidad)
{
  if ($tipoComprobante=="Factura") {
    window.open('verFactura.php?idComprobante=' + $idComprobante+'&tipoCalculoUtilidad='+$tipoCalculoUtilidad, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
  }
  if ($tipoComprobante=="Boleta") {
    window.open('verBoleta.php?idComprobante=' + $idComprobante+'&tipoCalculoUtilidad='+$tipoCalculoUtilidad, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
  }
  if ($tipoComprobante=="Recibo") {
    window.open('verRecibo.php?idComprobante=' + $idComprobante+'&tipoCalculoUtilidad='+$tipoCalculoUtilidad, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
  }
}

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
  <p class="titulo">Buscar Orden de Servicio</p>
  <?php 
	if(isset($_GET['msg']))
	{ 
		$display="";
		if($_GET['msg']=='1')
			{$msg= "La Orden de Servicio se agrego satisfactoriamente"; }
		elseif($_GET['msg']=='2')
			{$msg= "!! La Orden de Servicio no pudo ser registrada";}
		elseif($_GET['msg']=='3')
			{$msg= "La Orden de Servicio fue eliminada de la base de datos";}
		elseif($_GET['msg']=='4')
			{$msg= "!! La Orden de Servicio no pudo ser eliminada";}
		else
			{header("Location:index.php");}
	}
	else
		{$msg=''; $display="style='display:none'";
	}
	echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
	?>
   <div id="busqueda" >
   <form method="post" action="index.php" name="frmBuscarVenta" id="frmBuscarVenta" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
 	<label>Placa</label>
    &nbsp;<input type="text" name="IdPlaca" id="IdPlaca" size="8"/>        
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filtrar desde :
    <input type="text" name="fechaIni" id="datepicker" readonly="readonly" size="10" value="<?php echo $fechaIni;?>"/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta
	<input type="text" name="fechaFin" id="datepicker1" readonly="readonly" size="10" value="<?php echo $fechaFin;?>"/>
&nbsp;&nbsp;<input type="submit" id="buscarVenta" name="buscarVenta" value="Buscar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   </form>
</div>
  <table width="98%" align="center" style="margin:0 10px;">
   </tr>
    <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" name="newVenta" value="Nueva Orden de Servicio" onClick="javascript:cargarDocum()" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" /></td><tr>
  </table>
  <br />
  <p class="titulo">Resultado de la Busqueda</p>
  <table width="98%" align="center" style="margin:0 10px;">
    <tr>
    <?php 
	  $consultaBase = "SELECT * FROM ordencab  ";
	  if(isset($_POST['buscarVenta'])) 
	  {	$buscarVenta= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
		$IdPlaca = $_POST['IdPlaca'];
	  }
	  else 
		{$buscarVenta='0';}
	  if(isset($_GET['BVenta'])) 
		{$BVenta= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
		if(isset($_GET['IdPlaca'])) 
			{$IdPlaca= $_GET['IdPlaca'];}
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
			$filtro = $filtro . " " . "fecha BETWEEN '$fechaIni' AND '$fechaFin'";
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
	  if(isset($codComp) and $codComp != "")
	  {
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "placa LIKE '%$IdPlaca%'";
		$cadena4="placa=".$IdPlaca;
	  }
    }
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
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
	$orden="idordencab";//ordena por id	
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
    <td height="20" colspan="8">
    <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
    <div class="paginacion" align="right" >
    <?php 
      if($buscarVenta=='1' or $BVenta=='1') {
  	    $cadena="";
	    if($total_registros) {
		  if(isset($cadena1))
		  {
			$cadena=$cadena."&".$cadena1;	
		  }
		  if(isset($cadena2))
		  {
			$cadena=$cadena."&".$cadena2;	
		  }
		  if(isset($cadena3))
		  {
			$cadena=$cadena."&".$cadena3;	
		  }
		  if(isset($cadena4))
		  {
			$cadena=$cadena."&".$cadena4;	
		  }
		  if($cadena != "") {$cadena=$cadena."&BEnt=1";}
		  $principal="index";//pagina principal
		  if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1).$cadena."'><span class='pag'>< Anterior</span></a> ";
		  }
		  for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				{echo "<b>".$pagina."</b> "; }
			else
				{echo "<a href='$principal.php?pagina=$i".$cadena."'><span class='pag'>$i</span></a> "; }
		  }
		  if(($pagina + 1)<=$total_paginas) {
			echo " <a href='$principal.php?pagina=".($pagina+1).$cadena."'><span class='pag'>Siguiente ></span></a>";
		  }
	    } 
      }
     else
    {
  		if($total_registros) {
		
		$principal="index";//pagina principal
		if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a>";
		}
		
		for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				echo "<b>".$pagina."</b> "; 
			else
				echo "<a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a> "; 
		}
	  
		if(($pagina + 1)<=$total_paginas) {
			echo " <a href='$principal.php?pagina=".($pagina+1)."'><span class='pag'>Siguiente ></span></a>";
		}
		
	  } 
    }
  ?>
  </div>
  </td>
  </tr>
  <tr>
      <td width="6%" align="center" class="title"><div align="center" >Item</div></td>
      <td width="10%" align="center" class="title"><div align="center">Placa</div></td>
      <td width="10%" align="center" class="title"><div align="center">Fecha</div></td>
      <td width="40%" align="center" class="title"><div align="center">Descripcion</div></td>
      <td width="10%" align="center" class="title"><div align="center">Monto</div></td>
      <td width="6%" align="center" class="title"><div align="center">Kilometraje</div></td>
      <td width="15%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
  </tr>
  <?php
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
  ?>
      <tr>
      <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
      <td class="tdcont" align="center"><?php echo $rs['placa']; ?></td>    
      <td class="tdcont" align="center"><?php echo fechaAMostrar($rs['fecha']); ?></td>    
      <td class="tdcont" align="left"><?php echo substr($rs['descripcion'],0,50); ?></td>
      <td class="tdcont" align="right">S/. <?php echo redondeado($rs['monto']); ?>&nbsp;&nbsp;</td>
      <td class="tdcont" align="center"><?php echo $rs['kilometraje']; ?></td>    
      <td><div align="center" class="tdcont"><a href="#" onClick="javascript:visualizarDocum('<?php echo $rs['idordencab']; ?>')"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a>&nbsp;<a href="delDocumento.php?idVentasCab=<?php echo $rs['idordencab']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a></div></td>
      </tr>
   <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
  </table><br />
      <!-- end #mainContent -->
      </div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>