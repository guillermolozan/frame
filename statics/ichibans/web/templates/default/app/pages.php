<?php //á
//prin($PAGINA);

$THIS=$PARAMS['this'];

$PAGINA=$PAGE[$THIS];

?>

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>" >

        <?php web_render_esquinas(1,4);?>        
    
       <div class="barra_arriba">
       <?php //web_render_item_borde('bors-b',1,2);?>        
       <?php echo $PAGINA['titulo']; ?>
       </div>
             
        <div class="div_borde div_inner">
		
			<?php /* if($PAGINA['foto']!=''){ ?>
            <div style="margin-bottom:10px;float:left;"><img  <?php echo $PAGINA['get_atributos']; ?> class="margen_der" /></div>
            <?php } */ ?>
            
            <?php echo $PAGINA['texto']; ?>        

			<?php if($PAGINA['foto']!=''){ ?>
            <div style="margin-top:10px;text-align:center;"><img <?php echo $PAGINA['get_atributos']; ?> style="width:600px;height:auto;float:none;" /></div>
            <?php } ?>
			
        </div>
		
       <div class="barra_abajo"></div>
		
        
    </div>
