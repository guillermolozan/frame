<?php 

$res=[];

if(isset($name))
	$res['name']=(is_numeric($name))?substr($lorem_text,0,$name):ucfirst(str_replace('-',' ',str_replace('/',' ',$name)));

if(isset($text))
	$res['text']=(is_numeric($text))?substr($lorem_text,0,$text).'</p>':(($text=='')?$lorem_text:$text);
	// $res['text']=$lorem_html;

if(isset($html))
	$res['html']=(is_numeric($html))?substr($lorem_html,0,$html).'</p>':(($html=='')?$lorem_html:$html);

if(isset($video))
	$res['video']='eVIpNcV6KUA';

if(isset($img)){

	$cat     	= $cats[array_rand($cats)];
	$color     	= $colors[array_rand($colors)];

	if($fake=='lorempixel'){

		$res['img']="http://lorempixel.com/".str_replace("x","/",$img)."/".$cat;

	} else {

		$res['img']="http://fakeimg.pl/$img/$color/?text=$img";

	}

}

return $res;