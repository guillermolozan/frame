<?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php endif ?><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__list_card')) { function mixin__list_card($block = null, $attributes = array(), $list = null) { global $■;$■['list'] = $list;?><div class="card"><div class="card-content"><?php if ($list['name']) : ?><span class="card-title"><h3><?= htmlspecialchars($list['name']) ?></h3></span><?php endif ?><ul><?php mixin__items_list(null, array(), $list['items']) ?></ul><?php if ($list['items']) : ?><?php if ($list['more']) : ?><a href="<?= htmlspecialchars($list['more']['url']) ?>" class="more right"><?= htmlspecialchars($list['more']['name']) ?></a><?php endif ?><?php endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?= htmlspecialchars($head_title) ?></title><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($ven_css) ?>materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?= htmlspecialchars($pub_css) ?>app.css" type="text/css" rel="stylesheet" media="screen,projection"></head><body<?php attr_class(add("", $classbody, "")) ?>><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?>app.js"></script></body></html><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($breadcrumb) : ?><div class="container"><ul class="breadcrumb"><?php if ($breadcrumb) : foreach ($breadcrumb as $item) : $■['item'] = $item; ?><?php if ($item['class']) : ?><li<?php attr_class(add("", $item['class'], "")) ?>><h3><?php mixin__item(null, array(), $item) ?></h3></li><?php else : ?><li><h3><?php mixin__item(null, array(), $item) ?></h3></li><?php endif ?><?php endforeach; endif ?></ul></div><?php endif ?><?php if ($banner) : ?><div class="container"><div class="slider"><ul class="slides"><?php if ($banner) : foreach ($banner as $item) : $■['item'] = $item; ?><li><img src="<?= htmlspecialchars($item['img']) ?>"><div<?php attr_class(add("caption ", $item['class'], "")) ?>><h3><?= htmlspecialchars($item['name']) ?></h3><h5 class="light grey-text text-lighten-3"><?= htmlspecialchars($item['text']) ?></h5></div></li><?php endforeach; endif ?></ul></div></div><?php endif ?><section class="line_a"><div class="container row"><h3>LA MEJOR EXPERIENCIA EN INGENIERIA COMERCIAL</h3><div class="col s12 m4"><h4>Solidez</h4><p><img src="<?= htmlspecialchars($pub_img) ?>solidez.jpg">Cualquier Organización que cimiente su crecimiento en una clara estrategia enfocada en el cliente, sólidos procesos y el aprovechamiento de sus talentos se mantendrá en constante crecimiento.</p></div><div class="col s12 m4"><h4>Creatividad</h4><p><img src="<?= htmlspecialchars($pub_img) ?>creatividad.jpg">Estamos convencidos que la evolución resulta de la creatividad, el objetivo fundamental de cualquier evento o proyecto de consultoría debe ser generar nuevas formas de satisfacer al cliente.</p></div><div class="col s12 m4"><h4>Éxito</h4><p><img src="<?= htmlspecialchars($pub_img) ?>exito.jpg">Estamos convencidos que el éxito es un camino y no un destino, la correcta interpretación del entorno y la constante evolución de nuestras fortalezas son la base de las empresas triunfadoras.</p></div></div></section><section class="line_two"><div class="container row"><h2>Planes de Hosting</h2><?php if ($line_two) : foreach ($line_two as $item) : $■['item'] = $item; ?><div class="col s12 m6 l3"><div class="card"><div class="card-content"><h3 class="card-title"><?= htmlspecialchars($item['name']) ?></h3><div><?= $item['html'] ?></div><a href="<?= htmlspecialchars($item['url']) ?>" class="btn light-blue darken-4">Leer más</a></div></div></div><?php endforeach; endif ?></div></section><section class="line_three parallax-container"><div class="parallax"><img src="<?= htmlspecialchars($pub_img) ?>parallax2.jpg"></div><div class="container"><h2>Toda empresa comienza con un dominio…</h2><p>Tu sueño de iniciar tu propio negocio está más cerca de lo que tu piensas. Da el primer paso para convertirte en tu propio jefe.</p><p><strong>Dominio.-</strong> es Nombre o Dirección IP única reconocida en la red mundial de internet</p><h6>www.tuempresa.com</h6><p><strong>US$ 17.00</strong> (no incluye IGV, Contrato por 1 año)</p><h6>www.tuempresa.net    </h6><p> 
<strong>US$ 17.00</strong> (no incluye IGV, Contrato por 1 año)</p><h6>www.tuempresa.org    </h6><p> 
<strong>US$ 20.00</strong> (no incluye IGV, Contrato por 1 año)</p><h6>• www.tuempresa.com.pe ó     www.tuempresa.pe        </h6><p> 
<strong>US$ 50.00</strong> (no incluye IGV, Contrato por 1 año)</p></div></section><section class="line_four"><div class="container row"><div class="col s12 m4 l4 block_one"><?php mixin__list_card(null, array(), $news_one) ?></div><div class="col s12 m4 l4 block_two"><div class="card"><div class="card-content"><div class="card-title"><h3>Pasión por Servir</h3></div><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/FxW0P7fWsuA?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div></div></div><div class="col s12 m4 l4 block_three"><div class="card"><script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script><fb:like-box href="https://www.facebook.com/prodiserv" width="100%" height="100%" show_faces="true" stream="false" header="true"></fb:like-box></div></div></div></section><section class="line_b parallax-container"><div class="parallax"><img src="<?= htmlspecialchars($pub_img) ?>clientes.jpg"></div><div class="container row"><h3>Nuestros Clientes</h3><?php if ($clients) : foreach ($clients as $item) : $■['item'] = $item; ?><div class="col s12 m4"><a href="<?= htmlspecialchars($item['url']) ?>" target="_blank" title="<?= htmlspecialchars($item['name']) ?>"><img src="<?= htmlspecialchars($item['img']) ?>"></a><a href="<?= htmlspecialchars($item['url']) ?>" target="_blank" title="<?= htmlspecialchars($item['name']) ?>"><h4><?= htmlspecialchars($item['name']) ?></h4></a></div><?php endforeach; endif ?><a href="galeria-fotos-clientes/2" class="more">ver más</a></div></section><section class="footerpre1"><div class="container row"><?php if ($menu_prefooter) : foreach ($menu_prefooter as $item) : $■['item'] = $item; ?><ul<?php attr_class(add("", $item['ulcss'], "")) ?>><?php if ($item['items']) : foreach ($item['items'] as $sub) : $■['sub'] = $sub; ?><?php if ($sub['url'] == '#') : ?><li><h3><?= htmlspecialchars($sub['name']) ?></h3></li><?php else : ?><li><?php mixin__link_item(null, array(), $sub) ?></li><?php endif ?><?php endforeach; endif ?></ul><?php endforeach; endif ?><a target="_blank" title="Facebook - Prodiserv" href="https://www.facebook.com/prodiserv" class="icom facebook"></a><a target="_blank" title="Twitter - Prodiserv" href="https://twitter.com/prodiserv" class="icom twitter"></a></div></section><section class="footerpre2"><div class="container row"><div class="col s12 l4"> <p><strong>Director</strong>:<br>Ing. Walter Távara</p></div><div class="col s12 l4"><p><strong>Teleprodiserv</strong>:<br>Oficina: (01) 377-1810 <br>Movistar/RPM: #998920047</p></div><div class="col s12 l4"> <p><strong>Correo</strong>:<br>servicios@prodiserv.com</p><p><strong>Dirección</strong>:<br>Av. Arenales 1724 Dpto. 509 - Lince - Lima</p></div></div></section><footer><div class="container"><nav class="transparent z-depth-0"><ul><li><a>© 2004-2015 <?= htmlspecialchars($web_name) ?> SAC</a></li></ul><ul class="right menu"><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></nav></div></footer>