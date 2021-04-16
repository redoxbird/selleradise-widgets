export class Tabs extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    let selected = 0;
    const triggerClass = "selleradise_Tabs--default__trigger";
    const tabClass = "selleradise_Tabs--default__tab";

    const section = document.querySelector(".selleradise_Tabs--default");
    const triggers = section.querySelectorAll(`.${triggerClass}`);
    const tabs = section.querySelectorAll(`.${tabClass}`);
    const highlighter = section.querySelector(
      ".selleradise_Tabs--default__highlighter"
    );

    if (!section || triggers.length < 1 || tabs.length < 1) {
      return;
    }

    function setSelected(oldVal, newVal) {
      triggers[newVal].classList.remove(`${triggerClass}--selected`);
      triggers[oldVal].classList.add(`${triggerClass}--selected`);

      tabs[oldVal].classList.remove(`${tabClass}--selected`);
      tabs[newVal].classList.add(`${tabClass}--selected`);

      anime({
        duration: 400,
        targets: highlighter,
        translateX: triggers[newVal].offsetLeft,
        width: triggers[newVal].offsetWidth,
        easing: "easeOutExpo",
      });

      anime({
        duration: 400,
        targets: tabs[newVal],
        translateX: [newVal < oldVal ? "-5rem" : "5rem", 0],
        easing: "easeOutExpo",
      });
    }

    for (const index in triggers) {
      if (triggers.hasOwnProperty.call(triggers, index)) {
        const trigger = triggers[index];

        trigger.addEventListener("click", function () {
          setSelected(selected, index);
          selected = index;
        });
      }
    }

    setSelected(0, 0);
  }
}
