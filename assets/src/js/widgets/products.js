export class Products extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      Selleradise.lazyLoad();
    }

    const settings = this.getElementSettings();

    const options = {
      mobile: {
        slidesPerView: () => {
          switch (settings.card_type) {
            case "list":
              return 1;
            case "compact":
              return 2.1;
            default:
              return 1.2;
          }
        },
      },
      tablet: {
        slidesPerView: () => {
          switch (settings.card_type) {
            case "list":
              return 1.5;
            case "compact":
              return 3.1;
            default:
              return 2.4;
          }
        },
      },
      desktop: {
        slidesPerView: () => {
          switch (settings.card_type) {
            case "list":
              return 2.635;
            case "compact":
              return 6.25;
            default:
              return 4;
          }
        },
      },
    };

    const slider = new Swiper(
      this.$element[0].querySelector(".selleradiseWidgets_Products__slider"),
      {
        duration: 600,
        autoHeight: true,
        lazy: {
          loadPrevNext: false,
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
        slidesPerView: options.mobile.slidesPerView(),
        spaceBetween: 25,
        watchSlidesVisibility: true,
        navigation: {
          nextEl: this.$element[0].querySelector(
            ".selleradiseWidgets_Products__slider-button--right"
          ),
          prevEl: this.$element[0].querySelector(
            ".selleradiseWidgets_Products__slider-button--left"
          ),
        },
        resizeObserver: this.isEdit,
        breakpoints: {
          767: {
            slidesPerView: options.tablet.slidesPerView(),
            spaceBetween: 25,
          },
          1025: {
            slidesPerView: options.desktop.slidesPerView(),
            spaceBetween: 55,
          },
        },
      }
    );
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-products.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Products, {
        $element,
      });
    }
  );
});
