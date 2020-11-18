<?php 
namespace core;

class Runtime {


	function __construct(){


	}

	function download($params){ 


		if(isset($params['item'])){
			
			$content=[
				'txt'=>"text/plain",
				'pdf'=>"application/pdf",
				'doc'=>"application/vnd.ms-word",
				'xls'=>"application/vnd.ms-excel",
			];

			// prin($vars);
			$file=$vars['params']['download'];
			// $file='imagenes_dir/doc_fil/2018/05/17/doc_1526563619.pdf';
			$parts	=explode("/",$file);
			$complete_name	=strtolower($parts[sizeof($parts)-1]);

			list($short_name,$ext)	=explode(".",$complete_name);

			// if(!file_exists($file))
			// {
			// 	die('Error: File not found.');
			// }

			header("Pragma: public"); // required
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); // required for certain browsers
			header("Content-Type: ".$content[$ext]);
			header("Content-Disposition: attachment; filename=\"".$complete_name."\";" );
			header("Content-Transfer-Encoding: binary");
			// header("Content-Length: ".$stat['size']);

			readfile($file);			

		}



	}


	function generatejsons($params){

		global $vars_array;
		// prin($params);

		$runtimejson=$_SERVER['REQUEST_URI'];

		$host='http:'.Server::base();

		$urls= require 'urltests.php';


		$route=new Routes();

		$vars=[];

		foreach($urls as $url){

	    	$_SERVER['REQUEST_URI']=str_replace('//','/',str_replace('/runtime/jsons',"/".$url."/",$runtimejson))."?array";
	    	// prin($_SERVER['REQUEST_URI']);
	    	$route->response();

		}
		// echo json_encode($vars_array);
		echo (file_put_contents("json/data.json",json_encode($vars_array)))?'json/data.json created':'nada';

	}


	function updatedatabase($params){

		$geturl='http:'.str_replace('frame','sistemapanel',Server::base()).'panel/maquina.php?accion=importdb&tablas=';

		echo "$geturl\n";
		// echo file_get_contents($geturl);

	}


	function start($params){

		$proy=[
			'framework_css' => 'materialize',
    		'build_css' 	=> 'app.css',
			'extension_css' => 'styl',
			'source_dir_css'=>'stylus',
		];

		$proy_file='project.json';
		if(file_exists($proy_file)){
			$proyjson = implode("",file($proy_file));
			$proy = json_decode($proyjson,true);
		}
		
		
		$touch_file='touch.json';
		if(!file_exists($touch_file))
			file_put_contents($touch_file,'{"v":"1"}');


		echo '<pre>';



		global $vars_array;

		// prin($vars_array);

		// $runtimejson=$_SERVER['REQUEST_URI'];

		$host='http:'.Server::base();

		$file_components=APP.'/config/components.php';
		$file_components_work='../work/app/config/'.$proy['framework_css'].'_components.php';
		
		if(!file_exists($file_components))
			// echo "crear $file_components \n";
			file_put_contents($file_components,"<?php
return [
];");


		// echo getcwd();
		$components_work= require $file_components_work;
		$components= require $file_components;

		$components=array_merge($components_work,$components);
			
		$externals=[];
		$external_jade=[];
		$external_stylus=[];
		$external_es6=[];


		$jade_dir         = APP.'/sources/jade';
		$stylus_dir       = APP.'/sources/'.$proy['source_dir_css'];
		$es6_dir          = APP.'/sources/es6';
		$components_dir   = APP.'/sources/components';
		
		
		$jade_includes    = $jade_dir.'/includes';
		$jade_common      = $jade_dir.'/common';
		
		
		$stylus_file      = $stylus_dir."/".$proy['build_css'];
		$es6_file         = $es6_dir."/".$proy['source_file_js'];
		
		$read_stylus_file =implode("",file($stylus_file));

		$start_components_stylus='/* Begin Components */';
		$finish_components_stylus='/* Finish Components */';

		// echo getcwd().'<br>';

		foreach(['foot','head','includes'] as $lefi){
			$final_lefi=$jade_common."/$lefi.jade";
			if(!file_exists($final_lefi))			
				file_put_contents($final_lefi,"include ../../../../../work/sources/jade/$lefi.jade");
		}

		// exit();

		if(
			!enhay($read_stylus_file,$start_components_stylus)
			or
			!enhay($read_stylus_file,$finish_components_stylus)
			){


			$write_stylus_file=$read_stylus_file."

$start_components_stylus
$finish_components_stylus

";

		echo "escribir $stylus_file 
";

		file_put_contents($stylus_file,$write_stylus_file);


		}



		$read_es6_file    =implode("",file($es6_file));

		$start_components_es6='// Begin Components';
		$finish_components_es6='// Finish Components';

		if(
			!enhay($read_es6_file,$start_components_es6)
			or
			!enhay($read_es6_file,$finish_components_es6)
			){

// 			echo '<pre>'.str_replace("});

// })(jQuery);", "", $read_es6_file).'</pre>';

			$write_es6_file=str_replace("});
})(jQuery);", "", $read_es6_file)."

$start_components_es6
$finish_components_es6

});
})(jQuery);
";
		echo "escribir $es6_file
";
		file_put_contents($es6_file,$write_es6_file);

		}


//
//
//


		if(!file_exists($jade_includes))
			mkdir($jade_includes);


		$files=scandir($jade_includes);


		foreach($files as $file){
			if(!in_array($file,['.','..'])){
				unlink($jade_includes.'/'.$file);
			}
		}
		// exit();

		$relative_jade   ="../../../../../";
		$relative_stylus ="../../../../";
		$relative_es6    ="../../../../";

		$dirr=explode("/",getcwd());
		$dir=end($dirr);

		$stylus_lines='';
		$es6_lines=='';

