<?php //á
//prin($_SERVER);
//prin($_SESSION);
//prin($_COOKIE);
//parse_str($_GET['conf'],$conf);prin($conf);
//parse_str($_GET['filter'],$conf);prin($conf);
//echo $_GET['conf'];
/*
 prin(
 		array(
 				'sesion'=>array(
 						'usuario_datos_id'=>$_SESSION['usuario_datos_id'],
 						'usuario_datos_nombre'=>$_SESSION['usuario_datos_nombre'],
 						'usuario_datos_nombre_grupo'=>$_SESSION['usuario_datos_nombre_grupo'],
 						'usuario_id'=>$_SESSION['usuario_id'],
 				),
 				'cookies'=>array(
 						'admin'=>$_COOKIE['admin'],
 						'c_usuario'=>$_COOKIE['c_usuario'],
 						'c_password'=>$_COOKIE['c_password'],
 				),
 		));
*/



$_GET['filter']=str_replace(array('[today]'),array(date("Y-m-d")),($_GET['filter']));
//prin($_GET['filter']);

//echo "ADMIN:".$_COOKIE['admin'].'<br>';
if(($SERVER['ARCHIVO']=='maquina.php') or ($_SESSION['edicionpanel']==1)){
	if($SERVER['LOCAL']=='1'){

		@$buxx=implode("\n",file("analisis_objetos.txt"));
		@$analisis_array=json_decode($buxx,true);

		$analisis_array['VALORES_CAMPO']['rango']=array('now,+2 years','now,+10 years','-10 years,now','1980,-10 years');
		unset($analisis_array['VALORES_CAMPO']['valor']);

		$analisis_array['PROPIEDADES_CAMPO'][]='control';
		$analisis_array['VALORES_CAMPO']['control']=array('0','1');

		$analisis_array['VALORES_OBJETO']['por_linea']=array('1','2','3','4');

	}
}

$mostrar_menu=(isset($_GET['accion']) or isset($_GET['tab']) or $_GET['block']=='form')?0:1;

$mostrar_master=(!in_array($_GET['accion'],array('esquema','alllistado','phpinfo','updatecode','subirconfig','bajarconfig','importdb','exportdb','makedump','importfromdump')))?1:0;

//prin(array('alllistado','phpinfo','updatecode','subirconfig','bajarconfig'));

$EdicionPanel=(
		$_COOKIE['admin']=='1'
		and $vars['GENERAL']['mostrar_toolbars']=='1'
		and $_GET['block']!='form'
		and $_SESSION['edicionpanel']=='1')?1:0;


$Open=(
		$_COOKIE['admin']=='1'
		and $vars['GENERAL']['mostrar_toolbars']=='1'
		and $_GET['block']!='form'
		//and $_SESSION['edicionpanel']=='1'
)?1:0;

foreach($objeto_tabla as $item){
	if($SERVER['ARCHIVO']==$item['archivo'].".php"){
		$this_grupo=$item['grupo'];
		$this_me=$item['me'];
	}
}

if($this_me){

	$objeto_tabla=pre_procesar_tabla($objeto_tabla,$vars);

	if($objeto_tabla[$this_me]['page']==1){
		$filtrar_page2=1;	$_SESSION['page']=($_SESSION['page']!='' and in_array($_SESSION['page'],$IdPageS))?$_SESSION['page']:$IdPageS[0];
	}
	if($objeto_tabla[$this_me]['web']==1){
		$filtrar_web2=1;	$_SESSION['web']=($_SESSION['web']!=''  and in_array($_SESSION['page'],$IdWebS))?$_SESSION['web']:$IdWebS[0];
	}

}


foreach($objeto_tabla as $item){

	if(trim($item['app'])!=''){
		$item['app']=str_replace("'","\"",$item['app']);
		$aps=explode("<a",$item['app']);
		foreach($aps as $ap){
			if($ap!=''){
				$parts=between($ap,"href=\"","\"");
				$urla=parse_url($parts[1]);
				$parames=parseParams($urla['query']);
				if($SERVER['ARCHIVO']==$urla['path'] and $_GET['ap']==$parames['ap']){
					$this_grupo=$item['grupo'];
					$this_app_menu=$ap;
					$APP['file']=$parames['ap'];
					$APP['nombre']=strip_tags("<a".$ap);
				}
			}
		}
	}

}

