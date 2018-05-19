<?php //á

$THIS=$PARAMS['this'];

$ITEM=$OBJECT[$PARAMS['this']];

?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
        
        <div class="barra_arriba">
        <?php web_render_item_borde('bors-b',1,2);?>    	    
        <?php echo $ITEM['titulo']; ?>
        </div>

		<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1">
		   
		   <?php
		   echo "<ul class='album'>";
		   foreach($ITEM['fotos'] as $foto){
			   echo "<li class='thumb'>";
			   echo "<a rel='imagezoom[album]' ";
			   echo "href='".$foto['href']."' ";
			   //echo "style='background-image:url(".$foto['foto_thumb'].");' title='".$foto['foto_descripcion']."' ";
			   echo ">";
			   echo "<img ";
			   //echo " src='".$foto['foto_thumb']."' ";
			   echo $foto['get_atributos'];
			   echo "alt='".$foto['foto_descripcion']."' >";
			   echo "</a>";
			   echo "</li>";
			}
		   echo "</ul>"; 	
		   ?>
		   <?php //web_render_slideshow_proceso($SLIDE); ?>                                	            

		</div>    
             
        <div class="div_borde div_inner">
		            
            <?php echo $ITEM['texto']; ?>          
        </div>
        
    </div>
 
</div> 