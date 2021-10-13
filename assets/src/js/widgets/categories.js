import { lazyLoad } from "../helpers";
export class Categories extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      lazyLoad(this.$element[0]);
    }

    const section = this.$element[0].querySelector(
      ".selleradiseWidgets_Categories"
    );

    const loadMoreBtn = section.querySelector(
      ".selleradiseWidgets_Categories__loadMore button"
    );

    const pageSize = parseInt(
      section.getAttribute("data-selleradise-categories-page-size")
    );

    const items = section.querySelectorAll(
      ".selleradiseWidgets_Categories__item--hidden"
    );

    function pagination() {
      let offset = 0;

      if (items.length < 1) {
        loadMoreBtn.setAttribute("disabled", "disabled");
        return;
      }

      function loadItems() {
        let realIndex = -1;

        if (items.length <= offset + pageSize) {
          loadMoreBtn.setAttribute("disabled", "disabled");
        }

        for (let index = offset; index < offset + pageSize; index++) {
          const item = items[index];
          realIndex++;

          if (item) {
            anime({
              duration: 800,
              targets: item,
              opacity: [0, 1],
              translateY: [100, 0],
              delay: realIndex * 50,
              easing: "easeOutExpo",
              begin: function () {
                item.classList.remove(
                  "selleradiseWidgets_Categories__item--hidden"
                );
              },
            });
          }
        }

        offset = offset + pageSize;
      }

      loadMoreBtn.addEventListener("click", function () {
        loadItems();
      });
    }

    pagination();
  }
}
