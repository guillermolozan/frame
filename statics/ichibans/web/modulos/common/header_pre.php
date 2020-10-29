<?php //á
$THIS=$PARAMS['this'];
$object=array();
//web_render_swf_script($SERVER['BASE'].THEME_PATH."img/particular/bar/bg.swf","bar_bg_swf","930x100");


//web_render_swf_script($SERVER['BASE'].THEME_PATH."img/particular/header/bg.swf","header_bg_swf","930x145");

/*
$COMMON['header_info'] = "
<span class='ico ico_mobile'>".$COMMON['datos']['nextel_1']."</span>
<span class='ico ico_phone'>".$COMMON['datos']['telefono_1']." / ".$COMMON['datos']['telefono_2']."</span>
<a href='mailto:".$COMMON['datos']['email_ventas']."' class='ico ico_email'>".$COMMON['datos']['email_ventas']."</a>
";
*/

/*
$COMMON['categorias'] = select(
        "id,nombre"
        ,"productos_grupos"
        ,"where 1 and  visibilidad='1' order by id asc limit 0,100"
        ,0
		);
*/
	$MENU_SIN_SESION=array(
						array(						
								'url'	=>'index.php?modulo=formularios&tab=login',
								'label'=>'Iniciar Sesión',	
							)
						,array(
								'url'	=>'index.php?modulo=formularios&tab=registro',
								'label'=>'Registrate aquí',	
							)
						,array(
								'url'	=>'index.php?modulo=formularios&tab=recordar_clave',
								'label'=>'¿Olvidaste tu clave?',	
							)																																								
						);
																	
	$MENU_CON_SESION=array(
						array(
								'onclick'=>'cerrar_sesion("")',
								'label'=>'Cerrar Sesión',	
							)
						/*,array(
								'url'	=>'index.php?modulo=formularios&tab=editar_datos',
								'label'=>'Editar Datos',	
							)
						,array(
								'url'	=>'index.php?modulo=formularios&tab=recordar_clave',
								'label'=>'Cambio de Clave',	
							)*/																																								
						);	
						
$object['menu']=($_SESSION['login']['status']=='1')?$MENU_CON_SESION:$MENU_SIN_SESION;


$object['menu'] = web_procesar_menu($object['menu'],"derecha");

$OBJECT[$THIS]=$object;

?>