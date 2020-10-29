<?php
extract($_REQUEST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
   <table width="98%" align="center" style="margin:0 10px;">
    <form action="addCuotas2.php" enctype="multipart/form-data" name="frmPago" id="frmPago" method="post">
    <input type="hidden" value="<?php echo ($_GET['TipoVenta']); ?>"  name="TipoCredito" id="TipoCredito" />
    <input type="hidden" value="<?php echo ($_GET['idCliente']); ?>"  name="idClienteC" id="idClienteC" />
    <input type="hidden" value="<?php echo ($_GET['idVendedor']); ?>"  name="idVendedorC" id="idVendedorC" />
    <input type="hidden" value="<?php echo ($_GET['calculoIGV']); ?>"  name="calculoIGV" id="calculoIGV" />
    <input type="hidden" value="<?php echo ($_GET['calculoMargen']); ?>"  name="calculoMargen" id="calculoMargen" />
	 
 	 <tr><td colspan="3" class="title">Cuotas Factura</td>
	 <tr>
	   <td align="center" class="tdcont">Ingrese el numero de cuotas</td>
   	   <td align="center"  class="tdcont"><input type="text" name="nroCuotas" id="nroCuotas" value="2"></td>
   	   <td align="center"  class="tdcont"><input type="submit" value="Agregar" name="agregarPago" class="boton"></td>
	 </tr>	
   </form>
   </table>
</body>
</html>
