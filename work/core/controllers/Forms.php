<?php 
namespace core\controllers;


class Forms extends \controllers\Controller {

	var $message = false;
	var $default_message = "Mensaje Enviado";
	var $email;
	var $force;

	function __construct($params){
		
		parent::__construct($params);

	}

	function setForce($vars){
		foreach($vars as $val=>$var){

			if($val=='_POST'){
				foreach($var as $ele=>$men){
					$_POST[$ele]=$men;
				}
			} 

			elseif($val=='_SERVER'){
				foreach($var as $ele=>$men){
					$_SERVER[$ele]=$men;
				}
			}

		}
	}

	function setMessage($email,$msg=false){

		$msg=($msg)?$msg:$this->default_message;

		$this->message=$msg;

		// prin($this->email);

		if($this->view->vars['email_test']){

			$this->message.= '<ul><li>pruebas</li>';
			foreach($email->files_test as $fils){
				$this->message.='<li><a target="_black" href="'.$fils['link'].'">'.$fils['link'].'</a></li>';
			}
			$this->message.='</ul>';
	
		}

	}

 	function processFields($options=[]){

		$fields3=[];

		foreach($this->fields as $name=>$item)
		{
			$fields2=$item;
			
			$fields2['name']=$name;

			if(!isset($item['type']))	$fields2['type']='text';

			if(!isset($fields2['placeholder']))	$fields2['placeholder']=$fields2['label'];
			
			if(!isset($fields2['autocomplete']))	$fields2['autocomplete']='nope';


			if(!isset($item['class'])){
			
				$fields2['class']='';

			} else {
				
				if(enhay($item['class'],'validate') and !isset($item['required'])){

					$fields2['required']='1';
		
				}

			}

			if(!isset($item['value']))	$fields2['value']='';

			if($fields2['required']=='1'){

				$fields2['label']=$fields2['label']."*";

			}

			foreach($options['all'] as $one=>$two){

				$fields2[$one]=$two;

			}

			$fields3[]=$fields2;
		}

		return $fields3;

	}


	function emailFields($type="text"){

		if($type=="html"){

			$html="<table>";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=
							"<tr><th colspan=2><br>".
							$item['label'].
							"</th></tr>".
							"<tr><td colspan=2>".
							$_POST[$name].
							"</td></tr>";
					break;
					default:
						$html.=
							"<tr><th>".
							$item['label']."</th>".
							"<td>: ".
							$_POST[$name].
							"</td></tr>";
					break;
				}	
			}

			$html.="</table>";

		} elseif($type=="txt"){

			$html="\n\n";

			foreach($this->fields as $name=>$item)
			{	
				switch($item['type']){
					case "textarea":
						$html.=$item['label'].":\n".$_POST[$name]."\n\n";
					break;
					default:
						$html.=$item['label'].": ".$_POST[$name]."\n\n";
					break;
				}	
			}

			$html.="\n\n";

		}

		return $html;

	}


	function insertFields(){
		
		$fields=[];

		foreach($this->fields as $name=>$item)
		{	
			$fields[$name]=$_POST[$name];
		}

		return $fields;

	}

}