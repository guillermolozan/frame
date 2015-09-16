<?php 

namespace core;

Class Tests {

	var $colors;
	var $cats;
	var $lorem_html;
	var $lorem_text;
	var $aligns;
	var $fake;
	var $videos;

	function __construct($fake){

		$this->fake=($fake=='')?'lorempixel':$fake;

	}

	function load_vars(){

		$this->aligns=[
			'left-align',
			'right-align',
			'center-align',
		];

		$this->lorem_html="
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>
<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>
<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
";

		$this->lorem_text="Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, comes from a line in section 1.10.32.</p>";

		$this->colors=[
			'b3e5fc',
			'b2ebf2',
			'ffcdd2',
			'e1bee7',
			'd1c4e9',
			'c5cae9',
			'c8e6c9',
			'b3e5fc',
			'b2ebf2',
			'ffcdd2',
			'e1bee7',
			'd1c4e9',
			'c5cae9',
			'c8e6c9'			
			];

		$this->cats=[
			'abstract',
			'animals',
			'business',
			'cats',
			'city',
			'food',
			'nightlife',
			'fashion',
			'people',
			'nature',
			'sports',
			'technics',
			'transport'
		];

		$this->videos=[
		'eVIpNcV6KUA',
		'L7BY0BdRJps',
		'kbZqyftj-BA',
		'E4fykZyas90',
		'jemheOQ_A6g',
		'TpmvYX9IDO8',
		'0nVN57oWEic',
		'MtfCfZUScSM',
		'IMu4Xq_g4Oo',
		'poZCCJY_qnA',
		'uGruA-MuP84',
		'sdv3G292wL4',
		'zKTjqeQMEhU',
		'zLC71-04R2o',
		'gu0HudNPq7w',
		'V033sW-Q9rM',
		'poZCCJY_qnA',
		'GyAYA60SK5U',
		'mLmDx4jKydw',
		'm13v-DFXAqk'
		];

	}

	function getData($request){

		$this->load_vars();

		$colors     =$this->colors;
		$cats       =$this->cats;
		$lorem_html =$this->lorem_html;
		$lorem_text =$this->lorem_text;
		$aligns		=$this->aligns;
		$fake			=$this->fake;
		$videos		=$this->videos;

		$path = '../work/data_test/';

		$response=[];

		if(!is_array($request)){
			
			$reque['return']=$request;

			$request = $reque;

		}


		foreach($request as $request_name => $request_type){

			unset($img);
			unset($url);
			unset($sub);
			unset($text);
			unset($class);
			unset($target);
			unset($video);
			unset($name);
			// unset($dims);

			// prin($request_type);
			$request_pars=explode("?",$request_type);

			if(sizeof($request_pars)==1){

				$resp=$request_type;

			} elseif(sizeof($request_pars)==2){
				
				$type   =$request_pars[0];
				$params =$request_pars[1];
				parse_str($params);

				switch($type){

					case "gallery":
						$resp=require $path.$type.'.php';
					break;

					case "post":
						$resp=require $path.$type.'.php';
					break;

					default:
						if(is_numeric($type))
							$resp=substr($lorem_text,0,$type);
						else
							$resp=str_replace('|','-',str_replace(['-','/'],[' ',''],$type));
					break;

				}

			}

			$herer=explode(".",$request_name);
			if(sizeof($herer)==1)
				$response[$herer[0]]=$resp;
			elseif(sizeof($herer)==2)
				$response[$herer[0]][$herer[1]]=$resp;
			elseif(sizeof($herer)==3)
				$response[$herer[0]][$herer[1]][$herer[2]]=$resp;
			elseif(sizeof($herer)==4)
				$response[$herer[0]][$herer[1]][$herer[2]][$herer[3]]=$resp;			
		}

		if(isset($response['return']))
			return $response['return'];
		else
			return $response;

	}
	
}