foreach($objeto_tabla as $item){
	if($item['disabled']!=1){
		$validos[]=$item['archivo'].".php";
	}
}

//prin($validos);
//prin($SERVER['ARCHIVO']);

$vars['GENERAL']['BG_COLOR_4']="CCCCCC";
$BG_COLOR_3_OPP=oppColour($vars['GENERAL']['BG_COLOR_3']);
$BG_COLOR_4_OPP=oppColour($vars['GENERAL']['BG_COLOR_4']);
?>
<style>
.truc {
	width: 120px;
}

.mooeditable-ui-dialog .dialog-content * {
	float: none;
}
/*.bloque_titulo, .bloque_titulo a { color:#<?php echo $BG_COLOR_3_OPP;?>; }*/
.foot a {
	margin-right: 5px;
	text-decoration: none;
}

.foot a:hover {
	text-decoration: underline;
}

<?php if($_GET['i']!=''){ ?>
.bl .bd {
    /*width: 300px !important;*/
}
.filters {
	display:none !important;
}
.modificador .bld .nc {
	/*padding-left:40px;*/
	/*width:150px;*/
}
.modificador .itms {
	/*margin-left:15px;*/
}
.modificador .bld {
	background:none;
}
.bl .bld {
	border-left:0px;
}
.modificador .lchk { display:none; }
#segunda_barra_2 { display:none; }
.barbar2 { display:none; }

<?php } ?>

<?php

echo ".bloque_titulo {
	background-color: #".$vars['GENERAL']['BG_COLOR_3'].";";
	echo css_gradient_vertical("0%","#FFFFFF","250%","#eeeeee");
	echo "border : 1px solid #cccccc;/*border-bottom: 7px solid#".$vars['GENERAL']['BG_COLOR_3'].";*/";
echo "}";

foreach($objeto_tabla as  $ot){
	if($ot['archivo'].".php"==$SERVER['ARCHIVO']){ $oott=$ot; }
}

if(sizeof($oott[ 'campos '] )> 9){ ?>.formulario { <?php echo
	"/*border-bottom:7pxsolid #".$vars['GENERAL']['BG_COLOR_3'].";*/ "; ?>

}

<?php
}
?>
#inner { <?php echo "border-bottom:7pxsolid #".$vars['GENERAL']['BG_COLOR_3'].";
	"; ?>

}

/*ul.ul_menus li:hover a,ul.ul_menus li:hover,ul.ul_menus li.selected,ul.ul_menus li.selected a
	{
	background-color: #<?php echo$vars['GENERAL']['BG_COLOR_3']; ?>;
	color: #<?php echo$BG_COLOR_3_OPP; ?>;
	text-decoration: none;
}*/
/*
.segunda_barra {
background-color:#EEEEEE;
color:#<?php echo $BG_COLOR_4_OPP;?>;
}
*/
.open_toolbar {
	float: right;
	font-size: 9px;
	color: #CCCCCC;
}

.open_toolbar:hover {
	color: #000000;
}
</style>
<?php
if($_GET['block']=='form'){
?>
<style>
#inner {
	height: 290px;
	overflow: auto;
}

.formulario {
	border: 0;
}

.supra_menu {
	display: none !important;
}

#inner {
	border-bottom: 0;
}

