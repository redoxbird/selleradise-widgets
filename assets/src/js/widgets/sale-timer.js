import { render } from "preact";
import SaleTimer from "../components/timer";

export class Timer extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const countdownElement = this.$element[0].querySelector(
      ".selleradise_widgets_sale-countdown__timer"
    );

    const settings = this.getElementSettings();

    if (settings.start_date && settings.end_date && countdownElement) {
      render(<SaleTimer settings={settings} />, countdownElement);
    }
  }
}
