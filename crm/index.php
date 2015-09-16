<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);

define('APP' ,'app');

define('CORE','../work');

require CORE.'/library/helpers.php';

$start    = require APP.'/config/start.php';

$autoload = require APP.'/config/autoload.php';

spl_autoload_register(function ($class) {

	global $autoload;
	
	include CORE. "/".str_replace("\\","/",$class).".php";

	foreach($autoload as $dir)
		include "$dir/".str_replace("\\","/",$class).".php";

});



use core\Config as Config;
use core\Server as Server;
use core\Connection as Connection;
use core\Routes as Routes;




$conf = new Config($start['config']);
$Config = $conf->getConfig(Server::environment());



$link = new Connection();



$rou = new Routes();
$rou->response();

