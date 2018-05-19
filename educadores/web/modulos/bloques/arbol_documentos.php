<?php //á
//prin ($PARAMS);

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$ID=($_GET['tab']=='documentos_items')?$_GET['gru']:'';

	$gru['menu']=select(
			'id,nombre',
			'documentos_grupos',
			"where visibilidad='1' $filtro_where order by id asc ",
			0,
				array(
				    'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=documentos_items&acc=list&gru={id}&friendly={nombre}")),							
					'nivel'=>'menu_nivel_2',
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);

	$gru['header']['nombre']='Documentos';
	//$gru['header']['url']=procesar_url("index.php?".$filtro_param."	modulo=items&tab=documentos_grupos&acc=list");
	
	$object['items'][]=$gru; unset($gru);
	


$object['panel']='documentos_grupos,documentos_items';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($object);

$OBJECT[$PARAMS['this']]=$object; 
	
?>