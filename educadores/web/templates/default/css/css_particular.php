<?php //á
 
header("Content-type: text/css");
error_reporting(0);
include("../../../../panel/lib/util.php"); 
include("../../../../panel/lib/mysql3.php"); 
include("../../../../panel/lib/webutil.php"); 

$PARTICULAR='../img/particular';


?>

<?php
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
/********************************************                     COMMON                       ******************************************************/
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
?>

/*header*/
.id_header { background:url('../img/particular/common/header/bg.jpg') no-repeat; }



/*header_menu*/
<?php css_render_menu('id_header_menu','common/header_menus'); ?>


/*canvas*/
.div_canvas {
	margin-top: 10px !important;
}


/*footer*/
.id_footer { color:#FFF; }
.id_footer a { text-decoration:none; }
.id_footer a:hover { text-decoration:underline; }
.id_footer .footer_by { position:absolute; bottom:3px; left:0px; width:100%; }

.id_footer div { margin-bottom:3px; }
.id_footer .titulo { color:#FFFF00; font-family:Arial; font-weight:bold; }
.id_footer .texto { text-align:justify; }
.id_footer .copy { }
.id_footer .info { }

/*.id_footer*/ 


/*id_centro_grupos_file*/
<?php css_render_esquinas('id_centro_grupos_file','bloques/common'); ?>

/*enlinea*/
<?php css_render_esquinas('id_enlinea','bloques/common'); ?>

/*id_servicios_items_file*/
<?php css_render_esquinas('id_servicios_items_file','bloques/common'); ?>

/*id_tramites_items_file*/
<?php css_render_esquinas('id_tramites_items_file','bloques/common'); ?>

/*id_convocatoria_items_file*/
<?php css_render_esquinas('id_convocatoria_items_file','bloques/common'); ?>

/*id_turismo_fotos_file*/
<?php css_render_esquinas('id_turismo_fotos_file','bloques/common'); ?>

/*contacto*/
<?php css_render_esquinas('id_boletin','bloques/common'); ?>

/*boletin*/
<?php css_render_esquinas('id_contacto','bloques/common'); ?>

<?php css_render_esquinas('id_consultas','bloques/common'); ?>


/*pages*/
<?php css_render_esquinas('id_pages','bloques/common'); ?>

/*home*/
<?php css_render_esquinas('id_home','bloques/common'); ?>

<?php
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
/********************************************                     ITEMS                       *******************************************************/
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
?>

/*productos_file*/
<?php css_render_esquinas('id_productos_file','bloques/common'); ?>

.album { 
padding:0 0px 0 27px;
}
.album .thumb {  
overflow: hidden;
position:relative;
margin:5px 16px 5px 0px;
padding:4px; border:1px solid #999;
float:left;
}
.album .thumb:hover {
border-color:#333;
}
.album .thumb a {    
background-color: #EEE;
background-position: center 25%;
background-repeat: no-repeat;
display: block;
width:140px;
height:80px;
overflow:hidden;
outline:1px solid #EEE;
}
.album .thumb img { visibility:visible; }

.ficha { padding:10px 10px 0 0px;  } 
.ficha p { }
.ficha table { margin-bottom:10px; } 
.ficha table td { padding:0 4px; vertical-align:top; width:50%; color:#4F5767; }

/*productos_file*/
<?php css_render_esquinas('id_productos_file','bloques/common'); ?>

/*textos_items_file*/
<?php css_render_esquinas('id_textos_items_file','bloques/common'); ?>

/*textos_items2_file*/
<?php css_render_esquinas('id_textos_items2_file','bloques/common'); ?>


/*blog_noticias_file*/
<?php css_render_esquinas('id_blog_noticias_file','bloques/common'); ?>

/*blog_actividades_file*/
<?php css_render_esquinas('id_blog_actividades_file','bloques/common'); ?>

/*bloque_agenda_file*/
<?php css_render_esquinas('id_bloque_agenda_file','bloques/common'); ?>

/*blog_fotos_file*/
<?php css_render_esquinas('id_blog_fotos_file','bloques/common'); ?>

/*blog_videos_file*/
<?php css_render_esquinas('id_blog_videos_file','bloques/common'); ?>

/*obras_fotos_file*/
<?php css_render_esquinas('id_obras_fotos_file','bloques/common'); ?>

/*obras_fotos2_file*/
<?php css_render_esquinas('id_obras_fotos2_file','bloques/common'); ?>

/*blog_noticias_list*/
<?php css_render_esquinas('id_blog_noticias_list','bloques/common'); ?>

/*blog_actividades_list*/
<?php css_render_esquinas('id_blog_actividades_list','bloques/common'); ?>

/*bloque_agenda_list*/
<?php css_render_esquinas('id_bloque_agenda_list','bloques/common'); ?>

/*blog_fotos_list*/
<?php css_render_esquinas('id_blog_fotos_list','bloques/common'); ?>

/*blog_videos_list*/
<?php css_render_esquinas('id_blog_videos_list','bloques/common'); ?>

/*obras_fotos_list*/
<?php css_render_esquinas('id_obras_fotos_list','bloques/common'); ?>

/*obras_fotos2_list*/
<?php css_render_esquinas('id_obras_fotos2_list','bloques/common'); ?>

/*menu_textos*/
<?php css_render_esquinas('id_menu_textos','bloques/common'); ?>
.id_menu_textos .vermas .nombre a { font-size:14px; text-align:center; padding:10px 0; text-decoration:underline; color:#010066; }

/*bloque_centro_file*/
<?php css_render_esquinas('id_bloque_centro_file','bloques/common'); ?>

/*alcalde*/
<?php css_render_esquinas('id_alcalde','bloques/bloc_1c'); ?>

/*agenda*/
<?php css_render_esquinas('id_agenda','bloques/bloc_1c'); ?>

/*menu_convocatoria2*/
<?php css_render_esquinas('id_menu_convocatoria2','bloques/bloc_1d'); ?>

/*indicadores_economicos*/
<?php css_render_esquinas('id_indicadores_economicos','bloques/bloc_1d'); ?>

/*bloq_enlaces*/
<?php css_render_esquinas('id_bloq_enlaces','bloques/bloc_1c'); ?>
.id_bloq_enlaces .titulo { 
    clear: none !important;
    color: #00527D !important;
    line-height: 12px !important;
    padding: 3px 0 0 3px !important;
    width: 110px !important;
}

/*bloq_centro*/
<?php css_render_esquinas('id_bloq_centro','bloques/bloc_1c'); ?>
.id_bloq_centro .titulo { clear:none !important;color:#00527D !important;line-height:11px !important;width:114px !important;
    padding: 3px 0 0 5px !important;
    width: 164px !important;
}
.id_bloq_centro .listado_item { 
    border-bottom: 1px solid #D6DADD;
    height: 43px !important;
    padding: 5px 5px 0 !important;
    width: 228px !important;
}
/*menu_blog*/
<?php css_render_esquinas('id_menu_blog','bloques/bloc_1'); ?>
.id_menu_blog {  background: url("../img/particular/bloques/arbol_1/bg.jpg") top right repeat-y; }
.id_menu_blog .vermas .nombre a { font-size:14px; text-align:center; padding:10px 0; text-decoration:underline; color:#010066; }

/*menu_obras*/
<?php css_render_esquinas('id_menu_obras','bloques/bloc_1b'); ?>
.id_menu_obras a.but_prev, 
.id_menu_obras a.but_next {
    background-color: #000000;
    bottom: 7px;
    cursor: pointer;
    padding: 0 10px;
    position: absolute;
}

/*menu_obras2*/
<?php css_render_esquinas('id_menu_obras2','bloques/bloc_1b'); ?>
.id_menu_obras2 a.but_prev, 
.id_menu_obras2 a.but_next {
    background-color: #000000;
    bottom: 7px;
    cursor: pointer;
    padding: 0 10px;
    position: absolute;
}

/*menu_turismo*/
<?php css_render_esquinas('id_menu_turismo','bloques/bloc_1'); ?>
.id_arbol_1 .menu_nivel_1 h3 { background: url("../img/particular/bloques/bloc_1/menu_nivel_1.png") 0px 2px no-repeat; padding-left:13px !important; }  
.id_arbol_1 .menu_nivel_2 a { background: url("../img/particular/bloques/bloc_1/menu_nivel_2.png") 0px 2px no-repeat; padding-left:13px !important; } 



/*documentos_grupos_list*/
<?php css_render_esquinas('id_documentos_grupos_list','bloques/common'); ?>

/*documentos_items_list*/
<?php css_render_esquinas('id_documentos_items_list','bloques/common'); ?>

/*documentos_items_file*/
<?php css_render_esquinas('id_documentos_items_file','bloques/common'); ?>


<?php
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
/********************************************                     BLOQUES                       *****************************************************/
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
?>
/*print_documentos*/
.id_print_documentos .link {  background: url("../img/particular/bloques/documentos.jpg") no-repeat; float:left; width:206px; height:44px; margin:-11px 0 0 -9px; }

/*print_youtube*/
.id_print_youtube .link {  background: url("../img/particular/bloques/youtube.jpg") no-repeat; float:left; width:206px; height:44px; margin:-11px 0 -11px -12px; }

/*print_novedades*/
.id_print_novedades .link {  background: url("../img/particular/bloques/boletin.jpg") no-repeat; float:left; width:201px; height:91px; margin:7px 0 0 18px; }

/*print_redes_sociales*/
.id_print_redes_sociales .link_facebook_big {  background: url("../img/particular/iconos/facebook_big.jpg") no-repeat; float:left; width:97px; height:27px; margin-right:3px; }
.id_print_redes_sociales .link_twitter_big {  background: url("../img/particular/iconos/twitter_big.jpg") no-repeat; float:left; width:97px; height:27px; }


/*arbol_1*/
<?php css_render_esquinas('id_arbol_1','bloques/bloc_1'); ?>
.id_arbol_1 .menu_nivel_1 h3 { background: url("../img/particular/bloques/bloc_1/menu_nivel_1.png") 0px 2px no-repeat; padding-left:13px !important; }  
.id_arbol_1 .menu_nivel_2 a { background: url("../img/particular/bloques/bloc_1/menu_nivel_2.png") 0px 2px no-repeat; padding-left:13px !important; } 



/*arbol_documentos*/
<?php css_render_esquinas('id_arbol_documentos','bloques/bloc_1'); ?>
.id_arbol_documentos {  background: url("../img/particular/bloques/bloc_1/bg.jpg") top right repeat-y; }
.id_arbol_documentos .menu_nivel_1 h3 { background: url("../img/particular/bloques/bloc_1/menu_nivel_1.png") 0px 2px no-repeat; padding-left:13px !important; }  
.id_arbol_documentos .menu_nivel_2 a { background: url("../img/particular/bloques/bloc_1/menu_nivel_2.png") 0px 2px no-repeat; padding-left:13px !important; }  


/*banner_publicaciones*/



/*banner_servicios*/
<?php css_render_esquinas('id_banner_servicios','bloques/bloc_4',array('buts'=>array(4,10))); ?>

/*banner_departamentos*/
<?php css_render_esquinas('id_banner_departamentos','bloques/bloc_5',array('buts'=>array(4,10))); ?>



/*arbol_2*/
<?php css_render_esquinas('id_arbol_2','bloques/arbol_2'); ?>
.id_arbol_2 {  background: url("../img/particular/bloques/arbol_2/bg.jpg") top right repeat-y; }
.id_arbol_2 {  background: url("../img/particular/bloques/arbol_2/bg.jpg") top right repeat-y; }
.id_arbol_2 li.menu_nivel_1 { 
background: url("../img/particular/bloques/arbol_2/fila_bg.jpg") repeat-x !important; 
height:19px !important; padding-top:8px !important; min-height:19px !important; border-top:1px solid #BBBBBB !important;
 }
.id_arbol_2 li.menu_nivel_1:hover,
.id_arbol_2 li.selected { background-image:none !important; background-color:#999 !important; } 
.id_arbol_2 .menu_nivel_1 a { background: url("../img/particular/bloques/arbol_2/menu_nivel_1.png") 0px 2px no-repeat; padding-left:13px !important; }  


/*banner_publicidad_4*/
<?php css_render_esquinas('id_banner_publicidad_4','bloques/publicidad_fotos'); ?>

/*banner_enlaces*/
<?php css_render_esquinas('id_banner_enlaces','bloques/publicidad_fotos'); ?>


/*menu_obras*/
<?php //css_render_esquinas('id_menu_obras','bloques/arbol_1'); ?>

/*banners_main*/
<?php css_render_esquinas('id_banners_main','bloques/banners_main'); ?>
.banner_main-listados .listado_item .texto {
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 25px 25px 25px 25px;
    bottom: 26px;
    color: #000000 !important;
    font-size: 18px !important;
    font-weight: bold;
    left: 20px;
    min-height: 29px;
    opacity: 0.8;
    padding: 10px 20px;
    position: absolute;
    width: 33%;
}

/*menu_contenidos*/
<?php css_render_esquinas('id_menu_contenidos','bloques/menu_contenidos',array('buts'=>array(0,20))); ?>

/*blog*/
<?php css_render_esquinas('id_blog','bloques/blog',array('buts'=>array(3,10))); ?>
<?php css_render_menu('id_blog','bloques/blog'); ?>

.id_blog #menu_blog_area_tab_1 .titulo { background:url("../img/particular/iconos/notas.jpg") no-repeat; padding-left:40px; }
.id_blog #menu_blog_area_tab_2 .titulo { background:url("../img/particular/iconos/notas.jpg") no-repeat; padding-left:40px; }

/*recomendar*/
.id_recomendar #recomendar_submit { background-color:#FE9901; color:#000005; border:0; font-size:14px;  }

/**/

.listado_item {
overflow:hidden !important;
}

.download {
    display:block;
    color:red;
    font-weight:bold;
    clear:left;
}