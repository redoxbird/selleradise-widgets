/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./assets/src/js/widgets/categories.js ***!
  \*********************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Categories": () => (/* binding */ Categories)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var Categories = /*#__PURE__*/function (_elementorModules$fro) {
  _inherits(Categories, _elementorModules$fro);

  var _super = _createSuper(Categories);

  function Categories() {
    _classCallCheck(this, Categories);

    return _super.apply(this, arguments);
  }

  _createClass(Categories, [{
    key: "onInit",
    value: function onInit() {
      _get(_getPrototypeOf(Categories.prototype), "onInit", this).call(this);

      this.init();
    }
  }, {
    key: "init",
    value: function init() {
      if (this.isEdit) {
        Selleradise.lazyLoad();
      }

      var section = this.$element[0].querySelector(".selleradiseWidgets_Categories");

      if (!section) {
        return;
      }

      var loadMore = section.querySelector(".selleradiseWidgets_Categories__loadMore");
      var loadMoreBtn = loadMore.querySelector("button");
      var topShop = section.querySelector(".selleradiseWidgets_Categories__toShop");
      var items = section.querySelectorAll(".selleradiseWidgets_Categories__item[data-selleradise-status='hidden']");

      if (items.length < 1) {
        loadMore.classList.add("hidden");
        topShop.classList.remove("hidden");
        return;
      }

      var settings = this.getElementSettings();
      var pageSize = parseInt(settings.page_size);

      function pagination() {
        var offset = 0;

        function loadItems() {
          var realIndex = -1;

          if (items.length < offset + pageSize) {
            loadMore.classList.add("hidden");
            topShop.classList.remove("hidden");
          }

          var _loop = function _loop(index) {
            var item = items[index];
            realIndex++;

            if (item) {
              anime({
                duration: 800,
                targets: item,
                opacity: [0, 1],
                translateY: [100, 0],
                delay: realIndex * 50,
                easing: "easeOutExpo",
                begin: function begin() {
                  item.setAttribute("data-selleradise-status", "visible");
                }
              });
            }
          };

          for (var index = offset; index < offset + pageSize; index++) {
            _loop(index);
          }

          offset = offset + pageSize;
        }

        loadMoreBtn.addEventListener("click", function () {
          loadItems();
        });
      }

      pagination();
    }
  }]);

  return Categories;
}(elementorModules.frontend.handlers.Base);
jQuery(window).on("elementor/frontend/init", function () {
  elementorFrontend.hooks.addAction("frontend/element_ready/selleradise-product-categories.default", function ($element) {
    elementorFrontend.elementsHandler.addHandler(Categories, {
      $element: $element
    });
  });
});
/******/ })()
;