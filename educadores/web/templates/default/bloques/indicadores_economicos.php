<?php //á



$THIS=$PARAMS['this'];



$ITEM=$LISTADO[$PARAMS['conector']];



?>
<div class="clean"></div>

<div id="item_<?php echo $THIS;?>">

    <div class="cuadro <?php 

        web_selector_control($SELECTED,$THIS,"menus,bloques,tablas");

        ?>" >

        <?php //web_render_esquinas(1,4);?>        

    

<!--        <div class="barra_arriba">

       <?php //web_render_item_borde('bors-b',1,2);?>        

       <?php echo $ITEM['titulo'];?>

       </div> -->

             

        <div class="div_borde div_inner">

        <?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>        



        <div class="div_fila div_menu">

            <?php web_render_menu($ITEM['menu'],array(

                                                        'lados_externos'=>1

                                                        ,'lados_internos'=>1

                                                        ,'lados_flotantes'=>1

                                                        ,'id'=>'menu_'.$PARAMS['this']

                                                        )); ?>    

    	</div>



<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_1"><?php render_indicadores_economicos($ITEM['tablas']['lima']);?></div>       

<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_2"><?php render_indicadores_economicos($ITEM['tablas']['usa']);?></div>       

<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_3"><?php render_indicadores_economicos($ITEM['tablas']['latam']);?></div>      

<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_4"><?php render_indicadores_economicos($ITEM['tablas']['eur']);?></div>       

<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" style='display:block;' id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_5">

<div style="text-align:right;" >Tipo de Cambio <em>(Moneda local por US$)</em></div>

<?php render_indicadores_economicos($ITEM['tablas']['monedas']);?>

</div>       

<div class="area_tab <?php echo 'menu_'.$PARAMS['this'];?>_area_tab" id="<?php echo 'menu_'.$PARAMS['this'];?>_area_tab_6"><?php render_indicadores_economicos($ITEM['tablas']['commodities']);?></div>       

<div style="text-align:right;">Actualizado <?php echo fecha_formato($ITEM['tablas']['date'],9);?></div>
        

        <?php /////////////////////////////////////////////////////////////////////////////////////////////////////?>        

        </div> 

        

    

<!--        <div class="barra_abajo"></div>
 -->
    

    </div>

</div>



 