<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$LISTADO[$PARAMS['conector']];

?>
<div id="listado_<?php echo $THIS;?>" class="cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques");
	?>" >
         
    <div class="div_borde div_inner">
        
        <!--PAGINACION DEL LISTADO-->
        <!--        
        <div class="listado_paginacion div_barra"  >     	
            <?php /*<span class="total"><?php echo $ITEMS['total']." ".$lang['productos'];?></span>*/?>
            &nbsp;<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
        </div>
        -->

            	
        <!--GRILLA-->
        <?php  

        if($ITEMS['total']==0){ ?>
        <ul class="listado_items">
        	<p class="vacio"><?php echo $ITEMS['vacio']; ?></p>
		</ul>
		<?php } else {
			foreach($ITEMS['filas'] as $columna){
			if(sizeof($columna['items'])>0){	
			?>
			<!--GRILLA-->
            <?php //echo $columna['classStyle'];?>
            <div id="listado_<?php echo $columna['classStyle'];?>" 
            class="cuadro <?php web_selector_control($SELECTED,$columna['classStyle'],"listados");?> ">
			<ul class="listado_items listado_columna" <?php echo ($ITEMS['solocolumnas'])?'style="border-top:0px;"':'';?>>
				<?php  
				foreach($columna['items'] as $i=>$item){
				?>
				<li class="listado_item" >
                    <div class="capa" >
                        <div class="inner <?php if($item['foto']){ ?>listado_item_con_foto<?php } ?>" >
                        	<?php /* if($_GET['gru']=='0' or $_GET['buscar']!=''){ ?>
                        	<a title="<?php echo $item['grupo']['nombre'];?>" href="<?php echo $item['grupo']['link'];?>" class="item_grupo"><?php echo $item['grupo']['nombre'];?></a>
                            <?php } */ ?>
                        	<?php web_render_item($item,$item['item']); ?>
                                                                                 
                            <div class="clean"></div>                       
                        </div>	
                    </div>	
				</li>
			
				<?php 
				} 
				?>
				<div class="clean"></div>                       
			</ul>

        <!--PAGINACION DEL LISTADO-->
        <?php if($ITEMS['total']>0){ ?>
        
            <div class="listado_paginacion div_barra">
            &nbsp;<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
            </div>
            
        <?php } ?>
		
            </div>
			<?php
			}
			}

        }

        ?>
                    

        
	</div>        

</div>
