<?php //á
set_time_limit(0);
//error_reporting(E_ALL);
include("lib/compresionInicio.php");
include("lib/includes.php");

//print_r($_GET);

$s1=explode("|",$_GET['s']);
$s2=explode(",",$s1['0']);
$ID=$s2['0'];
$s3=explode(";",$s2['1']);

$lineas=select(
		array(
			$ID.' as i',
			"CONCAT_WS(' ',".implode(",",$s3).") as v"
		),
		$s1['1'],
		render_likes($s1['2'],$s3,$_GET['q']).'',
		0);
if(!$lineas){ $lineas=array(); }

			
function render_likes($where,$likes,$Q){
list($where,$dos)=explode("order by",$where);
$orderby=($dos)?"order by ".$dos:"";
$html='';
if($where!=''){ $html.=$where." "; } 
else{ $html.='where 1 '; } 
$html.=(sizeof($likes)>0)?' and ':'';
/*
foreach($likes as $lik){
$Likes[]=" $lik like '%".$Q."%' ";
}
$html.="( ".implode(" or ",$Likes)." )";
*/
$html.="CONCAT_WS(' ',".implode(",",$likes).") like '%".$Q."%'";
$html.=" ".$orderby;
return $html;
}			
			
/*
$lineas=array();
$items=select($sss['0'],$sss['1'],str_replace("==","=",$sss['2']."=".$_GET['s2']),1	);
foreach($items as $item){
foreach($item as $dato){ $data[]=$dato; } 
$lineas[]=$data; unset($data);
}
prin($lineas);
exit();

	$lineas=select(
	$tbquery,
	$tbl,
	"where 1 $EXTRA_FILTRO $busqueda_query ".$datos_tabla['where_id']." 
	order by "
	. ( ($FilTro_o=='')?'':$FilTro_o."," )
	. ( ($datos_tabla['group'])?' '.$datos_tabla['group'].' desc, ':'' )
	. ( ($datos_tabla['order_by']=='')? (  $datos_tabla['id']." ". (($datos_tabla['orden']=='1')?"desc":"asc") ):$datos_tabla['order_by'] )
	,0);
	*/

echo json_encode($lineas);
	
include("lib/compresionFinal.php");
?>