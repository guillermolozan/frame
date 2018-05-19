<?php //á 

$THIS=$PARAMS['this'];

$object=array();

$object['menu']=select("nombre,url",'menus_items','where id_grupo='.dato('id','menus',"where nombre='main'").' and visibilidad=1 limit 0,100',0,
array(
    'url'=>"index.php?{url}",
)
);




$object['menu'] = web_procesar_menu($object['menu'],"izquierda");


$OBJECT[$THIS]=$object;
?>