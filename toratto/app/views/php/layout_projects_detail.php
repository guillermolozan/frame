<?php if (!function_exists('mixin__map')) { function mixin__map($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><div id="map" data-name="<?= htmlspecialchars($item['name']) ?>" data-lat="<?= htmlspecialchars($item['lat']) ?>" data-lon="<?= htmlspecialchars($item['lon']) ?>" data-text="<?= htmlspecialchars($item['text']) ?>"></div><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><p><?= htmlspecialchars($post['text']) ?></p><?php endif ?><?php if (!$imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php endif ?><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="hidden" value="<?= htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select')) { function mixin__input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?> </label><br/><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?= htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_submit')) { function mixin__input_submit($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><div class="input-field col s12"><button type="submit" class="btn waves-effect waves-blue"><?= htmlspecialchars($msg) ?></button></div><?php } } ?><?php if (!function_exists('mixin__form')) { function mixin__form($block = null, $attributes = array(), $name = null, $form = null) { global $■;$■['name'] = $name;$■['form'] = $form;?><?php if ($form) : foreach ($form as $item) : $■['item'] = $item; ?><?php $clas = ($item['divclass']) ? $item['divclass'] : "col s12" ?><?php if ($item['group']) : ?><div class="col s12 group"><?= htmlspecialchars($item['group']) ?></div><?php endif ?><?php if ($item['hidden']) : ?><?php mixin__input_hidden(null, array(), $name, $item) ?><?php else : ?><?php if ($item['type'] == 'textarea') : ?><?php mixin__input_textarea(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'select') : ?><?php mixin__input_select(null, array(), $name, $item, $clas, $options) ?><?php elseif ($item['type'] == 'file') : ?><?php mixin__input_file(null, array(), $name, $item, $clas) ?><?php elseif ($item['type'] == 'date') : ?><?php mixin__input_date(null, array(), $name, $item, $clas) ?><?php else : ?><?php mixin__input_text(null, array(), $name, $item, $clas) ?><?php endif ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__card_sended')) { function mixin__card_sended($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><?php if ($msg) : ?><div class="card-panel lime lighten-5"><?= $msg ?></div><?php endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($pub_css) ?><?= htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?= htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?= htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?= htmlspecialchars($baseurl) ?><?= htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?= htmlspecialchars($head_title) ?>"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?sensor=true"></script><script src="<?= htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><body<?php attr_class(add("", $classbody, "")) ?>><section class="preheader"><nav><div class="container"><ul class="menu hide-on-med-and-down"><li class="fb"><a href="https://www.facebook.com/Toratto-GRUPO-Inmobiliario-1384347278474525/" target="_blank">Síguenos en facebook</a></li></ul></div></nav></section><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><figure class="responsive-img"><?php if ($banner) : ?><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($banner) ?>"><?php endif ?><?php if ($banner_absolute) : ?><img src="<?= htmlspecialchars($banner_absolute) ?>"><?php endif ?></figure><main class="container row"><div class="post project"><?php mixin__card_sended(null, array(), $message) ?><div class="cabecera"><h1 class="cparts"><?php mixin__item(null, array(), $post) ?></h1><?php $main = false ?><div class="contacts cparts"><span class="phone"><a href="tel:01<?= htmlspecialchars($post['phone']) ?>"><?= htmlspecialchars($post['phone']) ?></a></span><span class="email hide-on-small-only"><a href="mailto:<?= htmlspecialchars($post['email']) ?>" target="_top"><?= htmlspecialchars($post['email']) ?></a></span><span class="cotizar hide-on-med-and-down"><a href="#cotizar">Cotizar</a></span></div></div><div class="row"><?php if ($post['html']) : ?><div class="col s12 l6"><article class="card-panel"><h2>Descripción</h2><div class="more"><?= $post['html'] ?></div></article></div><?php endif ?><?php if ($post['html2']) : ?><div class="col s12 l6"><article class="card-panel"><h2>Acabados</h2><div class="more"><?= $post['html2'] ?></div></article></div><?php endif ?><?php if ($post['galleries']) : ?><?php if ($post['galleries']) : foreach ($post['galleries'] as $gallery) : $■['gallery'] = $gallery; ?><div class="col s12 l6 galleries"><article class="card-panel"><h2><?= htmlspecialchars($gallery['name']) ?></h2><div><a id="button" data-items="<?= htmlspecialchars($gallery['items']) ?>" class="zoom"><img src="<?= htmlspecialchars($gallery['img']) ?>" class="responsive-img"></a></div></article></div><?php endforeach; endif ?><?php endif ?><?php if ($post['video']) : ?><div class="col s12 l6"><article class="card-panel"><h2>Videos</h2><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($post['video']) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></article></div><?php endif ?><?php if (false) : ?><div class="col s12 l6 planos"><article class="card-panel"><h2>Planos</h2><h6>Estadística de Ventas</h6><div class="col s12 l8 estadisticas"><?php if ($post['niveles']) : ?><ul class="niveles nvl"><?php if ($post['niveles']) : foreach ($post['niveles'] as $item) : $■['item'] = $item; ?><?php if ($item['href']) : ?><li><a href="<?= htmlspecialchars($item['href']) ?>" title="<?= htmlspecialchars($item['title']) ?>"><?= htmlspecialchars($item['nombre']) ?></a></li><?php else : ?><li><?= htmlspecialchars($item['nombre']) ?></li><?php endif ?><?php endforeach; endif ?></ul><?php endif ?><?php if ($post['depas']) : ?><ul class="depas"><?php if ($post['depas']) : foreach ($post['depas'] as $piso) : $■['piso'] = $piso; ?><div class="tods"><div class="one nvl"><?php if ($piso['href']) : ?><li><a href="<?= htmlspecialchars($piso['href']) ?>" title="<?= htmlspecialchars($piso['title']) ?>"><?= htmlspecialchars($piso['nombre']) ?></a></li><?php else : ?><li><?= htmlspecialchars($piso['nombre']) ?></li><?php endif ?></div><div class="two"><div><?php if ($piso['items']) : foreach ($piso['items'] as $item) : $■['item'] = $item; ?><?php if ($item['photos']) : ?><li<?php attr_class(add("", $item['class'], "")) ?>><span data-depa="<?= htmlspecialchars($item['set']) ?>" title="<?= htmlspecialchars($item['title']) ?>"<?php attr_class(add("", $item['active'], "")) ?>><?= htmlspecialchars($item['numero']) ?></span></li><?php else : ?><li<?php attr_class(add("", $item['class'], "")) ?>><?= htmlspecialchars($item['numero']) ?></li><?php endif ?><?php endforeach; endif ?></div></div></div><?php endforeach; endif ?><div class="tods"><div class="legen"><li>Libre <span class="libre"></span></li><li>Separado <span class="separado"></span></li><li>Vendido <span class="vendido"></span></li></div></div></ul><?php endif ?></div><div class="col s12 l4"><div class="select_depas"><?php if ($post['depas']) : foreach ($post['depas'] as $piso) : $■['piso'] = $piso; ?><?php if ($piso['items']) : foreach ($piso['items'] as $item) : $■['item'] = $item; ?><div style="<?= htmlspecialchars($item['style']) ?>"<?php attr_class(add("selec_depa ", $item['set'], "")) ?>><h4><?= htmlspecialchars($item['name']) ?></h4><div><span<?php attr_class(add("", $item['status'], "")) ?>><?= htmlspecialchars($item['status']) ?></span></div><div>area: <?= htmlspecialchars($item['area']) ?>m²</div><?php if ($item['photos']) : foreach ($item['photos'] as $photo) : $■['photo'] = $photo; ?><?php if ($photo['href']) : ?><a href="<?= htmlspecialchars($photo['href']) ?>" title="<?= htmlspecialchars($photo['title']) ?>"><img src="<?= htmlspecialchars($photo['href']) ?>"></a><?php endif ?><?php endforeach; endif ?></div><?php endforeach; endif ?><?php endforeach; endif ?></div></div></article></div><?php endif ?><?php if ($map['lat']) : ?><div class="col s12 l6"><article class="card-panel"><h2>Ubicación</h2><?php mixin__map(null, array(), $map) ?><div class="section"><p><?= htmlspecialchars($map['text']) ?></p></div></article></div><?php endif ?><div id="cotizar" class="col s12 l6 scrollspy"><article class="card-panel"><h2>Cotizar</h2><form method="POST" name="contact"><?php mixin__form(null, array(), 'contact', $contact) ?><?php mixin__input_submit(null, array(), 'ENVIAR') ?></form>
</article></div></div></div></main><div class="actions"><ul><li><a href="tel:01<?= htmlspecialchars($post['phone']) ?>" class="call">Llamar</a></li><li><a href="mailto:<?= htmlspecialchars($post['email']) ?>" target="_top" class="email">Email</a></li></ul></div><a id="scrolltop" onclick="$('body').animate({scrollTop:0}, '500')"></a><footer><div class="container"><p>2012 / 2016 Toratto Grupo Inmobiliario. Todos los derechos reservados. <br></p></div></footer><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?><?= htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?= htmlspecialchars($analytics) ?>', 'auto');
ga('send', 'pageview');
</script><?php endif ?><?php if ($opengraph) : ?><div id="fb-root"></div><script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=276802375855277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php endif ?></body></html>