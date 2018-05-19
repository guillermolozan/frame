<?php //á

$PF=select("seccion,id,nombre,color",strtolower($vars['GENERAL']['PAGES']),"where visibilidad='1'");
foreach($PF as $pf){ 
$SECCIONES[$pf['seccion']]=array(
								'where'=>" and page='".$pf['id']."'",
								'param'=>'sec='.$pf['seccion'].'&',
								'nombre'=>$pf['nombre'],
								'color'=>$pf['color'],								
								); 
}

?>