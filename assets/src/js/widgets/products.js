import { lazyLoad } from "../helpers";
export class Product extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      lazyLoad(this.$element[0]);
    }
    const slider = new Swiper(".selleradiseWidgets_Products__slider", {
      duration: 600,
      lazy: {
        loadPrevNext: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      slidesPerView: 1,
      watchSlidesVisibility: true,
      spaceBetween: 55,
      pagination: {
        el: ".selleradiseWidgets_Products__slider > .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".selleradiseWidgets_Products__slider-button--right",
        prevEl: ".selleradiseWidgets_Products__slider-button--left",
      },
      resizeObserver: this.isEdit,
      breakpoints: {
        767: {
          slidesPerView: 2,
        },
        1025: {
          slidesPerView: 4,
        },
      },
    });
  }
}
