/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/load_search.js":
/*!*******************************!*\
  !*** ./src/js/load_search.js ***!
  \*******************************/
/***/ (function() {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator.return && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, catch: function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t.return || t.return(); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
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
      this.allUsers = [];
      this.totalPage = 1;
    }
    return _createClass(LoadSearch, [{
      key: "init",
      value: function init() {
        this.load_posts();
      }
    }, {
      key: "load_categories",
      value: function load_categories() {
        var selectedOptions = document.getElementById('categories').selectedOptions;
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
        var _this = this;
        $('#simplecharm-advanced-search-form').on('submit', function (e) {
          e.preventDefault();
          var selectOptions = $(".simplecharm-select-options");
          var selectDropdownIcon = $(".simplecharm-selectform-dropdown-icon");
          var search_term = $('.search-field').val();
          var categories = _this.load_categories();
          if (!selectOptions.hasClass("multiselect-closed")) {
            selectOptions.addClass("multiselect-closed");
            selectDropdownIcon.removeClass("multiselect-open");
            selectOptions.addClass("multiselect-hide");
          }
          _this.requestPosts(e, search_term, categories, _this.page);
        });
      }
    }, {
      key: "requestPosts",
      value: function () {
        var _requestPosts = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(e, search_term, categories, page) {
          var _this2 = this;
          var apiUrl, pagination, endpoint, params, resultsContainer, response, posts, _iterator, _step, post, date, options, postdate, _userdata, postElement, _pagination, _loop, i, _pagination2;
          return _regeneratorRuntime().wrap(function _callee$(_context2) {
            while (1) switch (_context2.prev = _context2.next) {
              case 0:
                pagination = $('.simplecharm-searchpage-pagination');
                pagination.html('');
                endpoint = document.querySelector('link[rel="https://api.w.org/').href;
                apiUrl = endpoint + "wp/v2/posts";
                params = new URLSearchParams();
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
                _context2.prev = 9;
                resultsContainer = $('#simplecharm-search-page');
                resultsContainer.html('');
                if (!endpoint.endsWith("rest_route=/")) {
                  _context2.next = 18;
                  break;
                }
                _context2.next = 15;
                return fetch(apiUrl + '&' + params.toString());
              case 15:
                response = _context2.sent;
                _context2.next = 21;
                break;
              case 18:
                _context2.next = 20;
                return fetch(apiUrl + '?' + params.toString());
              case 20:
                response = _context2.sent;
              case 21:
                _context2.next = 23;
                return response.headers.get('X-Wp-Totalpages');
              case 23:
                this.totalPage = _context2.sent;
                _context2.next = 26;
                return response.json();
              case 26:
                posts = _context2.sent;
                if (!(posts.code === 'rest_post_invalid_page_number')) {
                  _context2.next = 31;
                  break;
                }
                /**
                 * This Conditional is For Loading Posts From Page 1 if There Is No Page as The Provided page Variable
                 */
                this.requestPosts(e, search_term, categories, 1);
                _context2.next = 77;
                break;
              case 31:
                if (!(posts.length > 0)) {
                  _context2.next = 75;
                  break;
                }
                _iterator = _createForOfIteratorHelper(posts);
                _context2.prev = 33;
                _iterator.s();
              case 35:
                if ((_step = _iterator.n()).done) {
                  _context2.next = 51;
                  break;
                }
                post = _step.value;
                date = new Date(post.date);
                options = {
                  year: 'numeric',
                  month: 'long',
                  day: 'numeric'
                };
                post.date = date.toLocaleDateString('en-US', options);
                postdate = post.date;
                if (post.title.rendered.length <= 0) {
                  postdate = "<a href=\"".concat(post.link, "\">").concat(post.date, "</a>");
                }
                _context2.next = 44;
                return this.get_user(post.author);
              case 44:
                _userdata = _context2.sent;
                postElement = document.createElement('div');
                postElement.classList.add("post-".concat(post.id), 'simplecharm-text-center', 'simplecharm-content');
                postElement.innerHTML = "\n                <h1 class=\"post-title\">\n                    <a href=\"".concat(post.link, "\">").concat(post.title.rendered, "</a>\n                </h1>\n                <div class=\"post-meta\">\n                    <span class=\"post-date\">\n                        ").concat(postdate, "\n                    </span>\n                    <span class=\"post-author\">\n                        <a href=\"").concat(_userdata.link, "\">").concat(_userdata.username, "</a>\n                    </span>\n                </div>\n                <div class=\"post-content\">\n                    ").concat(post.excerpt.rendered, "\n                </div> ");
                resultsContainer.append(postElement);
              case 49:
                _context2.next = 35;
                break;
              case 51:
                _context2.next = 56;
                break;
              case 53:
                _context2.prev = 53;
                _context2.t0 = _context2["catch"](33);
                _iterator.e(_context2.t0);
              case 56:
                _context2.prev = 56;
                _iterator.f();
                return _context2.finish(56);
              case 59:
                if (!(this.totalPage > 1)) {
                  _context2.next = 71;
                  break;
                }
                _pagination = $('.simplecharm-searchpage-pagination');
                _pagination.html('');
                _loop = /*#__PURE__*/_regeneratorRuntime().mark(function _loop() {
                  var pageBtn;
                  return _regeneratorRuntime().wrap(function _loop$(_context) {
                    while (1) switch (_context.prev = _context.next) {
                      case 0:
                        pageBtn = document.createElement('a');
                        pageBtn.classList.add(i);
                        pageBtn.classList.add(page == i ? 'active' : 'inactive');
                        pageBtn.innerText = i;
                        _pagination.append(pageBtn);
                        pageBtn.addEventListener("click", function (e) {
                          _this2.page = !pageBtn.classList[0] ? 1 : pageBtn.classList[0];
                          _this2.requestPosts(e, search_term, categories, _this2.page);
                        });
                      case 6:
                      case "end":
                        return _context.stop();
                    }
                  }, _loop);
                });
                i = 1;
              case 64:
                if (!(i <= this.totalPage)) {
                  _context2.next = 69;
                  break;
                }
                return _context2.delegateYield(_loop(), "t1", 66);
              case 66:
                i++;
                _context2.next = 64;
                break;
              case 69:
                _context2.next = 73;
                break;
              case 71:
                _pagination2 = $('.simplecharm-searchpage-pagination');
                _pagination2.html('');
              case 73:
                _context2.next = 76;
                break;
              case 75:
                resultsContainer[0].innerHTML = "<p class=\"simplecharm-text-center\">No search results found for \"".concat(search_term, "\"</p>");
              case 76:
                $('#simplecharm-loading-overlay').hide();
              case 77:
                _context2.next = 84;
                break;
              case 79:
                _context2.prev = 79;
                _context2.t2 = _context2["catch"](9);
                console.error('Error fetching posts:', _context2.t2);
                document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
                $('#simplecharm-loading-overlay').hide();
              case 84:
                ;
              case 85:
              case "end":
                return _context2.stop();
            }
          }, _callee, this, [[9, 79], [33, 53, 56, 59]]);
        }));
        function requestPosts(_x, _x2, _x3, _x4) {
          return _requestPosts.apply(this, arguments);
        }
        return requestPosts;
      }()
    }, {
      key: "get_user",
      value: function () {
        var _get_user = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee2(id) {
          var userDetails;
          return _regeneratorRuntime().wrap(function _callee2$(_context3) {
            while (1) switch (_context3.prev = _context3.next) {
              case 0:
                if (id in this.allUsers) {
                  _context3.next = 8;
                  break;
                }
                _context3.next = 3;
                return this.load_user(id);
              case 3:
                userDetails = _context3.sent;
                this.allUsers[id] = userDetails;
                return _context3.abrupt("return", userDetails);
              case 8:
                return _context3.abrupt("return", this.allUsers[id]);
              case 9:
              case "end":
                return _context3.stop();
            }
          }, _callee2, this);
        }));
        function get_user(_x5) {
          return _get_user.apply(this, arguments);
        }
        return get_user;
      }()
    }, {
      key: "load_user",
      value: function () {
        var _load_user = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee3(id) {
          var data, response, result;
          return _regeneratorRuntime().wrap(function _callee3$(_context4) {
            while (1) switch (_context4.prev = _context4.next) {
              case 0:
                data = new FormData();
                data.append('action', 'simplecharm_get_user_info');
                data.append('user_id', id);
                _context4.prev = 3;
                _context4.next = 6;
                return fetch(admin_data.ajax_url, {
                  method: 'POST',
                  body: data
                });
              case 6:
                response = _context4.sent;
                _context4.next = 9;
                return response.json();
              case 9:
                result = _context4.sent;
                if (result.error) {
                  _context4.next = 12;
                  break;
                }
                return _context4.abrupt("return", result);
              case 12:
                _context4.next = 17;
                break;
              case 14:
                _context4.prev = 14;
                _context4.t0 = _context4["catch"](3);
                throw _context4.t0;
              case 17:
                return _context4.abrupt("return", userdata);
              case 18:
              case "end":
                return _context4.stop();
            }
          }, _callee3, null, [[3, 14]]);
        }));
        function load_user(_x6) {
          return _load_user.apply(this, arguments);
        }
        return load_user;
      }()
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
          var _this = this;
          $(this).on('click', function (e) {
            e.preventDefault();
            var checked = $(_this).find('input')[0];
            checked.checked = !checked.checked;
            if (checked.checked) {
              $(checked).addClass("selected");
            } else {
              $(checked).removeClass("selected");
            }
            var option = $("#".concat(_this.className));
            option.prop('selected', checked.checked);
            $("#".concat(_this.className)).selected = checked.checked;
            var selectedStatus = $(".simplecharm-select-form p b");
            var selectedCount = $(".selected");
            if (selectedCount.length) {
              selectedStatus.text("".concat(selectedCount.length, " Category Selected"));
            } else {
              selectedStatus.text("Select Categories");
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
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
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