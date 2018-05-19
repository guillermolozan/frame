<?php

return [

	'name'	=>'Detallitos Mathias',

	'web'		=>[
		
		'name_short' =>'Detallitos Mathias',
		
		'email'      =>'informes@detallitosmathias.com',

		'email_venta'=>'ventas@detallitosmathias.com',

		'phone'      =>'732-2570 | 987971848',

		'address'    =>' Galería La Molina I Tienda 9 - Av. La Molina 1033, La Molina (Ref. Frente a metro de la Molina)',
		
		'twitter'    =>'https://twitter.com',
		
		'facebook'   =>'https://www.facebook.com/detallitosmathias',

		'whatsapp'   =>'987971848',

		'email_admin'=>'informes@detallitosmathias.com,servicios@prodiserv.com,ventas@detallitosmathias.com',

	],

	'visitors'	=>false,

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/detallitos/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/detallitos/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>false,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./detallitos/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
