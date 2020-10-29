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

switch($_GET['paso']){

////////////////////////////////////////////////////////
///////////////////    FIRST    ////////////////////////
////////////////////////////////////////////////////////
case "first":
?>
    <div class="formApp">
	
		<h2>Confirma que desea crear directorio WEB?</h2>
        <form method="post" action="pop.php?paso=confirm<?php echo $params;?>">    
        <select id='proyecto' name="proyecto" >		
		<?php foreach($projects_devel as $it){ 
        echo "<option ".(($this_project['semilla']==$it['id'])?'selected':'')." value='".$it['carpeta']."|".$it['dominio']."'>".$it['nombre']."</option>";
        } ?>
		</select>		
	    <input type='submit' value='SI' />    
		</form>		
	</div>
<?php 
break;     		
case "confirm":		

	chdir("../");

	list($Carpeta,$Dominio)=explode("|",$_POST['proyecto']);

	$director=array();
	
	$directorios=get_dirs_tree($Carpeta);

	foreach($directorios as $directorio){
		if(
		$Carpeta."/"==$directorio
		or
		(!(strpos($directorio,$Carpeta."/web")===false))
		or
		(!(strpos($directorio,$Carpeta."/swf")===false))
		){
			$director[]=$directorio;
		}
	}
	
	$directorios=$director;
	
	foreach($directorios as $directorio){
	
		mkdir(str_replace($Carpeta,$this_project['carpeta'],$directorio));
		$Directorio = dir($directorio."/");
		while($fichero=$Directorio->read()) {
			if($fichero!='.' and $fichero!='..'  and !is_dir("$directorio/".$fichero) ){

				if($fichero=='sitemap.xml'){
				
					continue;

				} elseif($fichero=='.htaccess' or $fichero=='robots.txt'){
				
					$htaccess_buffer=implode("",file($directorio.$fichero));
					$htaccess_buffer_2=str_replace($Dominio,$this_project['dominio'],$htaccess_buffer);
					$htaccess_buffer_2=str_replace("/$Carpeta/","/".$this_project['carpeta']."/",$htaccess_buffer_2);
					
					$f1=fopen(str_replace($Carpeta,$this_project['carpeta'],$directorio.$fichero),"w+");
					fwrite($f1,$htaccess_buffer_2);
					fclose($f1);
				
				} else {						
				
					echo str_replace($Carpeta,$this_project['carpeta'],$directorio.$fichero)." "; 
					echo (copy($directorio.$fichero,str_replace($Carpeta,$this_project['carpeta'],$directorio.$fichero)))?"<span style='color:green 	;'>(ok)</span>":"<span style='color:red;'>(ko)</span>";
					echo "<br>";
				
				}
				
			}
		}
		$Directorio->close();				
	
	}
	
break;
}
		
	
	
?>