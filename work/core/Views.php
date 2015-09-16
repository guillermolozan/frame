<?php 

namespace core;

Class Views {

	var $views;
	var $vars    = [];
	var $options = [];
	var $params  = [];
	var $vars_array  = [];



	public function __construct( $views , $vars=[] ){

		$this->views =$views;
		
		$this->vars     =$vars;

		$this->options['jadeCompiled'] = false;

	}

	public function assign ($var,$val=NULL){

		if(is_array($var) and $val==NULL ){
			foreach($var as $index=>$value){
				$this->vars[$index]=$value;				
			}
		} else {
			$this->vars[$var]=$val;
		}
		return $this;

	}

	public function setOption ($var,$value){

		$this->options[$var]=$value;
		return $this;
	}

	public function render ( $file='index', $vars=[] ){

		global $vars_array;

		if($this->options['jadeCompiled']){

			require_once "../work/vendor/php/jade/runtime.php";
			
		}

		$vars = array_merge($this->vars,$vars);

		extract($vars);
		
		if(isset($vars['params']['debug'])){

			if($vars['params']['debug']==''){

				prin($vars);

			} else {

				prin($vars[$vars['params']['debug']]);

			}

			exit();

		}

		if(isset($vars['params']['json'])){

			// echo getcwd();

			$rout="app/sources/jade/test";

			$vars['base']=str_replace('//localhost/frame','//localhost:8080',$vars['base']);

			$vars['link_home']='./html/';

			echo json_encode($vars);

			file_put_contents("json/".$file.".json",json_encode($vars));

			exit();

		}

		if(isset($vars['params']['array'])){

			$vars['base']=str_replace('//localhost/frame','//localhost:8080',$vars['base']);

			$vars['link_home']='./html/';

			$vars_array[$file]=$vars;

			return;

		}


		if(!file_exists(APP."/".$this->views."/".$file.".php")) die (APP."/".$this->views."/".$file.".php not found"); 

		require APP."/".$this->views."/".$file.".php";

	}


}