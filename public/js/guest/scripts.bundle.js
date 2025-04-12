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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__layout_shopping_cart_js__ = __webpack_require__(47);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__layout_shopping_cart_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__layout_shopping_cart_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__layout_menu_js__ = __webpack_require__(48);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__layout_menu_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__layout_menu_js__);


// import './layout/_layout.js'

/***/ }),

/***/ 47:
/***/ (function(module, exports) {

(function () {
  $(document).click(function () {
    var $item = $(".shopping-cart");
    if ($item.hasClass("active")) {
      $item.removeClass("active");
    }
  });

  $('.shopping-cart').each(function () {
    var delay = $(this).index() * 50 + 'ms';
    $(this).css({
      '-webkit-transition-delay': delay,
      '-moz-transition-delay': delay,
      '-o-transition-delay': delay,
      'transition-delay': delay
    });
  });
  $('#cart').hover(function (e) {
    e.stopPropagation();
    if ($(".shopping-cart").hasClass) {
      if (!$(".shopping-cart").is(':hover')) {
        $(".shopping-cart").toggleClass("active");
      }
    } else {
      $(".shopping-cart").toggleClass("active");
    }
  });
  $('#cart').click(function (e) {
    e.stopPropagation();
    $(".shopping-cart").toggleClass("active");
  });

  $('#addtocart').click(function (e) {
    e.stopPropagation();
    $(".shopping-cart").toggleClass("active");
  });
})();

/***/ }),

/***/ 48:
/***/ (function(module, exports) {


//For menu
;(function ($) {
    'use strict';

    var defaults = {
        topOffset: 300, //px - offset to switch of fixed position
        hideDuration: 0, //ms
        stickyClass: 'is-fixed'
    };

    $.fn.stickyPanel = function (options) {
        if (this.length == 0) return this; // returns the current jQuery object

        var self = this,
            settings,
            isFixed = false,
            //state of panel
        stickyClass,
            animation = {
            normal: self.css('animationDuration'), //show duration
            reverse: '', //hide duration
            getStyle: function getStyle(type) {
                return {
                    animationDirection: type,
                    animationDuration: this[type]
                };
            }
        };

        // Init carousel
        function init() {
            settings = $.extend({}, defaults, options);
            animation.reverse = settings.hideDuration + 'ms';
            stickyClass = settings.stickyClass;
            $(window).on('scroll', onScroll).trigger('scroll');
        }

        // On scroll
        function onScroll() {
            if (window.pageYOffset > settings.topOffset) {
                if (!isFixed) {
                    isFixed = true;
                    var height = document.getElementById("menu-nav").offsetHeight;
                    document.getElementById("menu-nav").style.height = height + "px";
                    self.addClass(stickyClass).css(animation.getStyle('normal'));
                }
            } else {
                if (isFixed) {
                    isFixed = false;

                    self.removeClass(stickyClass).each(function (index, e) {
                        // restart animation
                        // https://css-tricks.com/restart-css-animation/
                        void e.offsetWidth;
                    }).addClass(stickyClass).css(animation.getStyle('reverse'));

                    setTimeout(function () {
                        self.removeClass(stickyClass);
                    }, settings.hideDuration);
                }
            }
        }

        init();

        return this;
    };
})(jQuery);

//run
$(function () {
    $('.menu').stickyPanel();
});

/***/ })

/******/ });