<?php //á

chdir("../");

include("lib/compresionInicio.php");
include("lib/global.php");
include("lib/conexion.php");
include("lib/mysql3.php");
include("lib/util.php");
include("config/tablas.php");
include("lib/sesion.php");
include("lib/playmemory.php");

	



$params=filtrarGET($SERVER['PARAMS'],array('paso','error'));

include("head.php");

?>
<style>
body { background:none; }
#div_allcontent { min-width:0; }
.bloque_iframe { padding:5px 10px; min-height:410px; height:410px; height:auto !important; }
.bloque_iframe h1 { font-size:24px; color:#333; margin:10px 0;  }
.bloque_iframe h2 { font-size:20px; color:#000; margin:5px 0; }
.bloque_iframe form { padding:0px 10px; clear:left; }
.bloque_iframe form input { clear:left; float:left; margin:3px 0; float:left; width:auto; padding: 3px 10px; text-transform:uppercase; }
.bloque_iframe p { clear:left; padding:2px 10px 0 20px; margin:0;  }
</style>
<body>
<?php
echo $HTML_ALL_INICIO;
echo $HTML_MAIN_INICIO;

if($_GET['paso']=='fin'){

	if($_GET['id']!=''){
		$query=" and id='".$_GET['id']."' ";
	} elseif($_GET['id_filtro']!=''){
		$query=" and id_filtro='".$_GET['id_filtro']."' ";		
	} else {
		$query=" ";
	}
	$emails = select(
		"id,email,nombre"
		,"boletines"
		,"where ( enabled='1' or enabled IS NULL ) and visibilidad!='0' $query "
		,0
	);
	
?>
<div class="bloque_iframe">
<h1>Envío de Boletín</h1>
<h3>Se estarán enviando <?php echo sizeof($emails);?> emails en los próximos minutos.</h3>
<ul>
<?php foreach($emails as $email){ ?>
<li style="list-style-type:decimal; margin-left:30px;"><?php echo (($email['nombre'])?"<b>".$email['nombre']."</b> ":"")."<i>".$email['email']."</i>";?></li>
<?php } ?>
</ul>
</div>
<?php	

$url=$SERVER['BASE'].'hilo_boletin.php';
echo curl_get_file_contents($url);
exit();


} elseif ($_GET['paso']=='enviar'){

$ID_CAMPAIN=$_POST['id_campain'];

	if($_GET['id']!=''){
		$query=" and id='".$_GET['id']."' ";
	} elseif($_GET['id_filtro']!=''){
		$query=" and id_filtro='".$_GET['id_filtro']."' ";		
	} else {
		$query=" ";
	}
	$emails = select(
		"id,email,nombre"
		,"boletines"
		,"where ( enabled='1' or enabled IS NULL ) and visibilidad!='0' $query  limit 0,10"
		,0
	);

	$id_solicitud=$datos_solicitud['id'];
	foreach($emails as $emails_){
	//echo "<div>".$emails_['email']."</div>";
	insert(
		array(	'visibilidad'=>'1',
				'fecha_creacion'=>'now()',
				'fecha_edicion'=>'now()',				
				'visibilidad'=>'1',
				'id_email'=>$emails_['id'],
				//'email'=>$email,
				'id_grupo'=>'0',
				'id_campain'=>$ID_CAMPAIN,
				'enviado'=>'0',
				'leido'=>'0',
				'linkeado'=>'0'
			  )
    	  ,"lista_envio"
    	  ,2
		);	
	}

	redir($SERVER['ARCHIVO'].'?paso=fin'.$params); 

} else {
?>
<div class="bloque_iframe">
<h1>Envío de Boletín</h1>
<h2>Seleccionar Boletín a enviar</h2>
<form enctype="multipart/form-data" method="post" action="base2/<?php echo $SERVER['ARCHIVO'];?>?paso=enviar<?php echo $params;?>">
<label>Boletín:</label><select name='id_campain'>
<option value="-1">boletín standard</option>
<!--<option value="standard">Boletin de bloques ( boletín antiguo )</option>-->
<?php $grupos=select("nombre,id","campains","where 1 order by id asc"); ?>
<?php foreach($grupos as $grupo){ ?>
<option value="<?php echo $grupo['id'];?>" ><?php echo $grupo['nombre'];?></option>
<?php } ?>
</select>
<div style="margin:30px 0 0 0;">
<input type="submit" value="Enviar"  />
</div>
</form>
</div>
<?php
}
?>
<?php
echo $HTML_MAIN_FIN;	
echo $HTML_ALL_FIN;
?>
</body>
</html>
<?php
include("lib/compresionFinal.php");
?>