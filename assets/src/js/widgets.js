import { Tabs } from "./widgets/tabs";
import { Accordion } from "./widgets/accordion";
import { Products } from "./widgets/products";
import { Hero } from "./widgets/hero";
import { PromoCards } from "./widgets/promo-cards";
import { Timer } from "./widgets/sale-timer";
import { Categories } from "./widgets/categories";

jQuery(window).on("elementor/frontend/init", () => {
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-hero.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Hero, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-promo-cards.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(PromoCards, {
        $element,
      });
    }
  );

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-sale-countdown.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Timer, {
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

  elementorFrontend.hooks.addAction(
    "frontend/element_ready/selleradise-products.default",
    function ($element) {
      elementorFrontend.elementsHandler.addHandler(Products, {
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
