<?php //á

if($_GET['g_lang']!=''){

	setcookie("c_lang",$_GET['g_lang'], time() + (7*24*60*60) ,"/",$_SERVER['SERVER_NAME']);
	if($_GET['tiempo']!=''){
		die("<html><body onload=\"location.href='../galeria.php?page=home&oferta=No';\"></body></html>");	
	} else {
		die("<html><body onload=\"location.href='".$_SERVER['HTTP_REFERER']."';\"></body></html>");
	}
}
$c_lang=($_COOKIE['c_lang']=='')?$default_lang:$_COOKIE['c_lang'];

?>