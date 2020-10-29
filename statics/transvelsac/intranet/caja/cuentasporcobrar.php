<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
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
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript">

function imprimirReporte()
{
  var $Vendedor = document.getElementById('idVendedor').value;
  window.open('../reportes/rptcuentasxcobrarxcadavendedor.php?idVendedor='+$Vendedor, 'Sizewindow', 'width=900, height=700, scrollbars=yes, toolbar=no,resizable=yes');
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
		
    <p class="titulo">Buscar Cuentas por cobrar</p>
    <div id="busqueda" >
  <form method="post" action="#" name="frmCuentaxCobrar" id="frmCuentaxCobrar" style="font-size:10px; margin-top:10px; text-align:center;">
 	<label>Vendedor 
    <select name="idVendedor" id="idVendedor">
       	<option value="0">Seleccione</option>
       	<?php
			$sql = "SELECT idUsuario,codUsuario,nomUsuario FROM usuario ORDER BY nomUsuario";
	  		$rsl = consulta($sql);
       		while($reg = leer_registro($rsl))
	  		{
    	?>
       	<option value="<?php echo $reg["idUsuario"];?>"><?php echo $reg["nomUsuario"];?></option>
       	<?php
	  		}
       		mysql_free_result($rsl);
       	?>
   	</select>	
   <td width="5%" align="center" class="title"><a href="#" onclick="cargaCuentasxcobrar()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar</a></td>
  </form></div>
        
   <p class="titulo">Cuentas por Cobrar</p>
   
  <div id="detallecuentasxcobrardiv">       
      <table width="98%" align="center" style="margin:0 10px;">
       <tr>
       <?php
    $estado = "0";
	$consultaBase = "SELECT cp.tipoComprobante,cp.codComprobante,cp.CLIENTE_idCliente,pr.nomCliente,cp.importeTotal,pp.fechaVencimiento,pp.importe FROM (pago_cliente pp LEFT JOIN comprobante cp ON pp.COMPROBANTE_idComprobante = cp.idComprobante) LEFT JOIN cliente pr ON cp.CLIENTE_idCliente=pr.idCliente WHERE pp.estadoPago=$estado ";
	
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
	$orden="cp.codComprobante";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
?>

       <td height="10" colspan="2">
         <div align="left" style="width:300px; float:left"><b>Cuentas por Cobrar: </b></div>
       </td>
       </tr>
          <tr>
            <td width="5%" align="center" class="title"><div align="center" >Item</div></td>
            <td width="35%" align="center" class="title"><div align="center">Proveedor</div></td>
            <td width="10%" align="center" class="title"><div align="center">Tipo Docum.</div></td>
            <td width="10%" align="center" class="title"><div align="center">No. Docum.</div></td>
            <td width="20%" align="center" class="title"><div align="center">Total Docum.</div></td>
            <td width="10%" align="center" class="title"><div align="center">Fecha Venc.</div></td>
            <td width="10%" align="center" class="title"><div align="center">Saldo</div></td>
          </tr>
        <?php
		    $montoTotalC = 0;
			$montoVencido = 0;
			$montoPorVencer = 0;
			$fechaActual = date('Y-m-d');
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
		?>
           <tr <?php 
		    if($rs['fechaVencimiento']<$fechaActual) {
			  $montoVencido = $montoVencido + $rs['importe'];
			  echo "bgcolor='#D9E7B8'"; 
			} else {
			  $montoPorVencer = $montoPorVencer + $rs['importe'];
			}
			?>>
            <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['nomCliente']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['tipoComprobante']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['codComprobante']; ?></td>    
            <td class="tdcont" align="right"><?php echo redondeado($rs['importeTotal']); ?>&nbsp;&nbsp;</td>
            <td class="tdcont" align="center"><?php echo $rs['fechaVencimiento']; ?></td>    
            <td class="tdcont" align="right"><?php echo redondeado($rs['importe']); ?>&nbsp;&nbsp;</td>
          </tr>
        <?php		
             $montoTotalC = $montoTotalC + $rs['importe'];
	       }
	       mysql_free_result($q);
	       mysql_free_result($consulta);	
	    ?>
  		  <tr> 
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="3" class="title" >&nbsp;&nbsp;DEUDA VENCIDA --></td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoVencido);?></td>
         </tr>
  		  <tr> 
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="3" class="title" >&nbsp;&nbsp;DEUDA POR VENCER --></td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoPorVencer);?></td>
         </tr>
  		  <tr> 
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="0" >&nbsp;&nbsp;</td>
           <td colspan="3" class="title" >&nbsp;&nbsp;TOTAL CUENTAS POR COBRAR --></td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoTotalC);?></td>
         </tr>
      </table><br />
 </div>
    <td width="5%" align="center" class="title"><div align="center" ><a href="javascript:void(0)" onclick="javascript:imprimirReporte()">Imprimir Cuentas por Cobrar</a></div></td>
      
      <div id="footer">
       <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>