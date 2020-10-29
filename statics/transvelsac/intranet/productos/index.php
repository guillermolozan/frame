<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO...</title>
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
     	<p class="titulo">Buscar <a href="index.php" style=" color:#FFFFFF">Productos</a></p>
   			<?php 
			if(isset($_GET['msg']))
			{ 
				$display="";
				if($_GET['msg']=='1')
					{$msg= "El producto se agrego satisfactoriamente"; }
				elseif($_GET['msg']=='2')
					{$msg= "Los cambios se guardaron satisfactoriamente";}
				elseif($_GET['msg']=='3')
					{$msg= "El producto fue eliminado de la base de datos";}
				else
					{header("Location:index.php");}
			}
			else
				{$msg=''; $display="style='display:none'";
			}
			echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
			?>
             
      	<div id="busqueda" >
			<form method="post" style="font-size:10px; margin-top:10px; text-align:center; display:V" action="index.php" name="frmBuscarProd" id="frmBuscarProd" enctype="multipart/form-data">
    			<label>Nombre :</label>
            	<input type="text" id="nombreproducto" name="nombreproducto" style="text-transform:uppercase" />
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
                <label>Modelo</label>
                <label>
					<select name="idModelo" id="idModelo">
                   	<option value="0">Seleccione</option>
                     	<?php
						$sql = "SELECT idmodelo, nombre FROM modelo ORDER BY nombre";
  			  			$rsl = consulta($sql);
              			while($reg = leer_registro($rsl))
			  			{
			    		?>
                   	<option value="<?php echo $reg["idmodelo"];?>"><?php echo $reg["nombre"];?></option>
                    	<?php
			  			}
              			mysql_free_result($rsl);
			        	?>
                    </select> 
                </label>&nbsp;
               		<input type="submit" id="buscarProd" name="buscarProd" value="Buscar" class="boton">
        			<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" />
        	</form>       
		</div>
		<input type="button" name="newProd" value="Nuevo Producto" onClick="window.open('newProd.php', '_self');" style="float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" >
   		<br /><br />
   		<p class="titulo">Resultado de la Busqueda</p>
  			<?php 
			$consultaBase = "SELECT p.*, m.nombre as modelo, ma.nombre as marca FROM producto as p INNER JOIN modelo as m ON p.idmodelo=m.idmodelo INNER JOIN marca as ma ON p.idmarca=ma.idmarca";
	
			if(isset($_POST['buscarProd'])) 
			{	$buscarProd= '1';
				
				$NombreProducto= $_POST['nombreproducto'];
				$idMarca= $_POST['idMarca'];
				$idModelo= $_POST['idModelo'];
			}
			else 
				{$buscarProd='0';
			}
			
			if(isset($_GET['BProd'])) 
			{	$BProd= '1';
				
				if(isset($_GET['NombreProducto'])) 
					{$NombreProducto= $_GET['NombreProducto'];}
				if(isset($_GET['idMarca'])) 
					{$idMarca= $_GET['idMarca'];}
				if(isset($_GET['idModelo'])) 
					{$idModelo= $_GET['idModelo'];}
			}
			else 
				{$BProd='0';
			}
				
			$filtro = "";
			
			if($buscarProd=='1' or $BProd=='1')	
			{
				if(isset($NombreProducto) and $NombreProducto != '')
				{
					if($filtro != ""){
						$filtro .= " " . "AND";
						}
					$filtro = " " . "p.nombre='$NombreProducto'";
					$cadena3="NombreProducto=".$NombreProducto;
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
			else 
			{ 
				$pagina=$_GET['pagina'];
				$inicio = ($pagina - 1) * $registros; 
				$con=($pagina-1)*$registros;
			} 
			$up="ASC";
			$orden="nombre";//ordena por id
			$total_paginas = ceil($total_registros / $registros); 			
		   // Enviar consulta de listar
			$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
			$consulta = consulta($instruccion);
			
			?>
			<table width="100%" align="center" style="margin:0 10px;">
				<tr>
					<td height="20" colspan="9">
						<div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo "$total_registros" ?></b></div>
				  		<div class="paginacion" align="right" >
				  	  	<?php 
						//Add
						$maxpags=5;
						$minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
  						$maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;
						//fin Add
						if($buscarProd=='1' or $BProd=='1') 
						{
							$cadena="";
							if($total_registros) 
							{
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
				
								$principal="index";//pagina principal
								if(($pagina - 1) > 0) {
									echo "<a href='$principal.php?pagina=".($pagina-1).$cadena."'><span class='pag'>< Anterior</span></a> ";
								}
								$texto = "";
								if ($minimo!=1) $texto.= " ... ";
  									for ($i=$minimo; $i<$pagina; $i++)
    									$texto .= " <a href='$principal.php?pagina=$i".$cadena."'><span class='pag'>$i</span></a>";
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
							if($total_registros) 
							{
								$principal="index";//pagina principal
								if(($pagina - 1) > 0) {
									echo "<a href='$principal.php?pagina=".($pagina-1)."'><span class='pag'>< Anterior</span></a> ";
								}
								$texto = "";
								if ($minimo!=1) $texto.= " ... ";
  									for ($i=$minimo; $i<$pagina; $i++)
    									$texto .= " <a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a>";
  									$texto .= " <b>".$pagina."</b> ";
  									for ($i=$pagina+1; $i<=$maximo; $i++)
    									$texto .= " <a href='$principal.php?pagina=$i'><span class='pag'>$i</span></a>";
  									if ($maximo!=$total_paginas) $texto.= " ... ";
								echo $texto;
							  //fin adsd
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
					<td align="center" class="title" width="5%"><div align="center" >Nº</div></td>
					<td align="center" class="title" width="25%"><div align="center">Nombre</div></td>
					<td align="center" class="title" width="12%"><div align="center">Modelo</div></td>
					<td align="center" class="title" width="10%"><div align="center">Marca</div></td>
					<td align="center" class="title" width="5%"><div align="center">Activar</div></td>
					<td align="center" class="title" width="15%"><div align="center">Acciones</div></td>
				</tr>
				<?php
				
					while($rs = leer_registro($consulta))
					{
					$con=$con+1;
				?>
				<tr>
					<td class="tdcont" align="center" ><?php echo $con; ?></td>
					<td class="tdcont" ><?php echo $rs['nombre']; ?></td>            
					<td class="tdcont" ><?php echo $rs['modelo']; ?></td>
					<td class="tdcont" ><?php echo $rs['marca']; ?></td>                    
					<td  class="tdcont"  align="center">
					<?php if ($rs['estado']=='1') { ?>	<a href="activarProd.php?idProd=<?php echo $rs['idproducto']; ?>"><img src="../imagen/lock.png" alt="cambiar estado" border="0"></a>
					<?php }?>
					<?php if ($rs['estado']=='0') { ?><a href="activarProd.php?idProd=<?php echo $rs['idproducto']; ?>"><img src="../imagen/lock_disabled.png" alt="cambiar estado" border="0"></a>
					<?php }?>
					</td>
					<td width="5%">
						<div align="center" class="tdcont">
							<a href="verProd.php?idProducto=<?php echo $rs['idproducto']; ?>"><img src="../imagen/icon_ver.png" alt="Ver" border="0" /></a>&nbsp;
							<a href="editProd.php?idProducto=<?php echo $rs['idproducto']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a>&nbsp;
							<a href="delProd.php?idProducto=<?php echo $rs['idproducto']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a>
						</div>
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