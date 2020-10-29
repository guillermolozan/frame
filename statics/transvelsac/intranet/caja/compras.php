<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionCaja.php");
CheckNivel();
unset($_SESSION['carro']);
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
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
	$(function() {
		$("#datepicker1").datepicker({
		dateFormat: 'yy-mm-dd',
		regional: 'es',
		showOn: 'button', buttonImage: '../images/calendar.gif', buttonImageOnly: true}); 
	});
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
      <p class="titulo">Buscar entradas por Compras</p>
      <?php 
			if(isset($_GET['msg']))
			{ 
				$display="";
				if($_GET['msg']=='1')
					{$msg= "La entrada se agrego satisfactoriamente"; }
				elseif($_GET['msg']=='2')
					{$msg= "!! La entrada no pudo ser registrada";}
				elseif($_GET['msg']=='3')
					{$msg= "La entrada fue eliminada de la base de datos";}
				elseif($_GET['msg']=='4')
					{$msg= "!! La entrada no pudo ser eliminada";}
				else
					{header("Location:compras.php");}
			}
			else
				{$msg=''; $display="style='display:none'";
			}
			echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
			?>
      <div id="busqueda" >
		
       <form method="post" action="compras.php" name="frmBuscarEntradaC" id="frmBuscarEntradaC" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
    	
        	 	<label>Proveedor 
                   <select name="idProv" id="idProv">
                	<option value="0">Seleccione</option>
		           	<?php
					$sql = "SELECT idProveedor, nomProv FROM proveedor ORDER BY nomProv";
  			  		$rsl = consulta($sql);
              		while($reg = leer_registro($rsl))
			  		{
			    	?>
                   	<option value="<?php echo $reg["idProveedor"];?>"><?php echo $reg["nomProv"];?></option>
                   	<?php
			  		}
              		mysql_free_result($rsl);
			       	?>
                	</select>	</label>
                   
                    &nbsp;Rango de fecha desde :
                    <input type="text" name="fechaIni" id="datepicker" readonly="readonly" size="10" value="<?php echo $fechaIni;?>"/>
					&nbsp;Hasta
					<input type="text" name="fechaFin" id="datepicker1" readonly="readonly" size="10" value="<?php echo $fechaFin;?>"/>
&nbsp;Cod. Comprobante :<input type="text" name="codComp" id="codComp"/><br /><br />
&nbsp;&nbsp;<input type="submit" id="buscarCompra" name="buscarCompra" value="Buscar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" style="border:#CCCCCC 1px solid; background:#666666; color:#ffffff;" />
   </form></div>
   
   <input type="button" name="newEntradaC" value="Nueva Entrada Compra" onClick="window.open('newEntradaC.php', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff; display:none" />
   
   <br />
   <p class="titulo">Resultado de la Busqueda</p>
      <table width="98%" align="center" style="margin:0 10px;">
       <tr>
       <?php 
	$consultaBase = "SELECT m.*, p.nomProv FROM movimiento as m INNER JOIN proveedor as p ON m.idProveedor=p.idProveedor ";
	
	if(isset($_POST['buscarCompra'])) 
	{	$buscarCompra= '1';
		$fechaIni = $_POST['fechaIni'];
		$fechaFin = $_POST['fechaFin'];
		$idProv = $_POST['idProv'];
		$codComp = $_POST['codComp'];
	}
	else 
		{$buscarCompra='0';}
	
	if(isset($_GET['BEnt'])) 
		{$BEnt= '1';
		if(isset($_GET['fechaIni'])) 
			{$fechaIni= $_GET['fechaIni'];}
		if(isset($_GET['fechaFin'])) 
			{$fechaFin= $_GET['fechaFin'];}
		if(isset($_GET['idProv'])) 
			{$idProv= $_GET['idProv'];}
		if(isset($_GET['codComp'])) 
			{$codComp= $_GET['codComp'];}
	}
	else 
		{$BEnt='0';}
		
	$filtro = "";
	
