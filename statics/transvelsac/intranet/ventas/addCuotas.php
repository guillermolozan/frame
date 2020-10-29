<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
if($_POST['nroCuotas']==""){ header("Location:newFacturaNormal.php?".SID);};
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
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script>
   function redondear(cantidad, decimales)
	{
		var cantidad = parseFloat(cantidad);
		var decimales = parseFloat(decimales);
		decimales = (!decimales ? 2 : decimales);
		return Math.round(cantidad * Math.pow(10, decimales)) / Math.pow(10, decimales);
	}
	
	function sumar()
	{
		var x=0;
		<?php for ( $i = 1 ; $i <= $_POST['nroCuotas'] ; $i ++) { ?>
			var valor<?php echo $i;?> = parseFloat(document.frmAddCuotas.pago<?php echo $i;?>.value);
					x+=<?php echo "valor".$i ;?>;
		<?php } ?>
			document.frmAddCuotas.total.value = redondear(x,2);
	}
	
</script>

<script type="text/javascript">
<?php
for ( $i = 1 ; $i <= $_POST['nroCuotas'] ; $i ++) { ?>
	$(function() {
		$("#datepicker<?php echo $i;?>").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
<?php
}
  $carro=$_SESSION['carro'];
  $suma=0;
  foreach($carro as $k => $v)
  {
	$nCantidad= $v['Cantidad'];
	$nPrecio= $v['Precio'];
    $suma=$suma + ($nCantidad * $nPrecio);
  }
  $sqlConfig = "SELECT * FROM config WHERE anio='2015'";
  $consultaConfig = consulta($sqlConfig);
  if (numero_registros($consultaConfig) > 0) {
    $rs=leer_registro($consultaConfig);
	$cuotaInicial  = $rs['cuotaInicial'];	
  }
  $valorCuotaInicial = round(($suma * ($cuotaInicial/100))*100)/100;
?>
</script>
</head>

<body>
 <div id="container">
   <div id="mainContent">
   <p class="titulo">Ingrese los montos y fechas</p>
      
<form method="post" action="saveNewFacturaNormal.php?nroCuotas=<?php echo $nroCuotas; ?>" class="cmxform" name="frmAddCuotas" id="frmAddCuotas" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center">
<input type="hidden" value="<?php echo $valorCuotaInicial;?>"  name="cuotaInicial" id="cuotaInicial" />
<input type="hidden" value="<?php echo redondeado($_POST['suma']);?>"  name="totalFacturaS" id="totalFacturaS" />
<table width="90%" align="center" style="margin:0 10px;">
<tr>
<td class="title">Monto Total</td>
<td colspan="1"  class="tdcont" align="left">
&nbsp;&nbsp;<input type="text" value="<?php echo redondeado($suma);?>"  name="totalFactura" id="totalFactura" readonly="readonly" />
</td>
</tr>

<?php
  $legalChars = "%[^0-9\-\. ]%";
  $suma = $suma - $valorCuotaInicial;
  $TasaInteres = 1;
  $TasaInteres = $TasaInteres/100;
  
  $valorCuota = round(($suma/($_POST['nroCuotas']-1))*100)/100;
  $nTotal=0;
  $nTotalconIntereses=$valorCuotaInicial;
  for ( $i = 1 ; $i <= $_POST['nroCuotas'] ; $i ++) { 
    if ($i == $_POST['nroCuotas']) {
      $valorCuota = round(($suma - $nTotal)*100)/100;
      $nTotal = $nTotal + $valorCuota + $valorCuotaInicial;
    } else {
      if ($i > 1) {
        $valorCuota = round(($suma/($_POST['nroCuotas']-1))*100)/100;
        $nTotal = $nTotal + preg_replace($legalChars,"",redondeado($valorCuota));
	  }
    }
    if ($i > 1) {
      $nTotalconIntereses = $nTotalconIntereses + round(($valorCuota*(1+$TasaInteres))*100)/100;
	}
?>
  <tr><td class="title"><?php if ($i==1) { echo "Cuota Inicial";} else { echo "Pago ".$i;}?> :</td>
      <td class="tdcont" align="left">&nbsp;&nbsp;<input type="text"  name="<?php if ($i==1) { echo "CuotaInicial";} else { echo "pago".$i;}?>" id="<?php if ($i==1) { echo "CuotaInicial";} else { echo "pago".$i;}?>" value="
	  <?php
	    if ($i==1) { echo ($valorCuotaInicial);}
		else {
		    echo round(($valorCuota*(1+$TasaInteres))*100)/100;
		}
	  ?>" onChange="javascript:sumar()"/></td>
      <td  class="title">Fecha <?php echo $i;?> :</td>
      <td class="tdcont" align="left">&nbsp;&nbsp;<input type="text"  name="<?php echo "fecha".$i;?>" id="datepicker<?php echo $i; ?>"  readonly="readonly" value="<?php echo date("d-m-Y",(time() + ((30 * ($i-1)) * 24 * 60 * 60)));?>"/></td>
  </tr>
      
<?php
}
?>
      <tr>
       <td  class="title">Monto Total :</td>
      <td class="tdcont" align="left">&nbsp;&nbsp;<input type="text" name="TotalconIntereses" id="TotalconIntereses" value="<?php echo redondeado($nTotalconIntereses);?>" readonly="readonly"/></td>
      <td class="tdcont" colspan="2" align="center">
      <input type="submit" value="Grabar" name="Grabar" id="Grabar" class="boton"/>&nbsp;&nbsp;
      <input type="button" value="Cancelar" class="boton" onClick="window.open('newFacturaNormal.php?codComp=<?php echo $_POST['codComprobante']; ?>', '_self');" />
      </td>
      </tr>
        </table>
        </form>
     </div>
      <div id="footer">
       <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
</body>
</html>