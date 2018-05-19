<?php

	chdir("../");	
	
	$directoriS=array();
	function get_dirs_recur($directorio){
	
	global $directoriS;
	
	$Directorios=array();
	$Directorios['nombre']=$directorio."/";
	$directoriS[]=$directorio."/";
	$directorio_s = dir($directorio."/");
	while($fichero=$directorio_s->read()) {
		
		if($fichero!='.' and $fichero!='..'  and is_dir("$directorio/".$fichero) ){
			$Directorios['items'][]=get_dirs_recur("$directorio/".$fichero);
		}
	}	
	
	return $Directorios;
	
	}
	
	get_dirs_recur("..");

	$dirs=$directoriS;
	
	//echo "<pre>"; print_r($directoriS); echo "</pre>";
	
	foreach($directoriS as $dir){
		
		echo "<br><br><b>$dir</b><br><br>"; 
		
		$bomsfiles=array();
		$archivos=array();	
		$noutf8files=array();
		if(@$directorio = dir($dir)){
		while($fichero=$directorio->read()) {
			if($fichero!='.' and $fichero!='..' and !is_dir($dir.$fichero) and ( substr(strtolower($fichero),strlen($fichero)-4,4)=='.php' ) ){
			$archivos[]=$fichero;
			} 
		}
		$directorio->close();	
		}
		
		foreach($archivos as $archivo){
			$contentA=file($dir.$archivo);
			//echo $dir.$archivo."<br>";
			$have_bom=(tiene_bom($dir.$archivo))?1:0;
			$es_utf8 =(es_utf8($dir.$archivo))?1:0;		
			echo "$archivo ";
			echo ( ($es_utf8)?"":"<span style='color:blue;'>no es utf8</span>" ) . " ";
			echo ( ($have_bom)?"<span style='color:red;'>tiene bom</span>":"" ) . " ";		
			echo  "<br>";
			if($have_bom){ $bomsfiles[]=$archivo; }
			if(!($es_utf8)){ $noutf8files[]=$archivo; /*break;*/ }		
		}
		
		//echo "<pre>"; print_r($bomsfiles); echo "</pre>";
		
		foreach($bomsfiles as $archi){
			quitarbom($dir.$archi);
		}	
		
		foreach($noutf8files as $archi){
			//echo $dir.$archi."<br>";
			convertiraUtf8($dir.$archi);
		}		
	
		/*
		echo ( tiene_bom($dir."casas_rurales.php") )?"tiene bom":"no tiene bom";
		echo "<br>";
		quitarbom($dir."casas_rurales.php");
		echo ( tiene_bom($dir."casas_rurales.php") )?"tiene bom":"no tiene bom";
		*/

	}
		
	function convertiraUtf8($filename) {
	
		$file = @fopen($filename, "r");
		$utf8 = utf8_encode(fread($file,3000000));
		
		$fileA=explode("\n",$utf8);
		if(strpos($utf8,"//á")==false){
		
		if( ltrim(substr($fileA[0],0,5))=="<?php" )
		{ 
		$fileA[0]=str_replace("<?php","<?php //á\n",$fileA[0]);
		} elseif( ltrim(substr($fileA[0],0,2))=="<?"  )
		{
		$fileA[0]=str_replace("<?","<?php //á\n",$fileA[0]);
		} else
		{
		$fileA[0]="<?php //á\n?>".$fileA[0];
		}		
		$file2 = @fopen($filename, "w");
		fwrite($file2,implode("\n",$fileA));		
		
		}
		
		/*	
		$file = @fopen($filename, "r");
		$utf8 = fread($file,3000000);
		$fileA=file($filename);
		if( !(strpos($fileA[0],"<?php")==false) and (strpos($utf8,"//á")==false)  )
		{ 
		$fileA[0]=str_replace("<?php","<?php //á",$fileA[0]);
		} elseif( !(strpos($fileA[0],"<?")==false) and (strpos($utf8,"//á")==false)  )
		{
		$fileA[0]=str_replace("<?","<?php //á",$fileA[0]);
		}
		writeUTF8File($filename,utf8_encode(implode($fileA)));
		//quitarbom($filename);
		*/
	}
		
	function quitarbom($filename) {
		$file = @fopen($filename, "r");
		$sinbom = str_replace(b"\xEF\xBB\xBF",b"",fread($file,3000000));
		$file2 = @fopen($filename, "w");
		fwrite($file2,$sinbom);

	}	
	
	function writeUTF8File($filename,$content) {
			$dhandle=fopen($filename,"w");
			# Now UTF-8 - Add byte order mark
			fwrite($dhandle, pack("CCC",0xef,0xbb,0xbf));
			fwrite($dhandle,$content);
			fclose($dhandle);
	}	
	
	function es_utf8($filename){
		$file = @fopen($filename, "r");
		$x = fread($file,3000000);	
	    if(mb_detect_encoding($x)=='UTF-8'){
		return true;
		} else {
		return false;
		}
	}
	
	function tiene_bom($filename) {
		$file = @fopen($filename, "r");
		$bom = fread($file, 3);
		if ($bom != b"\xEF\xBB\xBF")
			return false;
		else
			return true;
	}			
	//echo "<pre>"; print_r($archivos); echo "</pre>";
?>