<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionVendedor.php");
CheckNivel();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
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
			include("../header.php");
			?>
    	  <!-- end #header -->
      	</div>

<div id="datos">
      		<?php
			include("../menuSecundInt.php");
			?>
      	</div>
      	
		<div id="menu"><?php include("../menuInt.php") ?></div>
		
      <div id="mainContent">
      <p class="titulo">Buscar Ventas</p>
      <?php 
			if(isset($_GET['msg']))
			{ 
				$display="";
				if($_GET['msg']=='1')
					{$msg= "La venta se agrego satisfactoriamente"; }
				elseif($_GET['msg']=='2')
					{$msg= "!! La venta no pudo ser registrada";}
				elseif($_GET['msg']=='3')
					{$msg= "La venta fue eliminada de la base de datos";}
				elseif($_GET['msg']=='4')
					{$msg= "!! La venta no pudo ser eliminada";}
				else
					{header("Location:movimientoventas.php");}
			}
			else
				{$msg=''; $display="style='display:none'";
			}
			echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
			?>
      <div id="busqueda" >
     <form method="post" action="movimientoventas.php" name="frmBuscarVenta" id="frmBuscarVenta" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
   	 	<label>Tipo de Comprobante 
        <select name="idTipoComprobante" id="idTipoComprobante">
           	<option value="0">Seleccione</option>
           	<option value="Factura">Factura</option>
           	<option value="Boleta">Boleta</option>
           	<option value="Recibo">Recibo</option>
       	</select>	</label>
  	 	<label>&nbsp;&nbsp;&nbsp;&nbsp;Cliente 
        <select name="idCliente" id="idCliente">
          	<option value="0">Seleccione</option>
	           	<?php
					$sql = "SELECT idCliente,codCliente,nomCliente FROM cliente ORDER BY nomCliente";
  			  		$rsl = consulta($sql);
              		while($reg = leer_registro($rsl))
			  		{
		    	?>
          	<option value="<?php echo $reg["idCliente"];?>"><?php echo $reg["nomCliente"];?></option>
               	<?php
			  		}
              		mysql_free_result($rsl);
		       	?>
           	</select>	</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rango de fecha desde :
            <input type="text" name="fechaIni" id="datepicker" readonly="readonly" size="10" value="<?php echo $fechaIni;?>"/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta
			<input type="text" name="fechaFin" id="datepicker1" readonly="readonly" size="10" value="<?php echo $fechaFin;?>"/>
&nbsp;Cod. Comprobante :<input type="text" name="codComp" id="codComp"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<input type="submit" id="buscarVenta" name="buscarVenta" value="Buscar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   </form></div>
      <br />
   <p class="titulo">Resultado de la Busqueda</p>
      <table width="98%" align="center" style="margin:0 10px;">
       <tr>
       <?php 
	$consultaBase = "SELECT c.*, cl.nomCliente FROM comprobante as c INNER JOIN cliente as cl ON c.CLIENTE_idCliente=cl.idCliente ";
	
	if(isset($_POST['buscarVenta'])) 
	{	$buscarVenta= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
		$idCliente = $_POST['idCliente'];
		$codComp = $_POST['codComp'];
		$idTipoComprobante = $_POST['idTipoComprobante'];
	}
	else 
		{$buscarVenta='0';}
	if(isset($_GET['BVenta'])) 
		{$BVenta= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
		if(isset($_GET['idCliente'])) 
			{$idCliente= $_GET['idCliente'];}
		if(isset($_GET['codComp'])) 
			{$codComp= $_GET['codComp'];}
		if(isset($_GET['idTipoComprobante'])) 
			{$idTipoComprobante= $_GET['idTipoComprobante'];}
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
			$filtro = $filtro . " " . "c.fecha BETWEEN '$fechaIni' AND '$fechaFin'";
			$cadena2="fechaIni=".$fechaIni;
			$cadena3="fechaFin=".$fechaFin;
		}
		else
		{
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "c.fecha >= '$fechaIni'";
			$cadena2="fechaIni=".$fechaIni;
		}
	}
	elseif(isset($fechaFin) and $fechaFin != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
		}
		$filtro = $filtro . " " . "c.fecha <= '$fechaFin'";
		$cadena3="fechaFin=".$fechaFin;
	}
	
	if(isset($idCliente) and $idCliente != '0')
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "c.CLIENTE_idCliente='$idCliente'";
		$cadena1="idCliente=".$idCliente;
	}
	if(isset($codComp) and $codComp != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "c.codComprobante LIKE '%$codComp%'";
		$cadena4="codComprobante=".$codComp;
	}
	if(isset($idTipoComprobante) and $idTipoComprobante != "" and $idTipoComprobante != "0")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "c.tipoComprobante LIKE '%$idTipoComprobante%'";
		$cadena4="tipoComprobante=".$idTipoComprobante;
	}
  }
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	
	$idSucursalE=$_SESSION['idSucursal'];
	$filtro1 = " c.idSucursalE='$idSucursalE'";
	
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
		$principal="movimientoventas";//pagina principal
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
		$principal="movimientoventas";//pagina principal
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
            <td width="19%" align="center" class="title"><div align="center">Fecha </div></td>
            <td width="32%" align="center" class="title"><div align="center">Cliente</div></td>
            <td width="11%" align="center" class="title"><div align="center">Monto</div></td>
            <td width="12%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
          </tr>
             <?php
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
		?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['tipoComprobante']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['codComprobante']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['fecha']; ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['nomCliente']; ?></td>
            <td class="tdcont" align="right">S/. <?php echo redondeado($rs['importeTotal']); ?>&nbsp;&nbsp;</td>
            <td><div align="center" class="tdcont"><a href="#" onClick="javascript:visualizarDocum('<?php echo $rs['idComprobante']; ?>','<?php echo $rs['tipoComprobante']; ?>')"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a></td>
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