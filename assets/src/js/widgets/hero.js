import { lazyLoad } from "../helpers";

export class Hero extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      lazyLoad(this.$element[0]);
    }
  }
}
