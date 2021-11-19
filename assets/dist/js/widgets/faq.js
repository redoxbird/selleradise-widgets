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
/*!**************************************!*\
  !*** ./assets/src/js/widgets/faq.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "FAQ": () => (/* binding */ FAQ)
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

var FAQ = /*#__PURE__*/function (_elementorModules$fro) {
  _inherits(FAQ, _elementorModules$fro);

  var _super = _createSuper(FAQ);

  function FAQ() {
    _classCallCheck(this, FAQ);

    return _super.apply(this, arguments);
  }

  _createClass(FAQ, [{
    key: "onInit",
    value: function onInit() {
      _get(_getPrototypeOf(FAQ.prototype), "onInit", this).call(this);

      this.init();
    }
  }, {
    key: "init",
    value: function init() {
      var selectedTab = "all";
      var prefix = "selleradise_faq";
      var itemClass = "".concat(prefix, "__item");
      var section = document.querySelector(".".concat(prefix));

      if (!section) {
        return;
      }

      var items = section.querySelectorAll(".".concat(itemClass));
      var categories = section.querySelectorAll(".".concat(prefix, "__categories li"));

      if (items.length < 1 || categories.length < 1) {
        return;
      }

      function setSelectedTab(category, item) {
        selectedTab = category;
        var current = section.querySelector(".selleradise_faq__category--selected");

        if (current) {
          current.classList.remove("selleradise_faq__category--selected");
        }

        item.classList.add("selleradise_faq__category--selected");

        for (var index in items) {
          if (Object.hasOwnProperty.call(items, index)) {
            var _item = items[index];

            var itemCategory = _item.getAttribute("data-selleradise-category");

            if (category === "all") {
              _item.classList.remove("".concat(itemClass, "--hidden"));

              continue;
            }

            if (!itemCategory.split(",").includes(category)) {
              _item.classList.add("".concat(itemClass, "--hidden"));
            } else {
              _item.classList.remove("".concat(itemClass, "--hidden"));
            }
          }
        }
      }

      if (categories.length > 0) {
        for (var index in categories) {
          if (categories.hasOwnProperty.call(categories, index)) {
            (function () {
              var item = categories[index];
              var category = item.getAttribute("data-selleradise-slug");
              var button = item.querySelector("button");
              button.addEventListener("click", function () {
                setSelectedTab(category, item);
              });
            })();
          }
        }

        setSelectedTab("all", categories[0]);
      }
    }
  }]);

  return FAQ;
}(elementorModules.frontend.handlers.Base);
jQuery(window).on("elementor/frontend/init", function () {
  elementorFrontend.hooks.addAction("frontend/element_ready/selleradise-faq.default", function ($element) {
    elementorFrontend.elementsHandler.addHandler(FAQ, {
      $element: $element
    });
  });
});
/******/ })()
;