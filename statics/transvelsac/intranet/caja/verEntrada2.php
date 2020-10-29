<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
$idMovim=$_GET['idMovim'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/notas.css" rel="stylesheet" type="text/css"> 
<link href="../css/notas2.css" rel="stylesheet" type="text/css" media="print"> 
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script type="text/javascript">
function Impresion()
{
if (window.print)
{
window.print();
window.close();
}
else
{
alert("Este navegador no soporta esta opción.");
window.close();
}
}
</script>
</head>

<body>
<br /><br />
    <div id="container">
    
      <div id="header">
      	<div class="logo">      
        	<?php
			$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.EMPRESA_idEmpresa=e.idEmpresa WHERE s.idSucursal='$_SESSION[idSucursal]'";
			$result=consulta($sql);
			$rs=leer_registro($result);
			?>
        </div>
      	<div class="tienda">
        	
      		<b><center><?php echo $rs['nomEmpresa']?></center><br />
      		<?php echo $rs['nomSucursal']?><br />
      		<?php echo $rs['dirSucursal'] ?><br />
      		<?php echo $rs['rucEmpresa'] ?><br />
      		<?php echo $rs['telefSucursal'] ?><br />
      		</b>
      	</div>
     <?php
	$sql2="SELECT movimiento.*, p.nomProv, u.nomUsuario, s.nomSucursal FROM movimiento INNER JOIN proveedor as p ON movimiento.idProveedor=p.idProveedor INNER JOIN usuario as u ON movimiento.USUARIO_idUsuario=u.idUsuario INNER JOIN sucursal as s ON movimiento.idSucursalE=s.idSucursal where movimiento.idMovim='$idMovim'";
	$result2=consulta($sql2);
	$rs2=leer_registro($result2);
	$montoMovim=$rs2['montoMovim'];
	 ?>
      	<div class="guia">
     		<b><center>
        	R.U.C Nº <?php echo $rs['rucEmpresa'] ?><br /><br />
        	NOTA DE ENTRADA<br />
        	<br />
        	Nº <?php echo ceros($rs['idSucursal'],3)?>	- <?php echo $rs2['codMovim'] ?>
      		</center><br />
      		</b>
      	</div>
      <br class="corte" />
      <!-- end #header -->
      </div>
	<hr />
    <br />
	<div id="mainContent">
      <table width="98%" align="center" style="margin:0 10px;">
      <tr>
          <td class="title"><strong >MOTIVO</strong></td>
          <td class="tdcont" colspan="3"><strong >&nbsp;&nbsp;COMPRA A PROVEEDOR</strong></td>
        </tr>
        <tr>
          <td colspan="2" class="title"><strong >PROVEEDOR :</strong></td>
          <td colspan="2" class="title">RECEPCION :          </td>
        </tr>
        <tr>
          <td class="title" width="20%"><strong >Proveedor :</strong></td>
          <td width="30%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['nomProv'] ?></td>
          <td width="17%" class="title">Recibido :</td>
          <td width="33%" class="tdcont">&nbsp;&nbsp;<?php echo $rs2['nomSucursal'] ?></td>
        </tr>
        <tr>
         <td class="tdcont">&nbsp;</td>
          <td class="tdcont">&nbsp;&nbsp;</td>
           <td class="title">Operador :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['nomUsuario'] ?></td>
        </tr>
        <tr>
         <td class="tdcont">&nbsp;</td>
          <td class="tdcont">&nbsp;&nbsp;</td>
          <td class="title">Fecha :</td>
          <td class="tdcont">&nbsp;&nbsp;<?php echo $rs2['fecha'] ?></td>
        </tr>
        </table>
      <br /><br />
	   <table width="98%" align="center" style="margin:0 10px;">
        <tr>
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="15%" align="center" class="title"><div align="center">Codigo  </div></td>
            <td width="40%" align="center" class="title"><div align="center">Descripción</div></td>
            <td width="10%" align="center" class="title"><div align="center">Cantidad</div></td>
            <td width="15%" align="center" class="title"><div align="center">Precio&nbsp;($)</div></td>
           <td width="15%" align="center" class="title"><div align="center">Total&nbsp;($)</div></td>
          </tr>
          <?php
	$instruccion = "select 	mp.*, p.* FROM movimiento_producto as mp INNER JOIN producto as p ON mp.PRODUCTO_idProducto=p.idProducto where mp.MOVIMIENTO_idMovim='$idMovim'";
	$consulta = consulta($instruccion);
	$con=0;
	while($rs = leer_registro($consulta))
	{
		$con=$con+1;
	?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con ?></td>
            <td class="tdcont" align="center"><?php echo $rs['codProd'] ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['nomProd'] ?></td>
            <td class="tdcont" align="center"><?php echo $rs['cantEntrada'] ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs['costoUnit']) ?>&nbsp;&nbsp;</td>
            <td class="tdcont" align="right"><?php echo redondeado($rs['valorEntrada']) ?>&nbsp;&nbsp;</td>
          </tr>
        <?php
	$idProducto=$rs['PRODUCTO_idProducto'];
	$idMovim=$rs['MOVIMIENTO_idMovim'];
$instruccion1 = "select serie from serie_producto where MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto='$idProducto' and MOVIMIENTO_PRODUCTO_MOVIMIENTO_idMovim = '$idMovim'";
	$series="";
	$consulta1 = consulta($instruccion1);
	while($rs1 = leer_registro($consulta1))
	{
		if($series=="") {$series="N/S: ".$rs1['serie'];}
		else {$series = $series." - ".$rs1['serie'];}
	}
	?>
    	<tr> 
      <td colspan="6"  class="tdcont"><?php echo $series ?></td>
  </tr>

  <?php }?>
		<tr> 
      <td colspan="5" class="title" >&nbsp;&nbsp;TOTAL</td>
      <td class="tdcont" align="right"><?php echo redondeado($montoMovim) ?>&nbsp;&nbsp;</td>
    </tr>
  </table>
      <!-- end #mainContent -->
      </div>
     <!-- end #container --></div>
      <br /><br />
 <div align="right" style="margin-right:20px" id= "noPrint">
 <a href="" onclick="javascript:Impresion();">Imprimir</a>&nbsp;&nbsp;<a href="javascript:close()">Cerrar</a></div>
    </body>
</html>
