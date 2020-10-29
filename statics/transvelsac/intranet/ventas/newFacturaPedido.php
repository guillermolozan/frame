<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
$idPedido=$_GET['idPedido'];

error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

if(isset($_SESSION['serie']))
$serie=$_SESSION['serie'];else $serie=false;

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
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../miVal.js" type="text/javascript"></script>

<script language=Javascript>
</script>
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
<script type="text/javascript" src="ajax.js"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
</script>

<script language=JavaScript>

var foco='0';
var $vcalculoMargen=1;
var $vcalculoIGV=1;
function fcalculoMargen($valor)
{
  if ($valor==1) {
    $vcalculoMargen = 1;
	document.getElementById('calculoMargen').value = 1;
  }
  if ($valor==2) {
    $vcalculoMargen = 2;
	document.getElementById('calculoMargen').value = 2;
  }
}
function fcalculoIGV($valor)
{
  if ($valor==1) {
    $vcalculoIGV = 1;
	document.getElementById('calculoIGV').value = 1;
  }
  if ($valor==2) {
    $vcalculoIGV = 2;
	document.getElementById('calculoIGV').value = 2;
  }
}
function foco(focoobjeto)
{
  foco=focoobjeto;
}
function escribir()
{
var x=document.agregacar.canProd.value;
document.agregacar.canProducto.value = x;
var y=document.agregacar.costoU.value;
document.agregacar.costoUnit.value = y;
document.agregacar.importe.value = x*y;
}

var ns4 = (document.layers)? true:false
var ie4 = (document.all)? true:false
var teclaCodigo	
var teclaReal	
 
document.onkeyup = TeclaPulsada	
if (ns4)
	document.IdSerie.captureEvents(Event.KEYUP)	
 
function TeclaPulsada (tecla)
{
	if (ns4)
	    teclaCodigo = tecla.which	    
	else		
	    if (ie4)
	        teclaCodigo = event.keyCode
	    
	teclaReal = String.fromCharCode (teclaCodigo)


	var teclaIE = event.keyCode
	var teclaReal = String.fromCharCode(teclaIE)
	if (teclaIE==13) {
	  if (foco=='1') {
   	    Evento();
	    document.agregacar.canProd.focus();
		foco = '0';
	  }
	}  
}


