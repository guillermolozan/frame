<?php

if($_GET['ajax']=='1'){
	chdir("../../");	
	include("lib/global.php");
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");
	include("lib/webutil.php");
	include("config/tablas.php");
	include("lib/sesion.php");
	include("lib/playmemory.php");
	include("lib/class.phpmailer.php");
}

require_once("lib/ini_manager.php");


$this_project = fila(
	"carpeta,logo,fecha_creacion,nombre,url,dominio,ftp_user,ftp_pass,ftp_root,semilla,tipo,firma,email",
	"proyectos",
	"where id='".$_GET['id']."' order by id asc limit 0,100"
	,0
	,array(
		'url_logo'=>array('archivo'=>array('proy_imas','{fecha_creacion}','{logo}',''))
		)
	);

$projects_devel = select(
	"carpeta,logo,fecha_creacion,dominio,nombre,id",
	"proyectos",
	"where para_subir='1' order by id asc limit 0,100"
	,0
	); 	
	

//$_GET['paso']=($_GET['paso'])?$_GET['paso']:'upload';

switch($_GET['paso']){

////////////////////////////////////////////////////////
///////////////////    FIRST    ////////////////////////
////////////////////////////////////////////////////////
case "first":
?>
    <div class="formApp">
    <h2>Confirmas que deseas crear archivos de Config?</h2>
    <form method="post" action="pop.php?paso=confirm<?php echo $params;?>">    
    <select id='proyecto' name="proyecto" onchange='load_tables(this.value);' >
    <option value='nuevo'>Nuevo</option>
    <?php foreach($projects_devel as $it){ 
    echo "<option ".(($this_project['semilla']==$it['id'])?'selected':'')." value='".$it['carpeta']."|".$it['dominio']."'>".$it['nombre']."</option>";
    } ?>
    </select>    
    <input type='submit' value='SI' />
    </form>
<script>
function load_tables(val){
	var vals = new Array();
	vals=val.split("|");
//	alert(vals[0]);	
}
</script>    
    </div>    
<?php
break;
////////////////////////////////////////////////////////
///////////////////    CONFIRM   ///////////////////////
////////////////////////////////////////////////////////
case "confirm":

chdir("../");

@mkdir($this_project['carpeta']."/panel/config");
$archivos=array("config.ini","memory.txt");
foreach($archivos as $archis){
	copy("panel/config/$archis",$this_project['carpeta']."/panel/config/$archis");
}
//echo getcwd()."<br>";
?>
<div class="formApp">
<?php
echo "copiando tablas.php<br>";

if($_REQUEST['proyecto']=='nuevo'){
//if(!file_exists($this_project['carpeta']."/panel/config/tablas.php")){

	$TABLA_CONTENT=get_file("panel/config/tablas_BASE.php");
	
	$f2=fopen("tablas_temporal.php","w+");
	fwrite($f2,"<?php\n".$TABLA_CONTENT."\n?>");
	fclose($f2); 

	copy("tablas_temporal.php",$this_project['carpeta']."/panel/config/tablas.php");
	
	@unlink("config/tablas_temporal.php");
	
	curl_get_file_contents(str_replace("panel/base/","",$SERVER['BASE']).$this_project['carpeta']."/panel/maquina.php?accion=borrarmemory&clave=".CLAV);
	
	
} else {

	list($Carpeta,$Dominio)=explode("|",$_REQUEST['proyecto']);
	
	$carpetaConfigVars=get_vars_from_config($Carpeta."/panel/config/config.ini");
	copy($Carpeta."/panel/config/tablas.php",$this_project['carpeta']."/panel/config/tablas.php");
	copy($Carpeta."/panel/config/memory.txt",$this_project['carpeta']."/panel/config/memory.txt");	
	
	if(file_exists($Carpeta."/panel/base2")){	
		@mkdir($this_project['carpeta']."/panel/base2");
		$directorio = dir($Carpeta."/panel/base2");
		while($fichero=$directorio->read()){
			if($fichero!='.' and $fichero!='..'){ copy($Carpeta."/panel/base2/".$fichero,$this_project['carpeta']."/panel/base2/".$fichero); } 
		}
		$directorio->close();	
	}
	if(file_exists($Carpeta."/panel/base2/apps")){
		@mkdir($this_project['carpeta']."/panel/base2/apps");
		$directorio = dir($Carpeta."/panel/base2/apps");
		while($fichero=$directorio->read()){
			if($fichero!='.' and $fichero!='..'){ copy($Carpeta."/panel/base2/apps/".$fichero,$this_project['carpeta']."/panel/base2/apps/".$fichero); } 
		}
		$directorio->close();
	}

}

$logo_local=$this_project['url_logo'];
$flogo=explode("/",$this_project['url_logo']);
$exxx=explode(".",$flogo[sizeof($flogo)-1]);
$ext=$exxx[1];

$logo_destino=$this_project['carpeta']."/panel/img/logo.".$ext;
echo "copy $logo_local => $logo_destino<br>";

copy($logo_local,$logo_destino);

//echo file_exists($this_project['carpeta']."/panel/config/config.ini")?"logo actualizado correctamente":"error al actualizar config.ini";

echo "<br>";

set_params_ini("GENERAL","FILE_DEFAULT", $carpetaConfigVars['GENERAL']['FILE_DEFAULT'], $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("GENERAL","img_logo", "img/logo.".$ext, $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("REMOTE_FTP","ftp_files_host", '"'.$this_project['dominio'].'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("REMOTE_FTP","ftp_files_user", '"'.$this_project['ftp_user'].'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("REMOTE_FTP","ftp_files_pass", '"'.$this_project['ftp_pass'].'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("REMOTE_FTP","ftp_files_root", '"'.$this_project['ftp_root'].'"', $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("LOCAL_MYSQL","MYSQL_DB", "panel_".$this_project['carpeta'], $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("REMOTE","httpfiles", "http://".str_replace("//","/",$this_project['url']."/"), $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("REMOTE","url_publica", "http://".str_replace("//","/",$this_project['url']."/"), $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("LOCAL","httpfiles", "http://".str_replace("//","/",$this_project['url']."/"), $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("LOCAL","url_publica", "http://127.0.0.1/sistemapanel/".$this_project['carpeta'], $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("REMOTE_MYSQL","MYSQL_USER", '"'.substr($this_project['ftp_user']."_guillermo",0,14).'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("REMOTE_MYSQL","MYSQL_PASS", "lozan159357", $this_project['carpeta']."/panel/config/config.ini" );
$DB_NAME=($this_project['ftp_root']=='/www/')?'"'.substr($this_project['ftp_user']."_panel",0,14).'"':'"'.substr($this_project['ftp_user']."_".str_replace("/","",str_replace("/www/","",$this_project['ftp_root']))."panel",0,16).'"';
set_params_ini("REMOTE_MYSQL","MYSQL_DB", $DB_NAME, $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("INTERNO","ID_PROYECTO",'"'.$_GET['id'].'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("INTERNO","CARPETA_PROYECTO",'"'.$this_project['carpeta'].'"', $this_project['carpeta']."/panel/config/config.ini" );

switch($this_project['firma']){
case "1":
	set_params_ini("GENERAL","by_label", 'Prodiserv', $this_project['carpeta']."/panel/config/config.ini" );
	set_params_ini("GENERAL","by_url", 'http://prodiserv.com', $this_project['carpeta']."/panel/config/config.ini" );	
	set_params_ini("GENERAL","emails_administrador", 'guillermolozan@gmail.com,wtavara@prodiserv.com', $this_project['carpeta']."/panel/config/config.ini" );	
	$emails_admin='guillermolozan@gmail.com,wtavara@prodiserv.com';
break;
case "2":
	set_params_ini("GENERAL","by_label", 'Websentidos', $this_project['carpeta']."/panel/config/config.ini" );
	set_params_ini("GENERAL","by_url", 'http://websentidos.com', $this_project['carpeta']."/panel/config/config.ini" );
	set_params_ini("GENERAL","emails_administrador", 'guillermolozan@gmail.com', $this_project['carpeta']."/panel/config/config.ini" );		
	$emails_admin='guillermolozan@gmail.com';	
break;
}

set_params_ini("GENERAL","html_titulo", '"'.utf8_encode("Sistema").'"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("GENERAL","html_title", '"'.ucfirst($this_project['nombre'])." :: ".utf8_encode("Panel de Administración".'"'), $this_project['carpeta']."/panel/config/config.ini" );

//set_params_ini("GENERAL","FILE_DEFAULT", "maquina.php", $this_project['carpeta']."/panel/config/config.ini" ); //mejorar


set_params_ini("GENERAL","MODO_LOCAL_ARCHIVOS_REMOTOS",'"1"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("GENERAL","dominio_estadisticas", "http://".$this_project['dominio'], $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("GENERAL","IMPORTARDB",'"1"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("GENERAL","EXPORTARDB",'"1"', $this_project['carpeta']."/panel/config/config.ini" );

set_params_ini("GENERAL","UPLOAD_FTP",'"0"', $this_project['carpeta']."/panel/config/config.ini" );
set_params_ini("GENERAL","DESARROLLO",'"0"', $this_project['carpeta']."/panel/config/config.ini" );


$sql0="create database panel_".$this_project['carpeta'].";";

include($this_project['carpeta']."/panel/config/tablas.php");

$sql1= script_create_table($objeto_tabla['USUARIOS_ACCESO']);

$sql2= "insert into usuarios_acceso (fecha_creacion,visibilidad,nombre,password) values (now(),1,'administrador','".$this_project['carpeta']."');";

echo mysql_query($sql0)?"bd panel_".$this_project['carpeta']." creada exitosamente":"error al crear bd panel_".$this_project['carpeta']."";
echo "<br>";
echo (mysql_select_db ("panel_".$this_project['carpeta'],$link))?"bd seleccionda<br>":"bd no pudo ser seleccionada";
echo "<br>";
echo (mysql_query($sql1,$link))?"usuarios_acceso creada":"no se pudo crear usuarios_acceso";
echo "<br>";
if(contar("usuarios_acceso","where 1 ")==0){    
echo (mysql_query($sql2,$link))?"primer registro":"no se pudo crear primer registro"; echo "<br>";
}
$array_variables['titulo_home']=$this_project['nombre'];
$array_variables['emails_admin']=$emails_admin;
$array_variables['email_logo']='particular/header/logo.jpg';
$array_variables['email_fromname']=$this_project['nombre'];
$array_variables['email_from']=($this_project['email'])?$this_project['email']:$this_project['carpeta'].'@'.$this_project['dominio'];
$array_variables['simbolo_moneda']='S/.';
$array_variables['nombre_empresa']=$this_project['nombre'];
$array_variables['titulo_web']=$this_project['nombre'];
$array_variables['anaytics_code']="";


$sql3= script_create_table($objeto_tabla['CONFIGURACIONES_ROOT']);
echo (mysql_query($sql3,$link))?"configuraciones_root creada":"no se pudo crear usuarios_acceso";
echo "<br>";

if(contar("configuraciones_root","where 1")==0){    

	foreach($array_variables as $variable=>$valor){
		$SqL="insert into configuraciones_root (fecha_creacion,variable,valor) values (now(),'$variable','$valor');";
		echo (mysql_query($SqL,$link))?"ok":"ko";
		echo "<br>";
	}

}

$array_variables2['telefonos_publicos']="0000000";
$array_variables2['emails_publicos']=($this_project['email'])?$this_project['email']:$this_project['carpeta'].'@'.$this_project['dominio'];
$array_variables2['direccion_publica']='av direccion 000';

$array_variables2['telefonos_email']="0000000";
$array_variables2['emails_admin']=($this_project['email'])?$this_project['email']:$this_project['carpeta'].'@'.$this_project['dominio'];
$array_variables2['direccion_email']='av direccion 000';

$sql4= script_create_table($objeto_tabla['CONFIGURACIONES']);
echo (mysql_query($sql4,$link))?"configuraciones creada":"no se pudo crear usuarios_acceso";
echo "<br>";

if(contar("configuraciones","where 1")==0){    

	foreach($array_variables2 as $variable=>$valor){
		$SqL="insert into configuraciones (fecha_creacion,variable,valor) values (now(),'$variable','$valor');";
		echo (mysql_query($SqL,$link))?"ok":"ko";
		echo "<br>";
	}

}

curl_get_file_contents(str_replace("panel/base/","",$SERVER['BASE']).$this_project['carpeta']."/panel/maquina.php?accion=borrarmemory&clave=".CLAV);

?>
</div>
<?php
break;
}

function get_file($file){

$FILE_A=file($file);
$FILE_A[0]='';
$FILE_A[sizeof($FILE_A)-1]='';

return implode("",$FILE_A);

}

function get_vars_from_config($archivo){
	$parse= parse_ini_file($archivo,true);
	return $parse;
}


?>
