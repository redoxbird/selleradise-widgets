(()=>{"use strict";var e={};function t(e){return(t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function o(e,t,n){return(o="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(e,t,n){var r=function(e,t){for(;!Object.prototype.hasOwnProperty.call(e,t)&&null!==(e=c(e)););return e}(e,t);if(r){var o=Object.getOwnPropertyDescriptor(r,t);return o.get?o.get.call(n):o.value}})(e,t,n||e)}function i(e,t){return(i=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function a(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=c(e);if(t){var o=c(this).constructor;n=Reflect.construct(r,arguments,o)}else n=r.apply(this,arguments);return l(this,n)}}function l(e,n){return!n||"object"!==t(n)&&"function"!=typeof n?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):n}function c(e){return(c=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}e.d=(t,n)=>{for(var r in n)e.o(n,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:n[r]})},e.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t);var u=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&i(e,t)}(f,elementorModules.frontend.handlers.Base);var t,l,u,s=a(f);function f(){return n(this,f),s.apply(this,arguments)}return t=f,(l=[{key:"onInit",value:function(){o(c(f.prototype),"onInit",this).call(this),this.init()}},{key:"init",value:function(){this.isEdit&&Selleradise.lazyLoad();var e=this.$element[0].querySelector(".selleradiseWidgets_Categories");if(e){var t=e.querySelector(".selleradiseWidgets_Categories__loadMore"),n=t.querySelector("button"),r=e.querySelector(".selleradiseWidgets_Categories__toShop"),o=e.querySelectorAll(".selleradiseWidgets_Categories__item[data-selleradise-status='hidden']");if(o.length<1)return t.classList.add("hidden"),void r.classList.remove("hidden");var i,a=this.getElementSettings(),l=parseInt(a.page_size);i=0,n.addEventListener("click",(function(){!function(){var e=-1;o.length<i+l&&(t.classList.add("hidden"),r.classList.remove("hidden"));for(var n=function(t){var n=o[t];e++,n&&anime({duration:800,targets:n,opacity:[0,1],translateY:[100,0],delay:50*e,easing:"easeOutExpo",begin:function(){n.setAttribute("data-selleradise-status","visible")}})},a=i;a<i+l;a++)n(a);i+=l}()}))}}}])&&r(t.prototype,l),u&&r(t,u),f}();jQuery(window).on("elementor/frontend/init",(function(){elementorFrontend.hooks.addAction("frontend/element_ready/selleradise-product-categories.default",(function(e){elementorFrontend.elementsHandler.addHandler(u,{$element:e})}))}))})();