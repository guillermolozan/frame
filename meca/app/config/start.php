<?php

return [

	'name'	=>'Mecatronic Systems',

	'visitors'	=>false,
	
	'web'	=> [
	
		'name_short' =>'Mecatronic',
		'slogan' => 'Calzado Industrial en Perú, Lima - Calzado de Proteccion Botas de Seguridad',

		'logo'	 => 'logo.png',
		'ico'	 => 'favicon.ico',	
		
		
		'email'      =>'info@mecatronicsystems.com',
		'emails'     =>[
							// 'ventas@mecatronicsystems.com',
							'info@mecatronicsystems.com'
						],

		'phone'      =>'(+511) 471-1676',
		'phones'	 =>['(+511) 471-1676'],
		'mobile'     =>'981474305',

		'address'    =>'Av. Simón Bolivar N° 344 - Chancay, Huaral, Lima',
		'lat'        =>'-11.9519656',
		'lon'        =>'-77.0826401',

		'whatsapp'   =>'981474305',

		'instagram'  =>'https://www.instagram.com/instagram',
		'instagram_page'  =>'/instagram',

		'facebook'   =>'https://www.facebook.com/MECATRONICS',
		'facebook_page'   =>'/MECATRONICS',
		// 'youtube'    =>'https://www.youtube.com/',

		
		'email_admin'=>'info@mecatronicsystems.com,wtavara@prodiserv.com,guillermolozan@gmail.com',


	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/meca/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/meca/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'image_devel'=>'thinking.png',
		// 'image_devel'=>'random',

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',
		// 'devel' =>"desarrollo",
		// 'comming' =>"true",

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./meca/public",

		'devel' =>"desarrollo",

		// 'email_test'=>true,


		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',	
		
		'load' => 'remote_wpkmanager',

	],

	'remote_wpkmanager' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./meca/public",

		'devel' =>"desarrollo",

		// 'image_devel'=>'random',


	],	



];
