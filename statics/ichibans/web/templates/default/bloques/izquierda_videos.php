<?php //á

$THIS=$PARAMS['this'];

//$ITEMS=$LISTADO[$PARAMS['conector']];
$ITEMS=$NOODSLICE[$PARAMS['conector']];

?>
<div class="div_fila">
<?php foreach($ITEMS as $NOOB){ ?>
	<div class="cuadro <?php 		   web_selector_control($SELECTED,$THIS,"bloques,listados");		   ?>" >		   <?php web_render_esquinas(1,4);?>		   <div class="barra_arriba">       <?php echo $NOOB['titulo'];?>		   </div>
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
                            <?php foreach($itembloque as $item){ ?>                                             
                            <!--FRAME BEGIN-->    
                                <li class="listado_item">
                                	<div id="video_<?php echo $item['id'];?>" style="display:none;">
										<?php web_render_swf_html('video_'.$item['id'].'_inner'); ?>                                        
                                    </div>
                                    <a rel="sexylightbox[videos]" href="<?php echo $item['link'];?>" class="foto">
                                    <?php if(is_numeric($item['codigo'])){ ?>
                                        <img border="0" width="220px" src="http://i4.ytimg.com/vi/<?php echo $item['codigo'];?>/default.jpg" />
                                    <?php } else { ?>
                                        <img border="0" width="178px" src="http://i4.ytimg.com/vi/<?php echo $item['codigo'];?>/default.jpg" />
                                    <?php } ?>
                                    </a>
                                    <!--nombre-->
                                    <div class="texto"><?php if($item['texto']!=''){ ?><a href="<?php echo $item['url'];?>" ><?php echo $item['texto'];?></a><?php } ?></div>
                                    <h3 class="titulo"><a rel="sexylightbox[videos]" href="<?php echo $item['link'];?>" ><?php echo $item['titulo'];?></a></h3>
                                </li>
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

<script type="text/javascript">
    window.addEvent('domready', function(){
      SexyLightbox = new SexyLightBox({color:'black',dir:'web/templates/default/css/sexylightbox/sexyimages'});
    });
</script>
