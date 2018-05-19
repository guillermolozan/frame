<?php //á

$THIS=$PARAMS['this'];



// $PARAMS['classStyle']=$object['classStyle'];
//prin($ITEMS['menu']);
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
    
        <?php
        // if($ITEM['header']){ 
        echo '<div class="barra_arriba">'; echo "Agenda"; echo '</div>';
        // }
        ?>
             
        <div class="div_borde div_inner">
        <img src="web/templates/default/img/agenda.jpg" >
        </div>
        
        <?php
        echo '<div class="barra_abajo"></div>';
        ?>
        
    </div>
    
</div>           
