<?php //á


set_time_limit(0);

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
		
/*		
if(trim($_GET['bloquear'])!=''){ 	update(array('enabled'=>'0','tipo_disabled'=>'2'),'emails_items',"where email='".$_GET['bloquear']."'");	$up=1;	}
		
if(trim($_GET['desbloquear'])!=''){ 	update(array('enabled'=>'1','tipo_disabled'=>''),'emails_items',"where email='".$_GET['desbloquear']."'");	$up=1;	}

if(trim($_GET['from'])!='in' and $up=='1'){ die("Su email ".$_GET['bloquear']." ha sido removido exitosamente. Disculpe por la molestia"); }
*/

if($_POST['id']!=''){

	$items3= select(
			"email"
			,"emails_items"
			,"where 1 and id_grupo='".$_POST['id']."' and visibilidad='1' order by id asc limit 0,100000"
			,0
			);
		
	foreach($items3 as $items0){
		$items1[]=$items0['email'];
	}	
		
	
	//$_POST['texto']="guillermolozan2@gmail.com";
	
	$string=$_POST['texto'];
	
	$string=str_replace(",","\n",$string);
	
	$emails=explode("\n",$string);
	
	$emails2 = array_unique($emails);
	
	foreach($emails2 as $t=>$Email){

		if( trim($Email)!='' and !in_array(trim($Email),$items1) ){ $tem['email'] = trim($Email); 
		$ITEMS[]=$tem;
		}
		
	}
	
	//prin($ITEMS);
	
	$ID_GRUPO=$_POST['id'];
	
	foreach($ITEMS as $item){
		if(trim($item['email'])!=''){
			insert(
					array(	'visibilidad'=>'1',
							'fecha_creacion'=>'now()',
							'fecha_edicion'=>'now()',				
							'email'=>trim($item['email']),
							'nombre'=>trim($item['nombre']),
							'enabled'=>'1',
							'comprobado'=>'0',
							'id_grupo'=>$ID_GRUPO				
						  )
					  ,"emails_items"
					  ,0			  
					);		
		}		
	}
	
	header("Location: importar_emails.php?id=".$_GET['id']);

}

?>
<h1><a href="../custom/emails_grupos.php">VOLVER</a></h1>
<div style="float:left; margin-right:60px;">
<h2>Ingrese la lista de emails separados por lineas, o por comas</h2>
<form action="importar_emails.php?id=<?php echo $_GET['id'];?>" method="post">
<input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
<textarea name="texto" style="width:600px; height:200px;"></textarea>
<input type="submit" value="importar" />
</form>
</div>
<?php

$items= select(
        "id,email,nombre"
        ,"emails_items"
        ,"where 1 and enabled='1' and id_grupo='".$_GET['id']."' and visibilidad='1' order by id asc limit 0,100000"
        ,0
        );

?>
<div style="float:left;clear:left;">
<?php
prin("TOTAL : ".sizeof($items)); echo "<br>";
prin($items);
?>
</div>