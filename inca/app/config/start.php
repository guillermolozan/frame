<?php

return [

	'name'	=>'Incapower',

	// 'visitors'=>false,

	'web'	=> [

		'name_short' =>'Incapower',
		// 'slogan' => 'Blindaje de Autos, Blindaje de Camionetas, Blindaje de Vehículos',
		// 'description'	 => 'Blindaje Automotriz en Lima Perú :: Central (01) 444-3550 Cel. 985-833-322 Nextel: 610*4520 Blindaje de carros, Autos Blindados',

		'logo'	 => 'inca-logo.png',
		'ico'	 => 'inca-ico.png',	

		'more_metas' =>'
		<meta name="geo.region" content="PE">
		<meta name="country" content="PE">
		<meta name="geo.placename" content="Lima">
		<meta name="language" content="Español,Ingles">
		<meta name="Subject" content="Blindaje Autos Perú">
		<meta name="keywords" content="althon corporation, lima, peru, blindadora, \'blindajes peru\', \'lima\', \'blindaje de vehículos\', premionacional, \'mantenimiento blindajes\', \'mantenimiento blindados\', \'permiso blindaje\', \'blindajes en peru\', \'lima peru\', atentados, miraflorez, blindadoras, \'empresas reconocidas\', equipamiento contra asalto y robo, estructuras anti-accidentes, equipamiento de vehículos escolta">
		<meta http-equiv="keywords" content="althon corporation, blindaje de autos perú, blindaje de autos, blindaje de camionetas, blindaje de vehículos, equipamiento, contra asalto y robo, estructuras anti-accidentes, equipamiento de vehículos escolta, blindaje de carros, autos blindados">
		<meta name="revisit-after" content="1 days">
		',


		/*
		######## ##     ##    ###    #### ##        ######
		##       ###   ###   ## ##    ##  ##       ##    ##
		##       #### ####  ##   ##   ##  ##       ##
		######   ## ### ## ##     ##  ##  ##        ######
		##       ##     ## #########  ##  ##             ##
		##       ##     ## ##     ##  ##  ##       ##    ##
		######## ##     ## ##     ## #### ########  ######
		*/
		'email'      =>'ventasdirectas@incapower.pe',
		'emails'     =>[
			'ventasdirectas@incapower.pe'
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
		'phone'      =>'(01) 224 2352',
		'phones'      =>[
			'983618685'
		],

		'mobile'     =>'983618685',

		'whatsapp'   =>'983618685',

		/*

		  ####  ######  ####
		 #    # #      #    #
		 #      #####  #    #
		 #  ### #      #    #
		 #    # #      #    #
		  ####  ######  ####

		*/
		'address'    =>'Av. República de Panamá 3837 - Surquillo',

		'lat'        =>'-12.0946069',
		'lon'        =>'-77.0261886',
		
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
			wtavara@prodiserv.com*,
			guillermolozan@gmail.com*
		',

	],

	'local' => [
		
		'config' =>APP."/../../../sistemapanel/inca/panel/config/config.ini",
		
		'models' =>APP."/../../../sistemapanel/inca/panel/config/tablas.php",
	
		'static' =>"public",

		'email_test'=>true,

		'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',

	],

	'remote' => [
		
		'config' =>"../panel/config/config.ini",
		
		'models' =>"../panel/config/tablas.php",		

		'static' =>"./inca/public",

		'devel' =>"desarrollo",

		// 'image_devel'=>true,

		// 'data_test'	=>true,		
	
		// 'fake'	=>'fakeimg',		

	],

	'project'=> json_decode(file_get_contents("project.json"), true)

];
