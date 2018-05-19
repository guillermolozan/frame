<?php //á
//prin ($PARAMS);

$object=array();


$object['items']['0']['header']=' ';

$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>Nuestra Historia</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'index.php?modulo=app&tab=pages&page=nuestra-historia',
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='app' and $_GET['page']=='nuestra-historia')?'selected':'',
									);
$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>Estatuto</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'index.php?modulo=app&tab=pages&page=estatuto',
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='app' and $_GET['page']=='estatuto')?'selected':'',
									);	
$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>Concejo Nacional</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'index.php?modulo=app&tab=pages&page=concejo-nacional',
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='items' and $_GET['page']=='concejo-nacional')?'selected':'',
									);		
$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>Secretariado Ejecutivo</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'index.php?modulo=app&tab=pages&page=secretariado-ejecutivo',
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='items' and $_GET['page']=='secretariado-ejecutivo')?'selected':'',
									);	
$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>Concejo de Vigilancia</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'index.php?modulo=app&tab=pages&page=concejo-vigilancia',
                                    'nivel' => 'menu_nivel_2',
                                    'class' => ($_GET['modulo']=='items' and $_GET['page']=='concejo-vigilancia')?'selected':'',
									);							

//prin($object);

$object['panel']='textos_grupos,textos_subgrupos,textos_items';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>