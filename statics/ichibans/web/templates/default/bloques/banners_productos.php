<?php //á

$THIS=$PARAMS['this'];

//$ITEMS=$LISTADO[$PARAMS['conector']];

$ITEMS=$OBJECT[$PARAMS['conector']];

?>
<div class="div_fila">
<?php foreach($ITEMS as $ITEM){ ?>
<div class="div_columna" style="margin-right:2px;">
    <div class="cuadro <?php 
       web_selector_control($SELECTED,$THIS,"bloques,listados");
       ?>" >
       <?php web_render_esquinas(1,4);?>        
    
       <div class="barra_arriba">
       <?php web_render_item($ITEM['header']); ?>
       </div>
       
       <div class="div_borde div_inner">

            <div  id="contenedor_slider_<?php echo $ITEM['settings']['label'];?>_fijo" class="contenedor_slider_fijo">
                <div  id="contenedor_slider_<?php echo $ITEM['settings']['label'];?>_movil" class="contenedor_slider_movil">
                    <?php
                    if(sizeof($ITEM['settings']['num_items'])==0){ ?><p class="vacio"><?php echo $ITEM['settings']['vacio']; ?></p><?php } else {
                        foreach($ITEM['items_bloques'] as $i=>$itembloque){ 
                        ?>
                        <div class="slid">                              
                        <?php //SLIDE FRAME INICIO ?>    
                            <ul  class="listado_items">   
                            <?php foreach($itembloque as $item){  ?>                                             
                                <li class="listado_item">
                                   <div class="capa" >
                                     <div class="inner" >
                                        <div class="div_fila" >
                                            <?php web_render_item($item,$item['esquema']); ?>								
                                        </div>
                                     </div>                                     
                                   </div>                    
                                </li>							   
                            <?php } ?>
                            </ul> 
                        <?php //SLIDE FRAME FIN ?>
                        </div>                          
                        <?php 
                        }
                    }
                    ?>
                                 
                </div>
            </div>
            
            
        </div>        
    
       <div class="barra_abajo listado_paginacion">
	        <?php web_render_slider_pie($ITEM['settings']); ?>       
       </div>
    
    </div>

</div>    
<?php } ?>
</div>

