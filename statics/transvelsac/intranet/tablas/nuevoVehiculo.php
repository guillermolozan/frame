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
  <p class="titulo">Nuevo Vehiculo</p>
  <FORM ACTION="grabarNuevoVehiculo.php" class="cmxform" id="frmNuevoVehiculo" NAME="frmNuevoVehiculo" METHOD="POST" ENCTYPE="multipart/form-data"> 
      <table width="98%" align="center" style="margin:0 10px;">
        <tr>
        <tr>
          <td width="10%" class="title">Placa</td>
          <td class="tdcont">&nbsp;<input type="text" name="placa" id="placa" maxlength="10" size="10"/></td>
          <td width="10%" class="title">Remolque</td>
          <td class="tdcont">&nbsp;<input type="text" name="remolque" id="remolque" maxlength="20" size="20"/></td>
        </tr>
          <td width="10%" class="title">Clase</td>
          <td class="tdcont" width="40%"><select name="idclase" id="idclase">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idclase, nombre FROM vehiculosclase ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["idclase"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
          <td width="10%" class="title">Marca</td>
          <td class="tdcont" width="40%"><select name="idmarca" id="idmarca">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idmarca, nombre FROM vehiculosmarca ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["idmarca"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
        </tr>
        <tr>
          <td width="10%" class="title">Modelo</td>
          <td class="tdcont" width="40%"><select name="idmodelo" id="idmodelo">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idmodelo, nombre FROM vehiculosmodelos ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["idmodelo"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
          <td width="10%" class="title">Timon</td>
          <td class="tdcont" width="40%"><select name="idtimon" id="idtimon">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idtimon, nombre FROM vehiculostimon ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["idtimon"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
        </tr>
        
        <tr>
          <td width="10%" class="title">Uso</td>
          <td class="tdcont" width="40%"><select name="iduso" id="iduso">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT iduso, nombre FROM vehiculosusos ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["iduso"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
          <td width="10%" class="title">Combustible</td>
          <td class="tdcont" width="40%"><select name="idcombustible" id="idcombustible">
       	      <option value="0">Seleccione</option>
           	  <?php
				$sql = "SELECT idcombustible, nombre FROM vehiculoscombustible ORDER BY nombre";
		  		$rsNivel = consulta($sql);
           		while($regNivel = leer_registro($rsNivel))
		  		{
	    	  ?>
       	      <option value="<?php echo $regNivel["idcombustible"];?>"> <?php echo $regNivel["nombre"];?></option>
           	  <?php
		  		 }
           		 mysql_free_result($rsNivel);
	       	  ?>
          </select>	</label>
        </tr>
        
        <tr>
          <td width="10%" class="title">Año</td>
          <td class="tdcont">&nbsp;<input type="text" name="anio" id="anio" maxlength="4" size="10"/></td>
          <td width="10%" class="title">Color</td>
          <td class="tdcont">&nbsp;<input type="text" name="color" id="color" maxlength="30" size="30"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">No. Motor</td>
          <td class="tdcont">&nbsp;<input type="text" name="nmotor" id="nmotor" maxlength="30" size="30"/></td>
          <td width="10%" class="title">Serie</td>
          <td class="tdcont">&nbsp;<input type="text" name="serie" id="serie" maxlength="30" size="30"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">No. Asientos</td>
          <td class="tdcont">&nbsp;<input type="text" name="nasientos" id="nasientos" maxlength="30" size="10"/></td>
          <td width="10%" class="title">No. Pasajeros</td>
          <td class="tdcont">&nbsp;<input type="text" name="npasajeros" id="npasajeros" maxlength="30" size="10"/></td>
        </tr>
        <tr>
          <td width="10%" class="title">Configuracion Vehicular</td>
          <td class="tdcont">&nbsp;<input type="text" name="configuracionvehicular" id="configuracionvehicular" maxlength="50" size="30"/></td>
          <td width="10%" class="title">Certificado Inscripcion</td>
          <td class="tdcont">&nbsp;<input type="text" name="certificadoinscripcion" id="certificadoinscripcion" maxlength="50" size="30"/></td>
        </tr>
        </table>
 <div align="right" style="margin-right:10px"><input name="btnGuardar" type="submit" id="btnGuardar" value="Guardar" class="boton" />&nbsp;&nbsp;<input name="sbmReturn" type="button" id="sbmReturn" value="Salir" onClick="window.open('vehiculos_index.php', '_self');" class="boton"/></div>
</FORM>
        
      <!-- end #mainContent -->
      </div>
      
        <!-- end #container --></div>
    </body>
</html>
