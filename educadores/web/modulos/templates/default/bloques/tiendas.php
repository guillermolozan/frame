<?php //á

$THIS=$PARAMS['this'];

//$ITEMS=$LISTADO[$PARAMS['conector']];

$ITEMS=$NOODSLICE[$PARAMS['conector']];

?>
<div id="listado_<?php echo $THIS;?>">
<?php foreach($ITEMS as $NOOB){ ?>

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,listados");
        ?>" >
        <?php //web_render_esquinas(1,4);?>        
    
             
        <div class="div_borde div_inner">
               
            <!--            
            <a id="ver_video_cerrar" href="#" onclick="cerrar_ver_video(); return false;">volver a la lista de videos</a>
            <div id="ver_video_titulo"></div>
            <div id="ver_video_eventos_embed" style="text-align:center; position:relative;"></div>
            -->

            <div  id="contenedor_slider_<?php echo $NOOB['label'];?>_fijo" class="contenedor_slider_fijo">                
                <div  id="contenedor_slider_<?php echo $NOOB['label'];?>_movil" class="contenedor_slider_movil">
                                    
                    <?php  
                    if(sizeof($NOOB['num_items'])==0){ ?><p class="vacio"><?php echo $NOOB['vacio']; ?></p><?php } else {
                        foreach($NOOB['items_bloques'] as $i=>$itembloque){ 
                        ?>
		                <div class="slid">                              
                            <ul  class="listado_items">   
                            <?php foreach($itembloque as $item2){ ?>                                             
                            <!--FRAME BEGIN-->    
                            	<li class="listado_item"><div class="barra_arriba"><?php echo $item2['nombre'];?></div></li>
	                            <?php foreach($item2['sub_select'] as $item){ ?>                                             
                                <li class="listado_item">
									<?php if($item['link']!=''){ ?><a target="_blank" href="<?php echo $item['link'];?>" title="<?php echo $item['foto_descripcion'];?>"><?php } ?>
                                    	<img border="0" <?php echo $item['get_atributos'];?> alt="<?php echo $item['foto_descripcion'];?>" /></a>
                                	<?php if($item['link']!=''){ ?></a><?php } ?>  
                                </li>
	                            <?php } ?>
                            <!--FRAME END-->
                            <?php } ?>
                            </ul> 
                        </div>
                        <?php 
                        }
                    }
                    ?>
                                 
                </div>
            </div>
            
            
        </div>        
    
       <div class="barra_abajo listado_paginacion">
	        <?php web_render_slider_pie($NOOB); ?>       
       </div>
    
    </div>
	<?php web_render_slider_javascript($NOOB); ?>    
<?php } ?>
</div>

