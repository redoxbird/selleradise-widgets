let mix = require("laravel-mix");

mix.browserSync({
  proxy: "http://wordpress.three",
  files: ["**/*.php", "assets/dist/css/**/*.css", "assets/dist/js/**/*.js"],
});

mix.setPublicPath("./assets/dist");

mix.js("assets/src/js/widgets.js", "assets/dist/js");
