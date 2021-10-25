export class Accordion extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    let selectedBellow = 0;
    let selectedTab = null;
    let categories = [];

    const prefix = "selleradise_Accordion";
    const bellowClass = `${prefix}__bellow`;
    const section = document.querySelector(`.${prefix}`);
    const bellows = section.querySelectorAll(`.${bellowClass}`);
    const categoryItems = section.querySelectorAll(`.${prefix}__categories li`);

    if (!section || bellows.length < 1) {
      return;
    }

    function toggleBellow(bellow) {
      bellow.classList.toggle(`${bellowClass}--selected`);

      const description = bellow.querySelector(
        ".selleradise_Accordion__description"
      );

      const trigger = bellow.querySelector(".selleradise_Accordion__trigger");

      if (bellow.classList.contains(`${bellowClass}--selected`)) {
        trigger.setAttribute("aria-expanded", true);

        anime({
          duration:
            description.offsetHeight > 400 ? description.offsetHeight : 400,
          targets: description,
          height: [0, description.offsetHeight],
          easing: "easeOutExpo",
        });
      } else {
        trigger.setAttribute("aria-expanded", false);
      }
    }

    function setSelectedBellow(oldVal, newVal) {
      if (oldVal === newVal) {
        toggleBellow(bellows[oldVal]);
      } else {
        if (bellows[oldVal]) {
          bellows[oldVal].classList.remove(`${bellowClass}--selected`);

          bellows[oldVal]
            .querySelector(".selleradise_Accordion__trigger")
            .setAttribute("aria-expanded", false);
        }

        bellows[newVal].classList.add(`${bellowClass}--selected`);

        const description = bellows[newVal].querySelector(
          ".selleradise_Accordion__description"
        );

        bellows[newVal]
          .querySelector(".selleradise_Accordion__trigger")
          .setAttribute("aria-expanded", true);

        anime({
          duration:
            description.offsetHeight > 400 ? description.offsetHeight : 400,
          targets: description,
          height: [0, description.offsetHeight],
          easing: "easeOutExpo",
        });

        selectedBellow = newVal;
      }
    }

    function setSelectedTab(category, item) {
      selectedTab = category;

      const current = section.querySelector(
        ".selleradise_Accordion__category--selected"
      );

      if (current) {
        current.classList.remove("selleradise_Accordion__category--selected");
      }

      item.classList.add("selleradise_Accordion__category--selected");

      for (const index in bellows) {
        if (Object.hasOwnProperty.call(bellows, index)) {
          const bellow = bellows[index];
          const bellowCategory = bellow.getAttribute(
            "data-selleradise-category"
          );

          if (category === "all") {
            bellow.classList.remove(`${bellowClass}--hidden`);
            continue;
          }

          if (!bellowCategory.split(",").includes(category)) {
            bellow.classList.add(`${bellowClass}--hidden`);
          } else {
            bellow.classList.remove(`${bellowClass}--hidden`);
          }
        }
      }

      const categoryBellows = document.querySelectorAll(
        `.${bellowClass}[data-selleradise-category="${category}"]`
      );

      if (categoryBellows.length > 0) {
        const index = categoryBellows[0].getAttribute("data-selleradise-index");

        if (index && selectedBellow != index) {
          setSelectedBellow(selectedBellow, parseInt(index));
        }
      }
    }

    for (const index in bellows) {
      if (bellows.hasOwnProperty.call(bellows, index)) {
        const bellow = bellows[index];
        const trigger = bellow.querySelector("button");

        trigger.addEventListener("click", function () {
          setSelectedBellow(selectedBellow, parseInt(index));
        });
      }
    }

    setSelectedBellow(-1, 0);

    if (categoryItems.length > 0) {
      for (const index in categoryItems) {
        if (categoryItems.hasOwnProperty.call(categoryItems, index)) {
          const item = categoryItems[index];
          const category = item.getAttribute("data-selleradise-slug");
          const button = item.querySelector("button");

          if (category && !categories.includes(category)) {
            categories.push(category);
          }

          button.addEventListener("click", function () {
            setSelectedTab(category, item);
          });
        }
      }

      setSelectedTab(categories[0], categoryItems[0]);
    }
  }
}
