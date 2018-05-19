<?php //á
  
$Local=($_SERVER['SERVER_NAME']=="localhost" or $_SERVER['SERVER_NAME']=="127.0.0.1")?1:0;

include("lib/compresionInicio.php");

include("lib/global.php");

	$link=mysql_connect ($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS);
	mysql_select_db ($MYSQL_DB,$link);
	mysql_query("SET NAMES 'utf8'",$link);
	
//include("lib/compresionInicio.php");
if( @$_POST['clave']==CLAV  and $Local==0 ){
	@setcookie("admin", "1", time()+7*24*3600);
	@setcookie("c_usuario", "", time() - (365*24*60*60), "/");
	@setcookie("c_password", "", time() - (365*24*60*60), "/");
	
	header("Location: ?");
}

if( @$_GET["clave"]==CLAV and $Local==1){
	@$_COOKIE["admin"]="1";
}

if( $_GET["clave"]!=CLAV and ( @$_COOKIE["admin"]!="1" and $Local==1 )){
	@setcookie("admin", "1", time()+24*3600);
	if($_GET['redirhome']=='1'){
		header("Location: .");
		exit();
	}	
	header("Location: ?");
}

if($_GET['proy']!=''){ 
	@setcookie("proy", $_GET['proy'], time() + (1*24*60*60));
}	
if(@$_COOKIE["admin"]!="1")
{
	?>
	<html>
	<body style="background-color:#fff;">
    <form name="login" method="post" style=''>
    	<input name="clave" id="clave" type="password" style="width: 100%;color: #000;border: 1px solid #333;font-size: 10em; " />
    </form>
    <script>
	document.getElementById('clave').focus();
	</script>
    <a href="index.php" style='position:absolute;bottom:0px;right:0px;'>HOME</a>
	<?php 
	exit();
}	

include("lib/mysql3.php");
include("lib/util.php");
if($vars['GENERAL']['esclavo']!='1'){	
	include("config/tablas.php");
}
include("lib/sesion.php");
include("lib/playmemory.php");

if( in_array($_GET['edicionweb'],array('1','0')) ){
	$_SESSION['edicionweb']=$_GET['edicionweb'];
	redireccionar_a($_SERVER['HTTP_REFERER']);
}

if( in_array($_GET['edicionpanel'],array('1','0')) ){
	$_SESSION['edicionpanel']=$_GET['edicionpanel'];
	redireccionar_a($_SERVER['HTTP_REFERER']);
}
	
if( $_GET['accion']=='borrarcookie' ){
@setcookie("admin", "", time()+24*3600);
			
$_SESSION['usuario_datos_id']='';
$_SESSION['usuario_datos_nombre']='';
$_SESSION['usuario_datos_nombre_grupo']='';
$_SESSION['usuario_id']='';	
$_SESSION['page']='';
$_SESSION['web']='';
			
@setcookie("c_usuario", "", time() - (365*24*60*60), "/");
@setcookie("c_password", "", time() - (365*24*60*60), "/");
					
echo "saliendo...";
redireccionar_a("login.php");
}

include("head.php");

?>
<body>
<?php
echo $HTML_ALL_INICIO;
echo $HTML_MAIN_INICIO;		
include("header.php");
echo $HTML_CONTENT_INICIO;
include("menu.php");
include("maquina_vista.php");
echo $HTML_CONTENT_FIN;
include("foot.php"); 
echo $HTML_MAIN_FIN;	
echo $HTML_ALL_FIN;
?>
</body>
</html>
<?php 
include("lib/compresionFinal.php");
?>