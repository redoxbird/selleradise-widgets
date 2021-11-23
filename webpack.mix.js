let mix = require("laravel-mix");

mix.browserSync({
  proxy: "http://selleradise.local",
  files: ["**/*.php", "assets/dist/css/**/*.css", "assets/dist/js/**/*.js"],
});

mix.setPublicPath("./assets/dist");

mix.webpackConfig({
  resolve: {
    alias: {
      react: "preact/compat",
      "react-dom/test-utils": "preact/test-utils",
      "react-dom": "preact/compat", // Must be below test-utils
      "react/jsx-runtime": "preact/jsx-runtime",
    },
  },
});

mix.babelConfig({
  plugins: ["@babel/plugin-proposal-class-properties"],
});

mix
  .js("assets/src/js/widgets.js", "assets/dist/js")
  .js("assets/src/js/widgets/categories.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/products.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/sale-timer.js", "assets/dist/js/widgets")
  .react()
  .js("assets/src/js/widgets/posts.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/faq.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/testimonials.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/promo-cards.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/hero.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/cta.js", "assets/dist/js/widgets")
  .js("assets/src/js/widgets/tabs.js", "assets/dist/js/widgets");
