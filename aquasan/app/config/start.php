<?php

return [

	'name'	=>'Aquasan Ingenieros',

	'visitors'	=>false,

	'web'	=> [
	
		'name_short' =>'Aquasan',
		'slogan' => 'Ingeniería Sanitaria',

		'logo'	 => 'aquasan-logo.png',
		'ico'	 => 'aquasan-ico.jpg',

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'mesadepartes@aquasan.com.pe',
		'emails'     =>[
			'mesadepartes@aquasan.com.pe',
			'gerencia@aquasan.com.pe',
			'jsalazar@aquasan.com.pe',
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
		'phone'      =>'979227848',
		'phones'      =>[
			'979227848',
			// '979227848'
		],

		'mobile'     =>'979227848',

		'whatsapp'   =>'979227848',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'Urb. Nylon San Pedro A-8 ILO',

		'lat'        =>'-17.6482962',
		'lon'        =>'-71.3440886',
		
		/*
		 ######   #######   ######  ####    ###    ##
		##    ## ##     ## ##    ##  ##    ## ##   ##
		##       ##     ## ##        ##   ##   ##  ##
		 ######  ##     ## ##        ##  ##     ## ##
		      ## ##     ## ##        ##  ######### ##
		##    ## ##     ## ##    ##  ##  ##     ## ##
		 ######   #######   ######  #### ##     ## ########
		*/
		// 'twitter'    =>'https://twitter.com/',
		// 'youtube'    =>'https://www.youtube.com/',


		// 'facebook'   =>'https://web.facebook.com/',
		'facebook_page'   =>'/',

		
		'email_admin'=>'mesadepartes@aquasan.com.pe,gerencia@aquasan.com.pe,jsalazar@aquasan.com.pe,wtavara@prodiserv.com,guillermolozan@gmail.com',

		
	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/aquasan/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/aquasan/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./aquasan/public",

		'devel' =>"desarrollo",

		// 'image_devel'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	]

];
