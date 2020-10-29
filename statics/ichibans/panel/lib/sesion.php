<?php
session_start(); // Iniciar variables de sesión

$VALIDAR_SESION=(@$_COOKIE["admin"]=="1")?"":$VALIDAR_SESION;

$HAVE_MODULO_INDEPENDIENTE=1;

if(trim($VALIDAR_SESION)!='' and  $Proceso != 'login'){

$datos_tabla = procesar_objeto_tabla($objeto_tabla[$VALIDAR_SESION]);
$sesion_id			=	$datos_tabla['id'];
$sesion_vis			=	($datos_tabla['vis']=='')?"":" and ".$datos_tabla['vis']."='1' ";
$sesion_password	=	$datos_tabla['sesion_password'];
$sesion_login		=	$datos_tabla['sesion_login'];
$sesion_permisos	=	$datos_tabla['sesion_permisos'];
$tabla_sesion		=	$datos_tabla['tabla'];
$sesion_completo	=	'nombre_completo';

$sesion_datos_id_sub='id_sesion';

foreach($objeto_tabla as $canp){
	
	foreach($canp['campos'] as $campos){
		if($campos['campo']==$sesion_datos_id_sub and $campos['subform']=='1'){
			//list($ca,$ta)=explode("|",$campos['opciones']);
			//list($id,$resto)=explode(",",$campos['opciones']);
			if(dato('id',$canp['tabla'],"where id_sesion='".$_SESSION['usuario_id']."'",0)!=''){ 
			$tabla_sesion_datos	= $canp['tabla']; 
			$tabla_sesion_datos_objeto = procesar_objeto_tabla($canp);
			}
		}
	}
	/*
	if($canp['archivo_sub']==$tabla_sesion){
		$tabla_sesion_datos	= $canp['tabla'];
		foreach($canp['campos'] as $campos){
			if(enhay($campos['opciones'],$tabla_sesion)){	$sesion_datos_id_sub=$campos['campo'];	}
		}
	}
	*/
	if($canp['archivo']==$tabla_sesion){
		foreach($canp['campos'] as $campos){
			if($campos['campo']==$sesion_permisos){ list($uno,$tabla_permisos)=explode("|",$campos['opciones']);	}
		}
	}	
}

//prin($tabla_sesion_datos);

if($tabla_permisos){
	foreach($objeto_tabla as $canp){
		if($canp['archivo']==$tabla_permisos){
			foreach($canp['campos'] as $campo=>$c){
				if(in_array($campo,array('nombre','texto','multiusuario','per_webs','per_pages'))){
				$campos_permisos[]=$campo;
				}
			}
		}	
	}
}

$NombreCompleto=dato($sesion_completo,$tabla_sesion,"where $sesion_id='".$_SESSION['usuario_id']."'");
$_SESSION['usuario_datos_nombre']=($NombreCompleto)?$NombreCompleto:dato($sesion_login,$tabla_sesion,"where $sesion_id='".$_SESSION['usuario_id']."'");

$Permisos=fila($sesion_permisos,$tabla_sesion,"where $sesion_id='".$_SESSION['usuario_id']."'",0,
array('permisos'=>array('fila'=>array($campos_permisos,$tabla_permisos,'where id={'.$sesion_permisos.'}',0))));
$TIPO_USUARIO	 =$Permisos['permisos']['multiusuario'];
$PERMISOS_USUARIO=$Permisos['permisos']['texto'];	
$PERMISOS_PAGE=$Permisos['permisos']['per_pages'];	
$PERMISOS_WEBS=$Permisos['permisos']['per_webs'];

//prin($Permisos);

if($tabla_sesion_datos){	
	if($TIPO_USUARIO!='1'){
		//prin($tabla_sesion_datos_objeto);
		$rp=0;
		foreach($tabla_sesion_datos_objeto['form'] as $canpos){
			if($canpos['opciones']!='' and $canpos['tipo']=='hid' and $rp==0 and $tabla_sesion_datos_objeto['group']==$canpos['campo']){
				$oparent=$canpos;
				$rp++;
			}	
		}
		$usuar=fila($tabla_sesion_datos_objeto['query'],$tabla_sesion_datos,"where $sesion_datos_id_sub='".$_SESSION['usuario_id']."'",0);	
		$_SESSION['usuario_datos_id']=$usuar['id'];
		$_SESSION['usuario_datos_nombre']=$usuar['nombre']." ".$usuar['apellidos'];
		if($oparent){
				list($primO,$tablaO)=explode("|",$oparent['opciones']);
				list($idO,$camposO)=explode(",",$primO);
				$camposOA=array();
				$camposOA=explode(";",$camposO);
				$bufy='';
				foreach($camposOA as $COA){
				$bufy.= select_dato($COA,$tablaO,"where ".$idO."='".$usuar[$oparent['campo']]."'")." ";
				}	
				$_SESSION['usuario_datos_nombre_grupo'] = $bufy;
		}

	} else {
		unset($tabla_sesion_datos);
	}
}

//prin($_SESSION);
//prin(array($tabla_usuarios,$tabla_usuarios_id_sub));

if( $tabla_sesion!='' and $sesion_id!='' and $sesion_password!='' and $sesion_login!='' ){

	// verificar que no sea un usuario logueado
	if(!isset($_SESSION['usuario_id']))
	{    // si es un usuario que retorna al sitio y ha guardado su sesión, recuperar sus variables
		$c_usuario = $_COOKIE['c_usuario'];
		$c_password  = strtolower($_COOKIE['c_password']);
	
		if($c_usuario != "" and $c_password != ""){
		
			$_SESSION['usuario_id'] = select_dato(
				$sesion_id,
				$tabla_sesion,
				"where $sesion_login='$c_usuario' and $sesion_password='$c_password' $sesion_vis "
				,0
				);  
	
		}
	}
	
	$usuario_id_sesion       = $_SESSION['usuario_id'];
	
	if($usuario_id_sesion=='' and $LoadWithoutSession!=1){ 
		header("Location: " . ((!(strpos($_SERVER['SCRIPT_NAME'], $DIR_CUSTOM)===false)) ? "../login.php" : "login.php" ) ); 	
	}

}

}

