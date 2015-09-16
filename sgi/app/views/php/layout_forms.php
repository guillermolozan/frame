<?php if (!function_exists('mixin__card_sended')) { function mixin__card_sended($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><?php if ($msg) : ?><div class="card-panel lime lighten-5"><?= htmlspecialchars($msg) ?></div><?php endif ?><?php } } ?><?php if (!function_exists('mixin__simple_form')) { function mixin__simple_form($block = null, $attributes = array(), $name = null, $form = null) { global $■;$■['name'] = $name;$■['form'] = $form;?><?php if ($form) : foreach ($form as $item) : $■['item'] = $item; ?><?php if ($item['type'] == 'textarea') : ?><?php mixin__simple_input_textarea(null, array(), $name, $item, "col s12") ?><?php else : ?><?php mixin__simple_input_text(null, array(), $name, $item, "col s12") ?><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_submit')) { function mixin__input_submit($block = null, $attributes = array(), $msg = null) { global $■;$■['msg'] = $msg;?><div class="input-field col s12"><button type="submit" class="btn waves-effect waves-blue"><?= htmlspecialchars($msg) ?></button></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><label for="<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" title="<?= htmlspecialchars($item['name']) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="responsive-img"/><?php endif ?></a><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['target']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php endif ?><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?= htmlspecialchars($head_title) ?></title><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($ven_css) ?>materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"><link href="<?= htmlspecialchars($pub_css) ?>app.css" type="text/css" rel="stylesheet" media="screen,projection"></head><body<?php attr_class(add("", $classbody, "")) ?>><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?>app.js"></script></body></html><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><main class="container"><div class="post"><div class="row"><div class="col s12"><?php mixin__card_sended(null, array(), $message) ?></div><div class="col l6 m12 s12 text"> Teléfono: (+511) 275 - 5045 <br>E-mail: info@sginvestments.pe</div><div class="col l6 m12 s12 form"><article class="card-panel"><div class="card-title"><?php if ($main) : ?><h1><a href="<?= htmlspecialchars($uri) ?>">Contáctenos</a></h1><?php else : ?><h2><a href="<?= htmlspecialchars($uri) ?>">Contáctenos</a></h2><?php $main = false ?><?php endif ?><form method="POST" name="contact"><?php mixin__simple_form(null, array(), 'contact', $fields) ?><?php mixin__input_submit(null, array(), 'ENVIAR') ?></form></div></article></div></div></div></main><footer><div class="container"><ul><li><h3>CONTÁCTANOS</h3></li><li class="facebook icon-circle"> <a title="Facebook" target="_blank" href="https://www.facebook.com/sginvestmentssac"></a></li><li class="youtube icon-circle"> <a title="Youtube" target="_blank" href="https://www.facebook.com/sginvestmentssac"></a></li><li><span>Teléfono (+511) 275-5045</span></li><li><span>E-mail: info@sginvestments.pe</span></li></ul><ul class="right menu"><li><h3>LA EMPRESA</h3></li><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div></footer>