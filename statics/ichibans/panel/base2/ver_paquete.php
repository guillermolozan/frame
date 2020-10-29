<?php //á

require_once('class.phpmailer.php');

chdir("../");
	include("lib/compresionInicio.php");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("lib/webutil.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");
	
	require_once( "lib/ini_manager.php" );
	
chdir("base2");

include("includes.php");


		
echo "<html>";
?>
<script src="<?php echo $SERVER['ROOT'];?>/web/templates/default/js/mootools-1.2.3-core-yc.js?v=574" type="text/javascript"></script>
<script src="<?php echo $SERVER['ROOT'];?>/web/templates/default/js/mootools-1.2.3.1-more.js?v=574" type="text/javascript"></script>
<script src="<?php echo $SERVER['ROOT'];?>/web/templates/default/js/js.js?v=574" type="text/javascript"></script>
<?php

	$LabelHabitacion=array(
		'preciospl'=>'SPL'
		,'preciosplna'=>'NA'
		,'preciodbl'=>'DBL'
		,'preciodblna'=>'NA'
		,'preciotpl'=>'TPL'
		,'preciotplna'=>'NA'
		,'preciocpl'=>'CPL'
		,'preciocplna'=>'NA'
		,'precioqpl'=>'QPL'
		,'precioqplna'=>'NA'
		,'precioxpl'=>'XPL'
		,'precioxplna'=>'NA'
		,'precionin'=>'Niño'
		,'precioninna'=>'NA'
		,'precionin2'=>'Niño 2'
		,'precionin2na'=>'NA'			
		);

$extras=select_fila("source,source2","paquetes","where id='".$_GET['id']."'");		
if($extras['source']!=''){
echo "<div class='links'>";
echo "<b>fuente 1:</b><a href='".$extras['source']."' target='fuente'>".$extras['source']."</a><input type='text' value='".$extras['source']."' ><br>";
if($extras['source2']){ echo "<b>fuente 2:</b><a href='".$extras['source2']."' class='link' target='fuente'>".$extras['source2']."</a><input type='text' value='".$extras['source2']."' >"; }
echo "</div>";
echo "<div class='doble doble_original'><br><br>";
echo email_paquete(array(),$_GET['id'],array('switch'=>'1','monedas'=>array('dolares','soles'),'vistas'=>array('publico','neto')));
echo "</div>";
echo "<div class='doble'><br><br><iframe name='fuente' src='".$extras['source']."'></iframe></div>";
?><style>
.doble { width:50%; float:left; }
.link {   }
.doble iframe { width:100%; height:100%; border:1px solid #999; }
.doble_original { overflow:auto;  height:100%;  }
.links { position:absolute; background:#FFF; } 
.links b { float:left; clear:left; }
.links a { float:left; width:50%; overflow:hidden; height:15px; font-size:12px; margin-bottom:10px; }
.links input { float:left; width:30%; }
.selected { color:red !important; } 

.texto table { width:auto; padding:0px; margin:0px; border:1px solid #CCC; margin-top:3px; font:inherit;   }
.texto table td { font-weight:normal; color:inherit; text-align:left; empty-cells:show; padding:3px 8px 3px 3px; }
</style>
<script>
window.resizeTo(1200,600);
window.moveTo(10,10);
window.focus();
</script>
<?php
} else {
//echo "<div>Revisado:". $extras['source'] ."</div>";	
echo "<div>";	
echo email_paquete(array(),$_GET['id'],array('switch'=>'1','monedas'=>array('dolares','soles'),'vistas'=>array('publico','neto')));	
echo "</div>";
?>
<script>
window.resizeTo(600,600);
window.moveTo(10,10);
window.focus();
</script>
<?php
}
echo "</html>";

set_time_limit(0);

chdir("../");	
include("lib/compresionFinal.php");
?>