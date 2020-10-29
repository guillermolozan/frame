<?php 
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
</head>

<body>
<p class="titulo">Buscar <a href="#" style=" color:#FFFFFF">Productos</a></p>
<div id="busqueda" >
<form method="post" style="font-size:10px; margin-top:10px; text-align:center; display:V" action="searchProd.php" name="frmBuscarProd" id="frmBuscarProd" enctype="multipart/form-data">
    <label>Nombre :</label>
            	<input type="text" id="data" name="data" style="text-transform:uppercase" class="sample2"/>
                <label>Marca</label>
                <select name="idMarca" id="idMarca">
                    	<option value="0">Seleccione</option>
                     	<?php
						$sql = "SELECT idmarca, nombre FROM marca ORDER BY nombre";
  			  			$rsl = consulta($sql);
              			while($reg = leer_registro($rsl))
			  			{
			    		?>
                    	<option value="<?php echo $reg["idmarca"];?>"><?php echo $reg["nombre"];?></option>
                    	<?php
			  			}
              			mysql_free_result($rsl);
			        	?>
                	</select><br /><br />
                    &nbsp;
               <input type="submit" id="buscarProd" name="buscarProd" value="Buscar" class="boton">
        	<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" />
        
    </form>       
</div>
   <p class="titulo">Resultado de la Busqueda</p>
   
   <?php 
	$consultaBase = "SELECT eq.equivalencia, eq.idunimed, eq.idequivalencia, eq.preciocosto, eq.precio1, eq.minimo, p.nombre as producto, m.nombre as modelo, ma.nombre as marca, unimed.nombre as unimed, p.idproducto FROM equivalencias as eq LEFT JOIN  producto as p ON p.idproducto=eq.idproducto LEFT JOIN unimed ON unimed.idunimed=eq.idunimed INNER JOIN modelo as m ON p.idmodelo=m.idmodelo INNER JOIN marca as ma ON p.idmarca=ma.idmarca";
	if(isset($_POST['buscarProd'])) 
	{	$buscarProd= '1';
		
		$data= $_POST['data'];
		$idMarca= $_POST['idMarca'];
		$idModelo= $_POST['idModelo'];
	}
	else 
		{$buscarProd='0';}
	
	if(isset($_GET['BProd'])) 
		{$BProd= '1';
		
		if(isset($_GET['data'])) 
			{$data= $_GET['data'];}
		
		if(isset($_GET['idMarca'])) 
			{$idMarca= $_GET['idMarca'];}
		if(isset($_GET['idModelo'])) 
			{$idModelo= $_GET['idModelo'];}			
	}
	else 
		{$BProd='0';}
		
	$filtro = "";
	
	if($buscarProd=='1' or $BProd=='1')	
	{
	if(isset($data) and $data != "")
	{
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "p.nombre LIKE '%$data%'";
			$cadena2="data=".$data;
	}
	
	if(isset($idMarca) and $idMarca != '0')
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "p.idmarca='$idMarca'";
		$cadena3="idMarca=".$idMarca;
	}
	
		if(isset($idModelo) and $idModelo != '0'){
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "p.idmodelo='$idModelo'";
			$cadena4="idModelo=".$idModelo;
		}
    }

	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	
	$instruccion1= $consultaBase . $filtro." ";
	//echo $instruccion1;
	$q = consulta($instruccion1);
	$total_registros = mysql_num_rows($q);

	$registros=15;
	if (!isset($_GET['pagina'])) { 
    	$inicio = 0; 
	    $pagina = 1;
		$con=0; 
	} 
	else { 
		$pagina=$_GET['pagina'];
    	$inicio = ($pagina - 1) * $registros; 
		$con=($pagina-1)*$registros;
	} 
	$up="ASC";
	$orden="p.nombre";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros"; 
	
	$consulta = consulta($instruccion);
	?>
    
     <table width="98%" align="center" style="margin:0 10px;">
             <tr>
          <td height="20" colspan="6">
          
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
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
		
		if(isset($cadena3))
		{
			$cadena=$cadena."&".$cadena3;	
		}
		
		if(isset($cadena4))
		{
			$cadena=$cadena."&".$cadena4;	
		}
		
		if(isset($cadena5))
		{
			$cadena=$cadena."&".$cadena5;	
		}
		
		if(isset($cadena6))
		{
			$cadena=$cadena."&".$cadena6;	
		}
		
		if($cadena != "") {$cadena=$cadena."&BProd=1";}
	
		$principal="searchProd";//pagina principal
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
		$principal="searchProd";//pagina principal
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
            <td align="center" class="title" width="5%"><div align="center" >Nº</div></td>
			<td align="center" class="title" width="35%"><div align="center">Nombre</div></td>
			<td align="center" class="title" width="10%"><div align="center">Modelo</div></td>
			<td align="center" class="title" width="10%"><div align="center">Marca</div></td>
			<td align="center" class="title" width="7%"><div align="center">Unidad Medida</div></td>
			<td align="center" class="title" width="5%"><div align="center">Equiv.</div></td>
			<td align="center" class="title" width="5%"><div align="center">Precio Costo</div></td>
			<td align="center" class="title" width="5%"><div align="center">Precio Venta</div></td>
            <td align="center" class="title" width="8%"><div align="center">Agregar</div></td>
         </tr>
    	
	<?php
	$precioVenta = 0;
	while($rs = mysql_fetch_array($consulta))
	{
	  $con=$con+1;
	?>
   	<tr>
    	<td class="tdcont"><?php echo $con; ?></td>
		<td class="tdcont" ><?php echo $rs['producto']; ?></td>            
		<td class="tdcont" ><?php echo $rs['modelo']; ?></td>
		<td class="tdcont" ><?php echo $rs['marca']; ?></td>                    
		<td class="tdcont" ><?php echo $rs['unimed']; ?></td>            
		<td class="tdcont" ><?php echo $rs['equivalencia']; ?></td>            
		<td class="tdcont" ><?php echo $rs['preciocosto']; ?></td>            
		<td class="tdcont" ><?php echo $rs['precio1']; ?></td>            
        <td class="tdcont"><a href="javascript:void(0)" onclick="
              window.opener.document.getElementById('nomProducto').value ='<?php echo $rs['producto']; ?>';
              window.opener.document.getElementById('idProducto').value ='<?php echo $rs['idproducto']; ?>';
              window.opener.document.getElementById('idunimed').value ='<?php echo $rs['idunimed']; ?>';
              window.opener.document.getElementById('precio').value ='<?php echo $rs['precio1']; ?>';
              window.opener.document.getElementById('importe').value ='<?php echo $rs['precio1']; ?>';
              window.opener.document.getElementById('cantidad').value ='1';
              window.close();
              ">Agregar</a>
      </td>
    </tr>
    <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
    </table>
