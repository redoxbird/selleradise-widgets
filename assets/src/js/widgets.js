import { Product } from "./widgets/products";
import { HeroCarousel } from "./widgets/hero-carousel";

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
    "frontend/element_ready/selleradise-hero-carousel.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(HeroCarousel, {
        $element,
      });
    }
  );
});
