<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript">
$documento = 1;
$modoconsulta = 1;

function imprimirReporte($Vendedor)
{
  var $dFechaInicio = document.getElementById('datepicker').value;
  var $dFechaFin = document.getElementById('datepicker1').value;
  window.open('../reportes/rptventasxcadavendedor.php?fechainicio='+$dFechaInicio+'&fechafin='+$dFechaFin+'&idVendedor='+$Vendedor, 'Sizewindow', 'width=900, height=700, scrollbars=yes, toolbar=no,menubar=no,resizable=yes');
}

function visualizarDocum($idComprobante,$tipoComprobante)
{
  if ($tipoComprobante=="Factura") {
    window.open('../ventas/verFactura.php?idComprobante=' + $idComprobante, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
  }
  if ($tipoComprobante=="Boleta") {
    window.open('../ventas/verBoleta.php?idComprobante=' + $idComprobante, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
  }
  if ($tipoComprobante=="Recibo") {
    window.open('../ventas/verRecibo.php?idComprobante=' + $idComprobante, 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no');
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
    <div id="header">
   	<?php
		include("header.php");
	?>
    <!-- end #header --></div>
    <div id="datos">
   	<?php
		include("menuSecund.php");
	?>
   </div>
     
  <div id="mainContent">
   <div style="width:970px; height:auto">
   	<div id="left">
       	<?php include("menu.php") ?>
		<hr style="clear:both; visibility:hidden"       />
    </div>
  <div id="right">
  <!-- aca todo el contenido q kieras poner -->
  <p class="titulo">Ventas por Vendedor</p>
    <div id="busqueda" >
  <form method="post" action="ventasporvendedorAdmin.php" name="frmBuscarVenta" id="frmBuscarVenta" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
    </label>&nbsp;&nbsp;&nbsp;Vendedor :
      <select name="idVendedor" id="idVendedor"><option value="0">Seleccione</option>
       	<?php
			$sql = "SELECT idUsuario,codUsuario,nomUsuario FROM usuario WHERE ROL_idRol='3' ORDER BY nomUsuario";
	  		$rsl = consulta($sql);
       		while($reg = leer_registro($rsl))
	  		{
    	?>
   	  <option value="<?php echo $reg["idUsuario"];?>"><?php echo $reg["nomUsuario"];?></option>
     	<?php
	  		}
   		mysql_free_result($rsl);
       	?>
    </select>	
  
    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rango de fecha desde :
    <input type="text" name="fechaIni" id="datepicker" readonly="readonly" size="10" value="<?php echo $fechaIni;?>"/>
	&nbsp;Hasta<input type="text" name="fechaFin" id="datepicker1" readonly="readonly" size="10" value="<?php echo $fechaFin;?>"/>&nbsp;&nbsp;
    </label>&nbsp;&nbsp;&nbsp;&nbsp;Comparar Ventas con meta del Mes de :
      <select name="idMeta" id="idMeta"><option value="0">Seleccione</option>
   	    <option value="1">Enero</option>
   	    <option value="2">Febrero</option>
   	    <option value="3">Marzo</option>
   	    <option value="4">Abril</option>
   	    <option value="5">Mayo</option>
   	    <option value="6">Junio</option>
   	    <option value="7">Julio</option>
   	    <option value="8">Agosto</option>
   	    <option value="9">Septiembre</option>
   	    <option value="10">Octubre</option>
   	    <option value="11">Noviembre</option>
   	    <option value="12">Diciembre</option>
      </select>	
    
    <input type="submit" id="buscarVenta" name="buscarVenta" value="Buscar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
    &nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
  </form></div>
  <br />
   <p class="titulo">Resultado de la Busqueda</p>
      <table width="98%" align="center" style="margin:0 10px;">
       <tr>
       <?php
    $filtro = "";
	$consultaBase = "SELECT c.*, cl.nomCliente FROM comprobante as c LEFT JOIN cliente as cl ON c.CLIENTE_idCliente=cl.idCliente WHERE";
    if ($_POST['idVendedor'] > 0) {
	  $idVendedor = $_POST['idVendedor'];
	  $filtro = " c.idVendedor='$idVendedor'";
	} else {
	  $filtro = "";
	}
	if ($filtro == "") {
	  $filtro = $filtro . " c.fecha BETWEEN '$fechaIni' AND '$fechaFin'";
	} else {
	  $filtro = $filtro . " AND c.fecha BETWEEN '$fechaIni' AND '$fechaFin'";
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
	$orden="c.fecha";//ordena por id
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
		

		$principal="ventasporvendedorAdmin";//pagina principal
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
	  $principal="ventasporvendedorAdmin";//pagina principal
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
     <td width="10%" align="center" class="title"><div align="center">Tipo Comp.</div></td>
     <td width="10%" align="center" class="title"><div align="center">Cod. Comprobante</div></td>
     <td width="15%" align="center" class="title"><div align="center">Fecha </div></td>
     <td width="32%" align="center" class="title"><div align="center">Cliente</div></td>
     <td width="15%" align="center" class="title"><div align="center">Monto</div></td>
     <td width="12%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
  </tr>
  <?php
    if ($_POST['idMeta'] > 0) {
	  $idMeta = $_POST['idMeta'];
	  $sqlMeta = "SELECT montoMeta FROM meta_venta WHERE numMes='$idMeta'";
	  $consultaMeta = consulta($sqlMeta);
	  $nMeta = 0;
	  if ($rsMeta = leer_registro($consultaMeta))
	  {
	    $nMeta = $rsMeta['montoMeta'];
	  }
	}
    $suma = 0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
        $suma = $suma + $rs['importeTotal'];
  ?>
  <tr>
     <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
     <td class="tdcont" align="center"><?php echo $rs['tipoComprobante']; ?></td>    
     <td class="tdcont" align="center"><?php echo $rs['codComprobante']; ?></td>    
     <td class="tdcont" align="center"><?php echo substr($rs['fecha'],1,10); ?></td>
     <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['nomCliente']; ?></td>
     <td class="tdcont" align="right">S/. <?php echo redondeado($rs['importeTotal']); ?>&nbsp;&nbsp;</td>
     <td><div align="center" class="tdcont"><a href="#" onClick="javascript:visualizarDocum('<?php echo $rs['idComprobante']; ?>','<?php echo $rs['tipoComprobante']; ?>')"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a></td>
   </tr>
  <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
  ?>
  <tr>
     <td width="80%" align="center" class="title" colspan="5"><div align="center" >Total Ventas Acumuladas del Periodo :</div></td>
     <td height="20" class="tdcont" align="center"><?php echo redondeado($suma); ?></td>
  </tr>
  <tr>
     <td width="80%" align="center" class="title" colspan="5"><div align="center" >Meta del Periodo :</div></td>
     <td height="20" class="tdcont" align="center"><?php echo redondeado($nMeta); ?></td>
  </tr>
  <tr>
     <td width="80%" align="center" class="title" colspan="5"><div align="center" >Diferencia :</div></td>
     <td height="20" class="tdcont" align="center"><?php echo redondeado($suma - $nMeta); ?></td>
  </tr>
  <tr>
     <td width="80%" align="center" class="title" colspan="5"><div align="center" >Avance (%) :</div></td>
     <td height="20" class="tdcont" align="center"><?php echo redondeado(($suma/$nMeta)*100); ?></td>
  </tr>
    
   </table><br />
   <td width="5%" align="center" class="title"><div align="center" ><a href="javascript:void(0)" onclick="javascript:imprimirReporte('<?php echo $idVendedor;?>')">Imprimir Reporte de Ventas</a></div></td>
      <!-- end #mainContent -->
      </div>
    <!-- end #container --></div>
    </body>
</html>