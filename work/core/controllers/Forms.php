<?php 
namespace core\controllers;

class Forms extends \controllers\Controller {


	function __construct($params){
		
		parent::__construct($params);

	}


 	function processFields(){

		$fields3=[];

		foreach($this->fields as $name=>$item)
		{
			$fields2=$item;
			
			$fields2['name']=$name;
			
			if(!isset($item['type']))	$fields2['type']='text';

			if(!isset($item['class']))	$fields2['class']='';

			if(!isset($item['value']))	$fields2['value']='';

			$fields3[]=$fields2;
		}

		return $fields3;

	}


	function emailFields(){

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