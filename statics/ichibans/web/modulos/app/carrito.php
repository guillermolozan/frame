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
				"id as i,nombre as n,precio as u,fecha_creacion"
				,"productos_items"
				,"where id='".$_POST['id']."' "
				,0
				,array(
					    //,'n'=>array('limit_string'=>array('string'=>"{n}",'limit'=>"36"))					
						'f'=>array('sub_foto'=>array(
													"id,file,foto_descripcion,fecha_creacion|productos_fotos|where id_item='{i}' and visibilidad='1' order by id desc limit 0,1"
													,"profot_imas"
													,array( 
														 'get_archivo'=>'2'
																	//,'get_archivo'=>'2'
															)
														)
													)					
						
						,'c'=>1
						,'t'=>array('url_encode_seo'=>array('string'=>'{n}'))
						//,'n'=>array('ucwords'=>array('string'=>'{n}'))	
					    ,'l'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=productos&acc=file&id={i}&friendly={t}")),		
						//,'t'=>array('null'=>'')
					  )
				);	
				
		   $NUEVO_ITEM['f']=$NUEVO_ITEM['f']['get_archivo'];
		   
		   $_SESSION['carrito'][]=$NUEVO_ITEM;
									
	}
	
	//print_r($_SESSION['carrito']);
	
	echo json_encode($_SESSION['carrito']);		
	
break;

case "vaciar":
	
	unset($_SESSION['carrito']);
	echo json_encode($_SESSION['carrito']);		

break;
}

?>