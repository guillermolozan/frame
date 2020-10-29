<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
$idSucursal=$_SESSION['idSucursal'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
<script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
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
      <p class="titulo">Inventario de <a href="index.php" style=" color:#FFFFFF">Productos</a></p>
      <div id="busqueda">
      <form method="post" style="font-size:10px; margin-top:10px; text-align:center;" action="index.php" name="frmBuscarProd" id="frmBuscarProd" enctype="multipart/form-data">

        <label>Producto :</label>
            <select name="idProducto" id="idProducto">
              	<option value="0">Seleccione</option>
		           	<?php
					$sql = "SELECT idproducto, nombre FROM producto ORDER BY nombre";
  			  		$rsl = consulta($sql);
              		while($reg = leer_registro($rsl))
			  		{
			    	?>
               	<option value="<?php echo $reg["idproducto"];?>"><?php echo $reg["nombre"];?></option>
                   	<?php
			  		}
              		mysql_free_result($rsl);
			       	?>
     	   </select>&nbsp;
                
                <div align="right" style="margin-right:20px;">
                <input type="submit" id="buscarProd" name="buscarProd" value="Buscar" class="boton">
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" /></div>
   </form>
   </div>
   
    <br /><br />
   <p class="titulo">Resultado de la Busqueda</p>
  <?php 
	$consultaBase = "SELECT stock.*, equivalencias.preciocosto, equivalencias.precio1, producto.nombre as producto, unimed.nombre as unidadmedida from stock LEFT JOIN equivalencias ON stock.idproducto=equivalencias.idproducto AND stock.idunimed=equivalencias.idunimed LEFT JOIN producto ON stock.idproducto=producto.idproducto LEFT JOIN unimed ON stock.idunimed=unimed.idunimed WHERE stock.idsucursal='$idSucursal' ";
	
	if(isset($_POST['buscarProd'])) 
	{	$buscarProd= '1';
		
		$idProducto= $_POST['idProducto'];
	}
	else 
		{$buscarProd='0';}
	
	if(isset($_GET['BProd'])) 
		{$BProd= '1';
		
		if(isset($_GET['idProducto'])) 
			{$idProducto= $_GET['idProducto'];}
		
	}
	else 
		{$BProd='0';}
		
	$filtro = "";
	$filtro1 = "";
	
	if($buscarProd=='1' or $BProd=='1')	
	{
	  if(isset($idProducto) and $idProducto != '0')
	  {
		$filtro = " " . " AND stock.idproducto='$idProducto'";
		$cadena3="idProducto=".$idProducto;
	  }
    }

	$instruccion1= $consultaBase . $filtro;
	//echo $instruccion1;
	$q = consulta($instruccion1);
	$total_registros = mysql_num_rows($q);

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
	$orden="producto.nombre";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	$consulta = consulta($instruccion);
	?>
      <table width="98%" align="center" style="margin:0 10px;">
          <tr>
          <td height="20" colspan="8">
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo "$total_registros" ; ?></b></div>
          <div class="paginacion" align="right" >
          
          <?php 
  if($buscarProd=='1' or $BProd=='1') {
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
		if($cadena != "") {$cadena=$cadena."&BProd=1";}

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
            <td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            <td width="60%" align="center" class="title"><div align="center">Producto</div></td>
            <td width="15%" align="center" class="title"><div align="center">Unidad Medida</div></td>
            <td width="8%" align="center" class="title"><div align="center">Precio Costo</div></td>
            <td width="8%" align="center" class="title"><div align="center">Stock</div></td>
            <td width="8%" align="center" class="title"><div align="center">Precio Venta</div></td>
          </tr>
      
         <?php
	while($rs = mysql_fetch_array($consulta))
	{
		$con=$con+1;
	?>
    	<tr>
       	  <td class="tdcont"><?php echo $con; ?></td>
          <td align="left" class="tdcont"><?php echo $rs['producto']; ?></td>
          <td align="left" class="tdcont"><?php echo $rs['unidadmedida']; ?></td>
          <td align="center" class="tdcont"><?php echo $rs['preciocosto']; ?></td>
          <td align="center" class="tdcont"><?php echo $rs['stock']; ?></td>
          <td align="center" class="tdcont"><?php echo $rs['precio1']; ?></td>
        </tr>        
    <?php		
	}
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