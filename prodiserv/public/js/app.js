/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "../prodiserv/app/sources/es6/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "../prodiserv/app/sources/components/header/header.js":
/*!************************************************************!*\
  !*** ../prodiserv/app/sources/components/header/header.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if (is_local) console.log('prodiserv / header');\n  let header_height = $('header').height();\n  let menu_top_height = $('header > nav').height();\n  let headfixed_height = header_height - menu_top_height; // console.log(header_height);\n  // console.log(menu_top_height);\n  // console.log(headfixed_height);\n\n  if (!is_debug) $(window).scroll(() => {\n    if ($(window).scrollTop() > headfixed_height) {\n      $('body').addClass('headfixed');\n      $('body').css('padding-top', header_height);\n    } else {\n      $('body').removeClass('headfixed');\n      $('body').css('padding-top', 0);\n    }\n  });\n};\n\n//# sourceURL=webpack:///../prodiserv/app/sources/components/header/header.js?");

/***/ }),

/***/ "../prodiserv/app/sources/es6/app.js":
/*!*******************************************!*\
  !*** ../prodiserv/app/sources/es6/app.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// $=require('./jquery-2.1.4.min.js');\n($ => {\n  $(() => {\n    // require('./materialize.min.js');\n    // require('./loadcss.js');\n    // require(\"./fix\")();\n    // require(\"./materialize/scrollspy\")();\n    // materialize slider\n    // require(\"./materialize/sidenav\")();\n    // materialize slider\n    // require(\"./materialize/slider\")();\n    __webpack_require__(/*! ./slippry */ \"../prodiserv/app/sources/es6/slippry.js\")(); // require(\"./materialize/modal\")();\n    // plugin for google maps\n    // require(\"./map\")();\n    // menu fixed\n    // require(\"./headfixed\")();\n    // parallax\n\n\n    __webpack_require__(/*! ./materialize/parallax */ \"../prodiserv/app/sources/es6/materialize/parallax.js\")(); // require(\"./lightbox\")();\n    // lightbox for video\n\n\n    __webpack_require__(/*! ./venobox */ \"../prodiserv/app/sources/es6/venobox.js\")(); // lightbox for photos\n\n\n    __webpack_require__(/*! ./magnific-popup */ \"../prodiserv/app/sources/es6/magnific-popup.js\")(); //remove href when href=#\n\n\n    $(\"a[href=#]\").removeAttr('href'); //selectdate \n\n    $(\"#select_date\").on(\"change\", e => {\n      var vall = $(e.target).val();\n      $(\".dates_all\").hide();\n      $(\".dates_\" + vall).show();\n    }); // Begin Components\n\n    __webpack_require__(/*! ../../../../work/app/sources/components/common/common.js */ \"../work/app/sources/components/common/common.js\")();\n\n    __webpack_require__(/*! ../../../../work/app/sources/components/menu_left/menu_left.js */ \"../work/app/sources/components/menu_left/menu_left.js\")();\n\n    __webpack_require__(/*! ../../../../work/app/sources/components/block_gallery/block_gallery.js */ \"../work/app/sources/components/block_gallery/block_gallery.js\")();\n\n    __webpack_require__(/*! ../../../../work/app/sources/components/block_banner/block_banner.js */ \"../work/app/sources/components/block_banner/block_banner.js\")();\n\n    __webpack_require__(/*! ../../../../prodiserv/app/sources/components/header/header.js */ \"../prodiserv/app/sources/components/header/header.js\")(); // Finish Components\n\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///../prodiserv/app/sources/es6/app.js?");

/***/ }),

/***/ "../prodiserv/app/sources/es6/magnific-popup.js":
/*!******************************************************!*\
  !*** ../prodiserv/app/sources/es6/magnific-popup.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if ($('.parent-container li a').length > 0) {\n    requirejs(['magnific-popup.min'], () => {\n      loadCss('magnific-popup.css');\n      $('.parent-container').magnificPopup({\n        delegate: 'a',\n        gallery: {\n          enabled: true\n        },\n        type: 'image'\n      });\n      console.log('magnific');\n    });\n  }\n};\n\n//# sourceURL=webpack:///../prodiserv/app/sources/es6/magnific-popup.js?");

/***/ }),

/***/ "../prodiserv/app/sources/es6/materialize/parallax.js":
/*!************************************************************!*\
  !*** ../prodiserv/app/sources/es6/materialize/parallax.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  // Parallax   \n  $('.parallax').parallax();\n};\n\n//# sourceURL=webpack:///../prodiserv/app/sources/es6/materialize/parallax.js?");

/***/ }),

