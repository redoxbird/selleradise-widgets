export class HeroCarousel extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    new Swiper(".heroCarousel--default", {
      preloadImages: false,
      loop: true,
      slidesPerView: 1,
      centeredSlides: true,
      spaceBetween: 50,
      parallax: true,
      autoplay: this.isEdit
        ? false
        : {
            delay: 10000,
          },
      lazy: {
        loadPrevNext: false,
      },
      pagination: {
        el: ".heroCarousel--default .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".heroCarousel--default .sliderNavButtons .next",
        prevEl: ".heroCarousel--default .sliderNavButtons .previous",
      },
      breakpoints: {
        768: {
          slidesPerView: 1.5,
        },
      },
    });
  }
}
