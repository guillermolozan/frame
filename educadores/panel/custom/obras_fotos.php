<?php
chdir("../");
include("lib/compresionInicio.php");
include("lib/includes.php");
include("head.php");
echo '<body class="modulo_obras_fotos">';
echo $HTML_ALL_INICIO;
echo $HTML_MAIN_INICIO;
include("header.php");
echo $HTML_CONTENT_INICIO;
include("menu.php");
$MEEE=$objeto_tabla["OBRAS_FOTOS"];
include("vista.php");
echo $HTML_CONTENT_FIN;
include("foot.php");
echo $HTML_MAIN_FIN;
echo $HTML_ALL_FIN;
echo '</body>';
echo '</html>';
include("lib/compresionFinal.php");
?>