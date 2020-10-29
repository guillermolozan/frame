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
  <p class="titulo">Nuevo Tipo de Documento</p>
  <FORM ACTION="grabarNuevoTipoDocumento.php" class="cmxform" id="frmNuevoTipoDocumento" NAME="frmNuevoTipoDocumento" METHOD="POST" ENCTYPE="multipart/form-data"> 
      <table width="98%" align="center" style="margin:0 10px;">
        <tr>
          <td width="10%" class="title">Tipo Documento :</td>
          <td class="tdcont">&nbsp;<input type="text" name="idtipodoc" id="idtipodoc" maxlength="2" size="5" style="text-transform:uppercase"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Nombre :</td>
          <td class="tdcont">&nbsp;<input type="text" name="nombre" id="nombre" maxlength="100" size="50" style="text-transform:uppercase"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Serie :</td>
          <td class="tdcont">&nbsp;<input type="text" name="serie" id="serie" maxlength="10" size="10" style="text-transform:uppercase"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Numero :</td>
          <td class="tdcont">&nbsp;<input type="text" name="numero" id="numero" maxlength="10" size="10" style="text-transform:uppercase"/></td>
        </tr>
        </table>
 <div align="right" style="margin-right:10px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Salir" onClick="window.open('tipodocumentos_index.php', '_self');" class="boton"/></div>
</FORM>
        
      <!-- end #mainContent -->
      </div>
      
        <!-- end #container --></div>
    </body>
</html>
