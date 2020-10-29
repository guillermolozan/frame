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
<script language="JavaScript">
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}
</script>
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
      <p class="titulo">Buscar <a href="index.php" style=" color:#FFFFFF">Cliente</a></p>
      <?php 
					if(isset($_GET['msg'])){ 
					$display="";
						if($_GET['msg']=='1')
						{$msg= "El cliente se agrego satisfactoriamente"; }
						elseif($_GET['msg']=='2')
						{$msg= "Los cambios se guardaron satisfactoriamente";}
						elseif($_GET['msg']=='3')
						{$msg= "El cliente fue eliminado de la base de datos";}
						else
						{header("Location:index.php");}
					}
					else
						{$msg=''; $display="style='display:none'";}
				
                echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
				?>
      <div id="busqueda">
		 <form method="post"  style="font-size:10px; margin-top:10px; text-align:center;" action="index.php" name="frmBuscarCliente" id="frmBuscarCliente" enctype="multipart/form-data">
   	
      <label>RUC :</label>
      <input type="text" id="rucCliente" name="rucCliente" style="text-transform:uppercase" size="25"/>&nbsp;
      <label>Nombre :</label>
      <input type="text" id="nomCliente" name="nomCliente" style="text-transform:uppercase" size="25"/>&nbsp;
      <input type="submit" id="buscarCliente" name="buscarCliente" value="Buscar" class="boton">
&nbsp;&nbsp;<input type="reset" id="buscarAvanzado" name="buscarAvanzado" value="Limpiar" class="boton" />
   </form></div>
   <input type="button" name="newCliente" value="Nuevo Cliente" onClick="window.open('newCliente.php', '_self');" style=" float:right;border:#CCCCCC 1px solid; background:#666666; color:#ffffff" />

   <br /><br />
   <p class="titulo">Resultado de la Busqueda</p>
   <?php 
	
	$consultaBase = "SELECT * FROM cliente";
	
	if(isset($_POST['buscarCliente'])) 
	{	$buscarCliente= '1';
		
		$nomCliente= $_POST['nomCliente'];
		$rucCliente= $_POST['rucCliente'];
		
	}
	else 
		{$buscarCliente='0';}
	
	if(isset($_GET['BCliente'])) 
		{$BCliente= '1';
		
		if(isset($_GET['nomCliente'])) 
			{$nomCliente= $_GET['nomCliente'];}
		
		if(isset($_GET['ruc'])) 
			{$rucCliente= $_GET['ruc'];}
		
	}
	else 
		{$BCliente='0';}
		
	$filtro = "";
	
	if($buscarCliente=='1' or $BCliente=='1')	
	{
		if(isset($nomCliente) and $nomCliente != ""){
		
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "razonsocial LIKE '%$nomCliente%'";
			$cadena2="razonsocial=".$nomCliente;
		}
		
		if(isset($rucCliente) and $rucCliente != ""){
		
			if($filtro != ""){
			$filtro .= " " . "AND";
			}
			$filtro = $filtro . " " . "ruc LIKE '%$rucCliente%'";
			$cadena3="rucCliente=".$rucCliente;
		}
	}	
	
	if($filtro != ""){
		$filtro = " " . "WHERE" . $filtro;
	}
	
	$instruccion1= $consultaBase . $filtro;
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
	$orden="razonsocial";//ordena por id
	$total_paginas = ceil($total_registros / $registros); 			
   // Enviar consulta de listar
	$instruccion = $instruccion1 ." ORDER BY $orden $up limit $inicio, $registros;"; 
	
	$consulta = consulta($instruccion);
	?>
      <table width="98%" align="center" style="margin:0 10px;">
          <tr>
          <td height="20" colspan="8">
          <div align="left" style="width:300px; float:left"><b>Numero de Coincidencias Encontradas: <?php echo "$total_registros" ?></b></div>
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
		
		if(isset($cadena4))
		{
			$cadena=$cadena."&".$cadena4;	
		}
		
		if($cadena != "") {$cadena=$cadena."&BCliente=1";}
	
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
            <td width="25%" align="center" class="title"><div align="center">Nombre</div></td>
            <td width="10%" align="center" class="title"><div align="center">RUC</div></td>
            <td width="15%" align="center" class="title"><div align="center">Teléfono/Celular</div></td>
            <td width="20%" align="center" class="title"><div align="center">Direccion</div></td>
            <td width="10%" align="center" class="title"><div align="center">Acciones</div></td>
          </tr>
   	<?php
	
	while($rs = mysql_fetch_array($consulta))
	{
		$con=$con+1;
	?>    
          <tr>
            <td class="tdcont" align="center"><?php echo $con; ?></td>
            <td class="tdcont"><?php echo $rs['razonsocial']; ?></td>
             <td class="tdcont" align="center"><?php echo $rs['ruc']; ?></td>
            <td class="tdcont"><?php echo $rs['telefono1']. " - " . $rs['telefono2']. " / " .$rs['celular']; ?></td>
            <td class="tdcont"><?php echo $rs['direccion']; ?></td>
            <td align="center"><div align="center" class="tdcont"><a href="verCliente.php?idCliente=<?php echo $rs['idcliente']; ?>"><img src="../imagen/icon_ver.png" alt="Ver Imagen" border="0" /></a>&nbsp;<a href="editCliente.php?idCliente=<?php echo $rs['idcliente']; ?>"><img src="../imagen/icon_edit.png" alt="Editar" border="0" /></a>&nbsp;<a href="delCliente.php?idCliente=<?php echo $rs['idcliente']; ?>"><img src="../imagen/icon_del.png" alt="Eliminar" border="0" /></a>
            
            <?php if ($rs['bloqueado']==1) { ?>	<a href="activarCliente.php?idCliente=<?php echo $rs['idcliente']; ?>"><img src="../imagen/lock.png" alt="cambiar estado" border="0"></a>
	<?php }?>
    		<?php if ($rs['bloqueado']=='0') { ?><a href="activarCliente.php?idCliente=<?php echo $rs['idcliente']; ?>"><img src="../imagen/lock_disabled.png" alt="cambiar estado" border="0"></a>
	<?php }?>
            
            </div></td>
          </tr>
          <?php		
	}
	mysql_free_result($q);
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