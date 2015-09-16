<?php

namespace core;

class Routes {

	private $routes = [];
	var $controller;
	var $method;
	var $uri;
	var $params     = [];


	function __construct(){


		global $start;
		
		$this->routes = require APP.'/config/routes.php';

	}


	public function devel($private){


		$routesb=[];

		foreach($this->routes as $key => $rou){

			$key=str_replace('/$','$',$key);
			$routesb["/$private".$key]=$rou;

		}
		// prin($routesb);
		$this->routes=$routesb;

	}


	private function output($val){


		parse_str($val, $out);

		$output=[];

		$vars0 = SERVER::getVarArray();
		
		$vars=array_merge($out,$vars0);

		unset($vars['controller']);

		unset($vars['method']);

		$this->controller =$out['controller'];

		$this->method     =($out['method'])?$out['method']:'index';
		
		$this->params     =$vars;

		$this->params['uri']=$this->uri;

		if("/"==substr($this->params['uri'], 0,1)) $this->params['uri']=substr($this->params['uri'],1);

		// prin([$this->controller,$this->method,$this->params]);

	}	


	function render(){


		global $Config;

		global $start;

		$vars = [];



		if(isset($_GET['routes'])){
		
			// $this->create_controllers();

			prin($this->routes);

			exit();

		}



		$uri=SERVER::relativePath(
			
			SERVER::host()
			// ($start['root'])?$start['root']:$Config['url_publica']
		);

		// prin(SERVER::host());
		

		if($uri=='') $uri='/$';


		$this->uri=$uri;


		// Is there a literal match?  If so we're done
		if(isset($this->routes[$uri]))
		{

			return $this->output($this->routes[$uri]);

		}


		// Loop through the routes array looking for wild-cards
		foreach ($this->routes as $key => $val)
		{
			// Convert wild-cards to RegEx
			$key = str_replace(':any', '.+', 
					 str_replace(':num', '[0-9]+', $key));

			$patern = '#^'.$key.'$#';
			// Does the RegEx match?
			if (preg_match($patern, $uri))
			{

				// Do we have a back-reference?
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
				{
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}

				return $this->output($val);

			}

		}

		if($uri=='/runtime/jsons')
		{

			return $this->output('controller=Runtime&method=generatejsons');

		}

		if($uri=='/runtime/updatedb')
		{

			return $this->output('controller=Runtime&method=updatedatabase');

		}		

		header("HTTP/1.0 404 Not Found");
		
		include('../404.html');

		
		// prin($this->routes);


		// die("'$uri' => 404");
		// prin($SERVER);

		// header('Location: '.$SERVER['BASE'].'404.html');

		// exit();

	}	


	function response(){

		$this->render();

		$met= $this->method;

		$par= $this->params;

		$ooo=[];

			$dom='p-';
			$ooo[strtolower($this->controller)]=$dom.strtolower($this->controller);
			if($this->method!='index')
				$ooo[$met]=$dom.$met;
			$ooo[str_replace('/','',$par[key($par)])]=$dom.str_replace('/','',$par[key($par)]);
			unset($ooo['$']);


		$par['classbody']=implode(' ',$ooo);


		eval("\$obj = new controllers\\".$this->controller."(\$par);");

		$obj->$met($par);

	}


	private function create_controllers(){


		$controll=[];
		
		foreach($this->routes as $ruta){
			parse_str($ruta,$output);
			if(in_array($output['method'],[''])){
				$output['method']='index';
			}
			if(
				!in_array($output['method'],['$1']) and
				!file_exists('app/controllers/'.$output['controller'].'.php')
				){
				$controll[$output['controller']][$output['method']]=$output['method'];
			}
		}

		foreach($controll as $contr=>$methods){

$txt="<?php 
namespace controllers;

class ".$contr." extends Controller {

";

			foreach($methods as $method){

				$layout='layout_'.strtolower($contr). ( ($method=='index')?'':'_'.strtolower($method) );

				if(!file_exists('app/sources/jade/'.$layout.'.jade')){

$jade="include ../../../../work/sources/jade/includes.jade
		
block body

	include common/header.jade
	
	main
	
	include common/footer.jade";

				$f1=fopen('app/sources/jade/'.$layout.'.jade',"w+");
				fwrite($f1,$jade);
				fclose($f1);
				echo 'app/sources/jade/'.$layout.'.jade created<br>';

			}

	$txt.="	function ".$method."(\$params){


		parent::index(\$params);

		//asing vars
		\$this->view->assign(
			[

			]
		);

		//only for data test
		if(\$this->data_test){
			\$this->view->assign(
				\$this->data_tests->getData([

				])
			);
		}

		//render the view
		\$this->view->render(
			
			'".$layout."'

		);		

	}


";
}

$txt.="
}
";

			$f1=fopen("app/controllers/".$contr.".php","w+");
			fwrite($f1,$txt);
			fclose($f1);	
			echo "app/controllers/".$contr.".php created<br>";

		}

		
	}
		
}

