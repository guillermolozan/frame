<?php //á

require_once('class.phpmailer.php');

$dominio='http://globalvsc.com';




chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");
	include("lib/webutil.php");
	
	require_once( "lib/ini_manager.php" );
	
chdir("base2");

if($_GET['id_usuario']!=''){

$item= select_fila(
        "nombre,apellidos_paterno,apellidos_materno,genero,dni,fecha_nacimiento,direccion,departamento,provincia,distrito,forma_contacto,telefono_casa,telefono_oficina,telefono_celular,promociones,email,password,fecha_creacion"
        ,"usuarios"
        ,"where id='".$_GET['id_usuario']."' and  visibilidad='1' "
        ,0
		,array(
			'fecha_nacimiento'=>array('fecha_formato'=>array('fecha'=>'{fecha_nacimiento}','formato'=>'6')),
			'departamento'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'geo_departamentos','donde'=>'where id={departamento}')),
			'provincia'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'geo_provincias','donde'=>'where id={provincia}')),
			'distrito'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'geo_distritos','donde'=>'where id={distrito}'))
		)
        );

}


?>
<html>
<style>
.var { width:140px; color:#666; text-transform:uppercase; font-family:Verdana, Geneva, sans-serif; font-size:10px;}
.valor { width:500px; font-family:Verdana, Geneva, sans-serif; font-size:11px; }
</style>
<?php
web_render_data($item,"nombre,apellidos_paterno|apellido paterno,dni,fecha_nacimiento|fecha de nacimiento,direccion,departamento,provincia,distrito,telefono_casa|teléfono casa,telefono_oficina|teléfono oficina,telefono_celular|teléfono celular,email",2);

?>
</html>



