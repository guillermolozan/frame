<?php //á


chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");
	
	require_once( "lib/ini_manager.php" );
	
chdir("../");

		
		
if(trim($_GET['bloquear'])!=''){ 	update(array('enabled'=>'0','baja'=>'2'),'boletines',"where email='".$_GET['bloquear']."'");	$up=1; }




		
if(trim($_GET['desbloquear'])!=''){ 	update(array('enabled'=>'1','tipo_disabled'=>''),'emails_items',"where email='".$_GET['desbloquear']."'");	$up=1;	}

if(trim($_GET['from'])!='in' and $up=='1'){ die("Su email ".$_GET['bloquear']." ha sido removido exitosamente. Disculpe por la molestia."); }

exit();
?>
<h1><a href="../custom/emails_grupos.php">VOLVER</a></h1>
<div style="float:left; margin-right:60px;">
<h2>Ingrese el email que desea bloquear</h2>
<form action="exclusiones.php" method="get">
<input name="bloquear" id="bloquear"  />
<input name="from" value="in" type="hidden"  />
<input type="submit" value="bloquear" />
</form>
</div>
<div style="float:left; margin-right:0px;">
<h2>Ingrese el email que desea desbloquear</h2>
<form action="exclusiones.php" method="get">
<input name="desbloquear" id="desbloquear"  />
<input name="from" value="in" type="hidden"  />
<input type="submit" value="desbloquear" />
</form>
</div>
<?php

$items = select(
        "id_grupo,email"
        ,"emails_items"
        ,"where enabled='0' and  visibilidad='1' order by id asc"
        ,0
		,array('sub_select_dato'=>array('sub_select_dato'=>array(
                                'campo'=>"nombre"
                                ,'tabla'=>"emails_grupos"
                                ,'donde'=>"where id='{id_grupo}'"
                                ,'debug'=>0
    						)
    					))
        );

?>
<div style="float:left;clear:left;">
<?php
prin(sizeof($items)); echo "<br>";
prin($items);
?>
</div>