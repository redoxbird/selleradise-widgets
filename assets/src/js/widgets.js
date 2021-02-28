import { Product } from "./widgets/products";
import { HeroSlider } from "./widgets/hero-slider";

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-products.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Product, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-hero-slider.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(HeroSlider, {
        $element,
      });
    }
  );
});