body {
	background: none !important;
}
</style>
<?php
}
if($_GET['block']!='form'){
if($SERVER['browser']=='IE6'){
?>
<style>
.bloque_titulo {
	background-image: none;
}

.div_bloque_cuerpo {
	width: 100%;
	float: none;
	clear: left;
}

.foot {
	float: none;
	clear: left;
	width: 100%;
}
</style>
<?php
include("aviso_ie6.php");
include("foot.php");
echo $HTML_MAIN_FIN;
echo $HTML_ALL_FIN;
exit();
}
//prin($SERVER);
?>
<script>
function edit_init(se,na,va){
new Request({url:"lib/edit_ini.php",method:'post',data:{seccion:se,name:na,value:va},onSuccess:function(eee){
var url='<?php echo (enhay($SERVER['BASE'].$SERVER['URL'],"maquina.php"))?"maquina.php":$SERVER['BASE'].$SERVER['URL'].(($SERVER['PARAMS'])?'?'.$SERVER['PARAMS']."&":"?")."rd=".rand();?>'+((window.location.hash)?window.location.hash:'');
//alert(url);
location.href=url;
}}).send();
}
</script>
<div>
	<?php

	$script_name=$SERVER['ARCHIVO'];

	if($_COOKIE['admin']=='1'){

		$menus_d['salir_admin'] =  "<a href='maquina.php?accion=borrarcookie'>SALIR DE MASTER</a>";
		//$menus_d[] =  "<a onclick=\"javascript:edit_init('GENERAL','mostrar_toolbars','".( ($Open)?'0':'1' )."');return false;\">toolbar</a>";
		$mmmM = "<li class='menudown'><a onclick=\"javascript:edit_init('GENERAL','mostrar_toolbars','".( ($Open)?'0':'1' )."');return false;\" style='cursor:pointer;'>TOOLBAR</a>";
		if( ( $Open or $Local==1 )){
			if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){
				include("maquina_opciones.php");
				$mmmM.= $mmenuu;
			}
		}
		$mmmM.= "</li>";
		$menus_d['toolbar']=$mmmM;

	}


	$menus_d['goweb'] = "<a href='".str_replace("127.0.0.1","localhost",$url_publica)."' target='_top' ></span>WEB</a>";
	/*
	 foreach($objeto_tabla as $oott){
	if($oott['disabled']!=1){
	prin($oott['me']."xx");
	}
	}
	*/
	if($Open or $Local==1){

		if( $VALIDAR_SESION!='' /*or $_SESSION['usuario_id']!=''*/ ){
			$menus_d['entrar'] = "<a style='text-transform:uppercase;' ". (($script_name=="maquina.php")?"class='selected'":"") ." href='maquina.php?redirhome=1' ></span>MASTER</a>";
		} else {

			$mmmM = "<li class='menudown'>";
			$mmmM.= "<a href='maquina.php' style='text-transform:uppercase;'>MASTER</a>";
			if( ( $Open or $Local==1 )){
				if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){

					foreach($objeto_tabla as $ot){
						if($ot['archivo_sub']!='' and $ot['archivo_sub']==strtolower($vars['GENERAL']['VALIDAR_SESION'])){
							//echo $ot['me']." - ".$ot['archivo_sub']." - ".strtolower($vars['GENERAL']['VALIDAR_SESION'])."<br>";
							$tables_usuarios[]=$ot;
						}
					}
					$usuars=select('id,nombre,password,id_permisos','usuarios_acceso',"where visibilidad='1' order by id_permisos desc, nombre asc",0,array(
							'permiso'	=>array('dato'=>array('nombre','usuarios_permisos','where id="{id_permisos}"')),
					));
					$mmenuu= '<ul class="li_cabecera">';
					/*$mmenuu.= '<li><a href="maquina.php?redirhome=1" class="links_menu" style="font-weight:bold;color:red;text-transform:uppercase;" >MASTER</a></li>';*/
					foreach($usuars as $usu){
						if($usu['nombre']!=''){

							foreach($tables_usuarios as $tu){
								$FiL=select("usuarios_acceso_nombre as nombre,usuarios_acceso_password as password",$tu['tabla'],"where id_sesion='".$usu['id']."'",0); if(sizeof($FiL)>0){
									$FiLa=$FiL['0']; continue;
								}
							}

							$mmenuu.= '<li>';
							$mmenuu.= '<a href="#" onclick="javascript:changelogin(\''.$usu['nombre'].'\',\''.$usu['password'].'\');return false;" class="links_menu" >';
							$mmenuu.= "<span style=' color:#000;'>".$usu['permiso']."</span> - ";
							$mmenuu.= $usu['nombre'];
							$mmenuu.=' - <span style="color:#000;font-weight:normal;">'.$usu['password'].'</span>';
							if(sizeof($FiLa)){
								if($usu['nombre']==$FiLa['nombre'] and $usu['password']==$FiLa['password']){
									$mmenuu.=' <span style="color:green;font-weight:bold;">SI</span>';
								} else {
									$mmenuu.=' <span style="color:red;font-weight:bold;">NO</span>';
								}
							} else {
								$mmenuu.=' <span style="color:red;font-weight:normal;">orfan</span>';
							}

							//$mmenuu.=' - <span style="color:green;font-weight:normal;">'.$FiLa['nombre'].'</span>';
							//$mmenuu.=' - <span style="color:#000;font-weight:normal;">'.$FiLa['password'].'</span>';

							$mmenuu.='</a></li>';
							unset($FiLa);
						}
					}
					$mmenuu.= '</ul>';
					$mmmM.= $mmenuu;

				}
			}
			$mmmM.= "</li>";

			$menus_d['master'] = $mmmM;

			if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){
				$mmmM = "<li class='menudown'><a href='custom/usuarios_acceso.php'>";
				$mmmM.=  "CORE";
				if( ( $Open or $Local==1 )){
					$mmenuu= '<ul class="li_cabecera">';
					foreach($objeto_tabla as $ooott){
						if($ooott['grupo']=='sistema'){
							$mmenuu.= '<li><a href="custom/'.$ooott['archivo'].'.php" class="links_menu" >'.$ooott['menu_label'].'</a></li>';
						}
					}
					$mmenuu.= '</ul>';
					$mmmM.= $mmenuu;
				}

				$mmmM.= "</li>";
				$menus_d['core']=$mmmM;
			}


		}


		if(	$Local==1
				//or $vars['INTERNO']['ID_PROYECTO']!="0"
		){
			$mumu = "<li class='menudown'><a ". (($script_name=="maquina.php")?"class='selected'":"") .
			//" style='". ( ($Open)?'background-color:black;font-weight:bold;color:white;':'') ."'"
			" href='http://".$_SERVER['SERVER_NAME']."/sistemapanel/panel' ></span>".strtoupper($vars['GENERAL']['factory'])."</a>";

			if($vars['INTERNO']['ID_PROYECTO']!="0"){
				mysql_select_db ("panel",$link);
				mysql_query("SET NAMES 'utf8'",$link);
				$mumu.= "<ul class='li_cabecera'>";
				$item2 = select(
						"carpeta,logo,fecha_creacion,dominio,nombre,calificacion",
						"proyectos",
						"where para_subir='1' and visibilidad='1' order by id asc limit 0,100"
						,0
				);
				foreach($item2 as $ite2){ 
					if($ite2['calificacion']==0) continue;
					$mumu.= "<li style='background-color:";
					switch($ite2['calificacion']){
						case "1": $mumu.= "#FAFA9D"; break;
						case "2": $mumu.= "#E8C3C3"; break;
						case "3": $mumu.= "#B3EFB3"; break;
					}
					$mumu.=";'>";
					$mumu.= "<a href='".str_replace(
													$vars['INTERNO']['CARPETA_PROYECTO'],
													$ite2['carpeta'],
													$vars['LOCAL']['url_publica']
													)."/panel'>"
													// .$vars['LOCAL']['url_publica']
													.strtoupper($ite2['nombre'])
													."</a>";
					$mumu.= "<li>";
				}
				$mumu.= "</ul>";
				mysql_select_db ($vars['LOCAL_MYSQL']['MYSQL_DB'],$link);
				mysql_query("SET NAMES 'utf8'",$link);
			}

			$mumu.= "</li>";
			$menus_d['proyectos']=$mumu;

		}

		if($Local==1){
		if($_COOKIE['admin']=='1'){
			if($vars['INTERNO']['ID_PROYECTO']!="0"){
				$menus_d['actualizar'] = "<a".
						" style='". ( ($Open)?'color:#8F9A20;':''). "'".
						" href='maquina.php?accion=updatecode'></span>ACTUALIZAR</a>";
			}
			$menus_d['archivos'] = "<a".
					" style='". ( ($Open)?'color:#BB0606;':''). "'".
					" href='maquina.php?accion=alllistado'></span>ARCHIVOS</a>";
		}
	}

	}




	if( $VALIDAR_SESION!='' and $_SESSION['usuario_id']!='' ){
	$menus_d['salir'] = "<a href='salir.php'></span>salir</a>";
	//	$tabla_usuarios
	//	$tabla_usuarios_id_sub
	if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){


	$mmmM = "<li class='menudown m_user' >";
	//$mmmM .= "<a href='custom/usuarios_acceso.php'>";
	if($_SESSION['usuario_datos_id']){
		$mmmM.=  ($_SESSION['usuario_datos_nombre'])?"<strong class='z'>". $_SESSION['usuario_datos_nombre'] ."</strong>":'';
	}else{
		//$mmmM.=  "<strong>". dato($sesion_login,$tabla_sesion,"where $sesion_id='".$_SESSION['usuario_id']."'") ."</strong>";
		$mmmM.=  "<strong class='z'>". $_SESSION['usuario_datos_nombre'] ."</strong>";
	}
	//$mmmM.= "</a>";


	if( ( $Open or $Local==1 )){

	foreach($objeto_tabla as $ot){
	if($ot['archivo_sub']!='' and $ot['archivo_sub']==strtolower($vars['GENERAL']['VALIDAR_SESION'])){
	//echo $ot['me']." - ".$ot['archivo_sub']." - ".strtolower($vars['GENERAL']['VALIDAR_SESION'])."<br>";
	$tables_usuarios[]=$ot;
	}
	}

	$usuars=select('id,nombre,password,id_permisos','usuarios_acceso',"where visibilidad='1' order by id_permisos desc, nombre asc",0,array(
		'permiso'	=>array('dato'=>array('nombre','usuarios_permisos','where id="{id_permisos}"')),
	));

	$mmenuu= '<ul class="li_cabecera">';

	$mmenuu.= '<li>';
	$mmenuu.='<a href="maquina.php?redirhome=1" class="links_menu" style="font-weight:bold;color:green;text-transform:uppercase;" >MASTER</a>';
	$mmenuu.='</li>';

	foreach($usuars as $usu){
if($usu['nombre']!=''){

	foreach($tables_usuarios as $tu){
$FiL=select("usuarios_acceso_nombre as nombre,usuarios_acceso_password as password",$tu['tabla'],"where id_sesion='".$usu['id']."'",0); if(sizeof($FiL)>0){
$FiLa=$FiL['0']; continue;
}
}

$mmenuu.= '<li>';
$mmenuu.= '<a href="#" onclick="javascript:changelogin(\''.$usu['nombre'].'\',\''.$usu['password'].'\');return false;" class="links_menu" >';
$mmenuu.= "<span style=' color:#000;'>".$usu['permiso']."</span> - ";
$mmenuu.= $usu['nombre'];
$mmenuu.=' - <span style="color:#000;font-weight:normal;">'.$usu['password'].'</span>';

if(sizeof($FiLa)){
	if($usu['nombre']==$FiLa['nombre'] and $usu['password']==$FiLa['password']){
	$mmenuu.=' <span style="color:green;font-weight:bold;">SI</span>';
	} else {
	$mmenuu.=' <span style="color:red;font-weight:bold;">NO</span>';
	}
	} else {
	$mmenuu.=' <span style="color:red;font-weight:normal;">orfan</span>';
	}

	$mmenuu.='</a>';
	$mmenuu.='</li>';
	unset($FiLa);
	}


	}
	$mmenuu.= '</ul>';
	$mmmM.= $mmenuu;

	}

	$mmmM.= "</li>";
	$menus_d['usuario']=$mmmM;
	}

	$menus_d['grupo']=  ($_SESSION['usuario_datos_nombre_grupo'])?"<li class='m_grupo'><strong class='z'>". $_SESSION['usuario_datos_nombre_grupo'] ."</strong></li>":'';



}
/*
 if( ( $VALIDAR_SESION!='' and $_SESSION['usuario_id']!='' ) or $Open ){
	$menus_d[] = "<a ". (($_GET['tab']=="estadisticas")?"class='selected'":"") ."  href='tools.php?tab=estadisticas'></span>estadísticas</a>";
$menus_d[] = "<a ". (($_GET['tab']=="feedback")?"class='selected'":"") ."  title='Reporte de errores, Ayúdenos a mejorar' href='tools.php?tab=feedback'></span>feedback</a>";
}
*/
if($vars['GENERAL']['DESARROLLO']=='1' and $vars['INTERNO']['ID_PROYECTO']!="0" and !$LOGIN){

    $menus_d['verdesarrollo_on'] ="<a href='".$SERVER['BASE'].$SERVER['ARCHIVO']."?verdesarrollo=". ( ($_SESSION['verdesarrollo']=='1')?'0':'1' )."'  style='";
    if($Open){
$menus_d[].=  ( ($_SESSION['verdesarrollo']=='1')?'background-color:#09A707;color:#FFF;':'background-color:#DE1010;color:#FFF;');
}
$menus_d['verdesarrollo_off'].="' title='".( ($_SESSION['verdesarrollo']=='1')?'apagar':'encender' )."'></span>". ( ($_SESSION['verdesarrollo']=='1')?'desactivar':'activar' )." ver desarollo</a>";
	}

	if($Local==1){

	if($LOGIN){

		// $bgsel="<select style='left:0px;top:0px;width:60px;height:auto;position:position:absolute;' onchange='setbgq(this.value);' onkeyup='setbgq(this.value);' >";
		// $CLI=($vars['INTERNO']['ID_PROYECTO']=="0")?'':'../../panel/';
		// $directorio_s = dir($CLI."img/bgs/");

		// while($fichero=$directorio_s->read()) {
		// 	if($fichero!='.' and $fichero!='..'  and !is_dir($CLI."img/bgs/".$fichero) ){
		// 		$ooppp[$fichero]= "<option ".( ("http://crazyosito.com/bgs/".$fichero==$BG_IMAGE)?"selected":"")." value='"."img/bgs/".$fichero."'>".$fichero."</option>";
		// 	}
		// }

		// $directorio_s->close();

		// ksort($ooppp);
		// $bgsel.= implode("",$ooppp);
		// $bgsel.= "</select>";
		// $bgsel.= "<script>";
		// $bgsel.= "function setbgq(bg){ \$(document.body).setStyles({'background-image':'url(";
		// $bgsel.= ($vars['INTERNO']['ID_PROYECTO']=="0")?"'+bg+'":"../../panel/'+bg+'";
		// $bgsel.= ")'});}";
		// $bgsel.= "</script>";

		// $menus_d[] = $bgsel;

	}

}

