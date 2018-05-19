<?php //á

$THIS=$PARAMS['this'];

//$ITEMS=$LISTADO[$PARAMS['conector']];

$ITEMS=$OBJECT[$PARAMS['this']]['items'];

if(sizeof($ITEMS)>0){
?>
<div class="div_fila">
<div class="cuadro <?php 
       web_selector_control($SELECTED,$OBJECT[$PARAMS['this']]['classStyle'],"bloques,arboles,listados");
       ?>" >
       <?php web_render_esquinas(1,4);?>
            
       <?php
	   
       echo '<div class="barra_arriba">';
	   echo 'Organizaciones';
	   echo '</div>';
	   
	   ?>
       <div class="div_borde div_inner">
		   <ul class='arbol_items' id='escudos'>
		   <?php foreach($ITEMS as $ITEM){ ?>
		   <li class='menu_nivel_2 '><a href='#' onclick='return false;' rel='nofollow'><?php echo $ITEM['header']['nombre'];?></a></li>
		   
		   <li class='menu_nivel_3 '>
				<div  id="contenedor_slider_<?php echo $ITEM['settings']['label'];?>_fijo" class="contenedor_slider_fijo">
					<div  id="contenedor_slider_<?php echo $ITEM['settings']['label'];?>_movil" class="contenedor_slider_movil">
						<?php
						if(sizeof($ITEM['settings']['num_items'])==0){ ?><p class="vacio"><?php echo $ITEM['settings']['vacio']; ?></p><?php } else {
							foreach($ITEM['items_bloques'] as $i=>$items){
							?>
							<div class="slid">                              
							<?php //SLIDE FRAME INICIO ?>    
								<div class="div_borde">
									<?php web_render_items($items); ?>
								</div>
							<?php //SLIDE FRAME FIN ?>
							</div>   
							<?php 
							}
						}
						?>
					</div>
				</div>
			</li>    
			<?php } ?>    
			</ul>
        </div>        
       <div class="barra_abajo"><?php /*
	        <?php //web_render_item($ITEM['footer']); ?>       
	       <div class="listado_paginacion">
	       		<?php web_render_slider_pie($ITEM['settings']); ?>       
           </div> */ ?>
       </div>
	  
    </div>
</div>
<script>
window.addEvent('domready', function(){ new Fx.Accordion('#escudos .menu_nivel_2', '#escudos .menu_nivel_3'); })
</script>
<?php } ?>