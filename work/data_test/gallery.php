<?php 

$number      = (isset($number))? $number : 6;
$name        = (isset($name))? $name : "photo";

$name        =str_replace(['/','-'],['',' '],$name);
// $fake     = ($fake)? $fake : "fakeimg";

$respon      = [];
$colors_rand = array_rand($colors,$number);
$cats_rand   = array_rand($cats,$number);
$videos_rand = array_rand($videos,$number);
$aligns_rand = array_rand($aligns);

$dims        = ($dims)? $dims : "1400x500";


for($i=1; $i<=$number; $i++){
	
	$txt     = $name;
	
	$urltext = urlencode($name);
	
	$color   = $colors[$colors_rand[$i-1]];
	$cat     = $cats[$cats_rand[$i-1]];
	$align   = $aligns[array_rand($aligns)];

	$res=[];


	// $res['name']  = $txt;


	if(isset($name))
		$res['name']  = (is_numeric($name))?substr($lorem_text,0,$name):$name;

	if(isset($class))
		$res['class'] = ($class=='')?$align:$class;

	if(isset($text))
		$res['text']  = (is_numeric($text))?substr($lorem_text,0,$text):$lorem_html;

	if(isset($sub))
		$res['sub']  = (is_numeric($sub))?substr($lorem_text,0,$sub):$lorem_html;

	if(isset($url)){
		// if("/"==substr($url, 0,1)) $url=substr($url,1);		
		$res['url']  = ($url=='')?'#':$url;
	}

	if(isset($target))
		$res['target']  = $target;

	if(isset($video))
		$res['video']=$videos[$videos_rand[$i-1]];

	if(isset($img))
		if($fake=='lorempixel'){

			$res['img']="http://lorempixel.com/".str_replace("x","/",$dims)."/".$cat."/".$dims;

		} else {

			$res['img']="http://fakeimg.pl/$dims/$color/?text=$dims";

		}

	foreach($res as $ii=>$re){

		$res[$ii]=str_replace("[N]","$i",$re);

	}

	$respon[] = $res;

}

return $respon;