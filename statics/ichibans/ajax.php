<?php //á

$web_path="web";

$panel_path="panel";

include($web_path."/ajax_includes.php");

chdir($web_path."/modulos");
include("lib/include.php");

switch($_GET['mode']){
case "get":
	include("ajax_get.php");
break;
case "form":
	include("urls.php");
	include("loaddata.php");
	include("panel.php");
	include(incluget("formularios/".$_GET['tab'].".php"));
break;
case "carrito":
	include("app/carrito.php"); 
break;
}

?>