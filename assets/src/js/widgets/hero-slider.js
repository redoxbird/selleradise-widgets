export class HeroSlider extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    new Swiper(".heroSlider--promotional", {
      duration: 600,
      preloadImages: false,
      loop: true,
      slidesPerView: 1.5,
      centeredSlides: true,
      spaceBetween: 50,
      lazy: {
        loadPrevNext: false,
      },
      pagination: {
        el: ".heroSlider--promotional .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".sliderNavButtons .next",
        prevEl: ".sliderNavButtons .previous",
      },
    });
  }
}
