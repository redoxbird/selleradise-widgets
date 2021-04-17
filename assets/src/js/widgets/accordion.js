export class Accordion extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    let selected = 0;
    const bellowClass = "selleradise_Accordion__bellow";

    const section = document.querySelector(".selleradise_Accordion");
    const bellows = section.querySelectorAll(`.${bellowClass}`);

    if (!section || bellows.length < 1) {
      return;
    }

    function setSelected(oldVal, newVal) {
      if (oldVal == newVal) {
        return;
      }

      bellows[newVal].classList.add(`${bellowClass}--selected`);

      const description = bellows[newVal].querySelector(
        ".selleradise_Accordion__description"
      );

      anime({
        duration: 400,
        targets: description,
        height: [0, description.offsetHeight],
        easing: "easeOutExpo",
      });

      if (bellows[oldVal]) {
        bellows[oldVal].classList.remove(`${bellowClass}--selected`);
      }
    }

    for (const index in bellows) {
      if (bellows.hasOwnProperty.call(bellows, index)) {
        const bellow = bellows[index];
        const trigger = bellow.querySelector("button");

        trigger.addEventListener("click", function () {
          setSelected(selected, index);
          selected = index;
        });
      }
    }

    setSelected(-1, 0);
  }
}
