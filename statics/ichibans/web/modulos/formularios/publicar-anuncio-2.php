<?php //á
//error_reporting(E_ERROR);
		
if(isset($_SESSION['publicar']['usuario_temp'])){

	$ID=select_dato("id","productos_items","where anunciante='".$_SESSION['publicar']['usuario_temp']."'",0);

	$CARGAR =$LOAD['publicar-anuncio-2'] = select_fila(
	"nombre as titulo, descripcion, 
	marca,modelo,kilometraje,anio,tipo_auto,condicion,combustible,timon,traccion,cambios,color,
	area,dormitorios,direccion,zona,antiguedad,estacionamientos,area_ocupada,area_total,
	banos, precio, moneda, anunciante, tipo, id_grupo as grupo, id_subgrupo as subgrupo, departamento, provincia, distrito, anio, file, foto_descripcion, fecha_creacion, combustible, timon, traccion, cambios, color, direccion, zona, antiguedad, estacionamientos, area_ocupada, area_total"
			,"productos_items"
			,"where id='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
                'carpeta'=>'prodite_imas'
                ,'tamano'=>'4'
                ,'foto_1'=>array('get_archivo'=>array(
                                            'carpeta'=>'{carpeta}'
                                            ,'fecha'=>'{fecha_creacion}'
                                            ,'file'=>'{file}'
                                            ,'tamano'=>'{tamano}'
                                            )
                                        )			
			)
		);

	$vistas = select(
        "id,id_grupo,file,foto_descripcion,fecha_creacion"
        ,"productos_items_vistas"
        ,"where id_grupo='".$ID."' order by id asc limit 0,100"
        ,0
        ,array(
        	               
                'carpeta'=>'proitevis_imas'
                ,'tamano'=>'3'
                ,'foto'=>array('get_archivo'=>array(
                                            'carpeta'=>'{carpeta}'
                                            ,'fecha'=>'{fecha_creacion}'
                                            ,'file'=>'{file}'
                                            ,'tamano'=>'{tamano}'
                                            )
                                        )
              	    
    
              )
    );
	//prin($vistas);
	
	$LOAD['publicar-anuncio-2']['foto_2']=$CARGAR['foto_2']=$vistas[0]['foto'];
	$LOAD['publicar-anuncio-2']['foto_3']=$CARGAR['foto_3']=$vistas[1]['foto'];
	$LOAD['publicar-anuncio-2']['foto_4']=$CARGAR['foto_4']=$vistas[2]['foto'];
	$LOAD['publicar-anuncio-2']['foto_5']=$CARGAR['foto_5']=$vistas[3]['foto'];	
	
	foreach(array('foto_1','foto_2','foto_3','foto_4','foto_5') as $carga){
		if( (!(strpos($CARGAR[$carga],"spacer.gif")===false)) or substr($CARGAR[$carga],-1,1)=="/" ){
			$CARGAR[$carga]=$LOAD['publicar-anuncio-2'][$carga]="";
		}
	}
	
	$CARGAR['id_grupo']=$_GET['id_grupo']=($_GET['id_grupo'])?$_GET['id_grupo']:url_encode_seo(select_dato("nombre","productos_grupos","where id='".$CARGAR['grupo']."'",0));
	$CARGAR['id_subgrupo']=$_GET['id_subgrupo']=($_GET['id_subgrupo'])?$_GET['id_subgrupo']:url_encode_seo(select_dato("nombre","productos_subgrupos","where id='".$CARGAR['subgrupo']."'",0));
	$CARGAR['id_departamento']=$_GET['id_departamento']=($_GET['id_departamento'])?$_GET['id_departamento']:url_encode_seo(select_dato("nombre","geo_departamentos","where id='".$CARGAR['departamento']."'",0));
	$CARGAR['id_provincia']=$_GET['id_provincia']=($_GET['id_provincia'])?$_GET['id_provincia']:url_encode_seo(select_dato("nombre","geo_provincias","where id='".$CARGAR['provincia']."'",0));
	$CARGAR['id_distrito']=$_GET['id_distrito']=($_GET['id_distrito'])?$_GET['id_distrito']:url_encode_seo(select_dato("nombre","geo_distritos","where id='".$CARGAR['distrito']."'",0));

} else {		

	$CARGAR=$LOAD['publicar-anuncio-2']=array(
	'tipo'=>'1'
	/*
	,'titulo'=>'título'
	,'descripcion'=>'descripción'
	,'area'=>'1000'
	,'marca'=>'marca'
	,'precio'=>'1000'
	,'foto'=>'http://kankio.com/imagenes_dir/upload_temp/2009/12/17/temp_1261076877_647x363_orig.jpg'		
	*/
	
	,'titulo'=>''
	,'descripcion'=>''
	,'precio'=>''
	,'foto'=>''

	,'marca'=>''	
	,'modelo'=>''	
	,'kilometraje'=>''
	,'anio'=>''
	,'tipo_auto'=>''
	,'condicion'=>''
	,'area'=>''
	,'dormitorios'=>''
	,'banos'=>''

	,'moneda'=>'1'	
	
	,'id_grupo'=>$_GET['id_grupo']
	
	,'id_subgrupo'=>$_GET['id_subgrupo']
	,'id_departamento'=>$_GET['id_departamento']
	,'id_provincia'=>$_GET['id_provincia']
	,'id_distrito'=>$_GET['id_distrito']
	);

}

	$ITEMS['marcas'] = select(
			"id,nombre"
			,"marcas"
			,"where 1 and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'selected'=>array('match'=>array(
											'a'=>'{id}'
											,'b'=>$CARGAR['marca']
											,'equal'=>'selected'
											,'else'=>''
											)
							   )						   
				)
			);
		
	if($CARGAR['marca']!=''){
	$ITEMS['modelos'] = select(
			"id,nombre"
			,"modelos"
			,"where id_marca='".$CARGAR['marca']."' and visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'selected'=>array('match'=>array(
											'a'=>'{id}'
											,'b'=>$CARGAR['modelo']
											,'equal'=>'selected'
											,'else'=>''
											)
							   )
				)
			);
	}	
 
	
	
	$LOCALIZACION['ruta'] = "<b>".url_decode_seo($_GET['id_departamento'])."</b> &gt; "
						."<b>".url_decode_seo($_GET['id_provincia']). "</b> &gt; "
						."<b>".url_decode_seo($_GET['id_distrito'])."</b>";
						
	$CATEGORIAS['ruta'] = "<b>".url_decode_seo($_GET['id_grupo'])."</b> &gt; "
						   ."<b>".url_decode_seo($_GET['id_subgrupo'])."</b>";
						   
	$CATEGORIAS['grupo']['id'] =  $dato = select_dato("id","productos_grupos","where nombre='".url_decode_seo($_GET['id_grupo'])."'",0);
	$CATEGORIAS['subgrupo']['id'] =  $dato = select_dato("id","productos_subgrupos","where nombre='".url_decode_seo($_GET['id_subgrupo'])."'",0);
	
						   
	$PUBLICAR_1['LINK'] = procesar_url('index.php?modulo=pagina-formulario&tab=publicar-anuncio-1'.web_follow_url(array('id_departamento','id_provincia','id_distrito','id_grupo','id_subgrupo')));
	
	
	
			$FORMULARIO['publicar-anuncio-2']=array(
					'nombre'=>'publicar-anuncio-2'
					,'legend'=>"Publicar Anuncio"
					,'ajax'=>'1'
					,'method'=>'post'
					,'action'=>'ajax.php?mode=form&tab=publicar-anuncio-2'
					//,'action'=>'index.php?modulo=pagina-formulario&tab=contacto'
					,'exito'=>''
					,'error'=>'Error en el envio, por favor vuelva a intentarlo'				
					,'submit'=>' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_siguiente.jpg" '
					,'submiting'=>' src="'.$SERVER['BASE'].THEME_PATH.'img/ico_enviando.jpg" '
					,'pie'=>'Los campos con * son obligatorios'
					,'campos'=>array(
						array(
							'campo'=>array('id_departamento','id_provincia','id_distrito','id_grupo','id_subgrupo')
							,'tipo'=>'input_hidden'
							,'value'=>array($CARGAR['id_departamento'],$CARGAR['id_provincia'],$CARGAR['id_distrito'],$CARGAR['id_grupo'],$CARGAR['id_subgrupo'])
						)												
						,'tipo'=>array(
							'label'=>'Tipo de aviso'
							,'tipo'=>'input_radio'
							,'opciones'=>array('1'=>'Ofrezco','2'=>'Busco')
							,'campo'=>array('tipo')
							,'value'=>array($CARGAR['tipo'])
						)					
						,'titulo'=>array(
							'label'=>'Título'
							,'tipo'=>'input_text'
							,'validacion'=>"validate['required','length[50,-1]']"
							,'campo'=>array('titulo')
							,'value'=>array($CARGAR['titulo'])
						)						
						,'descripcion'=>array(
							'label'=>'Descripción'
//							,'tipo'=>'textarea'							
							,'validacion'=>"validate['required','length[50,-1]']"
							,'tipo'=>'html'
							,'campo'=>array('descripcion')
							,'value'=>array($CARGAR['descripcion'])
						)	

					)			
				,'complete'=>"
						var json=JSON.decode(ee,true);
						if(json.t=='error'){
						new Element('div', {
							'class': 'mensaje mensaje_'+json.t,
							'html': json.m,
							'id': 'mensaje_'+json.n										
						}).inject($(json.n+'_form_body'), 'before');
						$0(json.n+'_form_body');
						} else if(json.t=='exito'){
							location.href=json.u;
						}
			"
			);

