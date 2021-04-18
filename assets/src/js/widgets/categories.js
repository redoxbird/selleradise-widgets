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

    function pagination() {
      const items = section.querySelectorAll(
        ".selleradiseWidgets_Categories__item--notLoaded"
      );

      if (items.length <= 0) {
        loadMoreBtn.setAttribute("disabled", "disabled");
        return;
      }

      function loadItems() {
        const items = section.querySelectorAll(
          ".selleradiseWidgets_Categories__item--notLoaded"
        );

        if (items.length <= pageSize) {
          loadMoreBtn.setAttribute("disabled", "disabled");
        }

        for (let index = 0; index < pageSize; index++) {
          const item = items[index];

          if (item) {
            item.classList.remove(
              "selleradiseWidgets_Categories__item--notLoaded"
            );

            anime({
              duration: 400,
              targets: item,
              opacity: [0, 1],
              translateY: [100, 0],
              delay: index * 50,
              easing: "easeOutExpo",
            });
          }
        }
      }

      loadMoreBtn.addEventListener("click", function () {
        loadItems();
      });
    }

    pagination();
  }
}
