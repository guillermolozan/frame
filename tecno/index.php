<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);

define('APP' ,'app');

define('CORE','../work');

require CORE.'/library/helpers.php';

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
use core\Urls as Urls;


$starts    = require APP.'/config/start.php';
$start_config=($starts[Server::environment()]['load']) ? $starts[Server::environment()]['load'] : Server::environment();
$start = array_merge($starts,$starts[$start_config]); 
unset($start[$start_config]);
unset($start['local']);
unset($start['remote']);
unset($starts);


$conf = new Config($start['config']);
$Config = $conf->getConfig(Server::environment());


$link = Connection::connect($Config);


$httpfiles = $Config['httpfiles'];


$DIRECTORIO_IMAGENES=$Config['DIRECTORIO_IMAGENES'];

$masks = new Urls();


$maskUrls=$masks->getItems();


// prin($maskUrls);


$rou = new Routes();

$rou->response();

