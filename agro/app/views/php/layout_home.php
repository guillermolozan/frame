<?php if (!function_exists('mixin__button_side_nav')) { function mixin__button_side_nav($block = null, $attributes = array()) { ?><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?= $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><div><p><?= htmlspecialchars($post['text']) ?></p></div><?php endif ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" rel="<?= htmlspecialchars($item['rel']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" target="<?= htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?= htmlspecialchars($item['name']) ?> <?php if ($item['sub']) : ?><b><?= htmlspecialchars($item['sub']) ?></b><?php endif ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?= htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars(strtolower($item['name'])) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?= htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars(strtolower($item['url'])) ?>" target="<?= htmlspecialchars($item['target']) ?>" title="<?= htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><div class="photo"><?php mixin__imgg(null, array(), $item) ?></div>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_magnific')) { function mixin__img_magnific($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><img src="<?= htmlspecialchars($item['img']) ?>" title="<?= htmlspecialchars($item['name']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__img_venobox')) { function mixin__img_venobox($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="photo venobox"><img src="http://i.ytimg.com/vi/<?= htmlspecialchars($item['video']) ?>/mqdefault.jpg" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse collection-item"><a<?php attr_class(add("collapsible-header waves-effect ", $men_item['class'], "")) ?>><?= htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__video_youtube')) { function mixin__video_youtube($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><iframe width="853" height="480" src="//www.youtube.com/embed/<?= htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="hidden" value="<?= htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>" oninvalid="this.setCustomValidity('El campo no puede estar vació')"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select')) { function mixin__input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_select_2')) { function mixin__input_select_2($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?= htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>"><?= htmlspecialchars($line['label']) ?> </label><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="text" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" placeholder="<?= htmlspecialchars($line['label']) ?>" name="<?= htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?= htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?= htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?= htmlspecialchars($name) ?>_<?= htmlspecialchars($line['name']) ?>" name="<?= htmlspecialchars($line['name']) ?>" type="<?= htmlspecialchars($line['type']) ?>" value="<?= htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?= htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?= htmlspecialchars($pub_css) ?><?= htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?= htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?= htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?= htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?= htmlspecialchars($baseurl) ?><?= htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?= htmlspecialchars($head_title) ?>"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?= htmlspecialchars($gmap_key) ?>"></script><script src="<?= htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;" class="pre_output"><?= $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><?php if ($is_home) : ?><h1><?= htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><section class="header_pre hide-on-med-and-down"><nav><div class="container"><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook"><a target="_blank" href="<?= htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube"><a target="_blank" href="<?= htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter"><a target="_blank" href="<?= htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><?php if ($web_whatsapp) : ?><li class="whatsapp"><?= $web_whatsapp ?></li><?php endif ?><?php if ($web_phone) : ?><li class="phone"><?= $web_phone ?></li><?php endif ?><?php if ($web_email) : ?><li class="email"><?= $web_email ?></li><?php endif ?></ul></div></nav></section><nav><div class="container"><?php mixin__button_side_nav() ?><ul class="menu menu_top"><li class="brand-logo"><a href="<?= htmlspecialchars($link_home) ?>" title="<?= htmlspecialchars($web_name) ?>"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($logo) ?>" title="<?= htmlspecialchars($web_name) ?>" alt="<?= htmlspecialchars($web_name) ?>"></a></li><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($banner) : ?><div class="slider"><ul class="slides"><?php if ($banner) : foreach ($banner as $item) : $■['item'] = $item; ?><li><?php if (!$item['url'] || $item['url'] == 'pagina//') : ?><img src="<?= htmlspecialchars($item['img']) ?>" class="desktop"><?php else : ?><a href="<?= htmlspecialchars($item['url']) ?>"><img aclass="desktop" src="<?= htmlspecialchars($item['img']) ?>"></a><?php endif ?></li><?php endforeach; endif ?></ul></div><?php endif ?><?php if ($banner_imagen || $banner_absolute) : ?><figure class="responsive-img"><?php if ($banner_imagen) : ?><img alt="banner" src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($banner_imagen) ?>"><?php endif ?><?php if ($banner_absolute) : ?><img src="<?= htmlspecialchars($banner_absolute) ?>"><?php endif ?></figure><?php endif ?><?php $gallery = $products ?><?php $li_class = 's12 m6 l4' ?><!-- -gallery.name='Productos Estrella'--><section class="block_gallery_products"><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_venobox(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="venobox btn"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" class="btn name"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><div class="name"><?= htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?= htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?= htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?= htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><section class="home_tierra row"><div class="container"><div class="col s12 m6 photo"><img src="<?= htmlspecialchars($pub_img) ?>photo2.jpg" class="responsive-img"></div><div class="col s12 m6 texto"><p><?= $nosotros['text'] ?></p><a href="nosotros">Leer más &#8594;</a></div></div></section><?php $gallery = $block_gallery_videos ?><?php $li_class = 's6 m6 l3 release-item' ?><?php $ul_class = '' ?><section class="home_videos torelease"><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_venobox(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="venobox btn"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" class="btn name"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><div class="name"><?= htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?= htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?= htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?= htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><?php $gallery = $events ?><?php $li_class = 's12 m6 l3' ?><!-- -gallery.name='Productos Estrella'--><section class="block_gallery_events"><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_venobox(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="venobox btn"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" class="btn name"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><div class="name"><?= htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?= htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?= htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?= htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><section class="home_certificacion row torelease"><div class="container"><h3 class="release-item">Agro Sur Latino SAC, es una empresa con más de 10 años de presencia y trayectoria en el mercado; especializado en la comercialización de productos de agro-exportación de mayor demanda a nivel internacional; producidas en las principales regiones del Perú.</h3><figure class="release-item"><img src="<?= htmlspecialchars($pub_img) ?>/sello-calidad-300x203.png" class="responsive-img"></figure><p class="certificacion release-item">Agro Sur Latino, es una de las empresas pioneras en desarrollar e implementar una línea completa para el procesamiento de quinua, la cual está compuesta de una línea de lavado a vapor y otra línea de selección y envasado, instaladas en un solo punto gracias a que contamos con una amplia infraestructura y con maquinarias de última generación, acompañado de una adecuado control de calidad, la cual nos permite obtener productos inocuos.</p><h2 class="release-item">COMPRA PRODUCTOS DE LA MEJOR CALIDAD</h2><p class="contactenos release-item">Contáctanos y pide cotizaciones de los mejores productos.</p><a href="contactenos" class="release-item btn">CONTÁCTANOS</a></div></section><?php $gallery = $clients ?><?php $li_class = 's6 m6 l3' ?><?php if ($gallery['parallax']) : ?><?php $classs = "parallax-container" ?><?php else : ?><?php $classs = "" ?><?php endif ?><section<?php attr_class('home_gallery', add("", $classs, "")) ?>><?php if ($gallery['parallax']) : ?><div class="parallax"><img src="<?= htmlspecialchars($pub_img) ?><?= htmlspecialchars($gallery['parallax']) ?>"></div><?php endif ?><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_venobox(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-type="youtube" href="http://youtu.be/<?= htmlspecialchars($item['video']) ?>" class="venobox btn"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><a href="<?= htmlspecialchars($item['url']) ?>" class="btn name"><?= htmlspecialchars($item['name']) ?></a><?php else : ?><div class="name"><?= htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?= htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?= htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?= htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><footer><div class="container"><ul><li><h3>CONTÁCTANOS</h3></li><?php if ($web_facebook) : ?><li class="facebook icon-circle"> <a title="Facebook" target="_blank" href="<?= htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube icon-circle"><a title="Youtube" target="_blank" href="<?= htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter icon-circle"><a title="Twitter" target="_blank" href="<?= htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><li><span>Teléfono <?= htmlspecialchars($web_phone) ?></span></li><li><span>E-mail: <?= htmlspecialchars($web_email) ?></span></li></ul><ul class="menu"><li><h3>LA EMPRESA</h3></li><?php if ($visiters) : ?><li><?= htmlspecialchars($visiters) ?> visitas</li><?php endif ?><?php mixin__menu_items(null, array(), $menu_footer) ?></ul></div></footer><script type="text/javascript">var ven_css      ='<?= htmlspecialchars($ven_css) ?>';
var pub_img      ='<?= htmlspecialchars($pub_img) ?>';
var is_local     =<?= htmlspecialchars($localhost) ?>;
var work_ven_css ='<?= htmlspecialchars($work_ven_css) ?>';
var is_debug 	  =<?= htmlspecialchars($is_debug) ?>;
//- var Materialize;</script><script src="<?= htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><script src="<?= htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?= htmlspecialchars($ven_js) ?>require.js" data-main="<?= htmlspecialchars($work_ven_js) ?>"></script><script src="<?= htmlspecialchars($pub_js) ?><?= htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
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