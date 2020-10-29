<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
  <style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
  </style>
<link type="text/css" href="../js/jpicker/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
</head>

<body>
  <div id="container">
  <div id="datos">
	<?php
		include("../menuSecund.php");
	?>
  </div>
  <div id="menu">
     <?php include("../menu.php"); ?>
  </div>
  <div id="mainContent">  
  
  <p class="titulo">REGISTRO DE CHOFERES</p>
	    <?php 
				if(isset($_GET['msg']))
				{ 
					$display="";
					if($_GET['msg']=='1')
						{$msg= "Registro agregado satisfactoriamente"; }
					elseif($_GET['msg']=='2')
						{$msg= "Registro modificado satisfactoriamente";}
					elseif($_GET['msg']=='3')
						{$msg= "Registro eliminado satisfactoriamente";}
					else
						{header("Location:porcentajes_index.php");}
				}
				else
				{
					$msg=''; $display="style='display:none'";
				}
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
             
      		<div id="busqueda">
			
			</div>

   			<input type="button" id="nuevoChofer" name="nuevoChofer" value="Nuevo Chofer" onClick="window.open('nuevoChofer.php', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   			<br /><br />

   			<?php 
        	$consultaBase="SELECT * FROM choferes";
			
	$instruccion1= $consultaBase;
	$q = consulta($instruccion1);
	$total_registros = numero_registros($q);
	$registros=20;
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
	$orden=" nombre ";//ordena por id	
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
						
	$consulta = consulta($instruccion);
	?>
      		
	<table width="98%" align="center" style="margin:0 10px;">
       	<tr>
   			<td height="20" colspan="8">
                    	
				<div align="left" style="width:300px; float:left"><b></b></div>
         				
				<div class="paginacion" align="right">
   				<?php 
  						
					if($total_registros)
					{
						$principal="tipodocumentos_index";//pagina principal
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
			?>
			</div>
          		</td>
        	</tr>
  		 	<tr>
            	<td width="5%" align="center" class="title"><div align="center" >Nº</div></td>
            	<td width="70%" align="center" class="title"><div align="center">Nombre</div></td>
            	<td width="10%" align="center" class="title"><div align="center">DNI</div></td>
            	<td width="12%" align="center" class="title"><div align="center">Licencia Conducir</div></td>
            	<td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
          	</tr>
                        
            
    	<?php
		while($rs = leer_registro($consulta))
		{
		  $con=$con+1;
		?>
        
     	  <tr>
           	<td class="tdcont" align="center"><?php echo $con; ?></td>
           	<td class="tdcont" align="left"><?php echo $rs['nombre']; ?></td>
           	<td class="tdcont" align="left"><?php echo $rs['dni']; ?></td>
           	<td class="tdcont" align="left"><?php echo $rs['licenciaconducir']; ?></td>
            <td>
			<div align="center" class="tdcont">
			<a href="editarChofer.php?idChofer=<?php echo $rs['idchofer']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a>&nbsp;
			<a href="delChofer.php?idChofer=<?php echo $rs['idchofer']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a>
			</div>
			</td>
      	 </tr>
         
		<?php		
		
		}
		mysql_free_result($q);
		?>
      </table>
<hr style="clear:both; visibility:hidden"       />      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    
<!-- end #container --> 
</div>
</body>
</html>