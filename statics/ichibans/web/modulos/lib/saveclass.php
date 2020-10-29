<?php //á


//error_reporting(0);

$web_path="web";

$panel_path="panel";

chdir("../../../$panel_path/");
include("lib/global.php");	
require("lib/mysql3.php");
require("lib/util.php");	
chdir("../$web_path/modulos/");


define("THEME_PATH",$vars['GENERAL']['template']);

include("../../../$panel_path/lib/bridge/saveclass.php");	

?>	