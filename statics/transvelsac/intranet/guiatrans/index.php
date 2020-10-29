<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idSucursal=$_SESSION['idSucursal'];
$fechaIni = date('d-m-Y');
$fechaFin = date('d-m-Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../js/jpicker/development-bundle/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript">
function cargarDocum()
{
      window.open('newGuiaRem.php', '_self');
}

	$(function() {
		$("#fechaIni").datepicker({
		dateFormat: 'dd-mm-yy',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
	$(function() {
		$("#fechaFin").datepicker({
		dateFormat: 'dd-mm-yy',
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
      	
		<div id="menu"><?php include("../menu.php") ?></div>
      <div id="mainContent">
      <p class="titulo">Buscar <a href="index.php" style=" color:#FFFFFF">Guias de Transportistas</a></p>
      <?php 
					if(isset($_GET['msg'])){ 
					$display="";
						if($_GET['msg']=='1')
						{$msg= "La guia de remision se registró satisfactoriamente"; }
						elseif($_GET['msg']=='2')
						{$msg= "La guia de remision no pudo ser registrada";}
						elseif($_GET['msg']=='3')
						{$msg= "La guia de remision fue cancelada";}
						elseif($_GET['msg']=='3')
						{$msg= "La guia de remision no pudo ser cancelada";}
						else
						{header("Location:index.php");}
					}
					else
						{$msg=''; $display="style='display:none'";}
				
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
        <div id="busqueda" >
     <form method="post" style="font-size:10px; margin-top:10px; text-align:center;" action="index.php" name="frmBuscarGuiaRem" id="frmBuscarGuiaRem" enctype="multipart/form-data">
        <label>Rango de fecha de emisión de:</label>&nbsp;<input type="text" name="fechaIni" id="fechaIni" size="10" value="<?php echo $fechaIni;?>"/>&nbsp;&nbsp;
   	<label>Hasta</label> &nbsp;<input type="text" name="fechaFin" id="fechaFin" size="10" value="<?php echo $fechaFin;?>"/> &nbsp;&nbsp;<br />	
    <label>Numero de Guia</label>&nbsp;<input type="text" name="numGuia" id="numGuia" size="15" />
    &nbsp;&nbsp;
<input type="submit" id="buscarGuiaR" name="buscarGuiaR" value="Buscar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff">
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   </form></div>
  <table width="98%" align="center" style="margin:0 10px;">
   </tr>
    <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" name="newVenta" value="Nueva Guia Transportista" onClick="javascript:cargarDocum()" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" /></td><tr>
  </table>

   <p class="titulo">Resultado de la Busqueda</p>
  <?php 
	$consultaBase = "SELECT guiatranscab.* FROM guiatranscab WHERE guiatranscab.estado=1 AND idsucursal='$idSucursal' ";
	
	if(isset($_POST['buscarGuiaR'])) 
	{	$buscarGuiaR= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
		$numGuia = $_POST['numGuia'];
	}
	else 
		{$buscarGuiaR='0';}
	
	if(isset($_GET['BGR'])) 
		{$BGR= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
		if(isset($_GET['numGuia'])) 
			{$numGuia= $_GET['numGuia'];}
	}
	else 
		{$BGR='0';}
		
	$filtro = "";
	
if($buscarGuiaR=='1' or $BGR=='1')	
{	
	if(isset($numGuia) and $numGuia != "")
	{
		$filtro = $filtro . " " . " AND numero LIKE '%$numGuia%'";
		$cadena1="numero=".$numGuia;
	}
}
	
	if(isset($fechaIni) and $fechaIni != "")
	{
		$fechaIni = fechaAGrabar($fechaIni);
		if(isset($fechaFin) and $fechaFin != "")
		{	
     		$fechaFin = fechaAGrabar($fechaFin);
			$filtro = $filtro . " " . " AND fechaemision BETWEEN '$fechaIni' AND '$fechaFin'";
			$cadena2="fechaIni=".$fechaIni;
			$cadena3="fechaFin=".$fechaFin;
		}
		else
		{
			$filtro = $filtro . " " . " AND fechaemision >= '$fechaIni'";
			$cadena2="fechaIni=".$fechaIni;
		}
	}
	elseif(isset($fechaFin) and $fechaFin != "")
	{
   		$fechaFin = fechaAGrabar($fechaFin);
		$filtro = $filtro . " " . " AND fechaemision <= '$fechaFin'";
		$cadena3="fechaFin=".$fechaFin;
	}
	
	$instruccion1= $consultaBase . $filtro;
	//echo $instruccion1;
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
	$orden="fechaemision";//ordena por fecha
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
      <table width="98%" align="center" style="margin:0 10px;">
          <tr>
          <td height="20" colspan="7">
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo "$total_registros" ?></b></div>
          <div class="paginacion" align="right">
   <?php 
  if($buscarGuiaR=='1' or $BGR=='1') {
  	$cadena="";
	if($total_registros) {
		if(isset($cadena1))
		{
			$cadena=$cadena."&".$cadena1;	
		}
		if(isset($cadena2))
		{
			$cadena=$cadena."&".$cadena2;	
		}
		if(isset($cadena3))
		{
			$cadena=$cadena."&".$cadena3;	
		}
		
		if($cadena != "") {$cadena=$cadena."&BGR=1";}
		
		
		$principal="index";//pagina principal
		if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1).$cadena."'><span class='pag'>< Anterior</span></a> ";
		}
		
		for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				{echo "<b>".$pagina."</b> "; }
			else
				{echo "<a href='$principal.php?pagina=$i".$cadena."'><span class='pag'>$i</span></a> "; }
		}
	  
		if(($pagina + 1)<=$total_paginas) {
			echo " <a href='$principal.php?pagina=".($pagina+1).$cadena."'><span class='pag'>Siguiente ></span></a>";
		}
	} 
  }
   else
  {
  		if($total_registros) {
	
		$principal="index";//pagina principal
		if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a> ";
		}
		
		for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				echo "<b>".$pagina."</b> "; 
			else
				echo "<a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a> "; 
		}
	  
		if(($pagina + 1)<=$total_paginas) {
			echo " <a href='$principal.php?pagina=".($pagina+1)."'><span class='pag'>Siguiente ></span></a>";
		}
		
	} 
  }
?>
          </div>
          </td>
        </tr>

      <tr>
            <td width="10%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="10%" align="center" class="title"><div align="center">Nº Guia</div></td>
            <td width="10%" align="center" class="title"><div align="center">F. Emision</div></td>
            <td width="10%" align="center" class="title"><div align="center">F. Inicio</div></td>
            <td width="20%" align="center" class="title"><div align="center">Destino</div></td>
            <td width="30%" align="center" class="title"><div align="center">Remitente</div></td>
	        <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
          </tr>
   	<?php
	
	while($rs = mysql_fetch_array($consulta))
	{
		$con=$con+1;
	?>              
      <tr>
            <td class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont" align="center">&nbsp;&nbsp;<?php echo $rs['numero']; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['fechaemision']; ?></td>
            <td class="tdcont" align="center"><?php echo $rs['fechainicio']; ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['destino']; ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['nombreremitente']; ?></td>
            <td>
            <div align="center" class="tdcont"><a href="javascript:void(0)" onClick="hija=window.open('verGuiaRem.php?idGuia=<?php echo $rs['idguiacab']; ?>', 'Sizewindow', 'width=1120, height=700, scrollbars=yes, toolbar=no'); return false;"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a>&nbsp; 
            
<a href="javascript:void(0)" onClick="hija=window.open('verSalidaPDF.php?idGuia=<?php echo $rs['idguiacab']; ?>', 'Sizewindow', 'width=1020, height=700, scrollbars=yes, toolbar=no'); return false;"><img src="../imagen/pdf.png" alt="Ver" border="0" /></a>&nbsp;            
            <a href="delGuiaRem.php?idGuia=<?php echo $rs['idguiacab']; ?>"><img src="../imagen/icon_del.png" alt="Cancelar" border="0" /></a>
            
        </div></td>
          </tr>
    <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
 
      </table><br />
      
       <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
    </body>
</html>