<?php //á
$url = "http://calandriatravel.com/panel/base2/hilo_de_envio.php";
$url = "http://127.0.0.1/sistemapanel/calandria/panel/base2/hilo_de_envio.php";
echo "launch : ".$url."<br><br>";
echo file_get_contents($url);
?>
