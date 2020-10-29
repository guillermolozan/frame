<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
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

</script>
</head>
<body>
  <div id="container">
    <div id="header">
   	<?php
		include("header.php");
	?>
    <!-- end #header --></div>
    <div id="datos">
   	<?php
		include("menuSecund.php");
	?>
   </div>
  <div id="mainContent">
   <div style="width:970px; height:auto">
   	<div id="left">
       	<?php include("menu.php") ?>
		<hr style="clear:both; visibility:hidden"       />
    </div>
  <div id="right">
  <!-- aca todo el contenido q kieras poner -->
  <p class="titulo">Rangos de Utilidad</p>
   <table width="92%" align="center" style="margin:0 10px;">
   <form method="POST" action="rangosUtilidad.php" name="frmRangosUtilidad" id="frmRangosUtilidad" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
     <tr>
      <td align="right" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="submit" name="newRango" value="Nuevo Rango" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />      </td>
      </tr>
   </form>
     <tr>
    <?php
    $filtro = "";
	$consultaBase = "SELECT * FROM rango_grupo ";
	$instruccion1= $consultaBase . $filtro;
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
	$up="ASC";
	$orden="idRangoGrupo";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
     <td height="20" colspan="8">
     <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
     <div class="paginacion" align="right" >
     <?php 
   if($buscarVenta=='1' or $BVenta=='1') {
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
		$principal="rangoGrupos";//pagina principal
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
	  $principal="rangoGrupos";//pagina principal
	  if(($pagina - 1) > 0) {
			echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a>";
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
   </div>     </td>
    </tr>
    <tr>
      <td width="6%" align="center" class="title"><div align="center" >ID</div></td>
      <td width="40%" align="left" class="title"><div align="center">Descripcion</div></td>
      <td width="40%" align="left" class="title"><div align="center">Observacion</div></td>
      <td width="10%" align="center" class="title"><div align="center">Opci&oacute;n</div></td>
    </tr>
     <?php
		while($rs = leer_registro($consulta))
		{
			$con=$con+1;
	 ?>
    <tr>
       <td class="tdcont" align="center"><?php echo $rs['idRangoGrupo']; ?></td>    
       <td class="tdcont" align="left"><?php echo $rs['rangoDescripcion']; ?></td>    
       <td class="tdcont">&nbsp;&nbsp;<?php echo $rs['rangoObs']; ?></td>
       <td><div align="center" class="tdcont">&nbsp;<a href="delRangoUtilidad.php?idRangoGrupo=<?php echo $rs['idRangoGrupo']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a></a>&nbsp;<a href="rangosEditUtilidad.php?idRangoGrupo=<?php echo $rs['idRangoGrupo']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a></div>       </td>
    </tr>
          <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
      </table>
   <br />
  <!-- end #mainContent -->
      </div>
    <!-- end #container --></div>
    </body>
</html>