function Evento()
{
    var vcanProducto=document.getElementById('canProducto').value;
    var vcostoUnit=document.getElementById('costoUnit').value;
//    var vidSerie=document.getElementById('IdSerie').value;	
	var ajax=nuevoAjax();
	ajax.open("GET", "serieproducto.php?IdSerie="+vidSerie,true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
		var variables = ajax.responseText.split('|');
    	document.agregacar.codProd.value = variables[0];
    	document.agregacar.nomProducto.value = variables[1];
    	document.agregacar.costoU.value = variables[2];
    	document.agregacar.costoUnit.value = variables[2];
    	document.agregacar.idProducto.value = variables[3];
//    	document.agregacar.NroSerie.value = variables[4];
    	document.agregacar.canProd.value = 1;
    	document.agregacar.canProducto.value = 1;
        var x=variables[2];
        var y=1;
    	document.agregacar.importe.value = x*y;
      }
    }
	ajax.send(null);
}

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
   	<?php
       $instruccion = "select det_pedido.*,pedido.codPedido,pedido.fecha, pedido.USUARIO_idUsuario, pedido.vigencia, pedido.montoTotal , pedido.estadoPedido, producto.idProducto, producto.nomProd, producto.codProd, producto.descCorta, modelo.nomModelo, cliente.idCliente, cliente.ruc, cliente.codCliente, cliente.nomCliente, cliente.direccion, cliente.celular, cliente.telefono1, cliente.telefono2 FROM (((det_pedido left join pedido on det_pedido.PEDIDO_idPedido=pedido.idPedido) left join producto ON det_pedido.PRODUCTO_idProducto=producto.idProducto) LEFT JOIN modelo on producto.MODELO_idModelo=modelo.idModelo) left join cliente on pedido.CLIENTE_idCliente=cliente.idCliente WHERE det_pedido.PEDIDO_idPedido='$idPedido'";
       $consulta = consulta($instruccion);
	   $rs2=leer_registro($consulta);
       $montoMovim=$rs2['montoTotal'];
	   $estadoPedido = $rs2['estadoPedido'];
	?>
  <div id="mainContent">
  <p class="titulo">Ventas -> Factura</p>
  <FORM ACTION="saveNewFacturaPedido.php"  class="cmxform" id="frmNewFacturaNormal" NAME="frmNewFacturaNormal" METHOD="POST">      
   <table width="98%" align="center" style="margin:0 10px;">
    <tr>
      <td class="title"><strong >Codigo Cliente :</strong></td>
      <td class="tdcont" valign="middle">&nbsp;&nbsp;
     	<input type="text" name="codCliente" id="codCliente" value="<?php echo $rs2['codCliente'] ?>" size="20" readonly="readonly"/>
		<input type="hidden" name="idCliente" id="idCliente" value="<?php echo $rs2['idCliente'] ?>" />
                &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../clientes/searchClientes.php', 'Sizewindow', 'width=700, height=500, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Cliente" /></a>&nbsp;&nbsp;
      <td class="title" width="17%"><strong>Nombre Cliente :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
                <input name="nomCliente" type="text" id="nomCliente" value="<?php echo $rs2['nomCliente'] ?>" size="48" readonly="readonly" /></td>
    </tr> 
    <tr>
      <td class="title"><strong>Direccion :</strong></td>
      <td class="tdcont">&nbsp;&nbsp;
          <input type="text" name="direccion" id="direccion" value="<?php echo $rs2['direccion'] ?>" size="48" readonly="readonly" /></td>
      <td class="title" width="17%"><strong>Telefono :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
          <input type="text" name="telefono" id="telefono" value="<?php echo $rs2['telefono1']. " - " . $rs2['telefono2']. " / " .$rs2['celular']; ?>" size="30" readonly="readonly" /></td>
    </tr>
    <tr>
   	  <td class="title"><strong>Fecha : </strong></td>
      <td class="tdcont" valign="middle">&nbsp;&nbsp;&nbsp;<input type="text" id="datepicker" readonly="readonly" name="fecha" value="<?php echo $rs2['fecha'] ?>"/></td>
      <td class="title" width="17%"><strong >RUC :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ruc" id="ruc" value="<?php echo $rs2['ruc'] ?>" style="text-transform:capitalize" maxlength="20" size="20" /></td>
    </tr>
      <tr>
      <td class="title" width="17%"><strong >Vendedor :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;
       <select name="idVendedor" id="idVendedor"><option value="0">Seleccione</option>
       	<?php
			$sql = "SELECT idUsuario,codUsuario,nomUsuario FROM usuario WHERE ROL_idRol='3' OR ROL_idRol='5' ORDER BY nomUsuario";
	  		$rsl = consulta($sql);
       		while($reg = leer_registro($rsl))
	  		{
    	?>
       	<option <?php if ($rs2["USUARIO_idUsuario"]==$reg["idUsuario"]) { echo 'selected="selected"';}?> value="<?php echo $reg["idUsuario"];?>"><?php echo $reg["nomUsuario"];?></option>
       	<?php
	  		}
       		mysql_free_result($rsl);
       	?>
       </select>	</label>
      <td class="title" width="17%"><strong >Tipo Venta :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
      <select name="TipoVenta" id="TipoVenta" onclick="numeroCuotas()">
           <option value="1" selected="selected">Contado</option>
           <option value="2">Credito Interes Simple</option>
           <option value="3">Credito Interes Compuesto</option>
      </select></label>
   </tr>
   <tr>
   	<td class="title" width="17%"><strong>Calculo Margen:</strong></td>
   	<td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
     <input type="radio" name="calculoM" id="calculoM1" value="M" onclick="javascript:fcalculoMargen(1)" <?php if ($estadoPedido=="1") echo 'checked="checked"';?>>Por Total Factura
     <input type="radio" name="calculoM" id="calculoM2" value="N" onclick="javascript:fcalculoMargen(2)" <?php if ($estadoPedido=="0") echo 'checked="checked"';?>>Por item
	 <input type="hidden" name="calculoMargen" id="calculoMargen" value="<?php if ($estadoPedido=="1") {echo ("1");} else {echo ("2");}?>"/>
	 <input type="hidden" name="calculoIGV" id="calculoIGV" value="1"/>
    </td>
    <td class="title" width="17%"><strong >Calculo IGV :</strong></td>
    <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="radio" name="igv" id="igv1" value="A" onclick="javascript:fcalculoIGV(1)" checked="checked">No Incluir
     <input type="radio" name="igv" id="igv2" value="B" onclick="javascript:fcalculoIGV(2)">Incluir
    </td>
    </tr>
   </table>
     <br />
   <div align="right"><input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />
