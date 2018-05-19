<?php if (!function_exists('mixin__card')) { function mixin__card($block = null, $attributes = array(), $post = null) { global $■;$■['post'] = $post;?><div class="card"><div class="card-content"><?php mixin__post_item(null, array(), $post) ?></div></div><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><p><?= htmlspecialchars($post['text']) ?></p><?php endif ?><?php if (!$imgfirst) : ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__list_card')) { function mixin__list_card($block = null, $attributes = array(), $list = null) { global $■;$■['list'] = $list;?><div class="card"><div class="card-content"><?php if ($list['name']) : ?><span class="card-title"><h3><?= htmlspecialchars($list['name']) ?></h3></span><?php endif ?><ul><?php mixin__items_list(null, array(), $list['items']) ?></ul><?php if ($list['items']) : ?><?php if ($list['more']) : ?><a href="<?= htmlspecialchars($list['more']['url']) ?>" class="more right"><?= htmlspecialchars($list['more']['name']) ?></a><?php endif ?><?php endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" rel="<?= htmlspecialchars($item['rel']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars(strtolower($item['name'])) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><?php mixin__imgg(null, array(), $item) ?>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__menu_collection')) { function mixin__menu_collection($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu z-depth-5"><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse"><a<?php attr_class(add("collapsible-header waves-effect waves-teal ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="hidden" value="<?= htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select')) { function mixin__input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?> </label><br/><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?= htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($pub_css) ?><?= htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?= htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?= htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?= htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?= htmlspecialchars($baseurl) ?><?= htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?= htmlspecialchars($head_title) ?>"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?= htmlspecialchars($gmap_key) ?>&sensor=true"></script><script src="<?= htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;" class="pre_output"><?= $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><nav><div class="container"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>" class="brand-logo"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi-navigation-menu"></i></a><ul class="menu menu_top hide-on-med-and-down"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($banner) : ?><div class="slider"><ul class="slides"><?php if ($banner) : foreach ($banner as $item) : $■['item'] = $item; ?><li><img src="<?= htmlspecialchars($item['img']) ?>"><div<?php attr_class(add("caption ", $item['class'], "")) ?>><h3><?= htmlspecialchars($item['name']) ?></h3><h5 class="light grey-text text-lighten-3"><?= htmlspecialchars($item['text']) ?></h5></div></li><?php endforeach; endif ?></ul></div><?php endif ?><main class="container row"><div class="col s12"><div class="col s12 m3 bar sidelef"><?php $grid = $project_groups ?><?php $responsive = "" ?><?php $items = $grid['items'] ?><?php $name = $grid['name'] ?><?php $sub = $grid['sub'] ?><?php $more = $grid['more'] ?><?php if ($items) : ?><div class="grid scrollspy"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $grid) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $grid) ?></h2><?php endif ?><?php if ($grid['sub']) : ?><h3><?= htmlspecialchars($grid['sub']) ?></h3><?php endif ?><ul><?php if ($grid['items']) : foreach ($grid['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("", $responsive, "")) ?>> <div class="card"><?php mixin__img_item(null, array(), $item) ?><?php if ($item['img']) : ?><?php $res = "col s12 m8 l8" ?><?php else : ?><?php $res = "col s12" ?><?php endif ?><div<?php attr_class(add("", $res, "")) ?>><?php if ($item['pre']) : ?><h6><?= htmlspecialchars($item['pre']) ?></h6><?php endif ?><h4><?php mixin__item(null, array(), $item) ?></h4><?php if ($item['sub']) : ?><h5><?= htmlspecialchars($item['sub']) ?></h5><?php endif ?><?php if ($item['text']) : ?><p><?= htmlspecialchars($item['text']) ?></p><?php endif ?><?php if ($item['html']) : ?><div><?= $item['html'] ?></div><?php endif ?></div></div></li><?php endforeach; endif ?></ul><?php if ($grid['more']) : ?><a href="<?= htmlspecialchars($grid['more']['url']) ?>" class="more"><?= htmlspecialchars($grid['more']['name']) ?></a><?php endif ?></div><?php endif ?></div><div class="col s12 m6 bar"><?php $responsive = "" ?><?php if ($post) : ?><div class="post"><?php if ($menu_post) : ?><div class="col s3 hide-on-med-and-down"><?php if ($group_post) : ?><div class="card-title"><h2><?= htmlspecialchars($group_post) ?></h2></div><?php endif ?><ul class="menu_post collection"><?php mixin__menu_collection(null, array(), $menu_post) ?></ul></div><?php endif ?><div<?php attr_class(($menu_post) ? "col m12 l9" : "col s12") ?>><?php if ($post['titleout']) : ?><div class="card-title"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php endif ?></div><?php endif ?><article class="card-panel"><?php if (!$post['titleout']) : ?><div class="card-title"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php endif ?></div><?php endif ?><?php if ($post['sub']) : ?><h3><?= htmlspecialchars($post['sub']) ?></h3><?php endif ?><?php if ($post['imgfirst']) : ?><?php if ($post['img']) : ?><div class="center-align"><img src="<?= htmlspecialchars($post['img']) ?>" class="responsive-img"></div><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if (!$post['imgfirst']) : ?><?php if ($post['img']) : ?><div class="center-align"><img src="<?= htmlspecialchars($post['img']) ?>" class="responsive-img"></div><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><div<?php attr_class(add("galleries ", $type, "")) ?>><ul<?php attr_class(add("", $ul_class, "")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("", $item_responsive, "")) ?>><div class="card"><div class="card-image"><?php mixin__img_item(null, array(), $item) ?></div><div class="card-content"><?php if ($type == 'photos') : ?><h3><?= htmlspecialchars($item['name']) ?></h3><?php else : ?><h3><?php mixin__item(null, array(), $item) ?></h3><?php endif ?><?php if ($item['sub']) : ?><h4><?= htmlspecialchars($item['sub']) ?></h4><?php endif ?></div></div></li><?php endforeach; endif ?></ul></div><?php endif ?></article></div></div><?php endif ?><?php $post = false ?></div><div class="col s12 m3 bar sideright"><?php $grid = $projects ?><?php $responsive = "" ?><?php $items = $grid['items'] ?><?php $name = $grid['name'] ?><?php $sub = $grid['sub'] ?><?php $more = $grid['more'] ?><?php if ($items) : ?><div class="grid scrollspy"><?php if ($main) : ?><h1><?php mixin__item(null, array(), $grid) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $grid) ?></h2><?php endif ?><?php if ($grid['sub']) : ?><h3><?= htmlspecialchars($grid['sub']) ?></h3><?php endif ?><ul><?php if ($grid['items']) : foreach ($grid['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("", $responsive, "")) ?>> <div class="card"><?php mixin__img_item(null, array(), $item) ?><?php if ($item['img']) : ?><?php $res = "col s12 m8 l8" ?><?php else : ?><?php $res = "col s12" ?><?php endif ?><div<?php attr_class(add("", $res, "")) ?>><?php if ($item['pre']) : ?><h6><?= htmlspecialchars($item['pre']) ?></h6><?php endif ?><h4><?php mixin__item(null, array(), $item) ?></h4><?php if ($item['sub']) : ?><h5><?= htmlspecialchars($item['sub']) ?></h5><?php endif ?><?php if ($item['text']) : ?><p><?= htmlspecialchars($item['text']) ?></p><?php endif ?><?php if ($item['html']) : ?><div><?= $item['html'] ?></div><?php endif ?></div></div></li><?php endforeach; endif ?></ul><?php if ($grid['more']) : ?><a href="<?= htmlspecialchars($grid['more']['url']) ?>" class="more"><?= htmlspecialchars($grid['more']['name']) ?></a><?php endif ?></div><?php endif ?></div></div></main><div class="container row homefooter"><div class="col s12 m6 l3 block_one"><?php mixin__list_card(null, array(), $news) ?></div><div class="col s12 m6 l3 block_two"><?php mixin__list_card(null, array(), $links) ?></div><div class="col s12 m6 l3 block_three"><?php mixin__card(null, array(), $video) ?></div><div class="col s12 m6 l3 block_four"><?php mixin__card(null, array(), $phones) ?></div></div><footer class="container"><nav class="transparent z-depth-0"><ul><li><a>©2015 M&M CONSULTORES SANITARIOS S.A.C</a></li></ul><ul class="right menu"><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></nav></footer><script type="text/javascript">var ven_css='<?= htmlspecialchars($ven_css) ?>';</script><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>materialize.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?><?= htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
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