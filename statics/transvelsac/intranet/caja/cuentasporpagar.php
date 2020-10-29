<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
//unset($_SESSION['carro']);
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
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
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
   <p class="titulo">Cuentas por Pagar</p>
   
      <table width="98%" align="center" style="margin:0 10px;">
       <tr>
       <?php
		$sqlE="SELECT EMPRESA_idEmpresa FROM sucursal WHERE idSucursal = '$_SESSION[idSucursal]'";
 	    $consultaE = consulta($sqlE);
		while($rsE = leer_registro($consultaE))
		{
           $idEmpresa = $rsE['EMPRESA_idEmpresa'];
		}
	   
    $estado = "0";
	$consultaBase = "SELECT cp.tipoComprobProv,cp.codComprobProv,cp.PROVEEDOR_idProveedor,pr.nomProv,cp.importeTotal,pp.fechaVencimiento,pp.importe FROM (pago_prov pp LEFT JOIN comprobante_prov cp ON pp.COMPROBANTE_PROV_idComprobProv = cp.idComprobProv) LEFT JOIN proveedor pr ON cp.PROVEEDOR_idProveedor=pr.idProveedor WHERE cp.idEmpresa='$idEmpresa' AND pp.estadoPago=$estado ";
	
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
	$orden="pr.nomProv";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
?>
       <td height="10" colspan="2">
         <div align="left" style="width:300px; float:left"><b>Cuentas por Pagar: </b></div>
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
            <td class="tdcont" align="center"><?php echo $rs['nomProv']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['tipoComprobProv']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['codComprobProv']; ?></td>    
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
           <td colspan="3" class="title" >&nbsp;&nbsp;TOTAL CUENTAS POR PAGAR --></td>
           <td class="tdcont" align="right">S/. <?php echo redondeado($montoTotalC);?></td>
         </tr>
      </table><br />
      
      
      <!-- end #mainContent -->
      </div>
      <div id="footer">
       <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>