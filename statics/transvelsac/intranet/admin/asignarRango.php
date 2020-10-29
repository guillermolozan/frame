<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
$idModelo = $_GET['idModelo'];
?>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
function grabarRango()
{
  $idModelo = document.getElementById('idModelo').value;
  $idRangoUtilidad = document.getElementById('idRangoUtilidad').value;
  window.open('saveAsignarRango.php?idModelo=' + $idModelo+'&idRangoUtilidad='+$idRangoUtilidad, 'Sizewindow', 'width=820, height=550, toolbar=no');
  window.opener.location.reload();
  setTimeout(window.close(),10000);
}
</script>

<form method="POST" action="#" name="frmAsignarRango" id="frmAsignarRango" enctype="multipart/form-data" style="font-size:10px; margin-top:10px; text-align:center;">
   	<label>Asignar Rango de Utilidad :</label>
	<input type="hidden" name="idModelo" id="idModelo" value="<?php echo $idModelo;?>" />
	<select name="idRangoUtilidad" id="idRangoUtilidad">
	<option value="0">Seleccionar</option>
   	<?php
		$sql = "SELECT idRangoGrupo, rangoDescripcion FROM rango_grupo ORDER BY rangoDescripcion";
		$rsl = consulta($sql);
		while($reg = leer_registro($rsl))
		{
	?>
	<option value="<?php echo $reg["idRangoGrupo"];?>"><?php echo $reg["rangoDescripcion"];?></option>
   	<?php
		}
	    mysql_free_result($rsl);
   	?>
	</select>
	<input type="button" id="asignarRango" name="asignarRango" value="Asignar Rango" onClick="javascript:grabarRango();">
  </form>
