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
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 4,
        },
      },
    });

    new Swiper(
      ".selleradiseWidgets_Products.cardType--list .selleradiseWidgets_Products__products",
      {
        duration: 600,
        lazy: {
          loadPrevNext: false,
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
        slidesPerView: 1,
        autoHeight: true,
        watchSlidesVisibility: true,
        spaceBetween: 50,
        pagination: {
          el: ".selleradiseWidgets_Products.cardType--list .selleradiseWidgets_Products__products > .swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".productPage--default .navigation .next",
          prevEl: ".productPage--default .navigation .previous",
        },
        breakpoints: {
          768: {
            slidesPerView: 1.3,
          },
        },
      }
    );

    new Swiper(".selleradiseWidgets_Products .productCard--slider", {
      duration: 600,
      preloadImages: false,
      lazy: {
        loadPrevNext: false,
      },
      pagination: {
        el: ".selleradiseWidgets_Products .productCard--slider .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".sliderNavButtons .next",
        prevEl: ".sliderNavButtons .previous",
      },
    });
  }
}
