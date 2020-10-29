<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
$idComprobante=$_GET['idComprobante'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script type="text/javascript">
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}
function imprimirReporte($Comprobante,$Cliente)
{
    window.open('../reportes/imprimirCuotas.php?idComprobante='+$Comprobante+'&idCliente='+$Cliente, 'Sizewindow', 'width=900, height=700, scrollbars=yes, toolbar=no, resizable=yes');
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
		
      <div id="mainContent">
     <?php
	 $sql="SELECT cp.*, c.nomCliente FROM comprobante as cp LEFT JOIN cliente as c ON cp.CLIENTE_idCliente=c.idCliente WHERE cp.idComprobante = '$idComprobante' ";
	$result=consulta($sql);
	$rs=leer_registro($result);
	$idComprobante = $rs['idComprobante'];
    $idCliente = $rs['CLIENTE_idCliente'];
	$codComprobante = $rs['codComprobante'];
	$tipoComprobante = $rs['tipoComprobante'];
	$nomCliente = $rs['nomCliente'];
	$fecha = $rs['fecha'];
	$importeNeto=$rs['importeNeto'];
	$descuento=$rs['descuento'];
	$igv=$rs['importeIGV'];
	$importeTotal=$rs['importeTotal'];
	 ?>
    <p class="titulo"><?php echo $tipoComprobante ?> Nº <?php echo $codComprobante ?></p>
   <table width="98%" align="center" style="margin:0 10px;">
    <tr>
    <td class="title" width="20%">Cliente:&nbsp;  </td>
    <td align="left" class="tdcont">&nbsp;&nbsp;<?php echo $nomCliente; ?></td>
	</tr>
    <tr>
    <td class="title" width="20%">Fecha:&nbsp;  </td>
    <td class="tdcont">&nbsp;&nbsp;<?php echo $fecha; ?></td>
    </tr>
  </table>
	<br />
   <!-- detalle -->
   <table width="98%" align="center" style="margin:0 10px;">
  <tr>
   			<td  align="center" class="title">Item</td>
            <td  align="center" class="title">Codigo</td>
            <td  align="center" class="title">Descripcion</td>
            <td  align="center" class="title">Cantidad</td>
            <td  align="center" class="title">P. Unit</td>
            <td  align="center" class="title">Total</td>

        </tr>
   <?php
    $instruccion = "SELECT dc.*,p.codProd,p.nomProd FROM det_comprobante as dc LEFT JOIN producto as p ON dc.idProducto=p.idProducto WHERE dc.COMPROBANTE_idComprobante ='$idComprobante'";
	$consulta = consulta($instruccion);
	$con=0;
	$total=0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
		$total=$total+$rs['valorEntrada'];
	?>
   	<tr> 
      <td class="tdcont" align="center"><?php echo $con ?></td>
      <td class="tdcont" align="center"><?php echo $rs['codProd'] ?></td>
      <td class="tdcont" align="left">&nbsp;&nbsp;<?php echo $rs['nomProd'] ?></td>
      <td class="tdcont" align="center"><?php echo $rs['cantidad'] ?></td>
      <td class="tdcont" align="right"><?php echo redondeado($rs['precioVenta']) ?>&nbsp;&nbsp;</td>
      <td class="tdcont" align="right"><?php echo redondeado($rs['importe']) ?>&nbsp;&nbsp;</td>
    </tr> 
  <?php }?>
	<tr> 
      <td colspan="5"  class="tdcont"><b>Subtotal</b></td>
      <td class="tdcont" align="right"><?php echo redondeado($importeNeto) ?>&nbsp;&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5"  class="tdcont"><b>Descuento</b></td>
      <td class="tdcont" align="right"><?php echo redondeado($descuento) ?>&nbsp;&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5"  class="tdcont"><b>Total Compra</b></td>
      <td class="tdcont" align="right"><?php echo redondeado($importeNeto-$descuento); ?>&nbsp;&nbsp;</td>
    </tr>
    <tr> 

      <td colspan="5"  class="tdcont"><b>IGV (19%)</b></td>
      <td class="tdcont" align="right"><?php echo redondeado($igv); ?>&nbsp;&nbsp;</td>
    
  </tr>
  <tr> 

      <td colspan="5"  class="title"><b>TOTAL</b></td>
      <td class="tdcont" align="right"><?php echo redondeado($importeTotal); ?>&nbsp;&nbsp;</td>
    
  </tr>
</table>
<br />
<FORM ACTION="savePagoCuotas.php" class="cmxform" id="frmSavePagoCuotas" NAME="frmSavePagoCuotas" METHOD="POST" ENCTYPE="multipart/form-data"> 
<table width="50%" align="center" style="margin:0 10px;">
   	<tr align="center">
       	<td class="title">Numero Pago</td>
        <td class="title">Monto</td>
        <td class="title">Fecha</td>
        <td class="title">Estado</td>
        <td class="title">Accion</td>
    </tr>
    <?php
	  	$instruccion = "SELECT * FROM pago_cliente WHERE COMPROBANTE_idComprobante='$idComprobante'";
		$consulta = consulta($instruccion);
		$con=0;
		$total=0;
		while($rs = leer_registro($consulta))
		{
			$con=$con+1;
    ?>
    <tr align="center">
       	<td class="tdcont"><?php echo $con;?></td>
        <td class="tdcont"><?php echo $rs['importe'] ?></td>
        <td class="tdcont"><?php echo $rs['fechaVencimiento'] ?></td>
        <td class="tdcont"><?php if($rs['estadoPago']==1) echo "Pagado"; else echo "Sin Pagar"; ?></td>
        <td class="tdcont" align="center"><?php if($rs['estadoPago']==1) { ?>
       	<img src="../imagen/lock.png" alt="cancelado" border="0">
    <?php } else {?>
		<input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente; ?>"/>
        <input type="checkbox" name="cuota[]" id="cuota" value="<?php echo $rs['idPagoCliente']; ?>"/>
    <?php } ?>
         </td>
    </tr>
    <?php
	   }
	?>
  </table>
  <td width="5%" align="center" class="title"><div align="center" ><a href="javascript:void(0)" onclick="javascript:imprimirReporte(<?php echo $idComprobante; ?>,<?php echo $idCliente; ?>)">Imprimir Cuotas</a></div></td>
       <br />
      
      <div align="right"><input name="btnGuardar" type="submit" id="btnGuardar" value="Grabar" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Retornar" onClick="window.open('index.php', '_self')" class="boton" />
</FORM>
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
