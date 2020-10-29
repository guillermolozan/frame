<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
$fechaIni = date('d-m-Y');
$fechaFin = date('d-m-Y');
if(isset($_GET['idCuotas'])) $idCuotas=$_GET['idCuotas'];

$sqlDeuda = "SELECT cu.*, vc.cliente, vc.idcliente FROM cuotas as cu LEFT JOIN ventascab as vc ON vc.idventascab=cu.idventascab WHERE idcuotas='$idCuotas' ";
$resultDeuda=consulta($sqlDeuda);
$Cliente = "";
$IdCliente = 0;
$MontoDeuda = 0;
$Amortizado = 0;
$Saldo = 0;
while($rsDeuda = leer_registro($resultDeuda))
{
	$IdCliente = $rsDeuda['idcliente'];
	$Cliente = $rsDeuda['cliente'];
	$MontoDeuda = $rsDeuda['monto'];
	$Saldo = $rsDeuda['saldo'];
}
$Amortizado = $MontoDeuda - $Saldo;

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

	$(function() {
		$("#fecha").datepicker({
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
  <br />
  <p class="titulo">Amortizar Cuenta por Cobrar</p>
  <table width="98%" align="center" style="margin:0 10px;">
    <tr>
    <?php 
	  $consultaBase = "SELECT * FROM amortizar WHERE idcuotas='$idCuotas' ";
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
	$orden="idcuotas";//ordena por id	
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
    <td height="20" colspan="8">
    <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
    <div class="paginacion" align="right" >
    <?php 
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
  ?>
  </div>
  </td>
  </tr>
  <tr>
      <td width="6%" align="center" class="title"><div align="center" >Item</div></td>
      <td width="20%" align="center" class="title"><div align="center">No. Documento </div></td>
      <td width="10%" align="center" class="title"><div align="center">Fecha Pago</div></td>
      <td width="10%" align="center" class="title"><div align="center">Monto</div></td>
      <td width="20%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
  </tr>
  <?php
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
  ?>
      <tr>
      <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
      <td class="tdcont" align="center"><?php echo $rs['idtipodoc'].'/'.$rs['serie'].'-'.$rs['numero']; ?></td>    
      <td class="tdcont" align="center"><?php echo fechaAMostrar($rs['fecha']); ?></td>    
      <td class="tdcont" align="right"><?php echo redondeado($rs['monto']); ?>&nbsp;&nbsp;</td>
      <td><div align="center" class="tdcont"><a href="delAmortizacion.php?idAmortizar=<?php echo $rs['idamortizar']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a></div></td>
      </tr>
   <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
  </table><br />
  
  <table width="100%" align="center" style="margin:0 2px;">
    <tr>
      <td class="title" width="10%"><strong >Cliente</strong></td>
      <td class="tdcont" width="30%">&nbsp;<input type="text" name="cliente" id="cliente" maxlength="100" size="70" value="<?php echo $Cliente;?>" readonly="readonly"/></td>
      <td class="title" width="10%"><strong >Monto Deuda</strong></td>
      <td class="tdcont" width="10%">&nbsp;<input type="text" name="montodeuda" id="montodeuda" maxlength="8"   size="8" value="<?php echo $MontoDeuda;?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td class="title" width="10%"><strong >Amortizado</strong></td>
      <td class="tdcont" width="15%">&nbsp;<input type="text" name="amortizado" id="amortizado" maxlength="11" size="8" value="<?php echo $Amortizado;?>" readonly="readonly"/></td>
      <td class="title" width="10%"><strong >Saldo</strong></td>
      <td class="tdcont" width="10%">&nbsp;<input type="text" name="saldo" id="saldo" maxlength="8"   size="8" value="<?php echo $Saldo;?>" readonly="readonly"/></td>
    </tr>
  </table><br />
  
  
<FORM ACTION="grabarAmortizacion.php" class="cmxform" id="frmNuevaAmortizacion" NAME="frmNuevaAmortizacion" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="100%" align="center" style="margin:0 2px;">
  <tr>
       <td class="title" width="10%"><strong >Tipo Documento</strong></td>
       <td class="tdcont" width="20%">&nbsp;&nbsp;
      <input type="hidden" name="idcuotas" id="idcuotas" value="<?php echo $idCuotas;?>" />
      <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $IdCliente;?>" />
         <select name="idtipodoc" id="idtipodoc"><option value="0">Seleccione</option>
          	<?php
				$sql = "SELECT * FROM tipodocumento";
		  		$rsl = consulta($sql);
           		while($reg = leer_registro($rsl))
		  		{
	    	?>
               	<option value="<?php echo $reg["idtipodoc"];?>"><?php echo $reg["nombre"];?></option>
           	<?php
		  		}
           		mysql_free_result($rsl);
	       	?>
        </select></label></td>
    <td class="title" width="10%"><strong >Serie</strong></td>
    <td class="tdcont" width="10%">&nbsp;<input type="text" name="serie" id="serie" maxlength="8" size="8" /></td>
    <td class="title" width="10%"><strong >Numero</strong></td>
    <td class="tdcont" width="10%">&nbsp;<input type="text" name="numero" id="numero" maxlength="8" size="8" /></td>  
  </tr>
  <tr>
  	<td class="title" width="10%"><strong>Fecha</strong></td>
   	<td class="tdcont" valign="middle">&nbsp;&nbsp;&nbsp;<input type="text" id="fecha" name="fecha" value="<?php echo fechaAlta("D"); ?>"/></td>
    <td class="title" width="10%"><strong >Monto</strong></td>
    <td class="tdcont" width="10%">&nbsp;<input type="text" name="monto" id="monto" maxlength="8" size="8" /></td>
    <td class="tdcont" width="20%" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />&nbsp;&nbsp; <input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onclick="window.open('index.php', '_self')"/></td>
   </tr>

</table>

</FORM>
  
  
  
  
      <!-- end #mainContent -->
      </div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>