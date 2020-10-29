<?php //á 
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];
?>
<div class="div_fila">           

    <div class="div_fila div_menu <?php 
    web_selector_control($SELECTED,$THIS,"menus",1);	
    ?>"><?php
    web_render_menu($object['menu'],array(
                                                'lados_externos'=>0
                                                ,'lados_internos'=>1
                                                ,'lados_flotantes'=>0
                                                ,'menu_borde'=>0
                                                ,'id'=>'menu_main'
                                                ,'rel'=>'son_menu_main'
                                                //,'ul'=>'div'													
                                                ),'h2');
    ?></div><?php
	
	$gm=$object['menu']['2'];
    ?><div id="son_menu_main_<?php echo $gm['id'];?>" class="div_fila_overflow div_menu <?php 
    web_selector_control($SELECTED,$THIS.'2',"menus",1);
    ?>" ><?php
    web_render_menu($gm['menu'],array(
                                        'lados_externos'=>0
                                        ,'lados_internos'=>0
                                        ,'lados_flotantes'=>0
                                        ,'id'=>'menu2_main_'.$gm['id']
                                        ,'rel'=>'son_menu2_main_'.$gm['id']
                                        ,'menu_borde'=>0
                                        ),'h3');
                                        ?></div><?php
	
    ?>

	<div class="clean"></div>
</div>
<script> 
window.addEvent('domready', function() {
	$$('.id_header_menus li.li').each(function(ee){ over_menu({e:ee,x:'left',y:'bottom',rel:'element'}); });
	//$$('.id_header_menus2 li.li').each(function(ee){ over_menu({e:ee,x:'right',y:'top',rel:'element'}); });
}); 
</script>