if($Local==1){



	/*
	 $mmmM = "<li class='menudown'><a onclick=\"javascript:edit_init('GENERAL','mostrar_toolbars','".( ($Open)?'0':'1' )."');return false;\" style='cursor:pointer;'>Config</a>";
	if( ( $Open or $Local==1 )){
	if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){
	include("maquina_opciones.php");
	$mmmM.= $mmenuu;
	}
	}
	$mmmM.= "</li>";
	$menus_d['config']=$mmmM;
	*/

}

$hhtml ='';
list($titulo_strong,$dos)=explode("::",$vars['GENERAL']['html_title']);
$hhtml.="<div class='menus' id='menumenu' >";
//echo implode("<span class='pale' style='float:right;margin-bottom:-15px;'>|</span>",$menus_d);
if($vars['GENERAL']['BACKUPADMIN']=='1'){
$menus_d[]= "<a href='backup.php'>backup</a>";
}

$hhtml.=implode("",$menus_d);
$hhtml.="</div>";

echo $hhtml;



echo "<div class='main_content'>";
			
if((strpos($_SERVER['SCRIPT_NAME'], "login.php")===false)){

echo '<a id="ic_menu" class="bl1 itr i_mm " title="Menú">MENÚ</a>';
echo '<a id="ic_filters" class="bl1 itr i_ff " title="Filtros">FILTROS</a>'; ?>
<script>
window.addEvent('domready',function(){ 
	$("ic_menu").addEvent('click',function(){ $('menu_main').toggleClass('showmenu'); });	
	$("ic_filters").addEvent('click',function(){ $('dfilters').toggleClass('showfilters'); });	
}); 
</script>
<?php
}
if(file_exists($img_logo)){
if(trim($img_logo)!=''){
?><a href="./" class="logo_panel"><img src="<?php echo $img_logo?>" align="absmiddle" border="0" /> </a><?php
}
} ?>

	<div style="float: left; margin-bottom: 5px;">
		<?php
		/* ?><a href="./" style='text-transform:uppercase; margin-left:7px; display:block; '><?php echo $titulo_strong;?></a><?php */
		?>
		<a href="./" class="link_header"><?php echo str_replace("Panel de Administración","Sistema",$html_titulo);?>
		</a>
		<?php
		?>
	</div>
	<?php
	/*if($Local and !$LOGIN){
	 if($Open){
?><div class="mensaje_header" style="clear:right;">
<b>
-ser proactivo<br />
-primero lo primero<br />
-trabajar con el fin en mente
</b>
</div><?php
?><div class="mensaje_header">
<b>
-el primer día tener una versión funcinal<br />
-el segundo día perfeccionarlo
</b>
</div><?php
}
}*/
echo "<div>";
if(
$Open
and ( substr($SERVER['BASE'],-7)=='custom/' or $SERVER['ARCHIVO']=='maquina.php' )
and $_SESSION['edicionpanel']=='1'
and (!in_array($_GET['accion'],array('config','alllistado')))
){
echo "<div id='eth'>";

if(substr($SERVER['BASE'],-7)=='custom/'){
echo $EDITOR_TEXTUAL_CAMPOS;
echo "<script> window.addEvent('domready',function(){ $('jjjson').focus(); }); </script>";
echo '<style>.dredre div textarea { height:16px;}</style>';
} else {
echo $EDITOR_TEXTUAL_OBJETO;
if($_GET['me']=='' and $_GET['open']=='' and $_GET['save']!='campos' and $_GET['accion']==''){
echo "<script> window.addEvent('domready',function(){ $('jjjsonproy').focus(); }); </script>";
}
echo '<style>.dredre div textarea { height:16px;}</style>';
}

echo "</div>";
if((substr($SERVER['BASE'],-7)=='custom/')){

echo "<li id='quickcontrols' class='quickcontrols'>";
if($Open){
echo '<a href="#" class="sss" onclick="javascript:togglerqc();return false;" style="float:right;margin-right:6px;">S</a>';
echo '<a href="maquina.php?me='.$this_me.'#blo_objetos" class="derech">P</a>';
echo '<a href="maquina.php?me='.$this_me.'#edicion_indices_sub" class="derech">C</a>';
echo '<a href="#" onclick="javascript:setqc(\'props\',0);return false;" style="float:right;margin-right:6px;" class="ed_campos">Campos</a>';
echo '<a href="#" onclick="javascript:setqc(\'props\',1);return false;" style="float:right;margin-right:6px;" class="ed_propiedades">Propiedades</a>';
echo "<div class='editar_campos'>";
$_GET['me']=$this_me;
include("editar_campos.php");
$ot=$objeto_tabla[$this_me];
include("editar_propiedades.php");
echo "</div>";

echo "<table class='tbl' align=right><tr><td style='border:0;'>";
foreach($indicesA as $inicial=>$indice){
		if($indice=='orden'){
continue;
}
echo "<a id='idid_".$indice."_".$ot['me']."' onclick=\"javascript:modificar_dato_valor('".$this_me."','".$indice."','".(($ot[$indice]=='1')?"0":"1")."'); return false;\" class='letra ". (($ot[$indice]=='1')?"onon":"offoff") ."' title='".strtoupper($indice)."' style='width:auto;' >";
echo str_replace($Replace4Str,$Replace4Ico,$indice);
echo "</a>";
		}
		echo "</td></tr></table>";

	}
}
echo "<script>setqc('props',1);</script>";
}
echo "</li>";


