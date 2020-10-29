<?php //á
$Local=($_SERVER['SERVER_NAME']=="localhost" or $_SERVER['SERVER_NAME']=="127.0.0.1")?1:0;

include("lib/compresionInicio.php");
include("lib/global.php");
include("lib/conexion.php");
include("lib/mysql3.php");
include("lib/util.php");
include("config/tablas.php");
include("lib/sesion.php");
include("lib/playmemory.php"); 

include("head.php");

$params=filtrarGET($SERVER['PARAMS'],array('me','paso','error'));

$_GET['paso']=($_GET['paso'])?$_GET['paso']:'first';

?>
<style>
body { background:none; text-align:left; }
#div_allcontent { min-width:0; }
.formApp { padding:5px 10px; min-height:410px; height:410px; height:auto !important; }
.formApp h1 { font-size:24px; color:#333; margin:10px 0;  }
.formApp h2 { font-size:20px; color:#000; margin:5px 0; }
.formApp form { padding:0px 10px; clear:left; }
.formApp form input { float:left; margin:0px 0; float:left; width:auto; padding: 1px 4px; text-transform:uppercase; }
.formApp form select { float:left; margin:3px 0; float:left; width:auto; padding: 1px 1px; text-transform:uppercase; }

.formApp .tbl_import_frame { overflow-x:auto; height:200px; float:left; width:auto; padding:0 20px 0 0; clear:left; margin-top:10px; }
.formApp .tbl_import { margin-left:20px; }
.formApp .tbl_import th,
.formApp .tbl_import td { border:1px solid #999; padding:1px 10px 1px 2px; } 
.formApp .tbl_import th { font-weight:bold; font-size:14px; color:#000; }
.formApp .tbl_import td { font-weight:normal; font-size:13px; color:#666; }
.formApp .tbl_import td.label { font-weight:normal; font-size:13px; color:#666; font-style:italic; text-transform:uppercase; }
.formApp p { clear:left; padding:2px 10px 0 20px; margin:0;  }
.incompatible { color:#000; padding:5px; background-color:#FEC0CA; float:left; clear:left; margin-left:10px; }
</style>
<body>
<?php
include("pop_vista.php"); 
?>
</body>
</html>
<?php 
include("lib/compresionFinal.php");
?>