<?php //á

$THIS=$PARAMS['this'];
//$SLIDE=$SLIDESHOW[$PARAMS['conector']];
//$ITEMS=array($LISTADO[$PARAMS['conector']][sizeof($LISTADO[$PARAMS['conector']])-1]);
$ITEMS=$LISTADO[$PARAMS['this']];

//prin($ITEMS);
//prin($COMMON['archivos']);

?>

<div id="app_<?php echo $THIS."_".$grupo['id'];?>" class="listado_productos cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques,listados");
	?>" >
   <?php web_render_item_borde('bors-b'); ?>   

    <div class="div_fila">
    <?php //echo $ITEMS['ruta']; ?>
    </div>
    <div class="clean"></div>
	
       <div class="barra_arriba">
		   <?php //web_render_item_borde('bors-b',1,2);?>        
            
            <div class="listado_paginacion" style="float:right;">
            <?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
            <!--<a class="ver_todos">Ver todos los productos de esta categoría</a>-->
            </div>
            
           <h2><?php echo $ITEMS['titulo'];?></h2>

       </div>

    <div class="clean"></div>

    <div class="cuadro">
    	
        <div class="div_borde div_inner" >
                                
                        <?php  
						//prin($ITEMS['filas']);
                        if(sizeof($ITEMS['filas'])==0){ ?><p class="vacio"><?php echo $ITEMS['vacio']; ?></p><?php } else {						
							
                            ?>
                                <ul  class="listado_items">   
                                <?php foreach($ITEMS['filas'] as $item){  ?>                                             
                                    <li class="listado_item">
                                       <div class="capa" >
                                         <div class="inner" >
                                            <a href="<?php echo $item['url'];?>" class="titulo" title="<?php echo $item['nombre'];?>" >
                                         	<?php echo $item['nombre'];?> 
                                         	</a>
                                            <a href="<?php echo $item['foto']['archivo'];?>" class="foto<?php echo ($item['foto'])?'':' fotoempty';?>" title="<?php echo $item['nombre'];?>">
                                         	<img <?php echo $item['foto']['get_atributos'];?> />
                                         	</a>
                                            <a class="verdescripcion" title="Ver detalle del producto" href="<?php echo $item['url'];?>">Ver detalle</a>
                                            <div class="div_fila" >
							                <?php if($item['tiene_precio']){ ?>                                            
                                            <?php echo $item['precios_soles'];?>
                                            <?php } ?>                          
                                            <a href="<?php echo $item['url'];?>" title="Ver detalle del producto" class="lupa" ></a>
							                <?php if($item['tiene_precio']){ ?>
											<a class="carrito" title="Agregar a carrito" 
                                            onclick="javascript:carrito({accion:'agregar',id:'<?php echo $item['id'];?>'},0,1); return false;" 
                                            href="#"></a>                
                                            <?php } ?>                            
                                            </div>
                                         </div>                                     
                                       </div>                    
                                    </li>							   

                                <?php } ?>
                                </ul> 
                            <?php 
						}
                        ?>
                          
        </div>
    
	</div>
    
    <div class="barra_abajo">
    	<div class="listado_paginacion">
    	<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
        <!--<a class="ver_todos">Ver todos los productos de esta categoría</a>-->
        </div>
   </div>  

</div> 
       

	<script>
	window.addEvent('domready', function() {
	 
		ReMooz.assign('.listado_items .listado_item a.foto', {
			'origin': 'img',
			'shadow': 'onOpenEnd', // fx is faster because shadow appears after resize animation ( alue can be true, onOpenEnd )
			'resizeFactor': 0.8, // resize to maximum 80% of screen size
			'cutOut': false, // don't hide the original
			'opacityResize': 0.4, // opaque resize
			'dragging': true, // disable dragging
			'centered': true // resize to center of the screen, not relative to the source element
		});
	 
	});
	</script>