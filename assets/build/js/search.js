/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/load_search.js":
/*!*******************************!*\
  !*** ./src/js/load_search.js ***!
  \*******************************/
/***/ (function() {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  var LoadSearch = /*#__PURE__*/function () {
    function LoadSearch() {
      _classCallCheck(this, LoadSearch);
      this.init();
      this.page = 1;
    }
    return _createClass(LoadSearch, [{
      key: "init",
      value: function init() {
        this.load_posts();
      }
    }, {
      key: "load_categories",
      value: function load_categories() {
        var selectedOptions = $("#categories option:selected");
        var selectedNames = [];
        for (var i = 0; i < selectedOptions.length; i++) {
          var nameValue = selectedOptions[i].getAttribute('name');
          selectedNames.push(nameValue);
        }
        return selectedNames;
      }
    }, {
      key: "load_posts",
      value: function load_posts() {
        $('#simplecharm-advanced-search-form').on('submit', function (e) {
          e.preventDefault();
          var search_term = $('.search-field').val();
          var categories = this.load_categories();
          requestPosts(e, search_term, categories, this.page);
        });
      }
    }, {
      key: "requestPosts",
      value: function (_requestPosts) {
        function requestPosts(_x, _x2, _x3, _x4) {
          return _requestPosts.apply(this, arguments);
        }
        requestPosts.toString = function () {
          return _requestPosts.toString();
        };
        return requestPosts;
      }(function (e, search_term, categories, page) {
        var pagination = $('.simplecharm-searchpage-pagination');
        pagination.innerHTML = '';
        var totalPage = 1;
        var apiUrl = new URL('/wp-json/wp/v2/posts', window.location.origin);
        var params = new URLSearchParams();
        if (search_term) {
          params.append('search', search_term);
        }
        if (categories.length > 0) {
          params.append('categories', categories.join(','));
        }
        if (page) {
          params.append('page', page);
        }
        $('#simplecharm-loading-overlay').show();
        fetch(apiUrl + '?' + params.toString()).then(function (response) {
          totalPage = response.headers.get('X-WP-TotalPages');
          return response.json();
        }).then(function (posts) {
          var resultsContainer = $('#simplecharm-search-page');
          resultsContainer.innerHTML = ''; // Clear previous results

          // Check if there are posts
          if (posts.length > 0) {
            posts.forEach(function (post) {
              var date = new Date(post.date);
              var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
              };
              post.date = date.toLocaleDateString('en-US', options);
              var postdate = post.date;
              if (post.title.rendered.length <= 0) {
                postdate = "<a href=\"".concat(post.link, "\">").concat(post.date, "</a>");
              }
              var postElement = document.createElement('div');
              postElement.classList.add("post-".concat(post.id), 'simplecharm-text-center', 'simplecharm-content');
              postElement.innerHTML = "\n                <h1 class=\"post-title\">\n                    <a href=\"".concat(post.link, "\">").concat(post.title.rendered, "</a>\n                </h1>\n                <div class=\"post-meta\">\n                    <span class=\"post-date\">\n                    ").concat(postdate, "\n                    </span>\n                </div>\n                <div class=\"post-content\">\n                    ").concat(post.excerpt.rendered, "\n                </div> ");
              resultsContainer.appendChild(postElement);
            });
            if (totalPage > 1) {
              var _pagination = document.querySelector('.simplecharm-searchpage-pagination');
              _pagination.innerHTML = '';
              var _loop = function _loop() {
                var pageBtn = document.createElement('a');
                pageBtn.classList.add(i);
                pageBtn.classList.add(page == i ? 'active' : 'inactive');
                pageBtn.innerText = i;
                _pagination.appendChild(pageBtn);
                pageBtn.addEventListener("click", function (e) {
                  var page = !pageBtn.classList[0] ? 1 : pageBtn.classList[0];
                  requestPosts(e, search_term, categories, page);
                });
              };
              for (var i = 1; i <= totalPage; i++) {
                _loop();
              }
            } else {
              var _pagination2 = document.querySelector('.simplecharm-searchpage-pagination');
              _pagination2.innerHTML = '';
            }
          } else {
            resultsContainer.innerHTML = "<p class=\"simplecharm-text-center\">No search results found for \"".concat(search_term, "\"</p>");
          }
          $('#simplecharm-loading-overlay').hide();
        }).catch(function (error) {
          console.error('Error fetching posts:', error);
          document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
        });
      })
    }]);
  }();
  new LoadSearch();
})(jQuery);

/***/ }),

/***/ "./src/js/multiselect.js":
/*!*******************************!*\
  !*** ./src/js/multiselect.js ***!
  \*******************************/
/***/ (function() {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  var Multiselect = /*#__PURE__*/function () {
    function Multiselect() {
      _classCallCheck(this, Multiselect);
      this.init();
    }
    return _createClass(Multiselect, [{
      key: "init",
      value: function init() {
        this.load_multiselect();
        this.control_multiselect();
      }
    }, {
      key: "load_multiselect",
      value: function load_multiselect() {
        var list = $('.simplecharm-select-options li');
        list.each(function () {
          this.addEventListener('click', function (e) {
            var checked = this.querySelector('input');
            e.preventDefault();
            checked.checked = !checked.checked;
            checked.checked ? checked.classList.add("selected") : checked.classList.remove("selected");
            $("#".concat(this.className)).selected = checked.checked;
            var selectedStatus = $(".simplecharm-select-form p b");
            var selectedCount = $(".selected");
            if (selectedCount.length) {
              selectedStatus.innerText = "".concat(selectedCount.length, " Categories Selected");
            } else {
              selectedStatus.innerText = "Select Categories";
            }
          });
        });
      }
    }, {
      key: "control_multiselect",
      value: function control_multiselect() {
        var selectTitle = $(".simplecharm-select-form p");
        var selectOptions = $(".simplecharm-select-options");
        var selectDropdownIcon = $(".simplecharm-selectform-dropdown-icon");
        selectTitle.on("click", function (e) {
          selectOptions.toggleClass("multiselect-closed");
          selectDropdownIcon.toggleClass("multiselect-open");
          selectOptions.toggleClass("multiselect-hide");
        });
      }
    }]);
  }();
  new Multiselect();
})(jQuery);

/***/ }),

/***/ "./src/scss/search_page.scss":
/*!***********************************!*\
  !*** ./src/scss/search_page.scss ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!**************************!*\
  !*** ./src/js/search.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_search_page_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/search_page.scss */ "./src/scss/search_page.scss");
/* harmony import */ var _multiselect_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./multiselect.js */ "./src/js/multiselect.js");
/* harmony import */ var _multiselect_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_multiselect_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _load_search_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./load_search.js */ "./src/js/load_search.js");
/* harmony import */ var _load_search_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_load_search_js__WEBPACK_IMPORTED_MODULE_2__);



}();
/******/ })()
;
//# sourceMappingURL=search.js.map