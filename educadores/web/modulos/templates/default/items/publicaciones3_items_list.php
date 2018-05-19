<?php //á

$THIS=$PARAMS['this'];

$item=$LISTADO[$PARAMS['conector']];

	$SLIDE=$item['SLIDESHOW'];
	
	$FBL=$item['FBL'];

?>
<div id="item_<?php echo $THIS;?>">
    <div class="cuadro ficha_producto <?php 
        web_selector_control($SELECTED,$THIS,"menus,bloques,listados");
        ?>" >
        <?php web_render_esquinas(1,4);
		//prin($FBL);?>        
    
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
       <a href="<?php echo $item['link'];?>" title="<?php echo $item['grupo'];?>"><?php echo $item['titulo'];?></a>
             
       </div>
             
        <div class="div_borde div_inner">
        
			<?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>        
    
            <div class="div_fila div_menu">
                <?php web_render_menu($item['menu'],array(
                                                            'lados_externos'=>1
                                                            ,'lados_internos'=>1
                                                            ,'lados_flotantes'=>1
                                                            ,'id'=>'menu_'.$PARAMS['this']
                                                            )); ?>    
            </div>
    
    		<div class="area_tabs">
            
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1">
			
            	   <?php web_render_slideshow_proceso($SLIDE); ?> 
                   <div class="click">clic en esta foto para ver más grande</div>                               	            

                </div>       
                
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_2">
                    <?php 
					if($item['es_inmueble']){
					web_render_data($item,"descripcion,departamento,provincia,distrito,operacion,amoblamiento,n_dormitorios|Dormitorios,n_ambientes|Ambientes,n_banos|Baños,n_cocheras|Cocheras
		,area_terrenos|Área,area_construida|Área construída,area_ocupada|Área ocupada,pisos_privados|Pisos elevados,pisos_publicos|Pisos públicos,zonificacion|Zonifiación,piscina|Piscina,terraza|Terraza,jardin|Jardín,ascensores|Ascensores"); 
					} else {
					web_render_data($item,"marca|Marca,codigo|Código,descripcion"); 						
					}
					?>                      
					<?php if($item['fichero']!=''){ ?>
                	<div class='data'>
                    <div class="div_fila"><a class="pdf" style="color:#F60;" href="<?php echo $item['down'];?>"><?php echo $item['nombre_fichero'];?></a><br /><br /></div>
                    </div>
                    <?php } ?>                    
                    <?php if($item['tiene_precio']) web_render_data($item,"precios_texto|Precios"); ?>                      
                </div>
        
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab"  id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_3">
                	<div class='data'>
                    <?php echo $item['politica_legal']; ?>
                    </div>
                </div>   
                                
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_4">
                	<div class='data'>
                    <img  <?php echo $item['get_atributos'];?> class='foto_texto' />
                    <?php echo $item['extra_texto']; ?>
                    </div>
                </div>  
                
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_5">
                	<div class='data'>
	                <?php include(incluget("formularios/comentarios.php")); ?>    
                    </div>
                </div>                                                    
                
            </div>        

    		<div class="file_derecha">
            
	            <div class="div_fila"><?php web_render_facebook_like($FBL); ?></div>                
                
	            <div class="div_fila">
                <?php if($item['tiene_precio']){ ?>
                	<a class="carrito" title="Agregar a carrito" 
                    onclick="javascript:carrito({accion:'agregar',id:'<?php echo $item['id'];?>'},0,1); return false;" 
                    href="#">Agregar a carrito</a>  
                <?php } ?>
                </div>
                                            
    		</div>
            
            <div class="clean"></div>
                        
            <?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>   
                 
        </div> 
        
    
       <div class="barra_abajo"></div>
    
    </div>
</div>

<script language="javascript">
//if(window.location.hash=='#consulta'){ ShowTab('menu_productos_file','5'); } 
//if(window.location.hash=='#descripcion'){ ShowTab('menu_productos_file','2'); } 
</script>
