export class Hero extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const initEvent = new CustomEvent("selleradise-widget-initialized", {
      detail: {
        name: "hero",
        settings: this.getElementSettings(),
        isEdit: this.isEdit,
        element: this.$element[0],
      },
    });

    window.dispatchEvent(initEvent);
  }
}
