<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idComprasCab=$_GET['idComprasCab'];

error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

	 $Serie = "";
	 $Numero = "";
	 $IdTipoDoc = "";
	 $Fecha = "";
	 $IdCliente = "";
	 $Cliente = "";
	 $RUC = "";
	 $Direccion = "";
	 $Monto = "";
	 $IGV = "";
	 $TipoVenta = "";
	 $Cancelado = "";
	 $Saldo = "";
	 
$TotalVenta = 0;
$sqlDetalle = "SELECT comprasdet.*, producto.nombre as producto, unimed.nombre as unimed FROM comprasdet LEFT JOIN  producto ON producto.idproducto=comprasdet.idproducto LEFT JOIN unimed ON unimed.idunimed=comprasdet.idunimed WHERE idcomprascab='$idComprasCab'";
$consulta = consulta($sqlDetalle);
while($row = leer_registro($consulta))
  {
     $carro[$row['idcomprasdet']]=array('identificador'=>$row['idcomprasdet'],'idproducto'=>$row['idproducto'], 'cantidad'=>$row['cantidad'], 'precio'=>$row['precio'], 'total'=>$row['subtotal'],'producto'=>$row['producto'], 'idunimed'=>$row['idunimed'],'unimed'=>$row['unimed'],'totalventa'=>$TotalVenta);
  }
$_SESSION['carro']=$carro;

$sqlCab = "SELECT comprascab.*, cliente.razonsocial, cliente.ruc, cliente.direccion FROM comprascab LEFT JOIN cliente ON cliente.idcliente=comprascab.idproveedor  WHERE idcomprascab='$idComprasCab'";
$consulta = consulta($sqlCab);
if ($rcab = leer_registro($consulta))
  {
	 $Serie = $rcab['serie'];
	 $Numero = $rcab['numero'];
	 $IdTipoDoc = $rcab['idtipodoc'];
	 $Fecha = FechaAMostrar($rcab['fecha']);
	 $IdProveedor = $rcab['idproveedor'];
	 $Cliente = $rcab['razonsocial'];
	 $RUC = $rcab['ruc'];
	 $Direccion = $rcab['direccion'];
	 $Monto = $rcab['monto'];
	 $IGV = $rcab['igv'];
	 $TipoVenta = $rcab['tipocompra'];
	 $Cancelado = $rcab['cancelado'];
	 $Saldo = $rcab['saldo'];
  }
$TotalVenta = $Monto;
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
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../miVal.js" type="text/javascript"></script>

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
var foco='0';

window.onload = function() {
  document.onkeypress = cargaInformacion;
}
function cargaInformacion(elEvento) {
  var evento = window.event || elEvento;
  if (evento.keyCode==119) {
	window.open('../productos/searchProd.php', 'Sizewindow', 'width=900, height=700, scrollbars=no, toolbar=no');
  }
  if (evento.keyCode==123) {
	window.open('../clientes/searchClientes.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no');
  }
 
  var mensaje = "Tipo de evento: " + evento.type + "<br>" +
                "Propiedad keyCode: " + evento.keyCode + "<br>" +
                "Propiedad charCode: " + evento.charCode + "<br>" +
                "Carácter pulsado: " + String.fromCharCode(evento.charCode);
 
//	alert(mensaje)
}
 
  

function foco(focoobjeto)
{
  foco=focoobjeto;
}
function escribir()
{
  var x=document.agregacar.cantidad.value;
  var y=document.agregacar.precio.value;
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
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});

</script>
</head>

<body>
   <div id="container">
    <div id="mainContent">
    <p class="titulo">Compras -> Nueva Factura</p>

  <div id="busqueda">
  <form action="#" name="agregacar" id="agregacar" style="font-size:10px; margin-top:10px; text-align:center">
  <table width="98%" align="center" style="margin:0 10px;">
   <tr>
      <td class="title" width="6%" align="left"><strong>Codigo</strong></td>
      <td class="tdcont" width="12%" align="left">&nbsp;
	    <input type="text" name="idProducto" id="idProducto" size="6"/>
    &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../equivalencias/searchEquivalencias.php', 'Sizewindow', 'width=1100, height=700, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Producto" /></a>
      </td>      
      <td class="title" width="8%" align="left"><strong>Descripcion</strong></td>
      <td class="tdcont" width="40%" align="left" colspan="6">&nbsp;
      <input type="text" name="nomProducto" id="nomProducto" size="90" readonly="readonly"/>
   </tr>
   <tr>
    <td class="title" width="12%" align="left"><strong>Unidad Medida</strong></td>
    <td class="tdcont" width="12%" align="left"><select name="idunimed" id="idunimed" >
      <option value="0">Seleccione</option>
       	  <?php
				$sql = "SELECT idunimed, nombre FROM unimed ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
    	  ?>
       	      <option value="<?php echo $regNivel["idunimed"];?>"> <?php echo $regNivel["nombre"];?></option>
       	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
      	  ?>
        </select>	
    </td>
      <td class="title" width="6%" align="left"><strong>Cantidad</strong></td>
      <td class="tdcont" width="10%" align="left">&nbsp;
      <input type="text" name="cantidad" id="cantidad"  onchange="javascript:escribir()" size="8"  class="sample2"/>&nbsp;&nbsp;
      </td>
      <td class="title" width="6%" align="left"><strong>Precio</strong></td>
      <td class="tdcont" width="10%" align="left">&nbsp;
      <input type="text" name="precio" id="precio"  onchange="javascript:escribir()" size="8"  class="sample2"/>&nbsp;&nbsp;
      </td>
      <td class="title" width="6%" align="left"><strong>Importe</strong></td>
      <td class="tdcont" width="10%" align="left">&nbsp;
      <input type="text" name="importe" id="importe" readonly="readonly" size="8"  class="sample2"/>&nbsp;&nbsp;
      </td>
      <td class="tdcont" width="20%" align="left">&nbsp;&nbsp;
        <input type="button" name="Agregar" id="Agregar" value="Agregar Producto" onClick="cargaContenido();" class="boton" />
      &nbsp;&nbsp; <input type="reset" name="Limpiar" id="limpiar" value="Limpiar" class="boton" />
      </td>
   </tr>
  </table>
  </form>     
  </div>
    
  <div id="productodiv">       
  <table width="98%" align="center" style="margin:0 10px;">
    <tr>
       <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
       <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
       <td width="7%" align="center" class="title"><div align="center">Unidad Medida</div></td>
       <td width="60%" align="center" class="title"><div align="center">Descripcion</div></td>
       <td width="8%" align="center" class="title"><div align="center">Precio</div></td>
       <td width="8%" align="center" class="title"><div align="center">Total</div></td>
       <td width="6%" align="center" class="title"><div align="center">...</div></td>
    </tr>
  <?php
    $con = 0;
    foreach($carro as $k => $v)
    {
		$con=$con+1;
  ?>
      <tr>
      <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
      <td class="tdcont" align="center"><?php echo $v['cantidad']; ?></td>    
      <td class="tdcont" align="center"><?php echo $v['unimed']; ?></td>    
      <td class="tdcont" align="center"><?php echo $v['producto']; ?></td>    
      <td class="tdcont" align="right">S/. <?php echo redondeado($v['precio']); ?>&nbsp;&nbsp;</td>
      <td class="tdcont" align="right">S/. <?php echo redondeado($v['total']); ?>&nbsp;&nbsp;</td>      
      <td><div align="center" class="tdcont"><a href="#" onclick="BorraContenido('<?php echo $v['idproducto']; ?>')"><img src='../images/trash.gif' width='12' height='14' border='0'></a></div></td>
      </tr>
   <?php		
	}
	$SubTotal = $TotalVenta - $IGV;
	?>      
 </table>
