export class PromoCards extends elementorModules.frontend.handlers.Base {
  onInit() {
    super.onInit();
    this.init();
  }

  init() {
    const settings = this.getElementSettings();

    if (this.isEdit && Selleradise) {
      if (settings.adaptive_colors === "yes") {
        Selleradise.adaptiveColors();
      } else {
        Selleradise.lazyLoad();
      }
    }
  }
}

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-promo-cards.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(PromoCards, {
        $element,
      });
    }
  );
});
