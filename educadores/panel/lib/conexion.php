<?php //á
$link=mysql_connect ($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS) or die ('error de conexion:'.mysql_error());
mysql_select_db ($MYSQL_DB,$link);
mysql_query("SET NAMES 'utf8'",$link);
date_default_timezone_set('America/Lima');
mysql_query("SET `time_zone` = '".date('P')."'");

