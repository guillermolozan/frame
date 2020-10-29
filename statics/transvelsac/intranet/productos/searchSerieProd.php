<?php 
session_start();
include("../db/mysql.inc.php");
$conexion=conectar();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DISTRIBUIDORA PEDRO RUIZ GALLO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="select_dependientes_3_niveles.js"></script>
</head>

<body>
<p class="titulo">Buscar <a href="#" style=" color:#FFFFFF">Productos</a></p>
<?php 
					if(isset($_GET['msg'])){ 
					$display="";
						if($_GET['msg']=='1')
						{$msg= "El producto se agrego satisfactoriamente"; }
						elseif($_GET['msg']=='2')
						{$msg= "Los cambios se guardaron satisfactoriamente";}
						elseif($_GET['msg']=='3')
						{$msg= "El producto fue eliminada de la base de datos";}
						else
						{header("Location:index.php");}
					}
					else
						{$msg=''; $display="style='display:none'";}
				
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
                
	<div id="busqueda" >
<form method="post" style="font-size:10px; margin-top:10px; text-align:center; display:V" action="searchProd.php" name="frmBuscarProd" id="frmBuscarProd" enctype="multipart/form-data">
		<label>Codigo :</label>
        <input type="text" id="codProd" name="codProd" style="text-transform:uppercase" size="25" class="sample1"/>
    <label>Nombre :</label>
            	<input type="text" id="data" name="data" style="text-transform:uppercase" class="sample2"/>
                <label>Marca</label>
                <select name="idMarca" id="idMarca">
                    	<option value="0">Seleccione</option>
                     	<?php
						$sql = "SELECT idMarca, nomMarca FROM marca ORDER BY nomMarca";
  			  			$rsl = consulta($sql);
              			while($reg = leer_registro($rsl))
			  			{
			    		?>
                    	<option value="<?php echo $reg["idMarca"];?>"><?php echo $reg["nomMarca"];?></option>
                    	<?php
			  			}
              			mysql_free_result($rsl);
			        	?>
                	</select><br /><br />
                   <label>Tipo</label>
                    <select name="idTipoProd" id="idTipoProd" onChange="cargaContenido(this.value);">
                    <option value="0">Seleccione</option>
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
                    &nbsp;
                    <label>
                    Modelo
                    </label>
                    <label>
                    <select name="idModelo" id="idModelo">
                    	<option value="0">Seleccione</option>
                    </select> 
                    </label>&nbsp;
                    <label style="display:none">
                    Stock
                    </label>&nbsp;
                    <input type="checkbox" name="stock" id="stock" value="1" style="display:none">
               <input type="submit" id="buscarProd" name="buscarProd" value="Buscar" class="boton">
        	<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" />
        
    </form>       
