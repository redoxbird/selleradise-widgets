export class HeroSlider extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    new Swiper(".heroSlider--promotional", {
      preloadImages: false,
      loop: true,
      slidesPerView: 1.5,
      centeredSlides: true,
      spaceBetween: 50,
      parallax: true,
      autoplay: {
        delay: 10000,
      },
      lazy: {
        loadPrevNext: false,
      },
      pagination: {
        el: ".heroSlider--promotional .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".heroSlider--promotional .sliderNavButtons .next",
        prevEl: ".heroSlider--promotional .sliderNavButtons .previous",
      },
    });
  }
}
