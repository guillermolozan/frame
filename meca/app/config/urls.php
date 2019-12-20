<?php

$urls_return = [];


// PAGES 
   $grupos_array=get_valores("id","url","paginas_groups","");

   $items=select(
   "name as nombre,id,id_grupo,url",
   'paginas',
   "where 1",
   0);

   foreach($items as $oo=>$itm)
   {
      $urls_return[procesar_url($grupos_array[$itm['id_grupo']].'/'.trim($itm['nombre']).'/'.$itm['id'])]=$itm['url'].'.html';
   }


// ITEMS
   $grupos_array=get_valores("id","url","productos_grupos","");

   $items=select(
   "nombre,id,id_grupo,url",
   'productos_items',
   "where 1",
   0);

   foreach($items as $oo=>$itm)
   {
      $urls_return[procesar_url($grupos_array[$itm['id_grupo']].'/'.trim($itm['nombre']).'/'.$itm['id'])]=$itm['url'].'.html';
   }

// OFERTAS


$items_ofer=select(
"nombre,id,url",
'productos_items_descu',
"where 1",
0);
foreach($items_ofer as $oo=>$itm)
{
   $urls_return[procesar_url("descuentos/".trim($itm['nombre']).'/'.$itm['id'])]='oferta-'.$itm['url'].'.html';
}

// prin($urls_return);

return $urls_return;