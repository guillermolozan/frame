<?php //á

/**********************************************/
//////////////////  VARS  //////////////////////
/**********************************************/

//unset($_SESSION['publicar']);
//prin($_SESSION);
//prin($_COOKIE);
//prin($_GET);
//prin($SERVER);
//prin($_SERVER);
/**********************************************/
///////////////// VERSION //////////////////
/**********************************************/

$INCLUDE['version']="?v=1799";

$HEAD['INCLUDE']['version']=$INCLUDE['version'];

/**********************************************/
///////////////// MASTERCOFIG //////////////////
/**********************************************/

include("master.php");

/**********************************************/
////////////////  IDIOMA  //////////////////////
/**********************************************/

$default_lang="es";
include("../../".$web_path."/lang.php");
unset($lang);
include("../../".$web_path."/lang/lang_".$c_lang.".php");


/**********************************************/
/////////////INCLUDES BEFORE ///////////////////
/**********************************************/

include("lib/class.autokeyword.php");
include("lib/include.php");
include("urls.php");

/**********************************************/
///////////// EXTRAER ARCHIVOS /////////////////
/**********************************************/

include("loaddata.php");


/********************************************/
////////////////// HEAD //////////////////////
/********************************************/

$HEAD['titulo_H1'] = $COMMON['datos_root']['titulo_web'];

$HEAD['titulo'] = $COMMON['datos_root']['titulo_web'];


/*******************************************/
////////////////// SESSION //////////////////
/*******************************************/

/*
if($_SESSION['login']['status']==1){
$LOGIN['usuario']="<b>".$_SESSION['login']['nombre']."</b>| <a href='#' >mi cuenta</a> | <a href='#' >mis anuncios</a> | <a href='#' onclick='javascript:cerrar_sesion(\"login\");return false;' rel='nofollow'>salir</a>";
}

if(isset($_SESSION['publicar']['usuario_temp'])){
$STATUS='Hay un anuncio pendiente de publicación (<a class="main" href="'.$COMMON['url_publicar-2'].'">editar</a>). Para terminar de publicar debe <a class="main" href="'.$COMMON['url_registro'].'">registrarse</a> o <a class="main" href="'.$COMMON['url_login'].'">iniciar sesión</a>. O puede <a href="#" onclick="javascript:cerrar_sesion(\'publicar\');return false;" rel="nofollow" class="main" >cancelar</a> la publicación';
}
*/

/**********************************************/
///////////// INCLUDES AFTER ///////////////////
/**********************************************/


include("css.php");

web_render_get_css($WEBBLOQUES,$CLASSSELECTED);
//prin($SELECTORS);

//include("formularios/formularios.php");						

/**********************************************/
/////////////////// STORE //////////////////////
/**********************************************/

//include("store/moneda.php");

//$COMMON['store']['cambio']=unserialize($INDICADORES['dolar']);


/**********************************************/
/////////////////// DRIVER /////////////////////
/**********************************************/

include("driver.php");

include("driver_render.php");

//$COMMON['header_after']['menu'] = web_procesar_menu($COMMON['header_after']['menu'],"izquierda");
//prin($COMMON['header_after']['menu']);
//prin($COMMON['menu']);

include("loaders.php");

////////////////////////////////////////////////
/**********************************************/

if($MASTERCOFIG['editar_friendly_url']=='1'){
	web_guardar_datos_htaccess($_GET,$ALIAS);
}



?>