/***/ "../prodiserv/app/sources/es6/slippry.js":
/*!***********************************************!*\
  !*** ../prodiserv/app/sources/es6/slippry.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  // if($('.responsive').length>0){\n  requirejs(['slippry.min'], () => {\n    loadCss('slippry.css');\n    var demo1 = $(\".slides\").slippry({\n      transition: 'fade',\n      useCSS: true,\n      speed: 1000,\n      pause: 5000,\n      auto: true,\n      adaptiveHeight: true // height of the sliders adapts to current slide\n      // responsive: true,\n\n    });\n    /*\n    $('.responsive').slippry({\n      // dots: true,\n      infinite: true,\n      speed: 300,\n      slidesToShow: 3,\n      slidesToScroll: 1,\n      // autoplay: true,\n      autoplaySpeed: 8000,\n        // fade: true,\n        // cssEase: 'linear',\n      responsive: [\n        {\n          breakpoint: 992,\n          settings: {\n            slidesToShow: 2,\n            slidesToScroll: 1,\n            infinite: true,\n            // dots: true\n          }\n        },\n        {\n          breakpoint: 600,\n          settings: {\n            slidesToShow: 1,\n            slidesToScroll: 1\n          }\n        }\n      ]\n    });\n    */\n  }); // }\n};\n\n//# sourceURL=webpack:///../prodiserv/app/sources/es6/slippry.js?");

/***/ }),

/***/ "../prodiserv/app/sources/es6/venobox.js":
/*!***********************************************!*\
  !*** ../prodiserv/app/sources/es6/venobox.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if ($('.venobox').length > 0) {\n    requirejs(['venobox.min'], () => {\n      loadCss('venobox.css');\n      $('.venobox').venobox();\n      console.log('venobox');\n    });\n  }\n};\n\n//# sourceURL=webpack:///../prodiserv/app/sources/es6/venobox.js?");

/***/ }),

/***/ "../work/app/sources/components/block_banner/block_banner.js":
/*!*******************************************************************!*\
  !*** ../work/app/sources/components/block_banner/block_banner.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if (is_local) console.log('work / block_banner'); // if($('.responsive').length>0){\n\n  requirejs(['slippry.min'], () => {\n    loadCss(work_ven_css + 'slippry.css');\n    var demo1 = $(\".slides\").slippry({\n      transition: 'fade',\n      useCSS: true,\n      speed: 1000,\n      pause: 5000,\n      auto: true,\n      adaptiveHeight: true // height of the sliders adapts to current slide\n      // responsive: true,\n\n    });\n    /*\n    $('.responsive').slippry({\n      // dots: true,\n      infinite: true,\n      speed: 300,\n      slidesToShow: 3,\n      slidesToScroll: 1,\n      // autoplay: true,\n      autoplaySpeed: 8000,\n        // fade: true,\n        // cssEase: 'linear',\n      responsive: [\n        {\n          breakpoint: 992,\n          settings: {\n            slidesToShow: 2,\n            slidesToScroll: 1,\n            infinite: true,\n            // dots: true\n          }\n        },\n        {\n          breakpoint: 600,\n          settings: {\n            slidesToShow: 1,\n            slidesToScroll: 1\n          }\n        }\n      ]\n    });\n    */\n  }); // }\n};\n\n//# sourceURL=webpack:///../work/app/sources/components/block_banner/block_banner.js?");

/***/ }),

/***/ "../work/app/sources/components/block_gallery/block_gallery.js":
/*!*********************************************************************!*\
  !*** ../work/app/sources/components/block_gallery/block_gallery.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if (is_local) console.log('work / block_gallery');\n\n  if ($('.gallery.photos li a').length > 0) {\n    requirejs(['magnific-popup.min'], () => {\n      loadCss('magnific-popup.css');\n      $('.gallery.photos').magnificPopup({\n        delegate: 'a',\n        gallery: {\n          enabled: true\n        },\n        type: 'image'\n      }); // console.log('magnific');\n    }); // \n  } // if($('.gallery.videos li a').length>0){\n  //    \trequirejs(['venobox.min'],()=>{\n  //      \tloadCss('venobox.css');\n  //      \tconsole.log($('.venobox'));\n  //      \t$('.venobox').venobox(); \n  //   \t});\n  //   }\n\n\n  if ($('.gallery.videos li a').length > 0) {\n    requirejs(['lity.min'], () => {\n      loadCss('lity.min.css');\n    });\n  }\n};\n\n//# sourceURL=webpack:///../work/app/sources/components/block_gallery/block_gallery.js?");

/***/ }),

