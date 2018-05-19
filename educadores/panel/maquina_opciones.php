<?php

$tablas_creadas=array();

$sql = "show tables";
$result=mysql_query($sql,$link);
$total=mysql_num_rows($result);
if($total>0){
	while ($row = mysql_fetch_row($result)){
			$tablas_creadas[] = $row[0];
	}
}

$tblsinc=array();
$cam='sincromysql';
foreach($objeto_tabla as $ot){
if( ($saved[$ot['me']][$cam]==1) and (in_array($ot['tabla'],$tablas_creadas)) ){ $tblsinc[]=$ot['tabla']; }
}

$tablassincro="&tablas=".implode(",",$tblsinc);


$mmenuu.= '<ul class="li_cabecera">';
//$mmenuu.= '<li><a href="'.$SERVER['PANEL'].'" class="links_menu iconos ico_home" style="float:none;display:block;margin:0 1px;width:auto;" title="home"></a></li>';
$mmenuu.= '<li><a href="maquina.php?tab=documentos" class="links_menu" title="documentos">docs</a></li>';
$mmenuu.= '<li><a href="maquina.php?accion=config" class="links_menu" title="config" style="background-color:#FFF; color:#000;">conf ('.$get_num_vars.')</a></li>';
$mmenuu.= '<li><a href="maquina.php?edicionpanel='. ( ($_SESSION['edicionpanel']=='1')?'0':'1' ).'" class="links_menu" style="background-color:'.( ($_SESSION['edicionpanel']=='1')?'#09A707':'#DE1010').';color:#FFF;" title="'.( ($_SESSION['edicionpanel']=='1')?'apagar':'encender').' edición panel">panel</a></li>';

	if($Local=='1'){

   		if($vars['INTERNO']['ID_PROYECTO']!="0"){

        $mmenuu.= '<li><a href="maquina.php?edicionweb='.(($_SESSION['edicionweb']=='1')?'0':'1').'" class="links_menu" style="background-color:'.(($_SESSION['edicionweb']=='1')?'#09A707':'#DE1010').';color:#FFF;" title="'.(($_SESSION['edicionweb']=='1')?'apagar':'encender').' edición web">web</a></li>';

        $mmenuu.= '<li><a href="maquina.php?accion=updatepanel" class="links_menu" title="subir archivos de custom">▲subir custom</a></li>';

        $mmenuu.= '<li><a href="'. str_replace("[http]","http://",str_replace("//","/",str_replace("http://","[http]",$vars['REMOTE']['url_publica'])."/".$vars['GENERAL']['DIRECTORIO_PANEL'])).'" class="links_menu" style="color:#F00; background-color:#000;" target="_blank" title="panel remoto">remoto</a></li>';

        $mmenuu.= '<li><a href="maquina.php?accion=bajarconfig" class="links_menu" title="bajar archivos de config">▼down</a></li>';
        $mmenuu.= '<li><a href="maquina.php?accion=subirconfig" class="links_menu" title="subir archivos de config">▲up</a></li>';

    	}


    	if($vars['GENERAL']['EXPORTARDB']=='1'){
        $mmenuu.= '<li><a href="maquina.php?accion=exportdb'.$tablassincro.'" class="links_menu" style="background-color:#003399; color:#FFFFFF;" title="export DB" >▲export</a></li>';
		}

    	if($vars['INTERNO']['ID_PROYECTO']!="0"){
			if($vars['GENERAL']['IMPORTARDB']!='0'){
            $mmenuu.= '<li class="links_menu" style="height:auto;text-align:right; background-color:#030;" >';
            $mmenuu.= '<input type="text" id="importDBdominio" style="width:50px; float:left; margin:1px 0 0 1px; border:0; padding:0; font-size:9px; height:13px;" />';
			$mmenuu.= '<span style="cursor:pointer;color:white;" onclick="javascript:location.href=($v(\'importDBdominio\')==\'\')?\'maquina.php?accion=importdb'.$tablassincro.'\':\'maquina.php?accion=importdb'.$tablassincro.'&domain=\'+$v(\'importDBdominio\');return false;" rel="nofollow" style="color:#fff;margin:0px;padding:0;border:0;float:none; background-color:transparent; text-decoration:none;" title="import DB" >▼import&nbsp;</span>';
			$mmenuu.= '</li>';
        	}
    	}

        $mmenuu.= '<li><a href="maquina.php?accion=creardbremota" class="links_menu" title="subir archivos de config">crear DB remota</a></li>';

	 }

	$mmenuu.= '<li><a href="maquina.php?tab=libraries" class="links_menu" title="librerias">libs</a></li>';
	$mmenuu.= '<li><a href="maquina.php?accion=phpinfo" class="links_menu" title="phpinfo"  >info</a></li>';
	$mmenuu.= '<li><a href="removerbom/remover_bom.php" class="links_menu" title="remover bom" target="_blank">borrar bom</a></li>';
    $mmenuu.= '<li><a href="maquina.php?accion=recrearcustom" class="links_menu" title="recrear archivos custom" >recrear custom</a></li>';

	if($vars['INTERNO']['ID_PROYECTO']!="0"){

		$mmenuu.= '<li><a href="maquina.php?accion=borrarcustom" class="links_menu" title="borrar archicos de carpeta custom" >borrar custom</a></li>';
		$mmenuu.= '<li><a href="maquina.php?accion=borrarmemory" class="links_menu" title="resetear archivo de memoria" >reset mem</a></li>';
		$mmenuu.= '<li><a href="<?php echo $httpfiles; ?>:2082/3rdparty/phpMyAdmin/index.php?lang=es-utf-8" class="links_menu" target="_blank" title="my admin" >phpmyadmin</a></li>';

		if($Local=='1'){
			$mmenuu.= '<li><a href="maquina.php?accion=makedump'.$tablassincro.'" class="links_menu" title="make dump" style="background-color:#000;color:#FFF;" >make dump</a></li>';
		 } else {
			$mmenuu.= '<li><a href="maquina.php?accion=importfromdump" class="links_menu" title="import from dump" style="background-color:#000;color:#FFF;" >import from dump</a></li>';
		 }

	}
		$mmenuu.= '<li><a href="maquina.php?accion=esquema" class="links_menu" title="ESQUEMA" style="background-color:#333;color:yellow;"  >ESQUEMA</a></li>';

$mmenuu.= '</ul>';

/*
<li><a style="position:absolute; text-decoration:none; top:1px; right:1px; font-family:verdana; font-weight:bold;
background-color:#000000; color:#FFFFFF;">X</a></li>
*/
/* ?><div><?php */
/*
	foreach($objeto_tabla as $ot){

		echo '<li><a href="maquina.php?me='.$ot['me'].'" class="objetos" style="';
		echo ($_GET['me']==$ot['me'])?" color:#000;background-color:#FFFF99;":"";
		echo '">'.$ot['tabla'].'</a></li>';

	}
*/
/* ?></div><?php
*/
?>