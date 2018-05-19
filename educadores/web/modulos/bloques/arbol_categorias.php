<?php //á
//prin ($PARAMS);

if($_GET['fil']=='catalogos' and $_GET['val']!=''){

	//$ID_FILTRO='';	
	//$ID_SUBGRUPO='';
	$ID_GRUPO=$_GET['val'];
	
}elseif($_GET['fil']=='grupos' and $_GET['val']!=''){

	//$ID_FILTRO=$_GET['val'];
	//$ID_SUBGRUPO=select_dato("id_subgrupo","productos_filtros","where id='".$_GET['val']."'");
//	$ID_GRUPO=select_dato("id_grupo","productos_subgrupos","where id='".$ID_SUBGRUPO."'");
	$ID_GRUPO=select_dato("id_grupo","productos_subgrupos","where 1");
	
}elseif($_GET['id']!=''){ 

	//$ID_FILTRO=select_dato("id_filtro","productos_items","where id='".$_GET['id']."'");
	//$ID_SUBGRUPO=select_dato("id_subgrupo","productos_items","where id='".$_GET['val']."'");	
	$ID_GRUPO=select_dato("id_grupo","productos_items","where id='".$_GET['id']."'");
	
	$ID_ITEM=$_GET['id'];
	
} elseif($_GET['gru']!='' or empty($_GET['gru'])){ 

	if($_GET['gru']=='0' or empty($_GET['gru'])){
		//$ID_FILTRO='';
		//$ID_SUBGRUPO='';
		$ID_GRUPO='';		
	} else {		
		//$ID_FILTRO='';
		//$ID_SUBGRUPO=$_GET['gru'];
		$ID_GRUPO=select_dato("id_grupo","productos_subgrupos","where id='".$_GET['gru']."'");		
	}
	
}




$ITEMS['catalogo']['label']='Catálogo';
$ITEMS['catalogo']['link']=procesar_url('index.php?modulo=items&tab='.$PARAMS['conector'].'&acc=list&fil=catalogos&val='.$ID_GRUPO.'&friendly='.$ITEMS['catalogo']['label']);


$items= select(
	"id,nombre,fecha_creacion",
	"productos_grupos",
	"where 1 and  visibilidad='1' order by nombre asc limit 0,100"
	,0
    );

//$ITEMS['menu'][]=array('nivel'=>'menu_nivel_1','url'=>'#'.$item['id'],'label'=>$NOMBRE,'selected'=>'');	

//$ITEMS['menu'][]=array('nivel'=>'menu_nivel_1','url'=>procesar_url('index.php?modulo=items&tab=productos'),'label'=>'Categorías de productos','selected'=>'');		

/*
if($_GET['id_grupo']!=''){ 
	$GET_ID_GRUPO=($_GET['id_grupo']=='')?"":select_dato("id","productos_grupos","where nombre='".url_decode_seo($_GET['id_grupo'])."'",0);		
} elseif($_GET['id_subgrupo']!=''){ 
	$GET_ID_SUBGRUPO=($_GET['id_subgrupo']=='')?"":select_dato("id","productos_subgrupos","where nombre='".url_decode_seo($_GET['id_subgrupo'])."'",0);
} 
*/

foreach($items as $item){

	$sub_items= select(
		"id,nombre,fecha_creacion",
		"productos_items",
		"where id_grupo='".$item['id']."' and  visibilidad='1' order by nombre asc limit 0,100"
		,0
		);
		$ITEMS['menu'][]=array(
		'nivel'=>'menu_nivel_1',
		'url'=>procesar_url('index.php?modulo=items&tab='.$PARAMS['conector'].'&acc=list&gru='.$item['id'].'&friendly='.$item['nombre']),
		'label'=>$item['nombre'],
		//'selected'=>($ID_GRUPO==$item['id'])?'selected':'',
		'selected'=>''		
		);		
		
		foreach($sub_items as $sub_item){
		
			$ITEMS['menu'][]=array(
			'nivel'=>'menu_nivel_2',
		    'url'=>procesar_url("index.php?modulo=items&tab=".$PARAMS['conector']."&acc=file&id=".$sub_item['id']."&friendly=".$sub_item['nombre']),										
			'label'=>$sub_item['nombre'],
			'selected'=>($ID_ITEM==$sub_item['id'])?'selected':''
			);		

		}

}



//prin($ITEMS);

$LISTADO[$PARAMS['this']]=$ITEMS;
	
?>