echo "</div>";

$MEME=($_GET['me'])?$_GET['me']:$this_me;
if( $_SESSION['edicionpanel']=='1' or 1){
?>
	<script>
function modificar_dato_valor(me,indice,valor){
datos = {
	me			: me,
	indice		: indice,
	valor		: valor
};
new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
if(eee.trim()!=''){ alert(eee);
} else {
$('idid_'+indice+'_'+me).removeClass('onon');
$('idid_'+indice+'_'+me).removeClass('offoff');
$('idid_'+indice+'_'+me).addClass((valor==1)?'onon':'offoff');
$('idid_'+indice+'_'+me).removeProperty('onclick');
$('idid_'+indice+'_'+me).setProperty('onclick','javascript:modificar_dato_valor(\''+me+'\',\''+indice+'\',\''+( (valor==1)?'0':'1' )+'\'); return false;');

	<?php if($_GET['me']!=''){?>
		racargar_partes();
	<?php } ?>
}
} } ).send();
}
function procesar_objt(){
datos = {
	me			: '<?php echo $MEME?>',
	'indice'	: 'json',
	'json'		: $('jjjson').value
};
new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
if(eee.trim()!='')
	alert(eee);
else
<?php if($_GET['me']){ ?>
	location.href='?rn=<?php echo rand();?>&me=<?php echo $MEME;?>&save=campo#edicion_indices_sub';
<?php } else { ?>
	location.href='custom/<?php echo $SERVER['ARCHIVO'];?>?rn=<?php echo rand();?>#eth';
<?php } ?>
} } ).send();
}

