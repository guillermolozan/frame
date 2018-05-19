<?php //á
//prin ($PARAMS);

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

if($_GET['tab']=='usuarios_items'){

	$ID=$_GET['id'];	

} if($_GET['tab']=='temas_items'){

	$USER_SESION=dato('user','ventas_items','where id='.$_GET['id']);
	$ID=dato("id","usuarios","where id_sesion=$USER_SESION");

}
	
// $grupos=select(array(
// 					"id",
// 					"nombre",
// 					),
// 				"textos_grupos",
// 				"where 1 and visibilidad='1' $filtro_where  and id not in ('4','3') order by id asc limit 0,100",
// 				0
// 				);

$grupos=array(array('id'=>'0','nombre'=>'Profesores'));


$gru=array();
foreach($grupos as $grupo){
	
	$gru['menu']=select(
			'id,nombre,apellidos,id_colegio',
			'usuarios',
			"where visibilidad='1' and 1 $filtro_where order by id_colegio asc, id asc ",
			0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=usuarios_items&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>array('match'=>array('{id_subgrupo}','','menu_nivel_2','menu_nivel_2')),
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);

	// prin($gru['menu']);

	$id_subgrupo=0;		
	$Grus=array();
	foreach($gru['menu'] as $grus){

		$grus['nombre']=$grus['nombre']." ".$grus['apellidos'];

		if($grus['id_colegio']!='' and $id_subgrupo!=$grus['id_colegio']){
			
			$id_subgrupo=$grus['id_colegio'];
			$Grus[]=fila(
			'id,nombre',
			'colegios',
			"where visibilidad='1' and id=".$id_subgrupo." $filtro_where order by id desc ",
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

$object['panel']='colegios,usuarios';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>