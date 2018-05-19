<?php //á

chdir("../");
include("lib/include_base.php");

$_SESSION=($_SESSION)?$_SESSION:$_GET;

$items= select(
        "id,nombre,estructura,relevancia"
        ,"news_items"
        ,"where 1 and estructura in (1,2,3) and page='".$_SESSION['page']."' and visibilidad='1' order by relevancia asc limit 0,100"
        ,0
        );
	
$e1=array();$e2=array();$e3=array();

foreach($items as $item){
if($item['estructura']=='1'){
$e1[]=$item;
} elseif($item['estructura']=='2'){
$e2[]=$item;
} elseif($item['estructura']=='3'){
$e3[]=$item;
}
}
$j=1;
foreach($e1 as $ii=>$it){
	if($j==1){
		update(array('relevancia'=>$j++),'news_items','where id="'.$it['id'].'"');
	} else {
		update(array('relevancia'=>'0','estructura'=>'0'),'productos_items','where id="'.$it['id'].'"');
	}
}

$j=2;
foreach($e2 as $ii=>$it){
	if($j<=11){
		update(array('relevancia'=>$j++),'news_items','where id="'.$it['id'].'"');
	} else {
		update(array('relevancia'=>'0','estructura'=>'0'),'news_items','where id="'.$it['id'].'"');
	}
}

$j=12;
foreach($e3 as $ii=>$it){
	if($j<=14){
		update(array('relevancia'=>$j++),'news_items','where id="'.$it['id'].'"');
	} else {
		update(array('relevancia'=>'0','estructura'=>'0'),'news_items','where id="'.$it['id'].'"');
	}
}
		
update(array('relevancia'=>'0'),'news_items','where estructura="0"');

?>