</script>
	<?php
}

}

if($objeto_tabla[$this_me]['crear_quick']=='1'){ ?>
	<style>
#titulo_crear {
	display: none;
}
/*#linea_crear { display:none; }*/
#abri_cerrar_crear {
	display: none;
}

.linea_form_mensaje {
	display: none;
}
/*.linea_form label { display:none; }*/
.formulario label {
	width: 80px;
}
</style>
	<?php }

	$ACCESO_PERMITIDO=(($VALIDAR_SESION!='' and $_SESSION['usuario_id']!='') or $_COOKIE['admin']==1)?1:0;

	if($ACCESO_PERMITIDO and $this_me){
/*
 echo '<select>';
foreach($ItemsPAGES as $ip){ echo "<option id='".$ip['id']."' ".(($ip['id']==$_SESSION['page'])?'selected':'').">".$ip['nombre']."</option>>";}
echo '</select>';
*/
if(sizeof($ItemsPAGES)>0){
echo '<ul class="supra_menu">';
if($HAVE_MODULO_INDEPENDIENTE){
echo "<li ".(($ip['id']==$_SESSION['page'])?'class="selected"':'')."><a href='actions.php?accion=changepage&id='>Módulos</a>
 						</li>";
}
foreach($ItemsPAGES as $ip){
echo "<li ".(($ip['id']==$_SESSION['page'])?'class="selected"':'')."><a href='actions.php?accion=changepage&id=".$ip['id']."'>".$ip['nombre']."</a>
		</li>";
}
echo '</ul>';
}

if(sizeof($ItemsWEBS)>0){
echo '<ul class="supra_menu">';
echo "<li ".(($ip['id']==$_SESSION['web'])?'class="selected"':'')."><a href='actions.php?accion=changeweb&id='>Módulos</a>
			</li>";
foreach($ItemsWEBS as $ip){
echo "<li ".(($ip['id']==$_SESSION['web'])?'class="selected"':'')."><a href='actions.php?accion=changeweb&id=".$ip['id']."'>".$ip['nombre']."</a>
</li>";}
echo '</ul>';
}
?>
<?php
/////////////////////
}
//prin($_SESSION);
//prin($SERVER);
//prin($_COOKIE);
include($objeto_tabla[$this_me]['onload_include']);
echo $objeto_tabla[$this_me]['onload_script'];

//prin($_COOKIE);

if(!($_COOKIE['ap']!='' or $_COOKIE['admin']=='1' or in_array($SERVER['ARCHIVO'],$validos) or in_array($SERVER['ARCHIVO'],array('maquina.php','login.php','app.php')))){
die("<div class='sinacceso'>No tiene permiso para acceder a éste módulo<br><a href='#' onclick='window.history.back();'>VOLVER</a></div>");
}

?>