<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACSL...</title>
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
<br />
    <div id="container">    
      <div id="mainContent">
       	<?php 
            $idTipoDocumento = $_GET['idTipoDocumento'];			
        	$instruccion="SELECT * FROM tipodocumento WHERE idtipodocumento = '$idTipoDocumento'";
            $consulta = consulta($instruccion);
   	  	    while($regEstudio = leer_registro($consulta))
		    {
        ?>
  <p class="titulo">Editar Tipo de Documento</p>
  <FORM ACTION="grabarEditarTipoDocumento.php" class="cmxform" id="frmEditarTipoSiniestro" NAME="frmEditarTipoSiniestro" METHOD="POST" ENCTYPE="multipart/form-data"> 
      <table width="98%" align="center" style="margin:0 10px;">
         <tr>
          <td class="title" width="20%"><strong >Id :</strong></td>
          <td class="tdcont">&nbsp;<input type="text" name="idtipodocumento" id="idtipodocumento" maxlength="2" size="10" value="<?php echo $regEstudio['idtipodocumento'];?>" readonly="readonly"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Nombre :</td>
          <td class="tdcont">&nbsp;<input type="text" name="nombre" id="nombre" maxlength="400" size="120" style="text-transform:uppercase" value="<?php echo $regEstudio['nombre'];?>"/></td>
        </tr>
        </table>
 <div align="right" style="margin-right:10px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Salir" onClick="window.open('tipodocumentos_index.php', '_self');" class="boton"/></div>
</FORM>
     <?php
		 }
        mysql_free_result($consulta);
     ?>
        
      <!-- end #mainContent -->
      </div>
      
        <!-- end #container --></div>
    </body>
</html>
