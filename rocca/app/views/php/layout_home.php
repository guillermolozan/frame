<?php if (!function_exists('mixin__button_side_nav')) { function mixin__button_side_nav($block = null, $attributes = array()) { ?><a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a><?php } } ?><?php if (!function_exists('mixin__post_item')) { function mixin__post_item($block = null, $attributes = array(), $post = null, $imgfirst = null, $type = null) { global $■;$■['post'] = $post;$■['imgfirst'] = $imgfirst;$■['type'] = $type;?><?php if ($post['name']) : ?><?php if ($type == 'h1') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h2') : ?><h2><?php mixin__item(null, array(), $post) ?></h2><?php elseif ($type == 'h3') : ?><h1><?php mixin__item(null, array(), $post) ?></h1><?php elseif ($type == 'h4') : ?><h4><?php mixin__item(null, array(), $post) ?></h4><?php else : ?><h3><?php mixin__item(null, array(), $post) ?></h3><?php endif ?><?php endif ?><?php if ($post['html']) : ?><div><?php echo $post['html'] ?></div><?php endif ?><?php if ($post['text']) : ?><div><p><?php echo htmlspecialchars($post['text']) ?></p></div><?php endif ?><?php mixin__img_item(null, array(), $post) ?><?php if ($post['video']) : ?><?php mixin__post_video(null, array(), $post['video']) ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__post_video')) { function mixin__post_video($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><?php } } ?><?php if (!function_exists('mixin__items_list')) { function mixin__items_list($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li class="collection-item"><?php mixin__link_item(null, array(), $men_item) ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__list_card')) { function mixin__list_card($block = null, $attributes = array(), $list = null) { global $■;$■['list'] = $list;?><div class="card"><div class="card-content"><?php if ($list['name']) : ?><div class="card-title"><h3><?php echo htmlspecialchars($list['name']) ?></h3></div><?php endif ?><ul><?php mixin__items_list(null, array(), $list['items']) ?></ul><?php if ($list['items']) : ?><?php if ($list['more']) : ?><a href="<?php echo htmlspecialchars($list['more']['url']) ?>" class="more right"><?php echo htmlspecialchars($list['more']['name']) ?></a><?php endif ?><?php endif ?></div></div><?php } } ?><?php if (!function_exists('mixin__link_item')) { function mixin__link_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" rel="<?php echo htmlspecialchars($item['rel']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>"<?php attr_class(add("", $item['aclass'], "")) ?>><?php echo htmlspecialchars($item['name']) ?> <?php if ($item['sub']) : ?><b><?php echo htmlspecialchars($item['sub']) ?></b><?php endif ?></a><?php } } ?><?php if (!function_exists('mixin__item')) { function mixin__item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['url']) : ?><?php mixin__link_item(null, array(), $item) ?><?php else : ?><span><?php echo htmlspecialchars($item['name']) ?></span><?php endif ?><?php } } ?><?php if (!function_exists('mixin__imgg')) { function mixin__imgg($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['name']) : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>" data-caption="<?php echo htmlspecialchars($item['name']) ?>" class="responsive-img"/><?php else : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" alt="foto" title="foto" class="responsive-img"/><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_item')) { function mixin__img_item($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><?php if ($item['img']) : ?><?php if ($item['url']) : ?><a href="<?php echo htmlspecialchars(strtolower($item['url'])) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" title="<?php echo htmlspecialchars(strtolower($item['name'])) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><?php mixin__imgg(null, array(), $item) ?></a><?php else : ?><div class="photo"><?php mixin__imgg(null, array(), $item) ?></div>
<?php endif ?><?php endif ?><?php } } ?><?php if (!function_exists('mixin__img_magnific')) { function mixin__img_magnific($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a href="<?php echo htmlspecialchars($item['img']) ?>" title="<?php echo htmlspecialchars($item['name']) ?>"<?php attr_class(add("photo ", $item['aclass'], "")) ?>><img src="<?php echo htmlspecialchars($item['img']) ?>" title="<?php echo htmlspecialchars($item['name']) ?>" alt="<?php echo htmlspecialchars($item['name']) ?>" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__img_lifty')) { function mixin__img_lifty($block = null, $attributes = array(), $item = null) { global $■;$■['item'] = $item;?><a data-lity="data-lity" href="http://youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="photo"><img src="https://i.ytimg.com/vi/<?php echo htmlspecialchars($item['video']) ?>/mqdefault.jpg" class="responsive-img"/></a><?php } } ?><?php if (!function_exists('mixin__menu_items')) { function mixin__menu_items($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?><?php if ($men_item['items']) : ?><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_advanced')) { function mixin__menu_items_advanced($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><li<?php attr_class(add("", $men_item['class'], " collapse collection-item")) ?>><a<?php attr_class(add("collapsible-header ", $men_item['class'], "")) ?>><?php echo htmlspecialchars($men_item['name']) ?></a><?php if ($men_item['items']) : ?><div class="collapsible-body"><ul class="submenu "><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div><?php endif ?></li><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__menu_items_collapsible')) { function mixin__menu_items_collapsible($block = null, $attributes = array(), $items = null) { global $■;$■['items'] = $items;?><?php if ($items) : foreach ($items as $men_item) : $■['men_item'] = $men_item; ?><?php if ($men_item['items']) : ?><li class="collapse collection-item"><a<?php attr_class(add("collapsible-header waves-effect ", $men_item['class'], "")) ?>><?php echo htmlspecialchars($men_item['name']) ?></a><div class="collapsible-body"><ul><?php mixin__menu_items(null, array(), $men_item['items']) ?></ul></div></li><?php else : ?><li<?php attr_class(add("", $clas, " collection-item ", $men_item['class'], "")) ?>><?php mixin__link_item(null, array(), $men_item) ?></li><?php endif ?><?php endforeach; endif ?><?php } } ?><?php if (!function_exists('mixin__video_youtube')) { function mixin__video_youtube($block = null, $attributes = array(), $video = null) { global $■;$■['video'] = $video;?><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($video) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe><?php } } ?><?php if (!function_exists('mixin__render_email')) { function mixin__render_email($block = null, $attributes = array(), $email = null) { global $■;$■['email'] = $email;?><a href="mailto:<?php echo htmlspecialchars($email) ?>" title="email"><?php echo htmlspecialchars($email) ?></a><?php } } ?><?php if (!function_exists('mixin__render_whatsapp')) { function mixin__render_whatsapp($block = null, $attributes = array(), $wa = null) { global $■;$■['wa'] = $wa;?><a title="whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=51<?php echo htmlspecialchars($wa) ?>"<?php attr_class($attributes['class']) ?>><?php echo htmlspecialchars($wa) ?></a><?php } } ?><?php if (!function_exists('mixin__render_phone')) { function mixin__render_phone($block = null, $attributes = array(), $phone = null) { global $■;$■['phone'] = $phone;?><a href="tel:<?php echo htmlspecialchars($phone) ?>" title="teléfono"><?php echo htmlspecialchars($phone) ?></a><?php } } ?><?php if (!function_exists('mixin__input_hidden')) { function mixin__input_hidden($block = null, $attributes = array(), $name = null, $line = null) { global $■;$■['name'] = $name;$■['line'] = $line;?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="hidden" value="<?php echo htmlspecialchars($line['value']) ?>"/><?php } } ?><?php if (!function_exists('mixin__input_text')) { function mixin__input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><?php if ($line['required']) : ?><input required="required" id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>" oninvalid="this.setCustomValidity('El campo no puede estar vació')"<?php attr_class(add("", $line['class'], "")) ?>/><?php else : ?><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/><?php endif ?><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_textarea')) { function mixin__input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?></label></div><?php } } ?><?php if (!function_exists('mixin__input_select_2')) { function mixin__input_select_2($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected"><?php echo htmlspecialchars($line['label']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><?php if ($item == $line['value']) : ?><option value="<?php echo htmlspecialchars($item) ?>" selected="selected"><?php echo htmlspecialchars($item) ?></option><?php else : ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?>					</option><?php endif ?><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__input_file')) { function mixin__input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field file-field ", $clas, "")) ?>><div class="btn"><span>Archivo</span><input type="file"/></div><div class="file-path-wrapper"><input type="text" class="file-path validate"/></div></div><?php } } ?><?php if (!function_exists('mixin__input_date')) { function mixin__input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("input-field ", $clas, "")) ?>><label for="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>"><?php echo htmlspecialchars($line['label']) ?> </label><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="text" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_text')) { function mixin__simple_input_text($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" placeholder="<?php echo htmlspecialchars($line['label']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("", $line['class'], "")) ?>/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_textarea')) { function mixin__simple_input_textarea($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><textarea id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" placeholder="<?php echo htmlspecialchars($line['label']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>"<?php attr_class(add("materialize-textarea ", $line['class'], "")) ?>><?php echo htmlspecialchars($line['value']) ?></textarea></div><?php } } ?><?php if (!function_exists('mixin__simple_input_select')) { function mixin__simple_input_select($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><select id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" class="browser-default"><option value="" disabled="disabled" selected="selected">Seleccione <?php echo htmlspecialchars($line['name']) ?></option><?php if ($line['options']) : foreach ($line['options'] as $item) : $■['item'] = $item; ?><option value="<?php echo htmlspecialchars($item) ?>"><?php echo htmlspecialchars($item) ?></option><?php endforeach; endif ?></select></div><?php } } ?><?php if (!function_exists('mixin__simple_input_file')) { function mixin__simple_input_file($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input type="file"/></div><?php } } ?><?php if (!function_exists('mixin__simple_input_date')) { function mixin__simple_input_date($block = null, $attributes = array(), $name = null, $line = null, $clas = null) { global $■;$■['name'] = $name;$■['line'] = $line;$■['clas'] = $clas;?><div<?php attr_class(add("", $clas, "")) ?>><input id="<?php echo htmlspecialchars($name) ?>_<?php echo htmlspecialchars($line['name']) ?>" name="<?php echo htmlspecialchars($line['name']) ?>" type="<?php echo htmlspecialchars($line['type']) ?>" value="<?php echo htmlspecialchars($line['value']) ?>"<?php attr_class(add("datepicker ", $line['class'], "")) ?>/></div><?php } } ?><!DOCTYPE html><html lang="es"><head><base href="<?php echo htmlspecialchars($base) ?>"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($icon) ?>" rel="shortcut icon" type="image/png"><link href="<?php echo htmlspecialchars($pub_css) ?><?php echo htmlspecialchars($build_css) ?>" type="text/css" rel="stylesheet" media="screen,projection"><title><?php echo htmlspecialchars($head_title) ?></title><?php if ($canonical) : ?><link rel="canonical" href="<?php echo htmlspecialchars($canonical) ?>"><?php endif ?><?php if ($head_description) : ?><meta name="description" content="<?php echo htmlspecialchars($head_description) ?>"><?php endif ?><?php if ($head_keywords) : ?><meta name="keywords" content="<?php echo htmlspecialchars($head_keywords) ?>"><?php endif ?><?php if ($opengraph) : ?><meta name="og:url" content="<?php echo htmlspecialchars($baseurl) ?><?php echo htmlspecialchars($canonical) ?>"><meta name="og:type" content="website"><meta name="og:title" content="<?php echo htmlspecialchars($head_title) ?>"><?php endif ?><?php if ($theme_color) : ?><meta name="theme-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="msapplication-navbutton-color" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-status-bar-style" content="<?php echo htmlspecialchars($theme_color) ?>"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><?php endif ?><meta name="robots" content="index, follow"><?php if ($map) : ?><script src="//maps.google.com/maps/api/js?key=<?php echo htmlspecialchars($gmap_key) ?>"></script><script src="<?php echo htmlspecialchars($ven_js) ?>gmaps.js"></script><?php endif ?></head><?php if ($pre_output) : ?><div style="background:#eee;" class="pre_output"><?php echo $pre_output ?></div><?php endif ?><body<?php attr_class(add("", $classbody, "")) ?>><header class="navbar-fixed"><?php if ($is_home) : ?><h1><?php echo htmlspecialchars($web_name) ?></h1><?php $main = false ?><?php endif ?><section class="header_pre hide-on-med-and-down"><nav><div class="container"><ul class="menu"><?php if ($web_facebook) : ?><li class="facebook"><a target="_blank" href="<?php echo htmlspecialchars($web_facebook) ?>"></a></li><?php endif ?><?php if ($web_youtube) : ?><li class="youtube"><a target="_blank" href="<?php echo htmlspecialchars($web_youtube) ?>"></a></li><?php endif ?><?php if ($web_twitter) : ?><li class="twitter"><a target="_blank" href="<?php echo htmlspecialchars($web_twitter) ?>"></a></li><?php endif ?><?php if ($web_instagram) : ?><li class="instagram"><a target="_blank" href="<?php echo htmlspecialchars($web_instagram) ?>"></a></li><?php endif ?><?php if ($web_whatsapp) : ?><li class="whatsapp"><?php mixin__render_whatsapp(null, array(), $web_whatsapp) ?></li><?php endif ?><?php if ($web_phone) : ?><li class="phone"><?php mixin__render_phone(null, array(), $web_phone) ?></li><?php endif ?><?php if ($web_email) : ?><li class="email"><?php mixin__render_email(null, array(), $web_email) ?></li><?php endif ?></ul></div></nav></section><nav><div class="container"><?php mixin__button_side_nav() ?><ul class="menu menu_top"><li class="brand-logo"><a href="<?php echo htmlspecialchars($link_home) ?>" title="<?php echo htmlspecialchars($web_name) ?>"><img src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($logo) ?>" title="<?php echo htmlspecialchars($web_name) ?>" alt="<?php echo htmlspecialchars($web_name) ?>"></a></li><?php if (!$localhost) : ?><li class="header-fb"><div class="contain"><div data-href="<?php echo htmlspecialchars($baseurl) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" class="fb-like"></div></div></li><?php endif ?><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div></nav></header><ul id="mobile-nav" class="menu_left side-nav collapsible collapsible-accordion"><?php mixin__menu_items_collapsible(null, array(), $menu_left) ?></ul><?php if ($banner) : ?><div class="slider"><ul class="slides"><?php if ($banner) : foreach ($banner as $item) : $■['item'] = $item; ?><li><?php if (!$item['url'] || $item['url'] == 'pagina//') : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" class="desktop"><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>"><img aclass="desktop" src="<?php echo htmlspecialchars($item['img']) ?>"></a><?php endif ?></li><?php endforeach; endif ?></ul></div><?php endif ?><?php if ($banner_imagen || $banner_absolute) : ?><figure class="responsive-img"><?php if ($banner_imagen) : ?><img alt="banner" src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($banner_imagen) ?>"><?php endif ?><?php if ($banner_absolute) : ?><img src="<?php echo htmlspecialchars($banner_absolute) ?>"><?php endif ?></figure><?php endif ?><?php if (!$localhost) : ?><div class="home-facebook"><div class="container"><div data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" class="fb-like"></div></div></div><?php endif ?><?php $gallery = $lineas ?><?php $li_class = 's6 m4 l2' ?><section class="block_gallery_products"><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_lifty(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-lity href="//youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="btn"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php endif ?><?php else : ?><div class="name"><?php echo htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?php echo htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?><?php if ($item['precio']) : ?><div class="precio"><?php echo htmlspecialchars($item['precio']) ?></div><?php endif ?><?php if ($item['precio_oferta']) : ?><div class="precio_oferta"><?php echo htmlspecialchars($item['precio_oferta']) ?></div><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?php echo htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?php echo htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><?php $gallery = $importaciones ?><?php $ul_class = 'responsive' ?><section class="home_block_importaciones"><div class="container row"><div class="card"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_lifty(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-lity href="//youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="btn"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php endif ?><?php else : ?><div class="name"><?php echo htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?php echo htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?><?php if ($item['precio']) : ?><div class="precio"><?php echo htmlspecialchars($item['precio']) ?></div><?php endif ?><?php if ($item['precio_oferta']) : ?><div class="precio_oferta"><?php echo htmlspecialchars($item['precio_oferta']) ?></div><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?php echo htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?php echo htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></div></section><?php $gallery = $descuentos ?><?php $ul_class = 'responsive' ?><section class="home_block_descuentos"><div class="container row"><div class="card"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_lifty(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-lity href="//youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="btn"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php endif ?><?php else : ?><div class="name"><?php echo htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?php echo htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?><?php if ($item['precio']) : ?><div class="precio"><?php echo htmlspecialchars($item['precio']) ?></div><?php endif ?><?php if ($item['precio_oferta']) : ?><div class="precio_oferta"><?php echo htmlspecialchars($item['precio_oferta']) ?></div><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?php echo htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?php echo htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></div></section><section class="home_block_notes row"><div class="container"><?php if ($noticias) : ?><div class="col s12 l4 noticias"><?php mixin__list_card(null, array(), $noticias) ?></div><?php endif ?><?php if ($brochure) : ?><div class="col s12 l4 brochure"><div class="card"><div class="card-content"><div class="card-title"><h3>Brochure corporativo</h3></div><img src="<?php echo htmlspecialchars($pub_img) ?><?php echo htmlspecialchars($brochure['img']) ?>"><div><strong class="descargar"><a target="_blank" href="<?php echo htmlspecialchars($brochure['file']) ?>">Descargar</a></strong></div></div></div></div><?php endif ?><?php if ($youtube) : ?><div class="col s12 l4 youtube"><div class="card"><div class="card-content"><div class="card-title"><h3><?php echo htmlspecialchars($youtube['name']) ?></h3></div><div class="video-container"><iframe width="853" height="480" src="//www.youtube.com/embed/<?php echo htmlspecialchars($youtube['code']) ?>?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div></div></div><?php endif ?><?php if ($downloads) : ?><div class="col s12 l4 downloads"><div class="card"><div class="card-content"><div class="card-title"><h3>Descargas</h3></div></div><div class="slider"><ul class="slides"><?php if ($downloads) : foreach ($downloads as $item) : $■['item'] = $item; ?><li><?php if (!$item['url'] || $item['url'] == 'pagina//') : ?><img src="<?php echo htmlspecialchars($item['img']) ?>" class="desktop"><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>"><img aclass="desktop" src="<?php echo htmlspecialchars($item['img']) ?>"></a><?php endif ?></li><?php endforeach; endif ?></ul></div></div></div><?php endif ?><?php if ($social) : ?><div class="col s12 l4 social"><div class="card"><div class="card-content"><div class="card-title"><h3>Social</h3></div><?php if (!$localhost) : ?><div data-href="<?php echo htmlspecialchars($social) ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" class="fb-page"></div><?php endif ?></div></div></div><?php endif ?></div></section><?php $gallery = $block_gallery_videos ?><?php $li_class = 's6 m6 l3 release-item' ?><?php $ul_class = '' ?><section class="block_gallery_videos home_videos torelease"><div class="container"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_lifty(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-lity href="//youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="btn"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php endif ?><?php else : ?><div class="name"><?php echo htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?php echo htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?><?php if ($item['precio']) : ?><div class="precio"><?php echo htmlspecialchars($item['precio']) ?></div><?php endif ?><?php if ($item['precio_oferta']) : ?><div class="precio_oferta"><?php echo htmlspecialchars($item['precio_oferta']) ?></div><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?php echo htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?php echo htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></section><div class="container"><?php $gallery = $links ?><?php $ul_class = 'responsive' ?><section class="home_block_links row"><div class="container"><div class="card"><?php if ($gallery['name']) : ?><?php if ($main) : ?><h1><?php mixin__item(null, array(), $gallery) ?></h1><?php $main = false ?><?php else : ?><h2><?php mixin__item(null, array(), $gallery) ?></h2><?php endif ?><?php endif ?><?php if ($gallery['items']) : ?><ul<?php attr_class(add("row gallery ", $gallery['type'], " items ", $ul_class, " ")) ?>><?php if ($gallery['items']) : foreach ($gallery['items'] as $item) : $■['item'] = $item; ?><li<?php attr_class(add("col ", $li_class, "")) ?>><div class="card"><div class="card-image"><?php if ($gallery['type'] == 'videos') : ?><?php mixin__img_lifty(null, array(), $item) ?><?php elseif ($gallery['type'] == 'photos') : ?><?php mixin__img_magnific(null, array(), $item) ?><?php else : ?><?php mixin__img_item(null, array(), $item) ?><?php endif ?></div><?php if ($item['name']) : ?><div class="card-content"><?php if ($gallery['type'] == 'videos') : ?><a data-lity href="//youtu.be/<?php echo htmlspecialchars($item['video']) ?>" class="btn"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><?php if ($item['url']) : ?><?php if ($item['target']) : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" target="<?php echo htmlspecialchars($item['target']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php else : ?><a href="<?php echo htmlspecialchars($item['url']) ?>" class="btn name"><?php echo htmlspecialchars($item['name']) ?></a><?php endif ?><?php else : ?><div class="name"><?php echo htmlspecialchars($item['name']) ?></div><?php endif ?><?php if ($item['subname']) : ?><div class="subname"><?php echo htmlspecialchars($item['subname']) ?></div><?php endif ?><?php endif ?><?php if ($item['precio']) : ?><div class="precio"><?php echo htmlspecialchars($item['precio']) ?></div><?php endif ?><?php if ($item['precio_oferta']) : ?><div class="precio_oferta"><?php echo htmlspecialchars($item['precio_oferta']) ?></div><?php endif ?></div><?php endif ?></div></li><?php endforeach; endif ?></ul><?php endif ?><?php if ($gallery['more']) : ?><div class="row center more"><a href="<?php echo htmlspecialchars($gallery['more']['url']) ?>" class="btn"><?php echo htmlspecialchars($gallery['more']['name']) ?></a></div><?php endif ?><?php $ul_class = false ?><?php $li_class = false ?></div></div></section></div><footer><div class="container row"><div class="col s12 l6 first"><ul class="menu"><?php mixin__menu_items(null, array(), $menu_top) ?></ul></div><div class="col s12 l6 third"><ul class="menu"><?php if (!$localhost) : ?><li class="footer-fb"><div data-href="<?php echo htmlspecialchars($baseurl) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" class="fb-like"></div></li><?php endif ?><?php if ($web_facebook) : ?><li class="facebook circle"> <a title="Facebook" target="_blank" href="<?php echo htmlspecialchars($web_facebook) ?>"><?php echo htmlspecialchars($web_facebook_page) ?></a></li><?php endif ?><?php if ($web_email) : ?><li class="email circle"> <a title="Email" target="_blank" href="<?php echo htmlspecialchars($web_email) ?>"><?php echo htmlspecialchars($web_email) ?></a></li><?php endif ?><li><span class="corp">WhatsApp: <strong>949732138</strong></span></li><li class="visa"><span>Aceptamos Visa</span></li></ul></div></div></footer><script type="text/javascript">var ven_css      ='<?php echo htmlspecialchars($ven_css) ?>';
var pub_img      ='<?php echo htmlspecialchars($pub_img) ?>';
var is_local     =<?php echo htmlspecialchars($localhost) ?>;
var work_ven_css ='<?php echo htmlspecialchars($work_ven_css) ?>';
var is_debug 	  =<?php echo htmlspecialchars($is_debug) ?>;
//- var Materialize;</script><script src="<?php echo htmlspecialchars($ven_js) ?>jquery-2.1.4.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><script src="<?php echo htmlspecialchars($ven_js) ?>loadcss.js"></script><script src="<?php echo htmlspecialchars($ven_js) ?>require.js" data-main="<?php echo htmlspecialchars($work_ven_js) ?>"></script><script src="<?php echo htmlspecialchars($pub_js) ?><?php echo htmlspecialchars($build_js) ?>"></script><?php if ($analytics && !$localhost) : ?><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo htmlspecialchars($analytics) ?>', 'auto');
ga('send', 'pageview');
</script><?php endif ?><?php if ($opengraph) : ?><div id="fb-root"></div><script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=276802375855277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php endif ?></body></html>