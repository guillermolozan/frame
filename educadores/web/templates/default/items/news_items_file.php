<?php //á



$THIS=$PARAMS['this'];



$item=$DETAIL[$PARAMS['conector']];


$FB=$FACEBOOK_LIKE[$PARAMS['this']];






?>

<div id="detail_<?php echo $THIS;?>" class="cuadro <?php 

	web_selector_control($SELECTED,$THIS,"bloques,fichas");

	?>" >

    <?php web_render_esquinas(1,4);?>        



   <!--

   <div class="barra_arriba">

	   <?php web_render_item($item,'titulo:h1'); ?>

   </div>-->

         

    <div class="div_borde div_inner">

    	

        <!--GRILLA-->

        <div class="listado_items">

        

            <div class="listado_item" >         

            

                <?php web_render_item($item,$item['item']); ?>


               
				<div class="div_fila"><?php web_render_facebook_like($FB); ?></div>                



				<?php if(($item['enlace1']!='' and $item['enlace1']!='null')or($item['enlace1']!='' and $item['enlace1']!='null')){ ?>

				<div><strong>Noticias Relacionadas</strong></div><?php } ?> 

				<?php if($item['enlace1']!='' and $item['enlace1']!='null'){ ?><a class="enlace" href="<?php echo $item['enlace1'];?>"><?php 

				echo $item['tituloenlace1'];?></a><?php } ?>

                <?php if($item['enlace2']!='' and $item['enlace2']!='null'){ ?><a class="enlace" href="<?php echo $item['enlace2'];?>"><?php 

				echo $item['tituloenlace2'];?></a><?php } ?>   

				



                <!--clear-->

                <div class="clean"></div>                       

                

            </div>

        

        </div>

        

        

	</div>        



</div>

<?php /*

<script>

	window.addEvent('domready', function() {

	 

		ReMooz.assign('#listado_<?php echo $THIS;?> .listado_items .listado_item a.foto', {

			'origin': 'img',

			'shadow': 'onOpenEnd', // fx is faster because shadow appears after resize animation ( alue can be true, onOpenEnd )

			'resizeFactor': 1, // resize to maximum 80% of screen size

			'cutOut': false, // don't hide the original

			'opacityResize': 0.4, // opaque resize

//			'dragging': true, // disable dragging

			'centered': true // resize to center of the screen, not relative to the source element

		});

	 

	});

</script>

*/ ?>