/*
foreach($objeto_tabla as $canp){
	if($canp['archivo']==$tabla_sesion){
		foreach($canp['campos'] as $campos){
			if($campos['campo']==$sesion_permisos){ list($uno,$tabla_permisos)=explode("|",$campos['opciones']);	}
		}
	}	
}
*/

//unset($_SESSION['page']);
if($objeto_tabla[$vars_global['PAGES']] and $vars_global['MULTIPAGES']=='1'){
	$filtroPAGES=($PERMISOS_PAGE)?" and id in ($PERMISOS_PAGE)":"";
	$ItemsPAGES=select("id,nombre",$objeto_tabla[$vars_global['PAGES']]['tabla'],"where visibilidad=1 $filtroPAGES ",0);
	foreach($ItemsPAGES as $iis){ $IdPageS[]=$iis['id']; }	
	if(sizeof($ItemsPAGES)>0){ $filtrar_page=1; }
}
//unset($_SESSION['web']);
if($objeto_tabla[$vars_global['WEBS']] and $vars_global['MULTIWEBS']=='1'){
	$filtroWEBS=($PERMISOS_WEB)?" and id in ($PERMISOS_WEB)":"";
	$ItemsWEBS=select("id,nombre",$objeto_tabla[$vars_global['WEBS']]['tabla'],"where visibilidad=1 $filtroWEBS ",0);
	foreach($ItemsWEBS as $iis){ $IdWebS[]=$iis['id']; }	
	if(sizeof($ItemsWEBS)>0){ $filtrar_web=1; }
}

//prin($_SESSION);
?>