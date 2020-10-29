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
       		<p class="titulo">Buscar <a href="index.php" style=" color:#FFFFFF">Modelos</a></p>
   				<?php 
				if(isset($_GET['msg']))
				{ 
					$display="";
					if($_GET['msg']=='1')
						{$msg= "EL modelo se agrego satisfactoriamente"; }
					elseif($_GET['msg']=='2')
						{$msg= "Los cambios se guardaron satisfactoriamente";}
					elseif($_GET['msg']=='3')
						{$msg= "El modelo fue eliminado de la base de datos";}
					else
						{header("Location:index.php");}
				}
				else
					{$msg=''; $display="style='display:none'";
				}
				echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
             
      		<div id="busqueda" >
            	<form method="post" action="index.php" name="frmBuscarModelo" id="frmBuscarModelo" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
            	 	<label>Nombre :</label>
            		<input type="text" id="nomModelo" name="nomModelo" style="text-transform:uppercase"/>
					<input type="submit" id="buscarModelo" name="buscarModelo" value="Buscar" class="boton">
        		</form>
			</div>
			<input type="button" name="newModelo" value="Nuevo Modelo" onClick="window.open('newModelo.php', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" >
   			<br /><br />
   			<p class="titulo">Resultado de la Busqueda</p>
   			<?php 
			$consultaBase = "SELECT * FROM modelo ";
			if(isset($_POST['buscarModelo'])) 
			{	
				$buscarModelo= '1';
				if(isset($_POST['nomModelo'])) 
					{$nomModelo= $_POST['nomModelo'];}
			}
			else 
				{$buscarModelo='0';
			}
	
			if(isset($_GET['BMod'])) 
			{
				$BMod= '1';
				if(isset($_GET['nomModelo'])) 
					{$nomModelo= $_GET['nomModelo'];}
			}
			else 
				{$BMod='0';
			}
			
			$filtro = "";
			if($buscarModelo=='1' or $BMod=='1')	
			{
				if(isset($nomModelo) and $nomModelo != "")
				{
					if($filtro != ""){
						$filtro .= " " . "AND";
					}
					$filtro = $filtro . " " . "m.nombre LIKE '%$nomModelo%'";
					$cadena2="nomModelo=".$nomModelo;
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
			$orden="nombre";//ordena por id
			$total_paginas = ceil($total_registros / $registros); 			
   			// Enviar consulta de listar
			$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
			$consulta = consulta($instruccion);
			?>
      		<table width="98%" align="center" style="margin:0 10px;">
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
									$principal="index";//pagina principal
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
									$principal="index";//pagina principal
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
            		<td width="10%" align="center" class="title"><div align="center" >Item</div></td>
            		<td width="30%" align="center" class="title"><div align="center">Nombre Modelo</div></td>
            		<td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
          		</tr>
        	<?php
			while($rs = leer_registro($consulta))
			{
				$con=$con+1;
			?>
      			<tr>
            		<td class="tdcont" align="center"><?php echo $con; ?></td>
            		<td class="tdcont"><?php echo $rs['nombre']; ?></td>
                    <td align="center"><div align="center" class="tdcont">
						<a href="editModelo.php?idModelo=<?php echo $rs['idmodelo']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a>&nbsp;
						<a href="delModelo.php?idModelo=<?php echo $rs['idmodelo']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a></div>
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