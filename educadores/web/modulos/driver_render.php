<?php //á
$EstructuraCero=$Estructura;

$Estructura=PreProcessEstructura($Estructura);
//prin(array_keys($Estructura));

$get0=$get1=$get3=$_GET;
foreach($get1 as $kk=>$gg){
	 if(!in_array($kk,array('sec','modulo','tab','acc'))){ unset($get0[$kk]); } 
	 if(!in_array($kk,array('modulo','tab','acc'))){ unset($get1[$kk]); } 
	 if(!in_array($kk,array('modulo'))){ unset($get3[$kk]); } 
}
$get0=http_build_query($get0);
$get1=http_build_query($get1);
$get3=http_build_query($get3);
//prin(array($get0,$get1,$get3));

$Esquema=($Estructura[$get3])?$Estructura[$get3]:($Estructura[$get1])?$Estructura[$get1]:$Estructura[$get0];
//prin($Estructura);


//RENDER Esquema
$ListEsquema=ArrayToList($Esquema);

foreach($ListEsquema as $idd=>$File){
	include(incluget($File));
}
$EsquemaT=array();
$r=0;
foreach($Esquema as $iiddd=>$Archivo){
	if($iiddd=='header' and !is_numeric($iiddd)){ $EsquemaT['header'][]=$Esquema[$iiddd]; }
	elseif($iiddd=='footer' and !is_numeric($iiddd)){ $EsquemaT['footer'][]=$Esquema[$iiddd]; }	
	else { $EsquemaT['canvas'][]=$Esquema[$iiddd]; }
}

?>