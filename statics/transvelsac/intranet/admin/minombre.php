<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
require_once("../pdf/dompdf-0.5.1/dompdf_config.inc.php");

    $html ='<html>';
	$html.='<head>
	<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="css/sddm.css" rel="stylesheet" type="text/css" />
	</head>';

	$html.='<body>';
	$html.='<div id="container">';
    $html.='<div id="header">';
	$html.='</div>';
	$html.='<div id=datos">';
	$html.='</div>';
	$html .='<div id="mainContent">
			<div style="width:970px; height:auto">
			Hola que tal
			';
        

	$html .='
	<hr style="clear:both; visibility:hidden"/>      
    </div>
    <hr style="clear:both; visibility:hidden"/>
    </div>
    <div id="footer" align="center">
    </div>
</div>
</body>
</html>';
	
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$archivo="Inventario.pdf";
$dompdf->stream($archivo);
?>