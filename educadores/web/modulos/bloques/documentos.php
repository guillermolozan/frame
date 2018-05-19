<?php //á
//prin ($PARAMS);

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];


$object['items']['0']['header']=' ';

$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>DOCUMENTOS</b>',
                                    'id_subgrupo'=>'',
                                    'url' => "index.php?".$filtro_param."modulo=items&tab=documentos_grupos&acc=list",
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='app' and $_GET['page']=='nuestra-historia')?'selected':'',
									);							

//prin($object);

$object['panel']='textos_grupos,textos_subgrupos,textos_items';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>