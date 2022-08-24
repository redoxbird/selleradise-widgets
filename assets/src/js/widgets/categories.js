export class Categories extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const initEvent = new CustomEvent("selleradise-widget-initialized", {
      detail: {
        name: "categories",
        settings: this.getElementSettings(),
        isEdit: this.isEdit,
        element: this.$element[0],
      },
    });

    window.dispatchEvent(initEvent);
  }
}
