import { device } from "../helpers";

export class Testimonials extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const slider = new Swiper(".selleradise_Testimonials--default__quotes", {
      duration: 600,
      autoHeight: true,
      spaceBetween: 50,
      lazy: {
        loadPrevNext: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      pagination: {
        el: ".selleradise_Testimonials--default__quotes > .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".productPage--default .navigation .next",
        prevEl: ".productPage--default .navigation .previous",
      },
      breakpoints: {
        768: {
          direction: "vertical",
          spaceBetween: 0,
        },
      },
      on: {
        init: function () {
          profileItems(this);
        },
      },
    });

    function profileItems(slider) {
      const profileList = document.querySelector(
        ".selleradise_Testimonials--default__profiles"
      );

      const profileItems = profileList.querySelectorAll(
        ".selleradise_Testimonials--default__profile"
      );

      const highlighter = profileList.querySelector(
        ".selleradise_Testimonials--default__highlighter"
      );

      if (profileItems.length < 1) {
        return;
      }

      for (const index in profileItems) {
        if (Object.hasOwnProperty.call(profileItems, index)) {
          const item = profileItems[index];
          const button = item.querySelector("button");

          button.addEventListener("click", function (e) {
            slider.slideTo(parseInt(item.getAttribute("data-slide-index")));
          });
        }
      }

      function toggleActiveElement() {
        const active = document.querySelector(
          `.selleradise_Testimonials--default__profile[data-slide-index="${slider.realIndex}"]`
        );

        if (!active) {
          return;
        }

        if (device("desktop")) {
          anime({
            duration: 400,
            targets: highlighter,
            translateY: active.offsetTop,
            translateX: active.offsetLeft,
            height: active.offsetHeight,
            width: active.offsetWidth,
            easing: "easeOutExpo",
          });
        }

        anime({
          duration: 400,
          targets: profileList,
          easing: "easeOutExpo",
          scrollTop: active.offsetTop,
          scrollLeft: active.offsetLeft,
        });
      }

      toggleActiveElement();

      slider.on("slideChange", function () {
        toggleActiveElement();
      });
    }
  }
}
