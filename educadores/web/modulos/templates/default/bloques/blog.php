<?php //á

$THIS=$PARAMS['this'];

//$ITEMS=$LISTADO[$PARAMS['conector']];

$ITEMS=$OBJECT[$PARAMS['conector']];
?>
<div class="div_fila">
<?php foreach($ITEMS as $ITEM){ ?>
<div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"menus,bloques,listados");
        ?>" >
       <?php //web_render_esquinas(1,4);?>        
       
        <div class="div_fila div_menu">
            <?php web_render_menu($ITEM['menu'],array(
                                                        'lados_externos'=>1
                                                        ,'lados_internos'=>1
                                                        ,'lados_flotantes'=>1
                                                        ,'id'=>'menu_'.$PARAMS['this']
                                                        )); ?>    
        </div>
        
		<?php $TABS=$ITEM['grupos'];?>
        <div class="area_tabs">
        
        
            <? /*NOTAS*/ $ITEM=$TABS['notas']; ?>	
            
            <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1">	
            
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
               <div class="barra_abajo">
			       <?php web_render_item($ITEM['footer']); ?>               
	           		<div class="listado_paginacion">
                    <?php web_render_slider_pie($ITEM['settings']); ?>       
                    </div>
               </div>
               
            </div>
            
            
            <? /*ACTIVIDADES*/ $ITEM=$TABS['actividades']; ?>	
            
            <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_2">	
            
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
               <div class="barra_abajo">
			       <?php web_render_item($ITEM['footer']); ?>               
	           		<div class="listado_paginacion">
                    <?php web_render_slider_pie($ITEM['settings']); ?>       
                    </div>
               </div>
               
            </div>            
            
            
            <? /*FOTOS*/ $ITEM=$TABS['fotos']; ?>	
            
            <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_3">	
            
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
               <div class="barra_abajo">
			       <?php web_render_item($ITEM['footer']); ?>               
	           		<div class="listado_paginacion">
                    <?php web_render_slider_pie($ITEM['settings']); ?>       
                    </div>
               </div>
               
            </div>
            
            
            <? /*VIDEOS*/ $ITEM=$TABS['videos']; ?>	
            
            <div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_4">	
            
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
               <div class="barra_abajo">
			       <?php web_render_item($ITEM['footer']); ?>               
	           		<div class="listado_paginacion">
                    <?php web_render_slider_pie($ITEM['settings']); ?>       
                    </div>
               </div>
               
            </div>    
                               
            
        </div>   
</div>           
<?php } ?>
</div>

