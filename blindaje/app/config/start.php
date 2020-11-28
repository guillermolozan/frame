<?php

return [

	'name'	=>'Blindaje de Autos Perú',

	// 'visitors'=>false,

	'web'	=> [

		'name_short' =>'Blindaje de Autos Perú',
		// 'slogan' => 'Blindaje de Autos, Blindaje de Camionetas, Blindaje de Vehículos',
		// 'description'	 => 'Blindaje Automotriz en Lima Perú :: Central (01) 444-3550 Cel. 985-833-322 Nextel: 610*4520 Blindaje de carros, Autos Blindados',

		'more_metas' =>'
		<meta name="geo.region" content="PE">
		<meta name="country" content="PE">
		<meta name="geo.placename" content="Lima">
		<meta name="language" content="Español,Ingles">
		<meta name="Subject" content="Blindaje Autos Perú">
		<meta name="revisit-after" content="1 days">
		',


		'logo'	 => 'blindaje-logo1.jpg',
		'ico'	 => 'blindaje-icono.ico',

		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'informes@blindajeautosperu.com',
		'emails'     =>[
			'informes@blindajeautosperu.com',
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
		'phone'      =>'999888777',
		'phones'      =>[
			'999888777',
			'999888777'
		],

		'mobile'     =>'999888777',
		'whatsapp'   =>'999888777',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/

		'address'    =>'Urb. Av Arenales A-8 Lince - Perú',

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

		'twitter'    =>'https://twitter.com/',
		'youtube'    =>'https://www.youtube.com/',


		'facebook'   =>'https://web.facebook.com/pagina_face',
		'facebook_page'   =>'/pagina_face',

		
		'email_admin'=>'
			informes@blindajeautosperu.com,
			wtavara@prodiserv.com*,
			guillermolozan@gmail.com*
		',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/blindaje/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/blindaje/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		

		'image_devel'=>true,
	
		// 'fake'	=>'fakeimg',


	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./blindaje/public",

		'devel'  =>"desarrollo",

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',	
		
		// 'image_devel'=>true,

		// 'analytics'=>'G-H00000000',


	],

	'project'=> json_decode(file_get_contents("project.json"), true),

	'panel'=> [
		'Home|index'=>['paginas','1'],
		'Pages|index'=>['paginas'],
		'Forms|contactenos'=>['paginas','5'],
	]

];
