<?php

chdir("../");
include("lib/include_base.php");

$items= select(
        "id,nombre,estructura,relevancia"
        ,"productos_items"
        ,"where 1 and estructura in (1,2,3,4) and  visibilidad='1' order by relevancia asc limit 0,100"
        ,0
        );
		
$e1=array();$e2=array();$e3=array();$e4=array();

foreach($items as $item){
if($item['estructura']=='1'){
$e1[]=$item;
} elseif($item['estructura']=='2'){
$e2[]=$item;
} elseif($item['estructura']=='3'){
$e3[]=$item;
} elseif($item['estructura']=='4'){
$e4[]=$item;
}
}

foreach($e1 as $ii=>$it){
	if($ii==0){
		update(array('relevancia'=>'1'),'productos_items','where id="'.$it['id'].'"');
	} else {
		update(array('relevancia'=>'0','estructura'=>'0'),'productos_items','where id="'.$it['id'].'"');
	}
}

foreach($e2 as $ii=>$it){
	if($ii==0){
		update(array('relevancia'=>'2'),'productos_items','where id="'.$it['id'].'"');
	} elseif($ii==1){
		update(array('relevancia'=>'3'),'productos_items','where id="'.$it['id'].'"');
	} else {
		update(array('relevancia'=>'0','estructura'=>'0'),'productos_items','where id="'.$it['id'].'"');
	}
}

foreach($e3 as $ii=>$it){
		$j=$ii+4;
		update(array('relevancia'=>$j),'productos_items','where id="'.$it['id'].'"');
}

foreach($e4 as $ii=>$it){
		$k=$j+1+$ii;
		update(array('relevancia'=>$k),'productos_items','where id="'.$it['id'].'"');
}
		
update(array('relevancia'=>'0'),'productos_items','where estructura="0"');

?>