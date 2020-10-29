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
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<script src="../miVal.js" type="text/javascript"></script>

<script language=Javascript>
	$(document).ready(function(){
		$("#proveedor").bind("change", function(e) {
			mi_input=document.getElementById('prov');
			mi_input.value="";
			var valor = document.getElementById('proveedor')
			mi_input.value=valor.options[valor.selectedIndex].text;
		});
	});
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

<script type="text/javascript">
	$(function() {
		$("#fechainicio").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
	$(function() {
		$("#fechaemision").datepicker({
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
      	
		<div id="menu">
		  <?php include("../menu.php"); ?>
        </div>
		
      <div id="mainContent">
      <p class="titulo">Nueva Guia de Remision</p>
<FORM ACTION="saveNewGuiaRem.php"  class="cmxform" id="frmNewGuiaRemision" NAME="frmNewGuiaRemision" METHOD="POST" ENCTYPE="multipart/form-data" >    

<?php
	$idEmpresa=$_SESSION['idEmpresa'];
    $sql4="SELECT * FROM empresa WHERE idEmpresa='$idEmpresa';";
	$result4=consulta($sql4);
	$rs4=leer_registro($result4);
	$puntoPartida=$rs4['direccion'];
	mysql_free_result($result4);

	$qry=mysql_query("select numero as idGuia from tipodocumento WHERE idtipodoc='GR' ");
	$row=mysql_fetch_array($qry);
	$idGuia=$row['idGuia']+1;
	$serie="001";
	$numero=ceros($idGuia,7);
	mysql_free_result($qry);
?>  
      <table width="98%" align="center" style="margin:0 10px;"> 
      <tr>
          <td class="title" width="12%"><strong >Numero Guia</strong></td>
          <td width="4%"><input type="text" id="serie" name="serie" value="<?php echo $serie; ?>" size="6"/></td>
          <td width="10%"><input type="text" id="numero" name="numero" value="<?php echo $numero; ?>" size="9"/></td>
          <td class="title" width="12%"><strong >Motivo</strong></td>
          <td width="20%" colspan="2">
          	<select name="motivo">
         	  <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idmotivo, nombre FROM motivo ORDER BY nombre";
		  		$rsl = consulta($sql);
           		while($reg = leer_registro($rsl))
		  		{
	    	  ?>
       	      <option value="<?php echo $reg["idmotivo"];?>"><?php echo $reg["nombre"];?></option>
               <?php
		  		}
           		mysql_free_result($rsl);
	           ?>
			</select>
          </td>
        </tr>
      <tr>
          <td width="12%" class="title"><strong >Remitente</strong></td>
		<input type="hidden" name="idremitente" id="idremitente" value="" />
          <td width="26%" colspan="2"><input type="text" id="nombreremitente" name="nombreremitente" size="50" value="" /></td>          <td width="12%" class="title"><strong >Punto Partida</strong></td>
          <td width="26%" colspan="3"><input type="text" id="puntopartida" name="puntopartida" size="60" value="<?php echo $puntoPartida; ?>" /></td>          
        </tr>                
		<tr>
          <td width="12%" class="title"><strong >RUC Remitente</strong></td>
          <td width="10%" colspan="2"><input type="text" id="rucremitente" name="rucremitente" size="10" value="" /></td>         
          <td class="title" width="12%"><strong >Fecha Inicio Traslado</strong></td>
          <td width="10%"><input type="text" id="fechainicio" readonly="readonly" name="fechainicio" value="<?php echo fechaAMostrar(fechaAlta("D")); ?>" size="10"/></td>
          <td class="title" width="10%"><strong >Fecha Emision</strong></td>
          <td width="10%"><input type="text" id="fechaemision" readonly="readonly" name="fechaemision" value="<?php echo fechaAMostrar(fechaAlta("D")); ?>" size="10"/>
        </tr>
      <tr>
          <td class="title" colspan="3"><strong >Datos del Destino</strong></td>
          <td colspan="2"></td>
      </tr> 
		<tr>
        <td class="title" width="10%"><strong >Nombre Destinatario</strong></td>
          <td width="20%" colspan="2"><input type="text" name="destino" id="destino" size="35" />
        &nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../clientes/searchClienteGuiaRem.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Codigo Cliente" /></a>&nbsp;</td>
       
          <td class="title" width="12%"><strong >Punto Llegada</strong></td>
          <td colspan="3"><input type="text" id="puntollegada" name="puntollegada" size="50" /></td>
      </tr>
      <tr>
          <td class="title" width="12%"><strong >RUC</strong></td>
          <td colspan="2"><input type="text" id="rucdestino" name="rucdestino"/></td>
          <td class="title" width="12%"><strong >DOC. IDENTIDAD</strong></td>
          <td colspan="3"><input type="text" id="dnidestino" name="dnidestino"/></td>
      </tr>       

      <tr>
          <td class="title" colspan="3"><strong >Datos del Transportista :</strong></td>
          <td class="title" colspan="2"><strong >Datos de la Unid. de Transporte :</strong></td>
      </tr> 
      <tr>
          <td class="title" width="12%"><strong >Nombre</strong></td>
          <td width="20%" colspan="2"><input type="text" id="nombretransportista" name="nombretransportista" size="35"/></td>
          <td class="title" width="10%"><strong >Placa</strong></td>
          <td width="12%"><input type="text" id="placa" name="placa" size="8"/>&nbsp;<a href="javascript:void(0)" onClick="hija=window.open('../tablas/searchVehiculosGR.php', 'Sizewindow', 'width=850, height=600, scrollbars=no, toolbar=no'); return false;"><img src="../images/icono_buscar.gif" border="0" alt="Buscar Vehiculo" /></a></td>
          <td class="title" width="12%"><strong >Marca</strong></td>
          <td width="10%"><input type="text" id="marca" name="marca"/></td>
      </tr> 
      <tr>
          <td class="title" width="12%"><strong >Configuracion Vehicular</strong></td>
          <td colspan="2"><input type="text" id="configuracionvehicular" name="configuracionvehicular"/></td>
          <td class="title" width="12%"><strong >Certificado Inscripcion</strong></td>
          <td><input type="text" id="certificadoinscripcion" name="certificadoinscripcion"/></td>
          <td class="title" width="12%"><strong >Remolque</strong></td>
          <td><input type="text" id="remolque" name="remolque"/></td>
      </tr>   
      <tr>
          <td class="title" width="12%"><strong >RUC</strong></td>
          <td colspan="2"><input type="text" id="ructransportista" name="ructransportista"/></td>
          <td class="title" width="12%"><strong >Licencia de Conducir</strong></td>
          <td width="12%"><input type="text" id="licenciaconducir" name="licenciaconducir"/></td>
          <td colspan="2">
           <div align="right"><input type="submit" name="Grabar" value="Grabar" id="Grabar" class="boton" />
&nbsp;&nbsp;<input type="button" id="cargar" name="cargar" value="Cargar Ventas" class="boton" onClick="window.open('cargarVentas.php', 'Sizewindow', 'width=1200, height=700, scrollbars=no, toolbar=no');"/> 
&nbsp;&nbsp;<input type="button" id="cancelar" name="cancelar" value="Cancelar" class="boton" onClick="window.open('index.php', '_self');"/></div>
          </td>
      </tr>   
    </table> 
  </FORM>
  <br />


    <div id="cargarventasdiv">   
     <table width="98%" align="center" style="margin:0 10px;">
        <tr class="title">
			<td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="15%" align="center" class="title"><div align="center">Codigo</div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
			<td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="15%" align="center" class="title"><div align="center">Unid. de Med.</div></td>
            <td width="15%" align="center" class="title"><div align="center">Peso</div></td>
        </tr>
	    <tr> 
          <table width="98%" border="0" align="center" style="margin:0 10px;">
            <tr><td colspan="8" class="tdcont">No hay productos seleccionados</td></tr>
          </table>
        </tr>
   </table>
      </div>
   
   
   
   
      <br />
      <!-- end #mainContent -->
      </div>
      <div id="footer">
       <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>
