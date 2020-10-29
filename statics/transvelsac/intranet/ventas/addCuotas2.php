<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
if($_POST['nroCuotas']==""){ header("Location:newFacturaNormal.php?".SID);};
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
  $calculoMargen = $_POST['calculoMargen'];
  foreach($carro as $k => $v)
  {
      if ($calculoMargen=="1") {
		$nCantidad= $v['cantidad'];
		$nPrecio= $v['precioCompra'];
	  } else {
		$nCantidad= $v['cantidad'];
		$nPrecio= $v['precioVenta'];
	  }
	  $suma=$suma + ($nCantidad * $nPrecio);
  }
  if ($calculoMargen =="1") {
       $valor = $suma;
       $porcentaje = calPorcentajeTotal($valor);
       $suma = ($suma * (1 + ($porcentaje/100)));
  }
  $calculoIGV = $_POST['calculoIGV'];
  if ($calculoIGV=="2") {
    $suma = $suma * 1.19;
  }
  $idCliente = $_POST['idClienteC'];
  $sql = "select * from cliente where idCliente='$idCliente'";
  $qry=mysql_query($sql);
  $row=mysql_fetch_array($qry);
  $nroCuotas = $_POST['nroCuotas'];
  $fechaActual = getdate();
  $anio = $fechaActual['year'];
  $tasaEfectivaMensual = 0;	
  $tasaSimpleMensual = 0;	
  $interesMoratorio = 0;	
  $TasaInteres = 0;
  $sqlConfig = "SELECT * FROM config WHERE anio='$anio'";
  $consultaConfig = consulta($sqlConfig);
  if (numero_registros($consultaConfig) > 0) {
    $rs=leer_registro($consultaConfig);
	$cuotaInicial  = $rs['cuotaInicial'];	
    $tasaEfectivaMensual = $rs['tasaEfectivaMensual'];	
	$tasaSimpleMensual = $rs['tasaSimpleMensual'];	
	$interesMoratorio = $rs['interesMoratorio'];	
  }
  $tipoInteresC = $_POST['TipoCredito'];
  
  if ($tipoInteresC == "2") {
    $TasaInteres = $tasaSimpleMensual;
  }
  if ($tipoInteresC == "3") {
    $TasaInteres = $tasaEfectivaMensual;
  }
  $valorCuotaInicial = round(($suma * ($cuotaInicial/100))*100)/100;
?>
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
   <p class="titulo">Ingrese los montos y fechas</p>
      
<form method="post" action="saveNewReciboNormal.php?nroCuotas=<?php echo $nroCuotas; ?>&idVendedor=<?php echo $idVendedorC; ?>&calculoMargen=<?php echo $calculoMargen; ?>&calculoIGV=<?php echo $calculoIGV; ?>" class="cmxform" name="frmAddCuotas" id="frmAddCuotas" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center">
<input type="hidden" value="<?php echo $_POST['idClienteC'];?>"  name="idCliente" id="idCliente" />
<input type="hidden" value="<?php echo $tipoInteresC;?>"  name="tipoInteres" id="tipoInteres" />
<input type="hidden" value="<?php echo $valorCuotaInicial;?>"  name="cuotaInicial" id="cuotaInicial" />
<input type="hidden" value="<?php echo redondeado($_POST['suma']);?>"  name="totalFacturaS" id="totalFacturaS" />
<table width="90%" align="center" style="margin:0 10px;">
<tr>
  <td class="title">Codigo Cliente</td>
  <td colspan="1"  class="tdcont" align="left">&nbsp;&nbsp;<input type="text" value="<?php echo $row['codCliente'];?>" name="codCliente" id="codCliente" readonly="readonly" />
  </td>
  <td class="title">Nombre Cliente</td>
  <td colspan="1"  class="tdcont" align="left">&nbsp;&nbsp;<input type="text" value="<?php echo $row['nomCliente'];?>" name="nomCliente" id="nomCliente" readonly="readonly" />
  </td>
</tr>
<tr><td class="title">Monto Total</td>
<td colspan="1"  class="tdcont" align="left">
&nbsp;&nbsp;<input type="text" value="<?php echo redondeado($suma);?>"  name="totalFactura" id="totalFactura" readonly="readonly" />
</td>
  <td class="title"><?php if ($tipoInteresC == "2") { echo "Tasa de Interes Simple"; } if ($tipoInteresC == "3") { echo "Tasa de Interes Compuesto"; }?></td>
  <td colspan="1"  class="tdcont" align="left">&nbsp;&nbsp;<input type="text" value="<?php echo $TasaInteres;?>" name="tasaInteres" id="tasaInteres" readonly="readonly" />
  </td>
</tr>

<?php
  $legalChars = "%[^0-9\-\. ]%";
  $suma = $suma - $valorCuotaInicial;
  if ($tipoInteresC == "3") {
    $temp = 1 + ($TasaInteres/100);
	$nCuotas = ($_POST['nroCuotas'] - 1) * (-1);
    $temp1 = 1 - pow($temp,$nCuotas);
	$temp2 = $temp1/($TasaInteres/100);
	$temp3 = pow($temp2,-1);
    $valorCuotaInteresCompuesto = $suma * $temp3;
  }
  $TasaInteres = $TasaInteres/100;
  
  if ($tipoInteresC == "2") {
    $valorCuota = round(($suma/($_POST['nroCuotas']-1))*100)/100;
  }
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
          if ($tipoInteresC == "2") {
		    echo round(($valorCuota*(1+$TasaInteres))*100)/100;
		  }
          if ($tipoInteresC == "3") {
		    echo (round($valorCuotaInteresCompuesto*100))/100;
          }
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