import { device } from "../helpers";

export class Testimonials extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    let thumbs = new Swiper(".selleradise_Testimonials--default__profiles", {
      spaceBetween: 10,
      slidesPerView: 2,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      lazy: {
        loadPrevNext: false,
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
          direction: "vertical",
        },
      },
    });

    new Swiper(".selleradise_Testimonials--default__quotes", {
      duration: 600,
      spaceBetween: 50,
      autoHeight: true,
      lazy: {
        loadPrevNext: false,
      },
      keyboard: {
        enabled: false,
      },
      navigation: {
        nextEl:
          ".selleradise_Testimonials--default .selleradise_widgets__slider-button--right",
        prevEl:
          ".selleradise_Testimonials--default .selleradise_widgets__slider-button--left",
      },
      breakpoints: {
        768: {
          direction: "vertical",
          spaceBetween: 0,
          autoHeight: false,
        },
      },
      thumbs: {
        swiper: thumbs,
      },
    });

    new Swiper(".selleradise_Testimonials--cards__quotes", {
      duration: 600,
      spaceBetween: 20,
      slidesPerView: 1.2,
      navigation: {
        nextEl:
          ".selleradise_Testimonials--cards .selleradise_widgets__slider-button--right",
        prevEl:
          ".selleradise_Testimonials--cards .selleradise_widgets__slider-button--left",
      },
      breakpoints: {
        768: {
          slidesPerView: 3.5,
          spaceBetween: 50,
        },
      },
    });
  }
}
