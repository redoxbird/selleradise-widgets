export class CTA extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    if (this.isEdit) {
      Selleradise.lazyLoad();
    }
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-cta.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(CTA, {
        $element,
      });
    }
  );
});
