<?php 
namespace core;

class Controller {

	// var $module;
	var $elements;
	var $view;
	var $config;
	var $db;
	var $theme;
	var $params;
	var $name;
	var $menu_top;
	var $menu_left;
	var $menu_footer;
	var $visitors;
	var $devel;
	var $email_test;
	var $data_test;
	var $image_test;
	var $uri;
	var $analytics;
	var $static_build;
	var $show_view;
	var $enviroment;
	var $localhost;
	var $remote;
	var $pipe;
	var $invert_title;
	var $allow_externals;

	function __construct($params){

		session_start();

		global $start;

		global $Config;

		$this->params      = $params;
				
		// global $db;
		
		// $this->db       = $db;

		$this->start       =$start;
		
		$this->config      = $Config;
		
		$this->views       = (isset($start['views']))?$start['views']:'views';

		// $this->analytics   = (isset($start['analytics']))?$start['analytics']:'analytics';
		
		$this->analytics   = (isset($start['analytics']))?$start['analytics']:false;
		
		$this->static      = $start['static'];

		$this->pub_img 	 = $this->static.'/img/';

		$this->title       = $start['name'];
		
		$this->slogan      = (isset($start['slogan']))?$start['slogan']:null;
		
		$this->devel       = (isset($start['devel']))?$start['devel']:false;
		
		$this->visitors    = $start['visitors'];	
		
		$this->elements    = new Elements();
		
		$this->menu_top    = [];	
		
		$this->menu_left   = [];	
		
		$this->menu_footer = [];	

		$this->menu_prodiserv = [];
		
		$this->email_test  = (isset($start['email_test']))?$start['email_test']:false;
		$this->data_test   = (isset($start['data_test']))?$start['data_test']:false;
		$this->image_test   = (isset($start['image_test']))?$start['image_test']:false;		
		// if($this->data_test)
		$this->data_tests  = new Tests((isset($start['fake']))?$start['fake']:null);
		
		// $this->models   = new Models($this);

		$this->enviroment  = Server::environment();

		$this->localhost   = ($this->enviroment=='local')?1:0;

		$this->remote   = ($this->enviroment=='local')?0:1;

		$this->allow_externals = (isset($start['allow_externals']))?$start['allow_externals']:$this->remote;

		$this->show_view   = !(isset($params['noshow']));

		// $this->googleFonts   = ($start['googleFonts'])?$start['googleFonts']:'Roboto';

		// visitors
		if($this->visitors){

			$visits=$this->getvisitors();

		}

		$this->pipe = "|";
		
		$this->invert_title = false;

		// version
		$touchjson = file('touch.json');;
		$touch = json_decode($touchjson[0],true);
		$this->static_build=$touch['v'];


		//menu footer
		$this->menu_footer['prodiserv']=[
			'name'   => 'by prodiserv',
			'url'    => 'http://prodiserv.com',
			'aclass' => 'prodiserv',
			'target' => '_blank',
			'class'	 => 'menu_prodiserv',
			'rel'	 => 'external',
		];
		


		if($this->enviroment=='local'){


			$localhost=$_SERVER['HTTP_HOST'];

			$menu_footer_proyectos=select(
				"nombre as name,carpeta,calificacion",
				"proyectos",
				"where tipo_web=2 order by calificacion desc, fecha_acceso desc",0,
				[
					'db'      =>'panel',
					'url'     =>'http://'.$_SERVER['HTTP_HOST'].'/frame/{carpeta}',
					'carpeta' =>'null',
					'class'   =>'cyan darken-{calificacion}',
					'rel'     =>'nofollow',
					// 'name'	 =>'{name} - {calificacion}'
				]
			);
			// prin($menu_footer_proyectos);




			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'php',
								'url'   	=> '//'.$localhost.'/frame/'.$this->config['CARPETA_PROYECTO'],
								'rel'		=> 'nofollow'
								];	


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'html',
								'url'   	=> '//'.$localhost.':8080/'.$this->config['CARPETA_PROYECTO'].'/html',
								'rel'		=> 'nofollow'
								];


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'panel',
								'url'   	=> '//'.$localhost.'/sistemapanel/'.$this->config['CARPETA_PROYECTO'].'/panel',
								'rel'		=> 'nofollow'
								];	


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'remote',
								'url'   	=> $this->config['httpfiles'],
								'rel'		=> 'nofollow'
								];


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'icomoon',
								'url'   	=> '//'.$localhost.'/frame/work/icomoon/demo.html',
								'rel'		=> 'nofollow'								
								];


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'DEBUG',
								'url'   	=> $params['uri'].'?debug',
								'rel'		=> 'nofollow'								
								];


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'SEO',
								'url'   	=> $params['uri'].'?seo',
								'rel'		=> 'nofollow'								
								];


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'TOOL',
								'url'   	=> $params['uri'].'?tool',
								'rel'		=> 'nofollow'								
								];

			$this->menu_footer['prodiserv']['items']=$menu_footer_proyectos;
			

		}

		// menu prodiserv
		$this->menu_prodiserv=$this->menu_footer['prodiserv'];


		if(isset($this->params['medidas'])){

			$this->data_test=true;

		}
		
		// instance view
		$this->view = new Views($this->views.'/php');
		
		// assing vars
		$this->view->assign(
			[
				'show_view'       => $this->show_view ,				
				//
				'is_home'         => false,
				'web_name'        => $this->title,
				'uri'             => $params['uri'],
				'enviroment'      => $this->enviroment,
				'localhost'       => $this->localhost,
				'allow_externals' => $this->allow_externals,
				'params'          => $params,
				'analytics'       => $this->analytics,
				'main'            => true,
				'email_test'      => $this->email_test,
				'is_debug'			     => (
												isset($params['debug']) 
												or isset($params['debugjson']) 
												or isset($params['json']) 
												or ($_SESSION['seo']=='1')
												or ($_SESSION['tool']=='1')
												or ($_SESSION['info']=='1')
											)?1:0,
				
				//head
				'base'            => Server::base(),
				'baseurl'         => Server::baseUrl(),
				'work_ven_css'    => '../../../../work/public/vendor/css/',
				'base_work_ven_css'=> '../work/public/vendor/css/',
				'ven_css'         => $this->static.'/vendor/css/',
				'pub_css'         => $this->static.'/css/',

				'framework_css'   => ( $start['project']['framework_css'] ) ?  $start['project']['framework_css'] : 'materialize',
				'build_css'       => ( $start['project']['build_css'] ) ?  $start['project']['build_css'] : 'app.css',

				'use_jquery'   => ( isset($start['project']['use_jquery']) ) ?  $start['project']['use_jquery'] : "1",


				'icon'            => 'icon.png',
				'head_title'      => $this->title,
				
				//header and menu top
				'link_home'       => maskUrl(($this->devel)?'./'.$this->devel:'./'),
				
				//body
				'pub_img'         => $this->pub_img,
				'classbody'       => $params['classbody'],
				'controller'      => $params['controller'],
				'method'          => $params['method'],
				
				'breadcrumb'      => [],
				
				//abs			
				'pub_img_abs'     => str_replace('/./','/',Server::baseUrl().$this->static.'/img/'),
				'pub_img_abs_rem' => str_replace('/./','/',$Config['httpfiles'].Server::directory().'/'.$this->static.'/img/'),
				'url_rem'		  => str_replace('/./','/',$Config['httpfiles']),
				//footer
				'visiters'        => (isset($visits))?$visits:null,
				'current_year'    => date("Y"),
				
				//foot
				'work_ven_js'     => '../work/public/vendor/js/',
				'ven_js'          => $this->static.'/vendor/js/',
				'pub_js'          => $this->static.'/js/',
				'build_js'        => 'app.js',
				
				//
				'canonical'       => '',

				'by_prodiserv'	  => [$this->menu_prodiserv]

			]

		);

		
		unset($params['controller']);

		unset($params['method']);

		
		if($start['web'])
			foreach($start['web'] as $value=>$varia)
				$this->view->assign(['web_'.$value   => $varia]);		

	}


	private function getvisitors(){

		// $visitor_file="visitor.php";
		// $visits=(file_exists($visitor_file))? require $visitor_file : 1;

		// if (!isset($_COOKIE['visiter'])){
		// 	setcookie('visiter','1',time()+60*60*24);
		// 	$f1=fopen($visitor_file,"w+");
		// 	fwrite($f1,"<?php return ". ( ++$visits ) .";");
		// 	fclose($f1);	
		// }

		// return $visits;
		$default="41023";
		session_start();
		$counter_name = "visitor.txt";
		// Check if a text file exists. If not create one and initialize it to zero.
		if (!file_exists($counter_name)) {
		  $f = fopen($counter_name, "w");
		  fwrite($f,$default);
		  fclose($f);
		}
		// Read the current value of our counter file
		$f = fopen($counter_name,"r");
		$counterVal = fread($f, filesize($counter_name));
		fclose($f);
		// Has visitor been counted in this session?
		// If not, increase counter value by one
		if(!isset($_SESSION['hasVisited']))
		{
		  $_SESSION['hasVisited']="yes";
		  $counterVal++;
		  $f = fopen($counter_name, "w");
		//   fwrite($f, $default);
		  fwrite($f, $counterVal);
		  fclose($f); 
		}

		return $counterVal;

	}	


	function loadModel($model,$config=null){

		eval("\$obj = new models\\".$model."(\$this);");

		if(!is_null($config)){

			$obj->setConfig($config);

		}

		return $obj;		

	}


	function comming(){
		
		// prin($this->view->vars);

		if($this->view->vars['web_address']) $vars['address']=$this->view->vars['web_address'];
		if($this->view->vars['web_phone']) $vars['phone']=$this->view->vars['web_phone'];
		if($this->view->vars['web_email']) $vars['email']=$this->view->vars['web_email'];
		if($this->view->vars['web_facebook']) $vars['facebook']=$this->view->vars['web_facebook'];
		if($this->view->vars['web_instagram']) $vars['instagram']=$this->view->vars['web_instagram'];
		if($this->view->vars['web_whatsapp']) $vars['whatsapp']=$this->view->vars['web_whatsapp'];

		$this->view->assign(
			array_merge(
			[				
				'title'      => $this->title,
			],
			$vars)
		);

		$this->view->render('layout_comming');
	
	}

	function setMessage($files_test,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;

		// prin($this->email);

		if($this->view->vars['email_test']){
 
			$this->message.= '<ul><li>pruebas</li>';
			foreach($files_test as $fils){
				$this->message.='<li><a target="_black" href="'.$fils['link'].'">'.$fils['link'].'</a></li>';
			}
			$this->message.='</ul>';
	
		}

		$this->view->assign([
			'message'       => $this->message,
		]);

	}
	
}