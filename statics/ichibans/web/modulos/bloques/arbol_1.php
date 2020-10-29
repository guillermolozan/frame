<?php //á
//prin ($PARAMS);

$object=array(); 

//$ID=($_GET['tab']=='textos_items')?$_GET['id']:'';
if($_GET['acc']=='file' and $_GET['id']!=''){
$grupos[]=fila(array(
					"id",
					"nombre",
					),
				"textos_grupos",
				"where id='".dato("id_grupo","textos_items","where id='".$_GET['id']."'")."' ",
				0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=textos_items&acc=list&fil=cursos&val={id}&friendly={nombre}")),											
				)
				);
}elseif($_GET['fil']!='' and $_GET['val']!=''){
$grupos[]=fila(array(
					"id",
					"nombre",
					),
				"textos_grupos",
				"where id='".$_GET['val']."' ",
				0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=textos_items&acc=list&fil=cursos&val={id}&friendly={nombre}")),											
				)				
				);
}else{
$grupos=select(array(
					"id",
					"nombre",
					),
				"textos_grupos",
				"where 1 and visibilidad='1' order by id asc limit 0,100",
				0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=textos_items&acc=list&fil=cursos&val={id}&friendly={nombre}")),											
				)				
				);
}


foreach($grupos as $grupo){
	
	$gru['menu']=select(
			'id,nombre,id_subgrupo',
			'textos_items',
			"where visibilidad='1' and id_grupo='".$grupo['id']."' order by id_subgrupo ",
			0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=textos_items&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>array('match'=>array('{id_subgrupo}','','menu_nivel_1','menu_nivel_2')),
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);
	$id_subgrupo=0;		
	$Grus=array();
	foreach($gru['menu'] as $grus){
		if($grus['id_subgrupo']!='' and $id_subgrupo!=$grus['id_subgrupo']){
			
			$id_subgrupo=$grus['id_subgrupo'];
			$Grus[]=select_fila(
			'id,nombre',
			'textos_subgrupos',
			"where visibilidad='1' and id='".$grus['id_subgrupo']."' ",
			0,
				array(
					'nivel'=>'menu_nivel_1',
				)
			);

		}
		$Grus[]=$grus;		
	}
	$gru['menu']=$Grus; unset($Grus);
	$gru['header']['nombre']=$grupo['nombre'];
	$gru['header']['url']=$grupo['url'];
	
	$object['items'][]=$gru; unset($gru);
	
}

$object['panel']='textos_grupos,textos_subgrupos,textos_items';
//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$LISTADO[$PARAMS['this']]=$object; 
	
?>