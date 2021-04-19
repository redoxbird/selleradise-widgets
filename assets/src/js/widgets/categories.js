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

      if (items.length <= 0) {
        loadMoreBtn.setAttribute("disabled", "disabled");
        return;
      }

      function loadItems() {
        let realIndex = -1;

        if (items.length - 1 <= offset) {
          loadMoreBtn.setAttribute("disabled", "disabled");
        }

        for (let index = offset; index < offset + pageSize; index++) {
          const item = items[index];
          realIndex++;

          if (item) {
            item.classList.remove(
              "selleradiseWidgets_Categories__item--hidden"
            );

            anime({
              duration: 400,
              targets: item,
              opacity: [0, 1],
              translateY: [100, 0],
              delay: realIndex * 50,
              easing: "easeOutExpo",
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