<table width="98%" align="center" style="margin:0 10px;">
  <tr>
     <td colspan="5" class="title">Sub Total  /   IGV   /   Total</td>
     <td class="tdcont" align="right">S/. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($SubTotal) and $SubTotal!=0) echo redondeado($SubTotal); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($IGV) and $IGV!=0) echo redondeado($IGV); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($TotalVenta) and $TotalVenta!=0) echo redondeado($TotalVenta); ?></td>
     <td class="tdcont" align="center">&nbsp;</td>
  </tr>      
</table>
 </div>
  
 <br />
    
<FORM ACTION="saveNewFacturaNormal.php"  class="cmxform" id="frmNewFacturaNormal" NAME="frmNewFacturaNormal" METHOD="POST">      
    <table width="98%" align="center" style="margin:0 10px;">
      <tr>
        <td class="title" width="7%"><strong >RUC / DNI</strong></td>
        <td class="tdcont"  width="40%" colspan="3">&nbsp;
      	<input type="text" name="rucdni" id="rucdni" size="20" value="<?php echo $RUC; ?>"/>
		<input type="hidden" name="idcliente" id="idcliente" value="<?php echo $IdProveedor; ?>" />
        &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../clientes/searchClientes.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Cliente" /></a>&nbsp;
        <td class="title" width="7%"><strong>Proveedor</strong></td>
        <td class="tdcont" width="50%" colspan="5">&nbsp;
         <input name="razonsocial" type="text" id="razonsocial" size="55" readonly="readonly" value="<?php echo $Cliente; ?>"/></td>
        </tr> 
        <tr>
          <td class="title" width="7%"><strong>Direccion</strong></td>
          <td class="tdcont" width="40%" colspan="3">&nbsp;&nbsp;
          <input type="text" name="direccion" id="direccion" size="40" readonly="readonly" value="<?php echo $Direccion; ?>"/></td>
          
    <td class="title" width="7%"><strong >Serie</strong></td>
    <td class="tdcont" width="10%">&nbsp;&nbsp;<input type="text" name="serie" id="serie" maxlength="8" size="8" value="<?php echo $Serie; ?>"/></td>
    <td class="title" width="7%"><strong >Numero</strong></td>
    <td class="tdcont" width="10%">&nbsp;<input type="text" name="numero" id="numero" maxlength="8" size="8" value="<?php echo $Numero; ?>"/></td>  
    
         	<td class="title" width="7%"><strong>Fecha</strong></td>
          	<td class="tdcont"width="15%">&nbsp;&nbsp;<input type="text" id="datepicker" readonly="readonly" name="fecha" value="<?php echo fechaAMostrar(fechaAlta("D")); ?>" size="10"/></td>
        </tr>
        <tr>
      <td class="title" width="10%"><strong >Tipo Compra</strong></td>
      <td class="tdcont" width="12%">&nbsp;&nbsp;
         <select name="tipocompra" id="tipocompra">
               <option value="1" selected="selected">Contado</option>
               <option value="2">Credito</option>
         </select></label> </td>
          <td class="title" width="7%"><strong>Adelanto</strong></td>
          <td class="tdcont" width="10%">&nbsp;
          <input type="text" name="adelanto" id="adelanto" size="8"/></td>
         
       <td  width="12%">&nbsp;&nbsp;</td>
       <td  width="20%" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />
       <input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onclick="window.open('index.php', '_self')"/></td>
   </tr>
  </table>
  </form>
  
  <div id="footer">
   <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
  </body>
</html>
