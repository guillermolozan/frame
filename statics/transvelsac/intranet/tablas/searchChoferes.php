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
<p class="titulo">Buscar <a href="#" style=" color:#FFFFFF">Clientes</a></p>
<?php 
					if(isset($_GET['msg'])){ 
					$display="";
						if($_GET['msg']=='1')
						{$msg= "El Chofer se agrego satisfactoriamente"; }
						elseif($_GET['msg']=='2')
						{$msg= "Los cambios se guardaron satisfactoriamente";}
						elseif($_GET['msg']=='3')
						{$msg= "El Chofer fue eliminada de la base de datos";}
						else
						{header("Location:index.php");}
					}
					else
						{$msg=''; $display="style='display:none'";}
				
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
                
	<div id="busqueda" >
<form method="post" style="font-size:10px; margin-top:10px; text-align:center; display:V" action="searchClientes" name="frmBuscarClientes" id="frmBuscarClientes" enctype="multipart/form-data">
		<label>Placa</label>
        <input type="text" id="DNI" name="DNI" style="text-transform:uppercase" size="12" class="sample1"/>
<br />
               <input type="submit" id="buscarCliente" name="buscarCliente" value="Buscar" class="boton">
        	<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" />
        
    </form>       
</div>
   <p class="titulo">Resultado de la Busqueda</p>
   
   <?php 
	
	$consultaBase = "SELECT * FROM choferes ";
	
	if(isset($_POST['buscarCliente'])) 
	{	$buscarCliente= '1';
		
		$DNI= $_POST['DNI'];
	}
	else 
		{$buscarCliente='0';}
	
	if(isset($_GET['BCliente'])) 
		{$BCliente= '1';
		
		if(isset($_GET['DNI'])) 
			{$DNI= $_GET['DNI'];}			
	}
	else 
		{$BCliente='0';}
		
	$filtro = "";
	
	if($buscarCliente=='1' or $BCliente=='1')	
	{
		if(isset($codCliente) and $codCliente != "")
		{
			$filtro = " " . "dni LIKE '%$DNI%'";				
		}
    }

	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
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
	$orden="nombre";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros"; 
	
	$consulta = consulta($instruccion);
	?>
   <input type="button" name="newCliente" value="Nuevo Cliente" onClick="window.open('newCliente2.php', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
    
     <table width="98%" align="center" style="margin:0 10px;">
             <tr>
          <td height="20" colspan="6">
          
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo $total_registros; ?></b></div>
          <div class="paginacion" align="right" >
          <?php 
  if($buscarCliente=='1' or $BCliente=='1') {
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
		
		if($cadena != "") {$cadena=$cadena."&BCliente=1";}
	
		$principal="searchClientes";//pagina principal
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
		$principal="searchClientes";//pagina principal
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
            <td align="center" class="title"><div align="center">Nombre</div></td>
            <td align="center" class="title"><div align="center">DNI</div></td>
            <td align="center" class="title"><div align="center">Licencia Conducir</div></td>
            <td align="center" class="title"><div align="center">Acciones</div></td>
         </tr>
    	
	<?php
	
	while($rs = mysql_fetch_array($consulta))
	{
		$con=$con+1;
	?>
    	<tr>
        	<td><?php echo $con; ?></td>
            <td align="left"><?php echo $rs['nombre']; ?></td>
            <td align="left"><?php echo $rs['dni']; ?></td>
            <td align="left"><?php echo $rs['licenciaconducir']; ?></td>            
       <td>

<a href="javascript:void(0)" onclick="
window.opener.document.getElementById('nombretransportista').value ='<?php echo $rs['nombre']; ?>';
window.opener.document.getElementById('licenciaconducir').value ='<?php echo $rs['licenciaconducir']; ?>';
window.close();
">Agregar</a></td>
        </tr>
    <?php		
	}
	mysql_free_result($q);
	mysql_free_result($consulta);	
	?>
    
    </table>

   