import { lazyLoad } from "../helpers";
export class Posts extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const slider = new Swiper(".selleradise_widget--posts__slider", {
      duration: 600,
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      slidesPerView: 1,
      watchSlidesVisibility: true,
      spaceBetween: 50,
      navigation: {
        nextEl: ".selleradise_widget--posts__slider-button--right",
        prevEl: ".selleradise_widget--posts__slider-button--left",
      },
      resizeObserver: this.isEdit,
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  }
}
