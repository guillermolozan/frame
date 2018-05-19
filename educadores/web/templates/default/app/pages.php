<?php //á
//prin($PAGINA);

$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];

?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$THIS,"bloques");
    ?>" ><?php web_render_esquinas(1,4);?>

    <div class="barra_arriba">
    <?php //web_render_item_borde('bors-b',1,2);?>        
    <?php echo $PAGINA['titulo']; ?>
    </div>
    <div class="div_borde div_inner">

        <?php if($PAGINA['foto']!=''){ ?>
        <div style="margin-bottom:10px;float:left;"><img  <?php echo $PAGINA['get_atributos']; ?> class="margen_der" /></div>
        <?php } ?>
        <?php echo $PAGINA['texto']; ?>        
    
    </div>

</div>