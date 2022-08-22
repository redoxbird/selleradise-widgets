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
/*!***********************************************!*\
  !*** ./assets/src/js/widgets/testimonials.js ***!
  \***********************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Testimonials": () => (/* binding */ Testimonials)
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

var Testimonials = /*#__PURE__*/function (_elementorModules$fro) {
  _inherits(Testimonials, _elementorModules$fro);

  var _super = _createSuper(Testimonials);

  function Testimonials() {
    _classCallCheck(this, Testimonials);

    return _super.apply(this, arguments);
  }

  _createClass(Testimonials, [{
    key: "onInit",
    value: function onInit() {
      _get(_getPrototypeOf(Testimonials.prototype), "onInit", this).call(this);

      this.init();
    }
  }, {
    key: "init",
    value: function init() {
      if (this.isEdit) {
        Selleradise.lazyLoad();
      }

      var thumbs = {
        "default": null,
        standard: null
      };
      return;
      thumbs["default"] = new Swiper(".selleradise_Testimonials--default__profiles", {
        spaceBetween: 10,
        slidesPerView: 2,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        lazy: {
          loadPrevNext: false
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            direction: "vertical"
          }
        }
      });
      new Swiper(".selleradise_Testimonials--default__quotes", {
        duration: 600,
        spaceBetween: 50,
        autoHeight: true,
        lazy: {
          loadPrevNext: false
        },
        keyboard: {
          enabled: false
        },
        navigation: {
          nextEl: ".selleradise_Testimonials--default .selleradise_widgets__slider-button--right",
          prevEl: ".selleradise_Testimonials--default .selleradise_widgets__slider-button--left"
        },
        breakpoints: {
          768: {
            direction: "vertical",
            spaceBetween: 0,
            autoHeight: false
          }
        },
        thumbs: {
          swiper: thumbs["default"]
        }
      });
      new Swiper(".selleradise_Testimonials--cards__quotes", {
        duration: 600,
        spaceBetween: 20,
        slidesPerView: 1.2,
        autoHeight: true,
        navigation: {
          nextEl: ".selleradise_Testimonials--cards .selleradise_widgets__slider-button--right",
          prevEl: ".selleradise_Testimonials--cards .selleradise_widgets__slider-button--left"
        },
        breakpoints: {
          768: {
            slidesPerView: 3.5,
            spaceBetween: 50
          }
        }
      });
      new Swiper(".selleradise_Testimonials--standard__quotes", {
        duration: 600,
        slidesPerView: 1,
        autoHeight: true,
        navigation: {
          nextEl: ".selleradise_Testimonials--standard .selleradise_widgets__slider-button--right",
          prevEl: ".selleradise_Testimonials--standard .selleradise_widgets__slider-button--left"
        },
        breakpoints: {
          768: {}
        }
      });
    }
  }]);

  return Testimonials;
}(elementorModules.frontend.handlers.Base);
jQuery(window).on("elementor/frontend/init", function () {
  elementorFrontend.hooks.addAction("frontend/element_ready/selleradise-testimonials.default", function ($element) {
    elementorFrontend.elementsHandler.addHandler(Testimonials, {
      $element: $element
    });
  });
});
/******/ })()
;