if($buscarCompra=='1' or $BEnt=='1')	
{
	if(isset($fechaIni) and $fechaIni != "")
	{
		if(isset($fechaFin) and $fechaFin != "")
		{	if($filtro != "")
			{
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.fecha BETWEEN '$fechaIni' AND '$fechaFin'";
			$cadena2="fechaIni=".$fechaIni;
			$cadena3="fechaFin=".$fechaFin;
		}
		else
		{
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.fecha >= '$fechaIni'";
			$cadena2="fechaIni=".$fechaIni;
		}
	}
	elseif(isset($fechaFin) and $fechaFin != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
		}
		$filtro = $filtro . " " . "m.fecha <= '$fechaFin'";
		$cadena3="fechaFin=".$fechaFin;
	}
	
	if(isset($idProv) and $idProv != '0')
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "m.idProveedor='$idProv'";
		$cadena1="idProv=".$idProv;
	}
	
	if(isset($codComp) and $codComp != "")
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "m.codComprobante LIKE '%$codComp%'";
		$cadena4="codComp=".$codComp;
	}
}
	
	if($filtro != ""){
			$filtro .= " " . "AND";
		}
	//Valores para este tipo de entrada
	$tipoMovim="Entrada";
	$descMovim="Compra";
	$filtro = $filtro . " " . "m.tipoMovim='$tipoMovim' AND m.descMovim='$descMovim'";

	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	
	$idEmpresa=$_SESSION['idEmpresa'];
	$filtro1 = " m.idEmpresa='$idEmpresa'";
	
	if($filtro == ""){
		$filtro = " " . "WHERE" . $filtro1;
	}
	else {
		$filtro = $filtro. " " . "AND" . $filtro1;
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
	$orden="m.fecha";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
          <td height="20" colspan="8">
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
          <div class="paginacion" align="right" >
           <?php 
		   //Add
			$maxpags=7;
			$minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
  			$maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;
			//fin Add
  if($buscarEntrada=='1' or $BEnt=='1') {
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
		if(isset($cadena4))
		{
			$cadena=$cadena."&".$cadena4;	
		}
		
		if($cadena != "") {$cadena=$cadena."&BEnt=1";}
		

		$principal="compras";//pagina principal
		if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1).$cadena."'><span class='pag'>< Anterior</span></a> ";
		}
		
		if ($minimo!=1) $texto.= " ... ";
			for ($i=$minimo; $i<$pagina; $i++)
				$texto .= "<a href='$principal.php?pagina=$i".$cadena."'><span class='pag'>$i</span></a>";
			$texto .= " <b>".$pagina."</b> ";
			for ($i=$pagina+1; $i<=$maximo; $i++)
				$texto .= " <a href='$principal.php?pagina=$i".$cadena."'><span class='pag'>$i</span></a>";
			if ($maximo!=$total_paginas) $texto.= " ... ";
		echo $texto;
	  
		if(($pagina + 1)<=$total_paginas) {
			echo " <a href='$principal.php?pagina=".($pagina+1).$cadena."'><span class='pag'>Siguiente ></span></a>";
		}
	
	} 
  }
   else
  {
  		if($total_registros) {
		$principal="compras";//pagina principal
		if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a>";
		}
		if ($minimo!=1) $texto.= " ... ";
			for ($i=$minimo; $i<$pagina; $i++)
				$texto .= " <a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a>";
			$texto .= " <b>".$pagina."</b> ";
			for ($i=$pagina+1; $i<=$maximo; $i++)
				$texto .= " <a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a>";
			if ($maximo!=$total_paginas) $texto.= " ... ";
		echo $texto;
	  
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
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
			<td width="15%" align="center" class="title"><div align="center">Codigo</div></td>
            <td width="15%" align="center" class="title"><div align="center">Cod. Comprobante</div></td>
            <td width="15%" align="center" class="title"><div align="center">Fecha </div></td>
            <td width="30%" align="center" class="title"><div align="center">Proveedor</div></td>
            <td width="10%" align="center" class="title"><div align="center">Monto ($)</div></td>
            <td width="10%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
          </tr>
             <?php
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
		?>
           <tr>
            <td height="20" class="tdcont" align="center"><?php echo $con; ?></td>
			 <td class="tdcont" align="center"><?php echo $rs['codMovim']; ?></td>
               <td class="tdcont" align="center"><?php echo $rs['codComprobante']; ?></td>    
            <td class="tdcont" align="center"><?php echo $rs['fecha']; ?></td>
            <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['nomProv']; ?></td>
            <td class="tdcont" align="right"><?php echo redondeado($rs['montoMovim']); ?>&nbsp;&nbsp;</td>
            <td><div align="center" class="tdcont"><a href="javascript:void(0)" onClick="hija=window.open('verEntrada2.php?idMovim=<?php echo $rs['idMovim']; ?>', 'Sizewindow', 'width=820, height=550, scrollbars=yes, toolbar=no'); return false;"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a></div></td>
          </tr>
          <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
      </table><br />
      <!-- end #mainContent -->
      </div>
      <div id="footer">
       <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>