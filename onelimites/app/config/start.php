<?php

return [

	'name'	=>'One Sin Límites',

	'visitors'	=>false,

	'slogan'		=>':: Listo para proteger, entrenar, rehabilitar, reducir, divertir',

	'web'		=>[
		
		'name_short' =>'One Sin Límites',
		
		'email'      =>'ventas@onesinlimites.com',

		// 'email_venta'=>'ventas@onesinlimites.com',

		'phone'      =>'(01) 533-8329 / <i>Cel:</i> 998-177-284',

		'address'    =>'Jr. Puno 636 - Int 6 / Lima 1 - Perú',
		
		// 'twitter'    =>'https://twitter.com',
		
		// 'facebook'   =>'https://www.facebook.com',

		'whatsapp'   =>'998177284',

		// 'email_admin'=>'ventas@onesinlimites.com',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/onelimites/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/onelimites/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./onelimites/public",

		// 'devel' =>"desarrollo",

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',		

	]

];
