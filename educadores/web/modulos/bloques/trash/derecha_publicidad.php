<?php //á

/*BLOQUE PUBLICIDAD*/

	foreach($COMMON['archivos'] as $II=>$GA){
		if(in_array($II,array('publicidad_04','publicidad_05','publicidad_06'))){
			$itens[]=$GA;
		}
	}
	
	$LISTADO[$PARAMS['conector']]=$itens;

?>