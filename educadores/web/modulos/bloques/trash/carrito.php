<?php //á

switch($_POST['accion']){
case "agregar":

	$Carrito=array();
	$set_aumentar=0;
	$session_items=$_SESSION['carrito'];
	unset($_SESSION['carrito']);

	if(sizeof($session_items)>0){
		foreach($session_items as $e=>$itca){
			$put=1;
			if($itca['i']==trim($_POST['id'])){

				$carr=$itca;
				if($_POST['c']=='0'){ 
					$put=0;  							//echo "uno";
				}
				elseif(is_numeric($_POST['c'])){
					$carr['c']=$_POST['c'];				//echo "dos";
				}
				elseif(!isset($_POST['c'])){
					$carr['c']++;						//echo "tres";
				}
				$set_aumentar=1;
				
			} else {
			
				$carr=$itca;
				
			}
			
			if($put==1){

				$Carrito[]=$carr;
				
			}
		}
	}
	if($set_aumentar==1) {

		$_SESSION['carrito']=$Carrito;
	
	} else {
	
		$_SESSION['carrito'] =	$session_items;
		$NUEVO_ITEM = select_fila(
				"id as i,nombre as n,precio as u,file as f,fecha_creacion as t"
				,"productos_items"
				,"where id='".$_POST['id']."' "
				,0
				,array(
						'f'=>array('get_archivo'=>array(
													'carpeta'=>'prodite_imas'
													,'fecha'=>'{t}'
													,'file'=>'{f}'
													,'tamano'=>'2'
													)
												)
						,'c'=>1
						,'t'=>array('url_encode_seo'=>array(
													'string'=>'{n}'
													)
												)
						,'n'=>array('ucwords'=>array(
													'string'=>'{n}'
													)
												)												
						,'l'=>array('procesar_url'=>array(
													'url'=>'index.php?modulo=item&tab=productos&id={t}'
													)
												)							    
						//,'t'=>array('null'=>'')
					  )
				);	
			
		   $_SESSION['carrito'][]=$NUEVO_ITEM;
									
	}
	
	
	echo json_encode($_SESSION['carrito']);		
	
break;
case "vaciar":
	
	unset($_SESSION['carrito']);
	echo json_encode($_SESSION['carrito']);		

break;
}

?>