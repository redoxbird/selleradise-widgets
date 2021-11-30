export class FAQ extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    let selectedTab = "all";

    const prefix = "selleradise_faq";
    const itemClass = `${prefix}__item`;
    const section = document.querySelector(`.${prefix}`);

    if (!section) {
      return;
    }

    const items = section.querySelectorAll(`.${itemClass}`);
    const categories = section.querySelectorAll(`.${prefix}__categories li`);

    if (items.length < 1 || categories.length < 1) {
      return;
    }

    function setSelectedTab(category, item) {
      selectedTab = category;
      const button = item.querySelector("button");

      const current = section.querySelector("button[aria-selected='true']");

      if (current) {
        current.setAttribute("aria-selected", false);
      }

      button.setAttribute("aria-selected", true);

      for (const index in items) {
        if (Object.hasOwnProperty.call(items, index)) {
          const item = items[index];
          const itemCategory = item.getAttribute("data-selleradise-category");

          if (category === "all") {
            item.classList.remove(`${itemClass}--hidden`);
            continue;
          }

          if (!itemCategory.split(",").includes(category)) {
            item.classList.add(`${itemClass}--hidden`);
          } else {
            item.classList.remove(`${itemClass}--hidden`);
          }
        }
      }
    }

    if (categories.length > 0) {
      for (const index in categories) {
        if (categories.hasOwnProperty.call(categories, index)) {
          const item = categories[index];
          const category = item.getAttribute("data-selleradise-slug");
          const button = item.querySelector("button");

          button.addEventListener("click", function () {
            setSelectedTab(category, item);
          });
        }
      }

      setSelectedTab("all", categories[0]);
    }
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-faq.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(FAQ, {
        $element,
      });
    }
  );
});
