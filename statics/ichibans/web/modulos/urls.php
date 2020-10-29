<?php //á

$URLS['']=$SERVER['BASE'];

/**********************************************/
/*****************  FRIENDLYS  ****************/
/**********************************************/

/*url_formularios-START*/
/*url_formularios-END*/

/*url_items-START*/
$URLS['index.php?modulo=items&tab=enlaces_items&acc=list']='enlaces_items';
/*url_items-END*/

/*url_pages-START*/
/*url_pages-END*/

/*url_app-START*/
/*url_app-END*/

/*URLS-START*/
$URLS['index.php?modulo=formularios&tab=contacto']='contactenos';
$URLS['index.php?modulo=app&tab=pages&page=quienes-somos']='empresa';
/*URLS-END*/

/*ALIAS-START*/
/*ALIAS-END*/

/*HOME-START*/
$URLS['index.php?modulo=app&tab=home']=""; 
/*HOME-END*/



$ALIAS['contacto']='contactenos';
//$ALIAS['empresa']='quienes-somos';




/**********************************************/
/*******************  LINK  *******************/
/**********************************************/

//$COMMON['url_home']=procesar_url('index.php?modulo=app&tab=pages&id=home');

$COMMON['url_home']=procesar_url('index.php?modulo=app&tab=home');
$COMMON['url_login']=procesar_url('index.php?modulo=formularios&tab=login');
$COMMON['url_cerrar_sesion']=procesar_url('index.php?modulo=formularios&tab=cerrar_sesion');
$COMMON['url_registro']=procesar_url('index.php?modulo=formularios&tab=registro');
$COMMON['url_boletin']=procesar_url('index.php?modulo=formularios&tab=boletin');
$COMMON['url_inscripciones']=procesar_url('index.php?modulo=formularios&tab=inscripciones');
$COMMON['url_contactenos']=procesar_url('index.php?modulo=formularios&tab=contacto');
$COMMON['url_cotizacion']=procesar_url('index.php?modulo=formularios&tab=cotizacion');
$COMMON['url_olvido_clave']=procesar_url('index.php?modulo=formularios&tab=recordar_clave');
$COMMON['url_editar_usuario']=procesar_url('index.php?modulo=formularios&tab=editar_usuario');
$COMMON['url_cambiar_clave']=procesar_url('index.php?modulo=formularios&tab=editar_clave');
$COMMON['url_pedido']=procesar_url('index.php?modulo=formularios&tab=pedido');



/*
$COMMON['url_publicar']=procesar_url('index.php?modulo=formulario&tab=publicar-anuncio-1'.web_follow_url(array('id_departamento','id_provincia','id_distrito')));
$COMMON['url_publicar-2']=procesar_url('index.php?modulo=formulario&tab=publicar-anuncio-2');
$COMMON['url_carrito']=procesar_url('index.php?modulo=app&tab=carrito');
*/

?>