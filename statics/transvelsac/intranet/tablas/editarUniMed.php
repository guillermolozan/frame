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
<br />
    <div id="container">    
      <div id="mainContent">
       	<?php 
            $idUniMed = $_GET['idUniMed'];			
        	$instruccion="SELECT * FROM unimed WHERE idunimed = '$idUniMed'";
            $consulta = consulta($instruccion);
   	  	    while($regEstudio = leer_registro($consulta))
		    {
        ?>
  <p class="titulo">Editar Unidad Medida</p>
  <FORM ACTION="grabarEditarUniMed.php" class="cmxform" id="frmEditarUniMed" NAME="frmEditarUniMed" METHOD="POST" ENCTYPE="multipart/form-data"> 
      <table width="98%" align="center" style="margin:0 10px;">
         <tr>
          <td class="title" width="20%"><strong >Id :</strong></td>
          <td class="tdcont">&nbsp;<input type="text" name="idunimed" id="idunimed" maxlength="8" size="10" value="<?php echo $regEstudio['idunimed'];?>" readonly="readonly"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Nombre :</td>
          <td class="tdcont">&nbsp;<input type="text" name="nombre" id="nombre" maxlength="50" size="60" style="text-transform:uppercase" value="<?php echo $regEstudio['nombre'];?>"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Abreviatura :</td>
          <td class="tdcont">&nbsp;<input type="text" name="abreviatura" id="abreviatura" maxlength="10" size="60" style="text-transform:uppercase" value="<?php echo $regEstudio['abreviatura'];?>"/></td>
        </tr>
        </table>
 <div align="right" style="margin-right:10px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Salir" onClick="window.open('unimed_index.php', '_self');" class="boton"/></div>
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