if($_SESSION['login']['status']==1){
	
	$FORMULARIO['publicar-anuncio-2']['submit']=' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_publicar-anuncio.jpg" ';
	$FORMULARIO['publicar-anuncio-2']['url']="index.php?modulo=pagina-static&tab=final-publicacion";

} else {

	$FORMULARIO['publicar-anuncio-2']['submit']=' type="image" src="'.$SERVER['BASE'].THEME_PATH.'img/ico_siguiente.jpg" ';
	$FORMULARIO['publicar-anuncio-2']['url']='index.php?modulo=pagina-formulario&tab=registro';

}
	
				
	$extra['marca']=array(
					'label'=>'Marca'
					,'campo'=>array('marca','modelo')
					,'value'=>array($CARGAR['marca'],$CARGAR['modelo'])
					,'control'=>'control_marca'
						);
						
	$extra['kilometraje']=array(
					'label'=>'Kilometraje'
					,'tipo'=>'input_text'
					,'campo'=>array('kilometraje')
					,'value'=>array($CARGAR['kilometraje'])
					,'after'=>'kilometros'
					);
					
	$extra['anio']=array(
					'label'=>'Año'
					,'tipo'=>'input_combo_rango'
					,'campo'=>array('anio')
					,'value'=>array($CARGAR['anio'])
					,'from'=>2010
					,'to'=>1940
					);
					
	$extra['tipo_auto']=array(
					'label'=>'Tipo de Auto'
					,'tipo'=>'input_combo'
					,'campo'=>array('tipo_auto')
					,'value'=>array($CARGAR['tipo_auto'])
					,'opciones'=>array('1'=>'2 puertas','2'=>'4 puertas','3'=>'camioneta pickup','4'=>'convertible-descapotable','5'=>'vans y minivans','6'=>'vehículo deportivo','7'=>'otro')
					);
					
	$extra['condicion']=array(
					'label'=>'Condición'
					,'tipo'=>'input_radio'
					,'campo'=>array('condicion')
					,'value'=>array($CARGAR['condicion'])                    
					,'opciones'=>array('1'=>'nuevo','2'=>'usado')
					);

	$extra['combustible']=array(
					'label'=>'Combustible'
					,'tipo'=>'input_combo'
					,'campo'=>array('combustible')
					,'value'=>array($CARGAR['combustible'])                    
					,'opciones'=>array('1'=>'Gas','2'=>'Gasolina','3'=>'Diésel','4'=>'Etanol','5'=>'Híbrido','6'=>'Eléctrico','7'=>'Dual')
					);

	$extra['timon']=array(
					'label'=>'Timón'
					,'tipo'=>'input_radio'
					,'campo'=>array('timon')
					,'value'=>array($CARGAR['timon'])                    
					,'opciones'=>array('1'=>'Cambiado','2'=>'Original')
					);
					
	$extra['traccion']=array(
					'label'=>'Tracción'
					,'tipo'=>'input_radio'
					,'campo'=>array('traccion')
					,'value'=>array($CARGAR['traccion'])                    
					,'opciones'=>array('1'=>'Delantera','2'=>'Posterior','3'=>'4x4','4'=>'AWD','5'=>'Tiptronic')
					);
					
	$extra['cambios']=array(
					'label'=>'Cambios'
					,'tipo'=>'input_radio'
					,'campo'=>array('cambios')
					,'value'=>array($CARGAR['cambios'])                    
					,'opciones'=>array('1'=>'Mecánico','2'=>'Automático','3'=>'Secuencial')
					);
										
	$extra['color']=array(
					'label'=>'Color'
					,'tipo'=>'input_combo'
					,'campo'=>array('color')
					,'value'=>array($CARGAR['color'])                    
					,'opciones'=>array('1'=>'Blanco','2'=>'Negro','3'=>'Gris','4'=>'Plata','5'=>'Rojo','6'=>'Vino','7'=>'Beige','8'=>'Verde','9'=>'Amarillo','10'=>'Azul','11'=>'Marrón','12'=>'Ocre','13'=>'Otro')
					);					
					
