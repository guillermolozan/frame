<?php //á
//print_r($_GET);
$script=$psc;
$SS=$_GET['f'];
$PP=$_GET['proceso'];
$II=$iii;
$TT=$tbl;
// SS : proceso IUD
// PP : proceso especiales
// TT : tabla
// II : id
// LL : fila
foreach($objeto_tabla[$_REQUEST['v_o']]['campos'] as $Pcamps){
$Pcampos[]=$Pcamps['campo'];
}
$LL=fila($Pcampos,$TT,"where id='$II'");
//print_r(array($SS,$II,$TT,$LL));
$script=str_replace(array("SS","II","TT","LL","PP"),array("\$SS","\$II","\$TT","\$LL","\$PP"),$script);
//echo $script;
eval($script);

?>