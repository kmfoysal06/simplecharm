/******/ (function() { // webpackBootstrap
/*!******************************!*\
  !*** ./src/js/customizer.js ***!
  \******************************/
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 * @package SimpleCharm
 * @since 1.0
 */
(function ($) {
  function simplecharm_isValidURL(url) {
    try {
      new URL(url);
      return true;
    } catch (error) {
      return false;
    }
  }
  wp.customize('simplecharm_setting', function (value) {
    value.bind(function (newval) {
      if (newval) {
        if (simplecharm_isValidURL(simplecharm_header_info.simplecharm_header_image)) {
          $("header").css("background-image", "url(".concat(simplecharm_header_info["simplecharm_header_image"], ")"));
          $("header").css("background-repeat", "no-repeat");
          $("header").css("background-size", "cover");
          $("header").css("padding", "20px");
          $("header").css("background-position", "center");
          $(".simplecharm-header-image").css("display", "none");
        }
      } else {
        $("header").css("background-image", "unset");
        $("header").css("background-repeat", "unset");
        $("header").css("background-size", "unset");
        $("header").css("padding", "unset");
        $("header").css("background-position", "unset");
        $(".simplecharm-header-image").css("display", "unset");
      }
    });
  });
})(jQuery);
/******/ })()
;
//# sourceMappingURL=customizer.js.map