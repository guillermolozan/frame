<?php

return [

	'name'	=>'SCL IMPORTRADE INSUTRIAL SRL',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'IMPORTRADE',
		'slogan' => 'Importacion y comercio industrial',

		'logo'	 => 'logo_limpo4.png',
		// 'logo'	 => 'logo_limpo2.png',
		'ico'	 => 'logo_limpo.jpg',	

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'ventas@cslimpofer.com',
		'emails'     =>[
			'ventas@cslimpofer.com',
			'compras@cslimpofer.com'
		],

		/*
		########  ##     ##  #######  ##    ## ########  ######
		##     ## ##     ## ##     ## ###   ## ##       ##    ##
		##     ## ##     ## ##     ## ####  ## ##       ##
		########  ######### ##     ## ## ## ## ######    ######
		##        ##     ## ##     ## ##  #### ##             ##
		##        ##     ## ##     ## ##   ### ##       ##    ##
		##        ##     ##  #######  ##    ## ########  ######
		*/
		'phone'      =>'994026637',
		'phones'      =>[
			'994026637'
		],

		'mobile'     =>'994026637',

		'whatsapp'   =>'994026637',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'CAL. CONOCOCHA 498 DPTO. 201 URB. COVIDA ET. UNO LOS OLIVOS',
		'lat'        =>'-11.9920654',
		'lon'        =>'-77.0750046',
		
		/*
		 ######   #######   ######  ####    ###    ##
		##    ## ##     ## ##    ##  ##    ## ##   ##
		##       ##     ## ##        ##   ##   ##  ##
		 ######  ##     ## ##        ##  ##     ## ##
		      ## ##     ## ##        ##  ######### ##
		##    ## ##     ## ##    ##  ##  ##     ## ##
		 ######   #######   ######  #### ##     ## ########
		*/

		/*
		'twitter'    =>'https://twitter.com/',
		'youtube'    =>'https://www.youtube.com/',
		*/
		
		// 'facebook'   =>'https://web.facebook.com/',
		// 'facebook_page'   =>'/',
		
		
		'email_admin'=>'ventas@cslimpofer.com,guillermolozan@gmail.com',

		
	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/limpofer/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/limpofer/panel/config/tablas.php",
	
		'static' =>"public",

		'image_devel'=>true,
		// 'image_devel'=>'thinking.png',
		// 'image_devel'=>'random',

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./limpofer/public",

		'devel' =>"desarrollo",

		'image_devel'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
