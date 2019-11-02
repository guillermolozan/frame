<?php
// error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);
// error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);

define('APP' ,'app');

define('CORE','../work');

require CORE.'/library/helpers.php';

$autoload = require APP.'/config/autoload.php';

/*
spl_autoload_register(function ($class) {

	global $autoload;
	
	foreach($autoload as $dir)
		@include "$dir/".str_replace("\\","/",$class).".php";

});
*/

function load_auto($class) {

	global $autoload;
	
	foreach($autoload as $dir){
		@include "$dir/".str_replace("\\","/",$class).".php";
	}

}

spl_autoload_register('load_auto');



use core\Config as Config;
use core\Server as Server;
use core\Connection as Connection;
use core\Routes as Routes;


$starts    = require APP.'/config/start.php';
$start = array_merge($starts,$starts[Server::environment()]); 
unset($start['local']);
unset($start['remote']);


$conf = new Config($start['config']);
$Config = $conf->getConfig(Server::environment());


$link = Connection::connect($Config);


$httpfiles = $Config['httpfiles'];


$DIRECTORIO_IMAGENES=$Config['DIRECTORIO_IMAGENES'];


$rou = new Routes();
$rou->response();

