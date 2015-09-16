<?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__img_venobox')) { function mixin__img_venobox($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="venobox"><img src="http://i.ytimg.com/vi/<?= htmlspecialchars($item['video']) ?>/mqdefault.jpg" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__img_magnific')) { function mixin__img_magnific($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?></a><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?= htmlspecialchars($head_title) ?></title><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($ven_css) ?>materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?= htmlspecialchars($pub_css) ?>app.css" type="text/css" rel="stylesheet" media="screen,projection"></head><body<?php attr_class(add("", $classbody, "")) ?>><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?>app.js"></script></body></html><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><main class="container row"><?php $item_responsive = "col s12 m4 l3" ?><?php $gallery = $project ?><div class="wide"><?php if ($gallery['type'] == 'photos') : ?><?php $ul_class = 'parent-container' ?><?php else : ?><?php $ul_class = '' ?><?php endif ?><div<?php attr_class(add("galleries ", $gallery['type'], "")) ?>><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php if ($gallery['sub']) : ?><h3><?= htmlspecialchars($gallery['sub']) ?></h3><?php endif ?><?php if ($gallery['html']) : ?><div><?= $gallery['html'] ?></div><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("", $ul_class, "")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("", $item_responsive, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_venobox(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><div class="card-content"><h3><?php mixin__item(null, array(), $item) ?></h3></div></div></li><?php endforeach; endif ?></ul><?php endif ?></div></div></main><footer><div class="container"><ul><li><h3>CONTÁCTANOS</h3></li><li class="facebook icon-circle"> <a title="Facebook" target="_blank" href="https://www.facebook.com/sginvestmentssac"></a></li><li class="youtube icon-circle"> <a title="Youtube" target="_blank" href="https://www.facebook.com/sginvestmentssac"></a></li><li><span>Teléfono (+511) 275-5045</span></li><li><span>E-mail: info@sginvestments.pe</span></li></ul><ul class="right menu"><li><h3>LA EMPRESA</h3></li><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div></footer>