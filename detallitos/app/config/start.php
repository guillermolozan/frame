<?php

return [

	'name'	=>'Detallitos MM',

	'web'		=>[
		
		'name_short' =>'Detallitos MM',
		
		'email'      =>'informes@detallitosmm.com',

		'email_venta'=>'ventas@detallitosmm.com',

		'phone'      =>'987971848 | 986125623',

		'address'    =>' Galería La Molina I Tda. 10 - 11 - Av. La Molina 1033, La Molina (Ref. Frente a metro de la Molina)',
		
		'instagram'    =>'https://www.instagram.com/detallitossmm/',
		
		'facebook'   =>'https://www.facebook.com/Detallitos-MM-Tienda-de-regalos-personalizados-232699693851653/',

		'whatsapp'   =>'987971848',

		'email_admin'=>'informes@detallitosmm.com,servicios@prodiserv.com,ventas@detallitosmm.com',

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
