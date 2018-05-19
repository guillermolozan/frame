<?php //á
include("lib/compresionInicio.php");
$Proceso = 'login';
include("lib/includes.php");
foreach($objeto_tabla as $i=>$item){
	$objeto_tabla[$i]['menu']='0';
}	
include("head.php");
?><body class="modulo_login"><?php
echo $HTML_ALL_INICIO;
echo $HTML_MAIN_INICIO;
include("header.php"); 		
echo $HTML_CONTENT_INICIO;
include("menu.php");
/// procesar campos		
if(trim($VALIDAR_SESION)==''){ header("Location: index.php"); }
$saved[$VALIDAR_SESION]['crearopen']=1;
//
$MEEE=$objeto_tabla[$VALIDAR_SESION];
include("vista.php"); 
echo $HTML_CONTENT_FIN;
include("foot.php"); 
echo $HTML_MAIN_FIN;	
echo $HTML_ALL_FIN;
?><script>window.addEvent('load',function(){new Fx.Tween($('layer'), {duration: 'long'}).start('opacity','0','0.5');});</script></body></html><?php 
include("lib/compresionInicio.php");
?>