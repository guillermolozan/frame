<?php //á

$THIS=$PARAMS['this'];
$FORM=$FORMULARIO[$PARAMS['conector']];
// $respuesta="Mensaje enviado";
?>
<div class="div_fila">
    <div class="cuadro <?php
    web_selector_control($SELECTED,$THIS,"bloques,formularios");
    ?>" ><?php web_render_esquinas(1,4);?>		
    
        <div class="barra_arriba">
        <?php web_render_item_borde('bors-b',1,2);?>                
        <h1><?php 
        echo select_dato("titulo","paginas","where id=5");
        //echo $FORM['titulo']; 
        ?></h1>
        </div>
    
        <div class="div_borde div_inner" >

            <?php include("../../../../keys.php"); ?>
            <?php if($respuesta==''){ ?>
            <!--FORM INICIO-->
            <form id="formulario_<?php echo $FORM['nombre'];?>" method="post" name="<?php echo $FORM['nombre'];?>" class="formularios" 
            action="index.php?modulo=formularios&tab=contacto"
            >                          
            <div id="<?php echo $FORM['nombre'];?>_form_body" class="form_body">        
            <?php web_render_form($FORM); ?>                         
            </div>                               
            <?php // web_render_form_javascript($FORM); ?>                    
            </form>
            <!--FORM FIN--> 
            <script>
                var recapdiv = document.createElement("div"); 
                recapdiv.setAttribute("id", "p_contacto_recap");
                recapdiv.setAttribute("class", "camps");
                recapdiv.innerHTML='<label class="name">&nbsp;</label><div style="display:inline-block;" id="recap"></div>'
                var p_contacto_comentario= document.getElementById('p_contacto_comentario');
                p_contacto_comentario.parentNode.insertBefore(recapdiv, p_contacto_comentario.nextSibling);
                
                document.querySelector('#contacto_nombre').setAttribute("required", "true");
                document.querySelector('#contacto_email').setAttribute("required", "true");
                document.querySelector('#contacto_comentario').setAttribute("required", "true");
                
                
                document.querySelector('#contacto_submit').setAttribute("disabled", "true");
                var onloadCallback = function() {
                grecaptcha.render('recap', {
                    'sitekey' : '<?=$reCAPTCHA_site_key?>',
                    'callback': function(response) {
                    document.querySelector('#contacto_submit').removeAttribute("disabled");
                    },
                    'expired-callback': function() {
                    document.querySelector('#contacto_submit').setAttribute("disabled", "true");
                    },                
                    // 'hl':'es-419'
                    // 'size':'compact'
                    // 'theme' : 'dark'
                });
                };                
            </script>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
            <?php } else { ?>
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
            <div class="padding:1rem;">
                <div class="alert alert-success" role="alert" style="color: #155724;
                width:300px;
    background-color: #d4edda;
    border-color: #c3e6cb;position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;">
                <?php echo $respuesta; ?>
                </div>
            </div>
            <?php } ?>

            <div class="contacto_side"><?php echo select_dato("texto","paginas","where id=5"); ?></div>


        <div class="clean"></div>                    
        </div>

        <div class="barra_abajo"></div>                    
            
    </div>
</div>    