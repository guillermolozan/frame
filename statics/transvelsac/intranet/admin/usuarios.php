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
<title>.::. - Panel de Administración EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="container">
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
      <?php
	$idEmpresa=$_GET['idEmpresa'];
	$sql="SELECT razonsocial FROM empresa WHERE idempresa='$idEmpresa'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	?>
      		<p class="titulo"><?php echo $rs['razonsocial']; ?></a> - LISTA DE USUARIOS</p>
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
						{header("Location:index.php");}
				}
				else
				{
					$msg=''; $display="style='display:none'";
				}
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
             
      		<div id="busqueda">
			
			</div>

   			<input type="button" id="newUsuario" name="newUsuario" value="Nuevo Usuario" onClick="window.open('newUsuario.php?idEmpresa=<?php echo $idEmpresa; ?>', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />
   			<br /><br />

   			<?php 
			$consultaBase = "SELECT u.*,r.nombre as nomRol, s.nombre as nomSucursal FROM usuario as u LEFT JOIN sucursal as s ON u.idsucursal=s.idSucursal LEFT JOIN rol as r ON u.idrol=r.idrol LEFT JOIN empresa as e ON e.idempresa=s.idempresa WHERE e.idempresa='$idEmpresa' ";
			$q = consulta($consultaBase);
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
			$orden="nomUsuario";//ordena por id
			$total_paginas = ceil($total_registros / $registros); 			
   			// Enviar consulta de listar
			$instruccion = $consultaBase ." ORDER BY $orden $up limit $inicio, $registros;"; 
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
								$principal="usuario";//pagina principal
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
            	<td width="10%" align="center" class="title"><div align="center">Codigo</div></td>
            	<td width="30%" align="center" class="title"><div align="center">Nombre</div></td>
                <td width="10%" align="center" class="title"><div align="center">Rol</div></td>
                 <td width="25%" align="center" class="title"><div align="center">Ubicacion</div></td>
                  <td width="10%" align="center" class="title"><div align="center">Estado</div></td>
            	<td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
          	</tr>
    	<?php
		while($rs = leer_registro($consulta))
		{
			$con=$con+1;
			?>
     		<tr>
            	<td class="tdcont" align="center"><?php echo $con; ?></td>
            	<td class="tdcont" align="center"><?php echo $rs['codUsuario']; ?></td>
            	<td class="tdcont" >&nbsp;&nbsp;<?php echo $rs['nomUsuario']; ?></td>
                <td class="tdcont" >&nbsp;&nbsp;<?php echo $rs['nomRol']; ?></td>
                <td class="tdcont" >&nbsp;&nbsp;<?php if($rs['idrol']!=2) echo $rs['nomSucursal']; ?></td>
                <td align="center"><div align="center" class="tdcont">
            <?php if ($rs['estadoUsuario']=='1') { ?>	<a href="activarUsuario.php?idUsuario=<?php echo $rs['idusuario']; ?>"><img src="../imagen/lock.png" alt="Cambiar estado" border="0"></a>
	<?php }?>
    		<?php if ($rs['estadoUsuario']=='0') { ?><a href="activarUsuario.php?idUsuario=<?php echo $rs['idusuario']; ?>"><img src="../imagen/lock_disabled.png" alt="Cambiar estado" border="0"></a>
	<?php }?>
            </div>
            </td>
            	<td>
					<div align="center" class="tdcont">
						<a href="editUsuario.php?idUsuario=<?php echo $rs['idusuario']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a>&nbsp;
						<a href="delUsuario.php?idUsuario=<?php echo $rs['idusuario']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a>
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