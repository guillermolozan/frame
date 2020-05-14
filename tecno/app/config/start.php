<?php

return [

	'name'	=>'Tecnología de Pintado',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Tecnología de Pintado',
		// 'slogan' => 'Calzado Industrial en Perú, Lima - Calzado de Proteccion Botas de Seguridad',

		'logo'	 => 'logo.png',
		'ico'	 => 't3.png',	
		
		
		'email'      =>'contacto@tecnologiadepintado.com',
		'emails'     =>[
							// 'ventas@tecnologiadepintado.com',
							'contacto@tecnologiadepintado.com'
						],

		// 'phone'      =>'(+51) 978227725',
		'phones'	 =>['(+51) 978227725'],
		'mobile'     =>'978227725',

		/*
		'address'    =>'Av. Simón Bolivar N° 344 - Chancay, Huaral, Lima',
		'lat'        =>'-11.9519656',
		'lon'        =>'-77.0826401',
		*/

		'whatsapp'   =>'978227725',
		
		
		// 'instagram'  =>'https://www.instagram.com/instagram',
		// 'instagram_page'  =>'/instagram',
		'facebook'   =>'https://web.facebook.com/pintadodevehiculos',
		'facebook_page'   =>'/pintadodevehiculos',
		
		// 'youtube'    =>'https://www.youtube.com/',

		
		'email_admin'=>'contacto@tecnologiadepintado.com,wtavara@prodiserv.com,guillermolozan@gmail.com',


	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/tecno/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/tecno/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./tecno/public",

		// 'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
