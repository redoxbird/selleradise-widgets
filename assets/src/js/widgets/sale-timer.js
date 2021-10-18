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

    if (
      countdownElement.dataset.startDate &&
      countdownElement.dataset.endDate
    ) {
      render(
        <SaleTimer
          dataSet={countdownElement.dataset}
          startDate={countdownElement.dataset.startDate}
          endDate={countdownElement.dataset.endDate}
        />,
        countdownElement
      );
    }
  }
}
