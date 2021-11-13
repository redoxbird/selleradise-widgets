export class Hero extends elementorModules.frontend.handlers.Base {
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
    "frontend/element_ready/selleradise-hero.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Hero, {
        $element,
      });
    }
  );
});
