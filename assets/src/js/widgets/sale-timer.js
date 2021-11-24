import { render } from "preact";
import SaleTimer from "../components/timer";

export class Timer extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      Selleradise.lazyLoad();
    }

    const countdownElement = this.$element[0].querySelector(
      ".selleradise_widgets_sale-countdown__timer"
    );

    const settings = this.getElementSettings();

    if (settings.start_date && settings.end_date && countdownElement) {
      render(<SaleTimer settings={settings} />, countdownElement);
    }
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-sale-countdown.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Timer, {
        $element,
      });
    }
  );
});
