<?php //á 

$THIS=$PARAMS['this'];


$secc=$SECCIONES[$_GET['sec']];
//$filtro_where=($_GET['sec']=='cgtp')?" and page='4' ":$secc['where'];
$filtro_where=" and page='1' ";
$filtro_param=($_GET['sec']=='cgtp')?"sec=cgtp&":$secc['param'];
$filtro_nombre=$secc['nombre'];

$object=array();

$object['menu']=select("id,nombre","news_grupos","where 1 $filtro_where and visibilidad='1'",0
						,array(
						'friendly'=>array('url_friendly'=>array('string'=>'{nombre}')),
						'url'=>'index.php?'.$filtro_param.'modulo=items&tab=news_items&acc=list&gru={id}&friendly={friendly}'
						)
					   );

$object['menu'] = web_procesar_menu($object['menu'],"izquierda");

$object['menu'] = web_re_procesar_menu($object['menu'],$SERVER['URL']);
	
$OBJECT[$THIS]=$object;
?>