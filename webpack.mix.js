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

mix.js("assets/src/js/widgets.js", "assets/dist/js").react();
