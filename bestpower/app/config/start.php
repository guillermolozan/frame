<?php

return [

	'name'	=>'Best Power Peru',

	'slogan' =>'10 años a su servicio',

	'web'		=>[
		
		'desc'		 =>'Somos Best Power 10 años al servicio, nos ha permitido lograr ser calificados y reconocidos como una gran empresa en la comercialización de productos electrónicos y de servicios del sector Informático.',

		'name_short' =>'Best Power Electronics',
		
		'email'      =>'ventas@bestpowerperu.com',

		'email_venta'=>'servicios@bestpowerperu.com',

		'phone'      =>'540-0375 / <i>Entel:</i> 955550428 / <i>Cel:</i> 992494745',

		'address'    =>'Calle Cesar Vallejo Mz. 76 Lt. 04 Asoc. Chillon - Los Olivos',
		
		'twitter'    =>'https://twitter.com',
		
		'facebook'   =>'https://www.facebook.com/bestpowerperu',

		'whatsapp'   =>'992494745',


		'email_admin'=>'ventas@bestpowerperu.com',

	],

	'visitors'	=>true,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/bestpower/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/bestpower/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		'image_test'=>false,

		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./bestpower/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
