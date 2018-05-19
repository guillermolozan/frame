<?php //á

	unset($_SESSION['login']);
	echo json_encode(array("js"=>(($_GET['url']!='')?"loracion.href='".$_GET['url']."';":"location.reload();")));

?>