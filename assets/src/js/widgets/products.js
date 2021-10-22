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

    const settings = this.getElementSettings();

    const slider = new Swiper(".selleradiseWidgets_Products__slider", {
      duration: 600,
      lazy: {
        loadPrevNext: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      slidesPerView: settings.card_type === "robust" ? 1 : 1.2,
      spaceBetween: 25,
      watchSlidesVisibility: true,
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
          slidesPerView: settings.card_type === "robust" ? 1.5 : 2.4,
          spaceBetween: 25,
        },
        1025: {
          slidesPerView: settings.card_type === "robust" ? 2.635 : 4,
          spaceBetween: 55,
        },
      },
    });
  }
}
