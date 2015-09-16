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
	var $uri;

	function __construct($params){

		global $start;

		global $Config;

		$this->params      =$params;
				
		// global $db;
		
		// $this->db       = $db;
		
		$this->config      = $Config;
		
		$this->views       = (isset($start['views']))?$start['views']:'views';
		
		$this->static      = $start['static'];
		
		$this->title       = $start['name'];
		
		$this->slogan      = (isset($start['slogan']))?$start['slogan']:null;
		
		$this->devel       = (isset($start['devel']))?$start['devel']:false;
		
		$this->visitors    = $start['visitors'];	
		
		$this->elements    = new Elements();
		
		$this->menu_top    = [];	
		
		$this->menu_left   = [];	
		
		$this->menu_footer = [];	
		
		$this->email_test  = (isset($start['email_test']))?$start['email_test']:false;
		
		$this->data_test   = (isset($start['data_test']))?$start['data_test']:false;
		
		// if($this->data_test)
		$this->data_tests  = new Tests((isset($start['fake']))?$start['fake']:null);
		
		// $this->models   = new Models($this);
		
		
		$enviroment        = Server::environment();

		// visitors
		if($this->visitors){

			$visits=$this->getvisitors();

		}



		//menu footer
			$this->menu_footer['prodiserv']=[
								'name'   => 'by prodiserv',
								'url'    => 'http://prodiserv.com',
								'aclass' => 'prodiserv',
								'target' => '_blank'
								];


		if($enviroment=='local'){


			$localhost=$_SERVER['HTTP_HOST'];


			$menu_footer_proyectos=select("nombre as name,carpeta","proyectos","where tipo_web=2",0,
				[
				'db'=>'panel',
				'url'=>'http://'.$_SERVER['HTTP_HOST'].'/frame/{carpeta}',
				'carpeta'=>'null',
				'class'=>'blue lighten-5'
				]
			);


			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'php',
								'url'   	=> '//'.$localhost.'/frame/'.$this->config['CARPETA_PROYECTO']
								];	

			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'html',
								'url'   	=> '//'.$localhost.':8080/'.$this->config['CARPETA_PROYECTO'].'/html'
								];

			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'panel',
								'url'   	=> '//'.$localhost.'/sistemapanel/'.$this->config['CARPETA_PROYECTO'].'/panel'
								];	

			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'remote',
								'url'   	=> $this->config['httpfiles']
								];

			$menu_footer_proyectos[]=[
								'class'  => 'red lighten-5',
								'name'   => 'icomoon',
								'url'   	=> '//'.$localhost.'/frame/work/icomoon/demo.html'
								];

			$this->menu_footer['prodiserv']['items']=$menu_footer_proyectos;
			
		}







		if(isset($this->params['medidas'])){

			$this->data_test=true;

		}




		
		// instance view
		$this->view = new Views($this->views.'/php');

		// assing vars
		$this->view->assign(
			[
				'is_home'	 => false,
				'web_name'   => $this->title,
				'uri'        => $params['uri'],
				'enviroment' => $enviroment,
				'localhost'  => ($enviroment=='local'),
				'params'     => $params,
				'main'	    => true,
				
				//head
				'base'       => Server::base(),
				'ven_css'    => $this->static.'/vendor/css/',
				'pub_css'    => $this->static.'/css/',
				'icon'       => 'icon.png',
				'head_title' => $this->title,
				
				//header and menu top
				'link_home'  => ($this->devel)?'./'.$this->devel:'./',
				
				//body
				'pub_img'    => $this->static.'/img/',
				'classbody'  => $params['classbody'],			
				'breadcrumb' => [],
				
				//footer
				'visiters'   => (isset($visits))?$visits:null,
				
				//foot
				'ven_js'     => $this->static.'/vendor/js/',
				'pub_js'     => $this->static.'/js/',

			]

		);



	}


	private function getvisitors(){

		$visitor_file="visitor.php";
		$visits=(file_exists($visitor_file))? require $visitor_file : 1;

		if (!isset($_COOKIE['visiter'])){
			setcookie('visiter','1',time()+60*60*24);
			$f1=fopen($visitor_file,"w+");
			fwrite($f1,"<?php return ". ( ++$visits ) .";");
			fclose($f1);	
		}

		return $visits;

	}	


	function loadModel($model,$config=null){

		eval("\$obj = new models\\".$model."(\$this);");

		if(!is_null($config)){

			$obj->setConfig($config);

		}

		return $obj;		

	}


}