&nbsp;&nbsp;<input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onClick="window.open('index.php', '_self');"/>&nbsp;&nbsp;</div>
  </FORM>
   <div id="busqueda">
  <form action="#" name="agregacar" id="agregacar" style="font-size:10px; margin-top:10px; text-align:center">
	<label>No. Serie</label>
	<input type="hidden" name="NroSerie" id="NroSerie" value="" />
	<input type="text" name="IdSerie" id="IdSerie" onfocus="foco='1';" />
    <label>Codigo</label>
    <input type="hidden" name="codProducto" id="codProducto" value="" />
	<input type="hidden" name="idProducto" id="idProducto" value="" />
	<input type="text" name="codProd" id="codProd" />
       &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../productos/searchProd.php', 'Sizewindow', 'width=900, height=700, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Producto" /></a>&nbsp;&nbsp;&nbsp;
    <label>Nombre</label>
    <input type="text" name="nomProducto" id="nomProducto" readonly="readonly" class="sample2"/>&nbsp;&nbsp;
    <label><?php if ($estadoPedido=="1") {echo "";} else {echo "Precio *";}?></label>
    <input <?php if ($estadoPedido=="1") {echo 'type="hidden"';} else {echo 'type="text"';}?> name="costoU" id="costoU"  onchange="javascript:escribir()" size="10">&nbsp;<br /><br />
    <input type="hidden" name="costoUnit" id="costoUnit" value="" />
    <label>Cantidad *</label>
    <input type="text" name="canProd" id="canProd"  onchange="javascript:escribir()" size="10"  class="sample2"/>&nbsp;&nbsp;
    <input type="hidden" name="canProducto" id="canProducto" value="" />
    <label><?php if ($estadoPedido=="1") {echo "";} else {echo "Importe";}?></label>
    <input <?php if ($estadoPedido=="1") {echo 'type="hidden"';} else {echo 'type="text"';}?> name="importe" size="10"  class="sample2" readonly="readonly"/>&nbsp;&nbsp;
    <input type="reset" name="Limpiar" id="limpiar" value="Limpiar" class="boton" />
   </form></div>
   <br />
      <!-- end #mainContent -->
   </div>
   <div id="productodiv">       
   <table width="98%" align="center" style="margin:0 10px;">
     <tr>
        <td height="5" colspan="3">
        <div align="left" style="width:300px; float:left"><b>Numero de Items:</b></div>
        </td>
     </tr>
     <?php 
	   if ($estadoPedido=="1")
	   {
     ?>
     <tr>
        <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
        <td width="10%" align="center" class="title"><div align="center">Codigo</div></td>
        <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
        <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
        <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
     </tr>
     <?php 
	   } else {
     ?>
     <tr>
        <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
        <td width="10%" align="center" class="title"><div align="center">Codigo</div></td>
        <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
        <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
        <td width="10%" align="center" class="title"><div align="center">P. Unit.</div></td>
        <td width="15%" align="center" class="title"><div align="center">Total</div></td>
        <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
     </tr>
     <?php
	   }
       $instruccion = "select det_pedido.*,pedido.codPedido,pedido.fecha,pedido.vigencia,pedido.montoTotal,pedido.estadoPedido, producto.idProducto, producto.nomProd, producto.codProd, producto.descCorta,modelo.nomModelo,cliente.idCliente,cliente.ruc,cliente.codCliente, cliente.nomCliente, cliente.direccion, cliente.celular, cliente.telefono1, cliente.telefono2 FROM (((det_pedido left join pedido on det_pedido.PEDIDO_idPedido=pedido.idPedido) left join producto ON det_pedido.PRODUCTO_idProducto=producto.idProducto) LEFT JOIN modelo on producto.MODELO_idModelo=modelo.idModelo) left join cliente on pedido.CLIENTE_idCliente=cliente.idCliente WHERE det_pedido.PEDIDO_idPedido='$idPedido'";
         $consulta = consulta($instruccion);
         $con=0;
   	     while($rs3 = leer_registro($consulta))
         {
	       $con=$con+1;
	       if ($estadoPedido=="1")
	       {
     ?>
     <tr>
        <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
        <td class="tdcont" align="center"><?php echo $rs3['codProd'] ?></td>
        <td class="tdcont">&nbsp;&nbsp;<?php echo $rs3['nomProd'] ?></td>
        <td class="tdcont" align="center"><?php echo $rs3['cantidad'] ?></td>
        <td class='tdcont' align='center'><a class="link" href="#" onclick="BorraContenido1(<?php echo $rs3['idProducto']; ?>)">
            <img src='../images/trash.gif' width='12' height='14' border='0'>
     </tr>
     <?php 
	   } else {
     ?>
     <tr>
        <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
        <td class="tdcont" align="center"><?php echo $rs3['codProd'] ?></td>
        <td class="tdcont">&nbsp;&nbsp;<?php echo $rs3['nomProd'] ?></td>
        <td class="tdcont" align="center"><?php echo $rs3['cantidad'] ?></td>
        <td class="tdcont" align="right"><?php echo redondeado($rs3['precioVenta']) ?></td>
        <td class="tdcont" align="right"><?php echo redondeado($rs3['importe']) ?></td>
        <td class='tdcont' align='center'><a class="link" href="#" onclick="BorraContenido1(<?php echo $rs3['idProducto']; ?>)">
            <img src='../images/trash.gif' width='12' height='14' border='0'>
     </tr>
     <?php     
	   }
       $carro[md5($rs3['idProducto'])]=array('identificador'=>md5($rs3['idProducto']),'idProducto'=>$rs3['idProducto'], 'cantidad'=>$rs3['cantidad'], 'precioVenta'=>$rs3['precioVenta'], 'total'=>$rs3['importe'],'producto'=>$rs3['nomProd'], 'codigo'=>$rs3['codProd'], 'descripcion'=>$rs3['descCorta'],'precioCompra'=>$rs3['precioVenta']);
$_SESSION['carro']=$carro;
	    }
       if ($estadoPedido=="1")
       {
     ?>
	<tr> 
       <td colspan="3" class="title" >&nbsp;&nbsp;TOTAL</td>
       <td class="tdcont" align="right">S/. <?php echo redondeado($montoMovim); ?></td>
    </tr>
     <?php 
	   } else {
     ?>
	<tr> 
       <td colspan="5" class="title" >&nbsp;&nbsp;TOTAL</td>
       <td class="tdcont" align="right">S/. <?php echo redondeado($montoMovim); ?></td>
    </tr>
     <?php 
	   }
     ?>
   </table>
   </div>
    <p align="center">
       <td width="5%" align="center" class="title"><div align="center" ><a href="#" onclick="cargaContenido($vcalculoMargen,$vcalculoIGV);">Agregar</a></div></td>
    </p>    
   <div id="numerocuotas">       
   </div>
    <div id="footer">
    <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>
