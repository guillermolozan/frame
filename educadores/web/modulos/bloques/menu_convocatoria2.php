<?php //á
//prin ($PARAMS);
$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$ID=($_GET['tab']=='convocatoria_items')?$_GET['id']:'';
	
// $grupos=select(array(
// 					"id",
// 					"nombre",
// 					),
// 				"convocatoria_grupos",
// 				"where 1 and visibilidad='1' $filtro_where  and id not in ('4','3') order by id asc limit 0,100",
// 				0
// 				);
// $gru=array();
$grupos=array(array('id'=>'','nombre'=>'Convocatorias'));

foreach($grupos as $grupo){
	
	$gru['menu']=select(
			'id,nombre,id_subgrupo',
			'convocatoria_items',
			"where visibilidad='1' $filtro_where order by id_subgrupo asc, id asc ",
			0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=convocatoria_items&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>array('match'=>array('{id_subgrupo}','','menu_nivel_2','menu_nivel_2')),
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);
	$id_subgrupo=0;		
	$Grus=array();
	foreach($gru['menu'] as $grus){
		if($grus['id_subgrupo']!='' and $id_subgrupo!=$grus['id_subgrupo']){
			
			$id_subgrupo=$grus['id_subgrupo'];
			$Grus[]=fila(
			'id,nombre',
			'convocatoria_subgrupos',
			"where visibilidad='1' and id='".$grus['id_subgrupo']."' $filtro_where order by id desc ",
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
	
	$object['items'][]=$gru; unset($gru);
	
}
/*
if($_GET['sec']!='cgtp'){
	$object['items']['0']['menu'][]=array(
										'nombre'=> '<b>Informes Legales</b>',
										'id_subgrupo'=>'',
										'url' => 'index.php?modulo=items&tab=publicaciones2_items&acc=list',
										'nivel' => 'menu_nivel_2',
										//'class' => ($_GET['modulo']=='app' and $_GET['tab']=='stats_consultas')?'selected':'',
										);	
}									
*/

// prin($object);

$object['panel']='convocatoria_subgrupos,convocatoria_items';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>