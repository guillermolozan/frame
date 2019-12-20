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

		'address'    =>'Calle 106 Lote 15 A.H. Los Norteños - Los Olivos - Lima',
		'lat'        =>'-11.9519656',
		'lon'        =>'-77.0826401',

		'whatsapp'   =>'981109152',

		'instagram'  =>'https://www.instagram.com/instagram',
		'instagram_page'  =>'/instagram',

		'facebook'   =>'https://www.facebook.com/SUMARSEG',
		'facebook_page'   =>'/SUMARSEG',
		// 'youtube'    =>'https://www.youtube.com/',

		
		'email_admin'=>'ventas@sumarseg.com,wtavara@prodiserv.com,guillermolozan@gmail.com',


	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/sumarseg/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/sumarseg/panel/config/tablas.php",
	
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

		'static' =>"./sumarseg/public",

		// 'devel' =>"desarrollo",

		// 'email_test'=>true,


		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	],


];
