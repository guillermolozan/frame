<?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_collection')) { function mixin__menu_collection($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php endif ?><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?= htmlspecialchars($head_title) ?></title><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($ven_css) ?>materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?= htmlspecialchars($pub_css) ?>app.css" type="text/css" rel="stylesheet" media="screen,projection"></head><body<?php attr_class(add("", $classbody, "")) ?>><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?>app.js"></script></body></html><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul><ul class="list"><li>Ejecución de Obras en General</li><li>Elaboración de Proyectos</li><li>Asesoría Inmobiliaria</li></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><main class="container row"><div class="wide"><?php if ($post) : ?><div class="post"><?php if ($menu_post) : ?><div class="col s3 hide-on-med-and-down"><?php if ($group_post) : ?><h2><?= htmlspecialchars($group_post) ?></h2><?php endif ?><ul class="menu_post collection"><?php mixin__menu_collection(null, array(), $menu_post) ?></ul></div><?php endif ?><div<?php attr_class(($menu_post) ? "col m12 l9" : "col s12") ?>><article class="card-panel"><div class="card-title"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php endif ?></div><?php if ($post['sub']) : ?><h3><?= htmlspecialchars($post['sub']) ?></h3><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['img']) : ?><div class="center-align"><img src="<?= htmlspecialchars($post['img']) ?>" class="responsive-img"></div><?php endif ?></article></div></div><?php endif ?></div></main><footer class="container"><nav class="transparent z-depth-0"><ul><li><a>©2015 HGD CONTRATISTAS S.A.C</a></li></ul><ul class="right menu"><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></nav></footer>