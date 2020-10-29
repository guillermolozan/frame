<?php //á
//prin ($PARAMS);

if($_GET['gru']=='0' or 1){ 

	$grupos=select("id,nombre","productos_grupos","where 1 and visibilidad='1' order by id asc limit 0,100");

} 

foreach($grupos as $grupo){
	
	$gru['menu']=select(
			'id,nombre','productos_items',"where visibilidad='1' and id_grupo='".$grupo['id']."'",0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>'menu_nivel_1',
					'label'=>'{nombre}'
				)
			);	
	$gru['titulo']=$grupo['nombre'];
	
	$ITEMS[]=$gru; unset($gru);
	
}

$LISTADO[$PARAMS['this']]=$ITEMS;
	
?>