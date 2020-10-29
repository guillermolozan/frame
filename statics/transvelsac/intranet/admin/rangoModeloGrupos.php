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
<script type="text/javascript">
function asignarRangoUtilidad($idModelo)
{
    window.open('asignarRango.php?idModelo=' + $idModelo, 'Sizewindow', 'width=750, height=120, scrollbars=yes, toolbar=no');
}
</script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
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
  <p class="titulo">Asignar Rangos a cada Modelo de Producto</p>
  <div id="busqueda">
  </div>
  <form method="POST" action="#" name="frmBuscarModelo" id="frmBuscarModelo" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
   	<label>Codigo :</label>
    <input type="text" id="codModelo" name="codModelo" style="text-transform:uppercase"/>
 	<label>Nombre :</label>
	<input type="text" id="nomModelo" name="nomModelo" style="text-transform:uppercase"/>
   	<label>Tipo :</label>
	<select name="idTipoProd" id="idTipoProd">
	<option value="0">TODOS</option>
   	<?php
		$sql = "SELECT idTipoProd, nomTipoProd FROM tipo_producto ORDER BY nomTipoProd";
		$rsl = consulta($sql);
		while($reg = leer_registro($rsl))
		{
	?>
	<option value="<?php echo $reg["idTipoProd"];?>"><?php echo $reg["nomTipoProd"];?></option>
   	<?php
		}
	    mysql_free_result($rsl);
   	?>
	</select>
	<input type="submit" id="buscarModelo" name="buscarModelo" value="Buscar" class="boton">
  </form>
  </div>
  <?php 
	$consultaBase = "SELECT m.*, t.nomTipoProd FROM modelo as m INNER JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idTipoProd=t.idTipoProd";
	if(isset($_POST['buscarModelo'])) 
	{	
		$buscarModelo= '1';
		if(isset($_POST['codModelo'])) 
			{$codModelo= $_POST['codModelo'];}
		if(isset($_POST['nomModelo'])) 
			{$nomModelo= $_POST['nomModelo'];}
		if(isset($_POST['idTipoProd'])) 
			{$idTipoProd= $_POST['idTipoProd'];}
	}
	else 
		{$buscarModelo='0';
	}
	if(isset($_GET['BMod'])) 
	{
		$BMod= '1';
		if(isset($_GET['codModelo'])) 
			{$codModelo= $_GET['codModelo'];}
		if(isset($_GET['nomModelo'])) 
			{$nomModelo= $_GET['nomModelo'];}
		if(isset($_GET['idTipoProd'])) 
			{$idTipoProd= $_GET['idTipoProd'];}
	}
	else 
		{$BMod='0';
	}
	$filtro = "";
	if($buscarModelo=='1' or $BMod=='1')	
	{
		if(isset($codModelo) and $codModelo != ""){
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.codModelo LIKE '%$codModelo%'";
			$cadena1="codModelo=".$codModelo;
		}
		if(isset($nomModelo) and $nomModelo != "")
		{
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.nomModelo LIKE '%$nomModelo%'";
			$cadena2="nomModelo=".$nomModelo;
		}
		if(isset($idTipoProd) and $idTipoProd != '0'){
			if($filtro != ""){
				$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.TIPO_PRODUCTO_idTipoProd='$idTipoProd'";	
			$cadena3="idTipoProd=".$idTipoProd;
		}
	}	
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	$instruccion1= $consultaBase . $filtro;
	$q = consulta($instruccion1);
	$total_registros = numero_registros($q);
	$registros=15;
	if (!isset($_GET['pagina'])) 
	{ 
		$inicio = 0; 
   		$pagina = 1;
		$con='0'; 
	} 
	else 
	{ 
		$pagina=$_GET['pagina'];
		$inicio = ($pagina - 1) * $registros; 
		$con=($pagina-1)*$registros;
	} 
	$up="ASC";
	$orden="nomModelo";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
    // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
  ?>
  <table width="75%" align="center" style="margin:0 10px;">
   	<tr>
  		<td height="20" colspan="5">
       	<div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo "$total_registros" ?></b></div>
		<div class="paginacion" align="right" >
		<?php 
			if($buscarModelo=='1' or $BMod=='1') 
			{
				$cadena="";
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
				if($cadena != "") {$cadena=$cadena."&BMod=1";
				}
				if($total_registros) 
				{
					$principal="rangoModeloGrupos";//pagina principal
					if(($pagina - 1) > 0) 
					{
						echo "<a href='$principal.php?pagina=".($pagina-1)."&$cadena'><span class='pag'>< Anterior</span></a> ";
					}
					for ($i=1; $i<=$total_paginas; $i++)
					{ 
						if ($pagina == $i) 
							{echo "<b>".$pagina."</b> "; }
						else
								{echo "<a href='$principal.php?pagina=$i&$cadena'><span class='pag'>$i</span></a>";}
					}
					if(($pagina + 1)<=$total_paginas) 
					{
						echo " <a href='$principal.php?pagina=".($pagina+1)."&$cadena'><span class='pag'>Siguiente ></span></a>";
					}
				} 
			}
			else
				{
				if($total_registros) 
				{
					$principal="rangoModeloGrupos";//pagina principal
					if(($pagina - 1) > 0) 
					{
						echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a> ";
					}
					for ($i=1; $i<=$total_paginas; $i++)
					{ 
						if ($pagina == $i) 
							echo "<b>".$pagina."</b> "; 
						else
							echo "<a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a> "; 
					}
					if(($pagina + 1)<=$total_paginas) 
					{
						echo " <a href='$principal.php?pagina=".($pagina+1)."'><span class='pag'>Siguiente ></span></a>";
					}
				} 
			}
			?>
	</div>
	</td>
	</tr>
	<tr>
   		<td width="7%" align="center" class="title"><div align="center" >Item</div></td>
  		<td width="20%" align="center" class="title"><div align="center">Codigo Modelo</div></td>
   		<td width="30%" align="center" class="title"><div align="center">Nombre Modelo</div></td>
   		<td width="25%" align="center" class="title"><div align="center">Tipo</div></td>
   		<td width="11%" align="center" class="title"><div align="center">Rango</div></td>
   		<td width="7%" align="center" class="title"><div align="center">Accion</div></td>
	</tr>
   	<?php
		while($rs = leer_registro($consulta))
		{
			$con=$con+1;
	?>
	<tr>
   		<td class="tdcont" align="center"><?php echo $con; ?></td>
   		<td class="tdcont" align="center"><?php echo $rs['codModelo']; ?></td>
   		<td class="tdcont"><?php echo $rs['nomModelo']; ?></td>
 		<td class="tdcont"><?php echo $rs['nomTipoProd']; ?></td>
 		<td class="tdcont" align="center"><?php echo $rs['RANGO_GRUPO_idRangoGrupo']; ?></td>
        <td align="center"><div align="center" class="tdcont">
		<a href="#" onclick="javascript:asignarRangoUtilidad('<?php echo $rs['idModelo']; ?>')"><img src="../imagen/icon_edit.png" alt="Asignar" border="0" /></a></div>
		</td>
	</tr>
   	<?php		
		}
		mysql_free_result($q);
		mysql_free_result($consulta);	
	?>
	</table>
	 	<!-- end #mainContent -->
	</div>
   	<div id="footer">
      		<?php include('../footer.php');?>
      	<!-- end #footer -->
		</div>
    <!-- end #container --> 
    </div>
</body>
</html> 