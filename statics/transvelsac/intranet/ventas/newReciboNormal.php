<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

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

<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
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
 	
//	if (ns4) 
//        document.agregacar.nomProducto.value = document.agregacar.IdSerie.value;
//	else
//	    if (ie4)
//            document.agregacar.nomProducto.value = document.agregacar.IdSerie.value;
}


function Evento()
{
    var vcanProducto=document.getElementById('canProducto').value;
    var vcostoUnit=document.getElementById('costoUnit').value;
    var vidSerie=document.getElementById('IdSerie').value;	
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
    	document.agregacar.NroSerie.value = variables[4];
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
		<div id="datos">
      		<?php
			include("../menuSecund.php");
			?>
      	</div>
      	
		<div id="menu"><?php include("../menu.php") ?></div>
		
      <div id="mainContent">
      <p class="titulo">Ventas -> Recibo</p>
<FORM ACTION="saveNewReciboNormal.php"  class="cmxform" id="frmNewReciboNormal" NAME="frmNewReciboNormal" METHOD="POST">      
      <table width="98%" align="center" style="margin:0 10px;">
        <tr>
          <td class="title"><strong >Codigo Cliente :</strong></td>
          <td class="tdcont" valign="middle">&nbsp;&nbsp;
        	<input type="text" name="codCliente" id="codCliente" size="20" readonly="readonly"/>
			<input type="hidden" name="idCliente" id="idCliente" value="" />
                &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../clientes/searchClientes.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Cliente" /></a>&nbsp;&nbsp;

          <td class="title" width="17%"><strong>Nombre Cliente :</strong></td>
          <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
                <input name="nomCliente" type="text" id="nomCliente" size="48" readonly="readonly" /></td>
        </tr> 
        <tr>
          <td class="title"><strong>Direccion :</strong></td>
          <td class="tdcont">&nbsp;&nbsp;
          <input type="text" name="direccion" id="direccion" size="48" readonly="readonly" /></td>

          <td class="title" width="17%"><strong>Telefono :</strong></td>
          <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
                <input type="text" name="telefono" id="telefono" size="30" readonly="readonly" /></td>
        </tr>
                
        <tr>
         	<td class="title"><strong>Fecha : </strong></td>
          	<td class="tdcont" valign="middle">&nbsp;&nbsp;&nbsp;<input type="text" id="datepicker" readonly="readonly" name="fecha" value="<?php echo fechaAlta("D"); ?>"/></td>
    <td class="title" width="17%"><strong >RUC :</strong></td>
    <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ruc" id="ruc" style="text-transform:capitalize" maxlength="20" size="20" /></td>
        </tr>
        <tr>
          <td class="title" width="17%"><strong >Vendedor :</strong></td>
          <td class="tdcont" width="33%">&nbsp;&nbsp;
          
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
             </select>	</label>
      <td class="title" width="17%"><strong >Tipo Venta :</strong></td>
      <td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
         <select name="TipoVenta" id="TipoVenta" onclick="numeroCuotas2()">
               <option value="1" selected="selected">Contado</option>
               <option value="2">Credito Interes Simple</option>
               <option value="3">Credito Interes Compuesto</option>
         </select></label>
   </tr>
   <tr>
   	<td class="title" width="17%"><strong>Calculo Margen:</strong></td>
   	<td class="tdcont" width="33%">&nbsp;&nbsp;&nbsp;
     <input type="radio" name="calculoM" id="calculoM1" value="M" onclick="javascript:fcalculoMargen(1)" checked="checked">Por Total Recibo
     <input type="radio" name="calculoM" id="calculoM2" value="N" onclick="javascript:fcalculoMargen(2)">Por item
	 <input type="hidden" name="calculoMargen" id="calculoMargen" value="1"/>
	 <input type="hidden" name="calculoIGV" id="calculoIGV" value="1"/>
    </td>
    </tr>
   </table>
   <br />
   <div align="right"><input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />
&nbsp;&nbsp;<input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onClick="window.open('index.php', '_self')"/>&nbsp;&nbsp;</div>


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
                <label>Precio *</label>
                <input type="text" name="costoU" id="costoU"  onchange="javascript:escribir()" size="10">&nbsp;<br /><br />
                <input type="hidden" name="costoUnit" id="costoUnit" value="" />
                <label>Cantidad *</label>
                <input type="text" name="canProd" id="canProd"  onchange="javascript:escribir()" size="10"  class="sample2"/>&nbsp;&nbsp;
                <input type="hidden" name="canProducto" id="canProducto" value="" />
                 <label>Importe</label>
                <input type="text" name="importe" size="10"  class="sample2" readonly="readonly"/>&nbsp;&nbsp;
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

          <tr>
            <td width="3%" align="center" class="title"><div align="center" >Item</div></td>
            <td width="7%" align="center" class="title"><div align="center" >Serie</div></td>
            <td width="10%" align="center" class="title"><div align="center">Codigo</div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
            <td width="5%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="10%" align="center" class="title"><div align="center">P. Unit.</div></td>
            <td width="15%" align="center" class="title"><div align="center">Total</div></td>
            <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
       </tr>
     

        <tr>
          <table width="98%" border="0" align="center" style="margin:0 10px;">
             <div id="productodiv1">
             <tr><td colspan="8" class="tdcont">No hay productos seleccionados</td></tr>
             </div>          
          </table>
        </tr>
      </table>
     <table width="98%" align="center" style="margin:0 10px;">

    		<tr><td colspan="5" class="title">Total</td>
            <td class="tdcont" align="right">S/. <?php if(isset($suma) and $suma!=0) echo redondeado($suma); ?></td>
            <td class="tdcont" align="center">&nbsp;</td>
            </tr>
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