/***/ "../work/app/sources/components/common/common.js":
/*!*******************************************************!*\
  !*** ../work/app/sources/components/common/common.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if (is_local) console.log('work / common');\n\n  if ($('header').length > 0) {\n    requirejs(['tripleclick'], () => {\n      // $(window).load(function() {\n      // $(document).ready(function() {\n      console.log('cargado tripleclick');\n      $('header').bind('tripleclick', function () {\n        console.log('señores'); // location.href='?tool';\n      }); // });\n    });\n  }\n\n  $('.parallax').parallax();\n  Materialize.updateTextFields(); //////////////////////\n  // TO RELEASE\n  ////////////////////\n\n  let fire_options = [];\n  let ff = 0;\n  $('.torelease').each(function (index) {\n    let firsts = $(this).attr('class').split(' ');\n    let ee = 0;\n    let ii = [];\n    $.each(firsts, (key, value) => {\n      if (value != 'torelease') ii[ee++] = value;\n    }); // fire_options[ff++]=ii['0'];\n\n    fire_options[ff++] = {\n      selector: '.' + ii['0'],\n      offset: 300,\n      callback: el => {\n        $('.' + ii['0']).addClass('release');\n      }\n    }; // console.log('torelease: .'+ii['0']);\n\n    Materialize.scrollFire(fire_options);\n  }); // console.log(fire_options);\n  //////////////////////\n  // MAP\n  ////////////////////\n  // if($('#map').length > 0){\n  // \tlet map;\n  // \tlet dmap=$(\"#map\");\n  // \tmap = new GMaps({\n  // \t  div: '#map',\n  // \t  lat: dmap.data(\"lat\"),\n  // \t  lng: dmap.data(\"lon\")\n  // \t});\n  // \tmap.addMarker({\n  // \t  lat: dmap.data(\"lat\"),\n  // \t  lng: dmap.data(\"lon\"),\n  // \t  title: dmap.data(\"name\"),\n  // \t  infoWindow: {\n  // \t    content: dmap.data(\"text\")\n  // \t  }\n  // \t});\n  // }\n  //////////////////////\n  // DEBUG\n  ////////////////////\n\n  if (is_debug) {\n    console.log('debug');\n    $('#debug_submenu').append($('.menu .menu_prodiserv').html());\n    $('#debug_submenu > a').html('menu'); // console.log($(\"#list_debug\").html());\n\n    $('#debnu').append($('#list_debug').html());\n    $('#debemail').append($('#list_emails').html());\n  } //////////////////////\n  // FORM\n  ////////////////////\n  // $('select').material_select();\n\n\n  $('textarea').trigger('autoresize');\n  $('.datepicker').pickadate({\n    selectMonths: true,\n    // Creates a dropdown to control month\n    selectYears: 1,\n    // Creates a dropdown of 15 years to control year,\n    // today: 'Hoy',\n    // clear: 'Cancelar',\n    // close: 'Aceptr',\n    closeOnSelect: true,\n    // Close upon selecting a date,\n    // The title label to use for the month nav buttons\n    labelMonthNext: 'Mes siguiente',\n    labelMonthPrev: 'Mes anterior',\n    // The title label to use for the dropdown selectors\n    labelMonthSelect: 'Selecciona un mes',\n    labelYearSelect: 'Selecciona un año',\n    // Months and weekdays\n    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],\n    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],\n    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],\n    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],\n    // Materialize modified\n    weekdaysLetter: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],\n    // Today and clear\n    today: 'Hoy',\n    clear: 'Limpiar',\n    close: 'Aceptar',\n    firstDay: true\n  });\n};\n\n//# sourceURL=webpack:///../work/app/sources/components/common/common.js?");

/***/ }),

/***/ "../work/app/sources/components/menu_left/menu_left.js":
/*!*************************************************************!*\
  !*** ../work/app/sources/components/menu_left/menu_left.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = () => {\n  if (is_local) console.log('menu_left'); // if($('.class').length>0){\n  // requirejs(['vendor.min'],()=>{\n  // loadCss('vendor.css');\n  // });\n  // }\n\n  $('.button-collapse').sideNav({\n    'edge': 'left'\n  });\n};\n\n//# sourceURL=webpack:///../work/app/sources/components/menu_left/menu_left.js?");

/***/ })

/******/ });