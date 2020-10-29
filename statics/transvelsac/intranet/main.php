<?php 
session_start();
require("db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionInicial.php");
CheckNivel();
unset($_SESSION['carro']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/pro_drop_1.css" />
<script src="css/stuHover.js" type="text/javascript"></script>
<script language="JavaScript">
document.onkeydown = function(){ 
  if(window.event && (window.event.keyCode == 8)){
    return false;
  }
}
</script>
</head>
<body>
<div id="container">
		<div id="datos">
		<?php
			include("menuSecund.php");
		?>
		</div>
		<div id="menu"><?php include("menu.php") ?></div>
		<div id="mainContent">
    		<center><img src="images/background_header.jpg"/></center>
    	<!-- end #mainContent -->
</div>
		<div id="footer">
   		  <?php include('footer.php');?>
    	<!-- end #footer -->
		</div>
	<!-- end #container --> 
</div>
    </body>
</html>