</div>
   <p class="titulo">Resultado de la Busqueda</p>
   
   <?php 

	$consultaBase = "SELECT sp.idSerie,sp.serie, p.*, m.nomModelo, t.nomTipoProd, ma.nomMarca FROM (((serie_producto as sp LEFT JOIN producto as p on sp.MOVIMIENTO_PRODUCTO_PRODUCTO_idProducto=p.idProducto) LEFT JOIN modelo as m ON p.MODELO_idModelo=m.idModelo) LEFT JOIN tipo_producto as t ON m.TIPO_PRODUCTO_idtipoProd=t.idTipoProd) LEFT JOIN marca as ma ON p.MARCA_idMarca=ma.idMarca WHERE sp.estadoSerie='inventario'";

	
	if(isset($_POST['buscarProd'])) 
	{	$buscarProd= '1';
		
		$serie= $_POST['NroSerie'];
		$codProd= $_POST['codProd'];
		$data= $_POST['data'];
		$idMarca= $_POST['idMarca'];
		$idTipoProd= $_POST['idTipoProd'];
		$idModelo= $_POST['idModelo'];
		if(isset($_POST['stock'])) 
			{$stock= $_POST['stock'];}
		else {$stock='0';}
		
		
	}
	else 
		{$buscarProd='0';}
	
	if(isset($_GET['BProd'])) 
		{$BProd= '1';

		if(isset($_GET['NroSerie'])) 
			{$serie= $_GET['NroSerie'];}
		
		if(isset($_GET['codProd'])) 
			{$codProd= $_GET['codProd'];}
			
		if(isset($_GET['data'])) 
			{$data= $_GET['data'];}
		
		if(isset($_GET['idMarca'])) 
			{$idMarca= $_GET['idMarca'];}
		
		if(isset($_GET['idTipoProd'])) 
			{$idTipoProd= $_GET['idTipoProd'];}
		
		if(isset($_GET['idModelo'])) 
			{$idModelo= $_GET['idModelo'];}
		
		if(isset($_GET['stock'])) 
			{$stock= $_GET['stock'];}
		else {$stock='0';}
			
	}
	else 
		{$BProd='0';}
		
	$filtro = "";
	
	if($buscarProd=='1' or $BProd=='1')	
	{
		if(isset($codProd) and $codProd != "")
		{
			$filtro = " " . "p.codProd LIKE '%$codProd%'";	
			$cadena1="codProd=".$codProd;
			
		}
	
	if(isset($idSerie) and $idSerie != "")
	{
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "sp.serie = '$serie' ";
			$cadena2="sp.serie=".$serie;
	}

	if(isset($data) and $data != "")
	{
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "p.nomProd LIKE '%$data%' OR p.descCorta LIKE '%$data%'";
			$cadena2="data=".$data;
	}
	
	if(isset($idMarca) and $idMarca != '0')
	{
		if($filtro != ""){
			$filtro .= " " . "AND";
			}
		$filtro = " " . "p.MARCA_idMarca='$idMarca'";
		$cadena3="idMarca=".$idMarca;
	}
	
// Si eligieron que el producto deberia pertenecer a una determinado tipo de producto y modelo
	if(isset($idTipoProd) and $idTipoProd != '0'){
		if(isset($idModelo) and $idModelo != '0'){
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "p.MODELO_idModelo='$idModelo'";
			$cadena4="idModelo=".$idModelo;
			$cadena5="idTipoProd=".$idTipoProd;	
		}
		else {
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "m.TIPO_PRODUCTO_idTipoProd='$idTipoProd'";
			$cadena5="idTipoProd=".$idTipoProd;
		}
	}
	if(isset($stock) and $stock == '1'){
		
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "p.stockActual > 0";
			$cadena6="stock=".$stock;	
		
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
		$con=0; 
	} 
	else { 
		$pagina=$_GET['pagina'];
    	$inicio = ($pagina - 1) * $registros; 
		$con=($pagina-1)*$registros;
	} 
	$up="ASC";
	$orden="nomProd";//ordena por id
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
            <td align="center" class="title"><div align="center" >Nº</div></td>
            <td align="center" class="title"><div align="center" >Nº Serie</div></td>
            <td align="center" class="title"><div align="center">COD. Prod</div></td>
            <td align="center" class="title"><div align="center">Nombre</div></td>
            <td align="center" class="title"><div align="center">Modelo</div></td>
            <td align="center" class="title"><div align="center">Marca</div></td>
            <td align="center" class="title"><div align="center">Agregar</div></td>
         </tr>
    	
	<?php
	
	while($rs = mysql_fetch_array($consulta))
	{
		$con=$con+1;
	?>
    	<tr>
        	<td><?php echo $con; ?></td>
            <td><?php echo $rs['serie']; ?></td>
            <td><?php echo $rs['codProd']; ?></td>
            <td align="left"><?php echo $rs['nomProd']; ?></td>
            <td align="left"><?php echo $rs['nomModelo']; ?></td>
           <td align="left"><?php echo $rs['nomMarca']; ?></td>

            
<td>

<a href="javascript:void(0)" onclick="
window.opener.document.getElementById('NroSerie').value ='<?php echo $rs['idSerie']; ?>';
window.opener.document.getElementById('idSerie').value ='<?php echo $rs['serie']; ?>';
window.opener.document.getElementById('codProd').value ='<?php echo $rs['codProd']; ?>';
window.opener.document.getElementById('codProducto').value ='<?php echo $rs['codProd']; ?>';
window.opener.document.getElementById('nomProducto').value ='<?php echo $rs['nomProd']; ?>';
window.opener.document.getElementById('idProducto').value ='<?php echo $rs['idProducto']; ?>';
window.opener.document.getElementById('costoU').value ='<?php echo $rs['costoPromedio']; ?>';
window.opener.document.getElementById('costoUnit').value ='<?php echo $rs['costoPromedio']; ?>';
window.opener.document.getElementById('canProd').value ='<?php echo "1"; ?>';
window.opener.document.getElementById('canProducto').value ='<?php echo "1"; ?>';
window.opener.document.getElementById('importe').value ='<?php echo $rs['costoPromedio']; ?>';
window.opener.document.getElementById('costoU').focus();
window.close();
">

           Agregar</a></td>
        </tr>
    <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
    
    </table>

   