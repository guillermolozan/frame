<?php //á
$link=mysql_connect ($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS) or die ('error de conexion:'.mysql_error());
mysql_select_db ($MYSQL_DB,$link);
mysql_query("SET NAMES 'utf8'",$link);
?>