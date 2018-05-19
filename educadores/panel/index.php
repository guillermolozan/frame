<?php //á

include("lib/includes.php");
if(file_exists($DIR_CUSTOM.$FILE_DEFAULT)){


	$permisos=$PERMISOS_USUARIO;
	if(trim($permisos)=='' or trim($permisos)=='*'){
		header("Location: ".$DIR_CUSTOM.$FILE_DEFAULT);
	} else {
		//prin($permisos);
		$permisos=str_replace("\n","",$permisos);
		$permisos=explode(",",$permisos);
		foreach($permisos as $permiso){
			list($objeto,$params)=explode("?",$permiso);
			$Permitidos[]=$objeto;
		}

		$sepuede=0;
		foreach($Permitidos as $uno=>$dos){
			if($objeto_tabla[$dos]['archivo'].".php"==$FILE_DEFAULT){
				$sepuede=1; continue;
			}
		}
		$FILE_DEFAULT=($sepuede)?$FILE_DEFAULT:$objeto_tabla[$Permitidos[0]]['archivo'].".php";

		header("Location: ".$DIR_CUSTOM.$FILE_DEFAULT);

	}

} else {
	header("Location: maquina.php");
}
