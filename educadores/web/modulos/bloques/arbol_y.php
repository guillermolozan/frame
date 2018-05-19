<?php //á
//prin ($PARAMS);

$object=array();


$object['items']['0']['header']=' ';

$object['items']['0']['menu'][]=array(
									'nombre'=> '<b>YOUTUBE</b>',
                                    'id_subgrupo'=>'',
                                    'url' => 'http://www.youtube.com/user/cgtptv',
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