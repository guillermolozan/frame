<?php //á
//prin ($PARAMS);

$object=array();

	$ID=($_GET['tab']=='textos_items2')?$_GET['id']:'';

	$gru['menu']=select(
			'id,nombre',
			'textos_items2',
			"where visibilidad='1' ",
			0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=textos_items2&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>'menu_nivel_1',
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);

	$gru['header']['nombre']='Publicaciones';
	
	$object['items'][]=$gru; unset($gru);
	


$object['panel']='textos_items2';
//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$LISTADO[$PARAMS['this']]=$object; 
	
?>