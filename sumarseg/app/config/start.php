<?php

return [

	'name'	=>'Sumarseg',

	'visitors'	=>false,
	
	'web'	=> [
	
		'name_short' =>'Sumarseg',
		'slogan' => 'Calzado Industrial en Perú, Lima - Calzado de Proteccion Botas de Seguridad',

		'logo'	 => 'logo.png',
		'ico'	 => 'favicon.ico',	
		
		
		'email'      =>'informes@sumarseg.com',
		'emails'     =>['ventas@sumarseg.com','informes@sumarseg.com'],
		'phone'      =>'(+511) 605-2255',
		'phones'	 =>['(01) 605-2255','605-2256'],
		'mobile'     =>'981109152',

		'address'    =>'Mz. E Lt. 34 Los Olivos de Pro - Los Olivos - Lima',
		'lat'        =>'-12.0819534',
		'lon'        =>'-77.0383133',
		
		'whatsapp'   =>'981109152',

		'instagram'  =>'https://www.instagram.com/instagram',
		'instagram_page'  =>'/instagram',

		'facebook'   =>'https://www.facebook.com/SUMARSEG',
		'facebook_page'   =>'/SUMARSEG',
		// 'youtube'    =>'https://www.youtube.com/',

		


	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/sumarseg/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/sumarseg/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		// 'image_devel'=>'thinking.png',
		'image_devel'=>'random',

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',
		'devel' =>"desarrollo",
		'comming' =>"true",



	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./sumarseg/public",

		'devel' =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	],


];
