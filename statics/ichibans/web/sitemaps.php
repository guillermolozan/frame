<?php //á


$panel_path="../panel";

include("ajax_includes.php");

include("modulos/lib/include.php");

include($panel_path.'/lib/sitemap.class.php');

$map = array();

foreach($URLS as $ur=>$URL){
$articles[$URL]=array('priority'=>"1",'loc'=>procesar_url($ur));
}

#########################
#PRODUCTOS
#########################

$ITEMS = select("nombre"
        ,"productos_items"
        ,"where visibilidad='1'"
        ,0
        ,array(
				'nom'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
										)									
				,'link'=>array('procesar_url'=>array(
											'url'=>'index.php?modulo=item&tab=productos&id={nom}'
											)
										)
              )
        );
//prin($ITEMS);
//exit();
foreach($ITEMS as $ITEM){
$articles[]=array('priority'=>"0.6",'loc'=>$ITEM['link']);
}		

#########################
#CATEGORIAS
#########################

$ITEMS = select("nombre"
        ,"productos_grupos"
        ,"where visibilidad='1'"
        ,0
        ,array(
				'nom'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
										)									
				,'link'=>array('procesar_url'=>array(
											'url'=>'index.php?modulo=home&tab=productos&id_grupo={nombre}'
										)
							)
              )
        );


foreach($ITEMS as $ITEM){
$articles[]=array('priority'=>"0.6",'loc'=>$ITEM['link']);
}
		
//prin($ITEMS);
//exit();

#########################
#CREAR SITEMAP
#########################

$web=$vars['REMOTE']['url_publica'];

$fecha='2009-10-28';

//collecting the category section
if(is_array($articles)){
foreach($articles as $article){
  $map[]=array(
			"loc"=>$web."/".$article['loc'],
			"lastmod"=>$fecha,
			"changefreq"=>'monthly',
			"priority"=>$article['priority']
		);
  }
}
//prin($map); exit();
$siteMap = new sitemap();
$siteMap->prepare($web);
$siteMap->siteDir = "../";
$siteMap->file_name = "sitemap.xml";
//$siteMap->proxy='proxy.isp.net'; // use if the proxy is enabled in your ISP , use NULL in your site
//$siteMap->proxy_port='3311'; // use if the proxy is enabled in your ISP , use NULL in your site
if(!$siteMap->addElements($map)){
die('error');	
};

?>