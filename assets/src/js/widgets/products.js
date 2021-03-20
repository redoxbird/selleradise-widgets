export class Product extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const productWidgetDefault = new Swiper(
      ".sectionProducts:not(.cardType--list) .products",
      {
        duration: 600,
        lazy: {
          loadPrevNext: false,
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
        slidesPerView: 4,
        watchSlidesVisibility: true,
        spaceBetween: 55,
        pagination: {
          el:
            ".sectionProducts:not(.cardType--list) .products > .swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".productPage--default .navigation .next",
          prevEl: ".productPage--default .navigation .previous",
        },
      }
    );

    console.log(productWidgetDefault);

    new Swiper(".sectionProducts.cardType--list .products", {
      duration: 600,
      lazy: {
        loadPrevNext: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      slidesPerView: 1.3,
      autoHeight: true,
      watchSlidesVisibility: true,
      spaceBetween: 50,
      pagination: {
        el: ".sectionProducts.cardType--list .products > .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".productPage--default .navigation .next",
        prevEl: ".productPage--default .navigation .previous",
      },
    });

    new Swiper(".sectionProducts .productCard--slider", {
      duration: 600,
      preloadImages: false,
      lazy: {
        loadPrevNext: false,
      },
      pagination: {
        el: ".sectionProducts .productCard--slider .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".sliderNavButtons .next",
        prevEl: ".sliderNavButtons .previous",
      },
    });
  }
}

// setTimeout(() => {
//   if (window.elementorFrontend) {
//     console.log(elementorFrontend);
//     elementorFrontend.hooks.addAction(
//       "frontend/element_ready/selleradise-products.default",
//       function ($scope) {

//       }
//     );
//   }
// }, 1000);
