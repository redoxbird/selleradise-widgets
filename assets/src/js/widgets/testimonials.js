export class Testimonials extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const slider = new Swiper(".selleradise_Testimonials--default__quotes", {
      duration: 600,
      lazy: {
        loadPrevNext: false,
      },
      direction: "vertical",
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      autoHeight: true,
      pagination: {
        el: ".selleradise_Testimonials--default__quotes > .swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".productPage--default .navigation .next",
        prevEl: ".productPage--default .navigation .previous",
      },
      on: {
        init: function () {
          profileItems(this);
        },
      },
    });

    function profileItems(slider) {
      const profileItems = document.querySelectorAll(
        ".selleradise_Testimonials--default__profiles li"
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

      function toggleActiveClass() {
        for (const index in profileItems) {
          if (Object.hasOwnProperty.call(profileItems, index)) {
            const item = profileItems[index];
            const dataIndex = item.getAttribute("data-slide-index");

            if (parseInt(dataIndex) === slider.realIndex) {
              item.classList.add("active");
            } else {
              item.classList.remove("active");
            }
          }
        }
      }

      toggleActiveClass();

      slider.on("slideChange", function () {
        toggleActiveClass();
      });
    }
  }
}
