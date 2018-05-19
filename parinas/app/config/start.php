<?php

return [

	'name'	=>'Hotel Punta Parinas',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Hotel Punta Parinas',
		'email'      =>'reservas@hotelpuntaparinastalara.com',
		'phone'      =>'(+51) 073 498795',
		// 'mobile'      =>'(+51) 073 498795',

		'address'    =>'Av. A-2 Talara',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		// 'whatsapp'   =>'999-999-999',
		'twitter'    =>'https://twitter.com/',
		'facebook'   =>'https://www.facebook.com/puntaparinas.hotel',
		'youtube'    =>'https://www.youtube.com/',


		'email_venta'=>'servicios@bestpowerperu.com',


	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/parinas/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/parinas/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

		// 'image_devel'=>true,

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./parinas/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
