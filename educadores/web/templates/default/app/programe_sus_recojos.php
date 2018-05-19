<?php //á
$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];

?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques");
    ?>" ><?php web_render_esquinas(1,2);?>

   <div class="barra_arriba">
   <?php echo $PAGINA['titulo']; ?>
   </div>
   
    <div class="div_borde div_inner">
    
		<?php $domain="http://www.olvacourier.com/"; ?>    

        <div class="div_fila">Ingrese el código de usuario y contraseña asignado por nuestra empresa:</div>

        <form target="_blank" method="POST" action="<?php echo $domain; ?>detalle2.php" name="recojos_web">
        <div class="form_body">         
        
            <div class="camps">
                <label class="name" for="as_cod_cliente_ruc_dni">USUARIO : </label>                    
                <input type="text" maxlength="12" size="12" id="as_cod_cliente_ruc_dni" name="as_cod_cliente_ruc_dni" class="caja">
             </div>
            <div class="camps">
                <label class="name" for="as_clave_web">CONTRASEÑA : </label>                    
                <input type="password" maxlength="15" size="15" name="as_clave_web" id="as_clave_web" class="caja">
             </div>
            <div class="camps submit">
                <label class="name">&nbsp;</label>
                <input type="submit" class="boton1" value="Aceptar" name="submit">
             </div>                   
             
        </div>     
        </form>

        <div class="div_fila" style="margin-bottom:10px;">En caso no cuente con un código de usuario, o haya extraviado el que se le asigno, escriba a:<a href="mailto:olva@olva.com.pe">olva@olva.com.pe</a> para que se le envíe dicha información.</div>

        <div class="div_fila">Vea también: <a href="rastreo.php">Rastreo de Envío</a> </div>
                 
    </div>
</div>

<style>
.form_body { display:block; float:left; width:100%; margin-bottom:10px; background:#F8F8F8; margin:20px 0 20px; padding:20px 0; }
.name { padding:3px 5px; float:left; text-align:right; width:190px; }
.camps { padding:4px 4px; }
.camp_derecha { float:left; }
.before { 
padding:4px 4px;
width: 100%;
float:left;
margin-bottom:4px;
}						
.legend { 
background-color:#FFB749;
font-weight: bold;
padding:7px;
width: 100%;
float:left;
margin-bottom:20px;
text-align:center;
}			
.caja { 
background-color: #fff;
border: 1px solid #333;
color: #000000;
font-size: 12px; 
width:100px;
}
select.caja { padding:0px 0 1px 0; margin:0; }
.submit { padding:2px; }
.submit input { padding-right:7px; padding-left:7px; font-size:12px; }
.camp_derecha { float:left; }
</style>
