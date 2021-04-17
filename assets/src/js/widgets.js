import { Product } from "./widgets/products";
import { HeroCarousel } from "./widgets/hero-carousel";
import { Testimonials } from "./widgets/testimonials";
import { Tabs } from "./widgets/tabs";
import { Accordion } from "./widgets/accordion";
import { Categories } from "./widgets/categories";

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

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-testimonials.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Testimonials, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-tabs.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Tabs, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-accordion.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Accordion, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-product-categories.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Categories, {
        $element,
      });
    }
  );
});