/////////////////////////////////////////////////////////// INMUEBBLE ///////////////////////

	$extra['area']=array(
					'label'=>'Área'
					,'tipo'=>'input_text'
					,'campo'=>array('area')
					,'value'=>array($CARGAR['area'])
					,'validacion'=>"validate['required','number']"					
					,'after'=>'m2'					
					);
										
	$extra['dormitorios']=array(
					'label'=>'Dormitorios'
					,'tipo'=>'input_text'
					,'campo'=>array('dormitorios')
					,'value'=>array($CARGAR['dormitorios'])
					);
																				
	$extra['direccion']=array(
					'label'=>'Dirección'
					,'tipo'=>'input_text'
					,'campo'=>array('direccion')
					,'value'=>array($CARGAR['direccion'])
					);
					
	$extra['zona']=array(
					'label'=>'Zona'
					,'tipo'=>'input_text'
					,'campo'=>array('zona')
					,'value'=>array($CARGAR['zona'])
					);																			
					
	$extra['antiguedad']=array(
					'label'=>'Antiguedad'
					,'tipo'=>'input_combo'
					,'campo'=>array('antiguedad')
					,'value'=>array($CARGAR['antiguedad'])                    
					,'opciones'=>array('1'=>'En proyecto','2'=>'De Estreno','3'=>'Menos de 1 año','4'=>'Entre 1 año y 5 años','6'=>'Entre 5 y 10 años','7'=>'Más de 10 años')
					);
						
	$extra['estacionamientos']=array(
					'label'=>'Número de estacionamientos o garages'
					,'tipo'=>'input_text'
					,'campo'=>array('estacionamientos')
					,'value'=>array($CARGAR['estacionamientos'])
					);
					
	$extra['area_ocupada']=array(
					'label'=>'Área Ocupada'
					,'tipo'=>'input_text'
					,'campo'=>array('area_ocupada')
					,'value'=>array($CARGAR['area_ocupada'])
					,'validacion'=>"validate['required','number']"					
					,'after'=>'m2'					
					);
					
	$extra['area_total']=array(
					'label'=>'Área Total'
					,'tipo'=>'input_text'
					,'campo'=>array('area_total')
					,'value'=>array($CARGAR['area_total'])
					,'validacion'=>"validate['required','number']"					
					,'after'=>'m2'					
					);											
															
	$extra['banos']=array(
					'label'=>'Baños'
					,'tipo'=>'input_text'
					,'campo'=>array('banos')
					,'value'=>array($CARGAR['banos'])
					);
					

										
	$extra['precio']=array(
					'label'=>'Precio'
					,'tipo'=>'input_precio'
					,'control'=>'control_precio'
					,'campo'=>array('moneda','precio')
					,'after'=>'(escriba un número válido sin comas)'
					,'value'=>array($CARGAR['moneda'],$CARGAR['precio'])
					,'validacion'=>"validate['required','number']"					
					);					
	
	$extra['foto']=array(
					'label'=>'Foto'
					,'tipo'=>'foto'
					,'campo'=>array('foto_1','foto_2','foto_3','foto_4','foto_5')
					,'value'=>array($CARGAR['foto_1'],$CARGAR['foto_2'],$CARGAR['foto_3'],$CARGAR['foto_4'],$CARGAR['foto_5'])
					);																							
							
	if(!in_array($CATEGORIAS['grupo']['id'],array('4','7'))){
	
		$FORMULARIO['publicar-anuncio-2']['campos']['precio']=$extra['precio'];			
		
	}
	if(in_array($CATEGORIAS['grupo']['id'],array('5')) and !in_array($CATEGORIAS['subgrupo']['id'],array('41')) ){
		
		$FORMULARIO['publicar-anuncio-2']['campos']['marca']=$extra['marca'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['kilometraje']=$extra['kilometraje'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['anio']=$extra['anio'];			

		$FORMULARIO['publicar-anuncio-2']['campos']['combustible']=$extra['combustible'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['color']=$extra['color'];			

		$FORMULARIO['publicar-anuncio-2']['campos']['tipo_auto']=$extra['tipo_auto'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['condicion']=$extra['condicion'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['traccion']=$extra['traccion'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['cambios']=$extra['cambios'];
			
		if(in_array($CATEGORIAS['subgrupo']['id'],array('42')) ){		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['tipo_auto']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['condicion']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['traccion']);			
			unset($FORMULARIO['publicar-anuncio-2']['campos']['cambios']);					
		}
		
		if(in_array($CATEGORIAS['subgrupo']['id'],array('43')) ){	
			unset($FORMULARIO['publicar-anuncio-2']['campos']['marca']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['kilometraje']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['anio']);			
			unset($FORMULARIO['publicar-anuncio-2']['campos']['combustible']);	
			unset($FORMULARIO['publicar-anuncio-2']['campos']['color']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['tipo_auto']);		
			unset($FORMULARIO['publicar-anuncio-2']['campos']['condicion']);			
			unset($FORMULARIO['publicar-anuncio-2']['campos']['traccion']);					
			unset($FORMULARIO['publicar-anuncio-2']['campos']['cambios']);			
		}
					
	}

	if(in_array($CATEGORIAS['grupo']['id'],array('8'))){
	
		$FORMULARIO['publicar-anuncio-2']['campos']['area']=$extra['area'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['dormitorios']=$extra['dormitorios'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['banos']=$extra['banos'];			

		$FORMULARIO['publicar-anuncio-2']['campos']['direccion']=$extra['direccion'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['zona']=$extra['zona'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['antiguedad']=$extra['antiguedad'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['estacionamientos']=$extra['estacionamientos'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['area_ocupada']=$extra['area_ocupada'];			
		$FORMULARIO['publicar-anuncio-2']['campos']['area_total']=$extra['area_total'];			
		
	}		
	
		$FORMULARIO['publicar-anuncio-2']['campos']['foto']=$extra['foto'];			
			
	web_load_lib_mooeditable();
						

	$FORM=$FORMULARIO['publicar-anuncio-2'];
	
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			$_SESSION['publicar']['id_departamento']=$_POST['id_departamento'];
			$_SESSION['publicar']['id_provincia']=$_POST['id_provincia'];
			$_SESSION['publicar']['id_distrito']=$_POST['id_distrito'];						

			if($_SESSION['login']['status']==1){
				$anunciante_temp=$_SESSION['login']['id'];
			} else {
			
				if(!isset($_SESSION['publicar']['usuario_temp'])){
				$anunciante_temp=date("U");			
				} else {
				$anunciante_temp=$_SESSION['publicar']['usuario_temp'];	
				}
			
			}
			
			$data=array(	
			'fecha_creacion'=>"now()"	
			,'fecha_edicion'=>"now()"	
			,'nombre'=>$_POST['titulo']	
			,'descripcion'=>$_POST['descripcion']	
			,'anunciante'=>$anunciante_temp	
	
			,'precio'=>$_POST['precio']	
			,'moneda'=>$_POST['moneda']	
			,'tipo'=>$_POST['tipo']	
			,'id_grupo'=>select_dato("id","productos_grupos","where nombre='".url_decode_seo($_POST['id_grupo'])."'",0)	
			,'id_subgrupo'=>select_dato("id","productos_subgrupos","where nombre='".url_decode_seo($_POST['id_subgrupo'])."'",0)	
			//,'file'=>"$FILE"	
			//,'foto_descripcion'=>"$FOTO_DESCRIPCION"	
			,'departamento'=>select_dato("id","geo_departamentos","where nombre='".url_decode_seo($_POST['id_departamento'])."'",0)	
			,'provincia'=>select_dato("id","geo_provincias","where nombre='".url_decode_seo($_POST['id_provincia'])."'",0)	
			,'distrito'=>select_dato("id","geo_distritos","where nombre='".url_decode_seo($_POST['id_distrito'])."'",0)	
			
			,'marca'=>$_POST['marca']		
			,'modelo'=>$_POST['modelo']		
			,'kilometraje'=>$_POST['kilometraje']		
			,'combustible'=>$_POST['combustible']		
			,'timon'=>$_POST['timon']		
			,'traccion'=>$_POST['traccion']		
			,'cambios'=>$_POST['cambios']		
			,'color'=>$_POST['color']						
			
			,'kilometraje'=>$_POST['kilometraje']		
			,'anio'=>$_POST['anio']		
			,'tipo_auto'=>$_POST['tipo_auto']		
			,'condicion'=>$_POST['condicion']

			,'direccion'=>$_POST['direccion']		
			,'zona'=>$_POST['zona']		
			,'antiguedad'=>$_POST['antiguedad']		
			,'estacionamientos'=>$_POST['estacionamientos']		
			,'area_ocupada'=>$_POST['area_ocupada']		
			,'area_total'=>$_POST['area_total']		
					
			,'area'=>$_POST['area']		
			,'dormitorios'=>$_POST['dormitorios']		
			,'banos'=>$_POST['banos']		
			
			,'visibilidad'=>'1'	
			);
		 
			if(isset($_SESSION['publicar']['usuario_temp'])){
					
				$procesado=update(
				$data           
				,"productos_items"
				,"where id='".$ID."'"
				,0);
				$procesado['id']=$ID;
										
				delete("productos_items_vistas","where id_grupo='".$ID."'",0);    
				
			} else {
			
				$procesado=insert(
				$data           
				,"productos_items"
				,0);
				//print_r("20");		
			}//if usuario_temp
			//print_r("uno");
			//print_r($procesado);

			if( $procesado['success'] ){			
			
				$ii=0;
				foreach(array($_POST['foto_1'],$_POST['foto_2'],$_POST['foto_3'],$_POST['foto_4'],$_POST['foto_5']) as $post){
								
					if($post!=''){	
			
						if($ii==0){
								
							$ret = web_grabar_imagen(
												$post
												,array(
														'prefijo'=>'prodite',
														'carpeta'=>'prodite_imas',
														'tamanos'=>'70x70,100x100,136x136,900x500'
												)
											);
																				
							update(array("file"=>$ret['file'],"fecha_creacion"=>"now()"),"productos_items","where id='".$procesado['id']."' ",0);	
											
						} else {
													
							$ret = web_grabar_imagen(
												$post
												,array(
														'prefijo'=>'proitevis',
														'carpeta'=>'proitevis_imas',
														'tamanos'=>'70x70,136x136,900x500'
												)
											);
																					
							$insert_imagen=insert(array("file"=>$ret['file'],"fecha_creacion"=>"now()","id_grupo"=>$procesado['id']),"productos_items_vistas",0);	
							

														
						}//if ii=0
						
						$RET[]=$ret;						
						
						$ii=1;						
						
					}//if post!=''
					
				}//foreach
				//print_r("10");						
			}//if success
			
			
			
			if(isset($_SESSION['publicar']['usuario_temp'])){
				
				web_eliminar_imagenes($vistas,'70x70,136x136,900x500');	
											
			}
			
										
			//print_r("1");
			if($_SESSION['login']['status']==0){			
				if(!isset($_SESSION['publicar']['usuario_temp'])){
					$_SESSION['publicar']['usuario_temp']=$anunciante_temp;					
				} 
			}
			//print_r("2");				
			if( $procesado['success'] ){
					echo json_encode(array(
								't'=>'exito'
								,'u'=>$FORM['url']
								,'n'=>$FORM['nombre']									
								));	
			} else {
					echo json_encode(array(
								't'=>'error'
								,'m'=>$FORM['error']
								,'n'=>$FORM['nombre']
								));						
			}
			//print_r("3");

		} 
				
?>