// 		echo $components_dir."
// ";
		// prin($components);
		foreach($components as $file=>$com0){

			list($com,$option)=explode("|",$com0);
			// $options=explode(",",$option);
			$expl=explode("/",$com);
			$size=sizeof($expl);
			if($size==2){
				// external
				$name=$expl[1];
				$directorio=$expl[0].'/'.$components_dir;
				$externals[]=[
					'dir'=>$directorio.'/'.$name,
					'file'=>$name,
					'option'=>$option
				];
			}elseif($size==1){
				// local
				$name=$com;
				$directorio=$dir.'/'.$components_dir;
				$local_components[]=$com;

				$externals[]=[
					'dir'=>$directorio.'/'.$name,
					'file'=>$name,
					'option'=>$option
				];

			}


			$final_route=$directorio.'/'.$name;
			
			// echo "../".$final_route.'<br>
// ';
			if(file_exists("../".$final_route.'_trash'))
				rename("../".$final_route.'_trash',"../".$final_route);

			if(!file_exists("../".$final_route))
				mkdir("../".$final_route);


			$final_jade   =$final_route.'/'.$name.'.jade';
			$final_stylus =$final_route.'/'.$name.'.'.$proy['extension_css'];
			$final_es6    =$final_route.'/'.$name.'.js';


			// if(file_exists("../".$final_jade))
			// 	$write_jade_line ="include $relative_jade"."$final_jade";
			// else
			// 	$write_jade_line ="//- include $relative_jade"."$final_jade file doesn't exits";

			if(!file_exists("../".$final_jade))
				file_put_contents("../".$final_jade,"");


			$write_jade_line ="include $relative_jade"."$final_jade";


			file_put_contents($jade_includes.'/'.$file.'.jade',$write_jade_line);

			echo $write_jade_line
			.' // '
			.$file
			.'
';


			// STYLUS
			if(enhay($option,'css')){

				if(!file_exists("../".$final_stylus))
					file_put_contents("../".$final_stylus,"");
				$stylus_lines.="@import '".$relative_stylus.$final_stylus."';\n";

			}

			// ES6
			if(enhay($option,'es6')){

				if(!file_exists("../".$final_es6))
					file_put_contents("../".$final_es6,"module.exports = ()=>{
		if(is_local)
			console.log('".$name."');
		// if($('.class').length>0){
			// requirejs(['vendor.min'],()=>{
				// loadCss('vendor.css');

			// });
		// }
	}
	");

				$es6_lines.="require(\"".$relative_es6.$final_es6."\")();\n";
		    
			}



		}

		// echo getcwd()."\n";
		// echo $jade_dir."\n";

		$external_dir_jade=$jade_dir."/externals";
		if(!file_exists($external_dir_jade))
			mkdir($external_dir_jade);

		$external_dir_stylus=$stylus_dir."/externals";
		if(!file_exists($external_dir_stylus))
			mkdir($external_dir_stylus);

		$external_dir_es6=$es6_dir."/externals";
		if(!file_exists($external_dir_es6))
			mkdir($external_dir_es6);


		// prin($externals);

		foreach($externals as $exter){

			$external_jade[]='"./../'.$exter['dir'].'/'.$exter['file'].'.jade"';
			if(enhay($exter['option'],'css'))
				$external_stylus[]='"./../'.$exter['dir'].'/'.$exter['file'].'.'.$proy['extension_css'].'"';
			if(enhay($exter['option'],'es6'))
				$external_es6[]='"./../'.$exter['dir'].'/'.$exter['file'].'.js"';

		}

		// prin($external_es6);

		file_put_contents($external_dir_jade.'/external.json',"[\n".implode($external_jade,",\n")."\n]");
		file_put_contents($external_dir_stylus.'/external.json',"[\n".implode($external_stylus,",\n")."\n]");
		file_put_contents($external_dir_es6.'/external.json',"[\n".implode($external_es6,",\n")."\n]");

		// echo "external dirs \n";
		// print_r($externals);

		file_put_contents($stylus_file,putbetween(
			"\n".$stylus_lines,
			implode("",file($stylus_file)),
			$start_components_stylus,
			$finish_components_stylus
		));

		file_put_contents($es6_file,putbetween(
			"\n".$es6_lines,
			implode("",file($es6_file)),
			$start_components_es6,
			$finish_components_es6
		));

		echo "


".$stylus_lines."

";
		echo "
".$es6_lines."
";



		// prin($files);


		// echo getcwd();
		// $urls= require 'urltests.php';


		// $route=new Routes();

		// $vars=[];

		// foreach($urls as $url){

	 	//    	$_SERVER['REQUEST_URI']=str_replace('//','/',str_replace('/runtime/jsons',"/".$url."/",$runtimejson))."?array";
	 	//    	// prin($_SERVER['REQUEST_URI']);
	 	//    	$route->response();

		// }
		// // echo json_encode($vars_array);
		// echo (file_put_contents("json/data.json",json_encode($vars_array)))?'json/data.json created':'nada';
		echo '</pre>';


		// prin($local_components);
		$filesss=scandir($components_dir);
		// prin($filesss);
		foreach($filesss as $filess){
			if(
				(substr($filess,-6)!='_trash') and
				(!in_array($filess,['.','..'])) and
				(!in_array($filess,$local_components)) 
				){
				// echo substr($filess,-6)."<br>";
				$direccc="../".$dir."/".$components_dir."/".$filess;
				if(file_exists($direccc)){

					rename($direccc,$direccc."_trash");
				}
				// echo '<br>';
			}
		}


	}

}