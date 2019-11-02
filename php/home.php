<?php

include 'vendor/autoload.php';

$pug = new Pug([]);

$pug->displayFile('../ardyss/app/sources/jade/layout_home.jade',[
  'pageTitle' => 'Try Pug.php and never recode HTML again',
  'youAreUsingJade' => true
]);