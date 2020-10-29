+<?php 
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

/*footer*/
<?php css_render_general('id_footer','footer');?>

.id_footer .titulo { color:#FFFF00; font-family:Arial; font-weight:bold; }
.id_footer .texto { text-align:justify; }
.id_footer .copy { }
.id_footer .info { }



/*header_menus*/
<?php css_render_menu('id_header_menus','header'); ?>

/*contacto*/
<?php css_render_esquinas('id_contacto','bloques/common'); ?>

/*boletin*/
<?php //css_render_esquinas('id_contacto','bloques/common'); ?>

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
<?php //css_render_esquinas('id_productos_file','bloques/common'); ?>
.id_productos_file .carrito { font-size:16px; font-weight:bold; color:#093975 !important; }

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


/*productos_list*/

.listado_productos .carrito { background:url(../img/particular/items/carrito.jpg) no-repeat; width:25px; height:23px; position:absolute; top:1px; left:4px; }
.listado_productos .lupa { background:url(../img/particular/items/lupa.jpg) no-repeat; width:25px; height:25px; position:absolute; top:0px; right:4px; }
.listado_productos .barra_abajo .but_prev { position:relative; float:right; margin-right:75px; margin-top:1px; }
.listado_productos .barra_abajo .ver_todos { color:#FFF; font-weight:bold; float:left; font-size:14px; margin:4px 0 0 9px; } 
.listado_productos .listado_item .inner .div_fila {margin:2px 0 0 0; background-color:#0B4992; padding:4px 0; height:17px; text-align:center;}
.listado_productos .verdescripcion { display:block; height:20px; color:#000 !important; background-color:#E4E4E4; text-align:center; }

/*textos_items_file*/
<?php css_render_esquinas('id_textos_items_file','bloques/common'); ?>

/*blog_noticias_file*/
<?php css_render_esquinas('id_blog_noticias_file','bloques/common'); ?>

/*blog_actividades_file*/
<?php css_render_esquinas('id_blog_actividades_file','bloques/common'); ?>

/*blog_fotos_file*/
<?php css_render_esquinas('id_blog_fotos_file','bloques/common'); ?>

/*blog_videos_file*/
<?php css_render_esquinas('id_blog_videos_file','bloques/common'); ?>

/*menu_textos*/
<?php css_render_esquinas('id_menu_textos','bloques/common'); ?>
.id_menu_textos .vermas .nombre a { font-size:14px; text-align:center; padding:10px 0; text-decoration:underline; color:#010066; }

/*menu_blog*/
<?php css_render_esquinas('id_menu_blog','bloques/common'); ?>
.id_menu_blog .vermas .nombre a { font-size:14px; text-align:center; padding:10px 0; text-decoration:underline; color:#010066; }

/*enlaces_items_list*/
<?php css_render_esquinas('id_enlaces_items_list','bloques/common'); ?>


<?php
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
/********************************************                     BLOQUES                       *****************************************************/
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
?>

/*link_boletin*/
.id_link_boletin .link {  background: url("../img/particular/bloques/boletin.jpg") no-repeat; float:left; width:204px; height:95px; }
/*link_facebook*/
.id_link_facebook .link_facebook_big {  background: url("../img/particular/iconos/facebook_big.jpg") no-repeat; float:left; width:98px; height:27px; margin-right:3px; }
.id_link_facebook .link_twitter_big {  background: url("../img/particular/iconos/twitter_big.jpg") no-repeat; float:left; width:96px; height:27px; }

/*banner_main*/
<?php css_render_esquinas('id_banner_main','bloques/banner_main',array('buts'=>array(-143,20))); ?>

/*banners_productos*/
<?php css_render_esquinas('id_banners_productos','bloques/banners_productos',array('buts'=>array(-20,0))); ?>

.id_banners_productos .inner .nombre { background-image:url("../img/particular/items/productos_abajo_bg.jpg")}

/*publicidad_fotos*/
<?php //css_render_esquinas('id_publicidad_fotos','bloques/publicidad_fotos'); ?>

/*arbol_categorias*/
<?php //css_render_esquinas('id_arbol_categorias','bloques/common'); ?>

/*menu_contenidos*/
<?php css_render_esquinas('id_menu_contenidos','bloques/menu_contenidos',array('buts'=>array(0,20))); ?>

/*blog*/
<?php css_render_esquinas('id_blog','bloques/blog',array('buts'=>array(3,10))); ?>

.id_blog #menu_blog_area_tab_1 .titulo { background:url("../img/particular/iconos/notas.jpg") no-repeat; padding-left:40px; }
.id_blog #menu_blog_area_tab_2 .titulo { background:url("../img/particular/iconos/notas.jpg") no-repeat; padding-left:40px; }

/*arbol_1*/
<?php css_render_esquinas('id_arbol_1','bloques/common'); ?>

/*recomendar*/
.id_recomendar #recomendar_submit { background-color:#CB1315; color:#FFF; border:0; font-size:14px;  }

<?php
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
/********************************************                     ESPECIALES                       **************************************************/
/****************************************************************************************************************************************************/
/****************************************************************************************************************************************************/
?>

.fotoempty { background-color:#eee !important; }

