<?php //á
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];
?>
<div class="div_fila cuadro <?php 
web_selector_control($SELECTED,$THIS,"bloques");	
?>">
    <?php web_render_esquinas(1,2);?>
    <div class="barra_arriba"></div>   
       
    <div class="div_borde div_inner">
 
        <!--<h1 class="main_title"><?php echo $HEAD['titulo_H1'] ?></h1>-->
        <div class="div_absoluto header-logo">         
            <a href="/"></a>         
            <?php //web_render_fichero($COMMON['archivos']['logo']); ?>        
        </div>

        <!-- <div class="div_absoluto header-telefono">                  
            <?php web_render_fichero($COMMON['archivos']['header_telefono']); ?>        
        </div>    -->         
        
    </div>
</div>