<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();

$idTipoProd=$_GET["idTipoProd"]; 
if ($idTipoProd==0)
{
	echo '<select name="idModelo" id="idModelo">';
?>
	<option value="0">Seleccione</option>
<?php 
echo "</select>";
}
else
{
//CAMBIO PARA EL SELECT modelo
$query=consulta("SELECT * FROM modelo WHERE TIPO_PRODUCTO_idTipoProd=$idTipoProd ORDER BY nomModelo");
	// Comienzo a imprimir el select
	echo '<select name="idModelo" id="idModelo">';
	?>
	<option value="0">Seleccione</option>
	<?php 
	while($reg=mysql_fetch_row($query))
	{
		// Imprimo las opciones del select
		?>
			<option value="<?php echo $reg[0];?>"><?php echo $reg[3];?></option>
		<?php
	}			
	echo "</select>";
}
?>