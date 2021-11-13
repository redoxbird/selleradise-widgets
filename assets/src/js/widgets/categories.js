export class Categories extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      Selleradise.lazyLoad();
    }

    const section = this.$element[0].querySelector(
      ".selleradiseWidgets_Categories"
    );

    if (!section) {
      return;
    }

    const loadMore = section.querySelector(
      ".selleradiseWidgets_Categories__loadMore"
    );

    const loadMoreBtn = loadMore.querySelector("button");

    const topShop = section.querySelector(
      ".selleradiseWidgets_Categories__toShop"
    );

    const items = section.querySelectorAll(
      ".selleradiseWidgets_Categories__item[data-selleradise-status='hidden']"
    );

    if (items.length < 1) {
      loadMore.classList.add("hidden");
      topShop.classList.remove("hidden");
      return;
    }

    const settings = this.getElementSettings();

    const pageSize = parseInt(settings.page_size);

    function pagination() {
      let offset = 0;

      function loadItems() {
        let realIndex = -1;

        if (items.length <= offset + pageSize) {
          loadMore.classList.add("hidden");
          topShop.classList.remove("hidden");
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
                item.setAttribute("data-selleradise-status", "visible");
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

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-product-categories.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Categories, {
        $element,
      });
    }
  );
});
