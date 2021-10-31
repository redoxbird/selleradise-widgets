import { HeroCarousel } from "./widgets/hero-carousel";
import { Tabs } from "./widgets/tabs";
import { Accordion } from "./widgets/accordion";

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-hero-carousel.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(HeroCarousel, {
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
});
