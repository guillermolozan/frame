<?php //á

$THIS=$PARAMS['this'];

$item=$OBJECT[$PARAMS['this']];

$SLIDE=$item['SLIDESHOW'];


?>
<div >
    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,fichas");
        ?>" >
        <?php //web_render_esquinas(1,4);
		//prin($FBL);?>        
    
       <div class="barra_arriba">
       <?php //web_render_item_borde('bors-b',1,2);?>
       
       <?php /* <a href="<?php echo $item['url'];?>" title="<?php echo $item['nombre'];?>"><?php echo $item['nombre'];?></a>*/ ?>
             
       <?php echo $item['ruta']; ?>      
             
       </div>
             
        <div class="div_borde div_inner listado_item">
        
			<?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>        
    
    		<div class="area_tabs">
            
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1">
			
            	   <?php web_render_slideshow_proceso($SLIDE); ?> 
                   <?php /*<div class="click">clic en esta foto para ver más grande</div>*/ ?>

                </div>       
                
                <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_2">
                	<h1 class='nombre'><?php echo $item['nombre'];?></h1>
                    <div class="texto"><?php echo $item['descripcion'];?></div>                                      
                    <div class="precio"><?php echo $item['precio'];?></div>                                      
					<?php //if($item['tiene_precio']){ ?>
                        <a class="carrito" title="Agregar a carrito" 
                        onclick="javascript:carrito({accion:'agregar',id:'<?php echo $item['id'];?>'},0,1); return false;" 
                        href="#">Agregar a carrito</a>  
                    <?php //} ?>                    
                </div>                                                        
                
            </div>        
            
            <div class="clean"></div>
                        
            <?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>   
                 
        </div> 
        
    
       <div class="barra_abajo"></div>
    
    </div>
</div>
<style>
#<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1 { margin:0px 0px 10px 10px; float:left; width:370px; clear:none; }
#<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_2 { margin:0px 0px 10px 10px; float:left; width:280px; clear:none; }
.<?php echo 'menu_'.$PARAMS['this'];?>_area_tab .data { padding:0; }
</style>

