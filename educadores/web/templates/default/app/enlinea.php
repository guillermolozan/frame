<?php //á
//echo "hola";
$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];
$ITEMS=$LISTADO[$PARAMS['conector']];


?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$THIS,"bloques");
    ?>" ><?php web_render_esquinas(1,4);?>

   <div class="barra_arriba">
   En línea
   </div>
    <div class="div_borde div_inner">

        <ul class="enlinea">
          <li><a href="index.php?modulo=app&tab=tramites"><img src="web/templates/default/img/enlinea_tramite.png"  /></a></li>
          <li><a href="index.php"><img src="web/templates/default/img/enlinea_consulta.png"  /></a></li>
          <li><a href="index.php?modulo=formularios&tab=contactenos"><img src="web/templates/default/img/enlinea_contactenos.png"  /></a></li>
          <li><a href="index.php"><img src="web/templates/default/img/enlinea_pago.png"  /></a></li>
        </ul>

    </div>

</div>
<style>
.enlinea {
  float:left;
  width:400px;
  margin:0 0 0 90px;
}
.enlinea li {
  float:left;
  margin: 15px 15px 0px 0;
}
</style>