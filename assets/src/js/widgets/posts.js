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
      spaceBetween: 25,
      navigation: {
        nextEl: ".selleradise_widget--posts__slider-button--right",
        prevEl: ".selleradise_widget--posts__slider-button--left",
      },
      resizeObserver: this.isEdit,
      breakpoints: {
        767: {
          slidesPerView: 2,
        },
        1025: {
          slidesPerView: 3,
        },
      },
    });
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-posts.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Posts, {
        $element,
      });
    }
  );
});
