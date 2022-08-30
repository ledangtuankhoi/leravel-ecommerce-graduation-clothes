const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .setPublicPath("public/themes/ashion")
  .js(
    [
      `${__dirname}/js/app.js`,
      `${__dirname}/js/tuankhoi.js`,
      `${__dirname}/js/jquery-3.3.1.min.js`,
      `${__dirname}/js/bootstrap.min.js`,
      `${__dirname}/js/jquery.magnific-popup.min.js`,
      `${__dirname}/js/jquery-ui.min.js`,
      `${__dirname}/js/jquery.countdown.min.js`,
      `${__dirname}/js/jquery.slicknav.js`,
      `${__dirname}/js/owl.carousel.min.js`,
      `${__dirname}/js/jquery.nicescroll.min.js`,
      `${__dirname}/js/main.js`,
    ],
    "js"
  )
  
  .sass(`${__dirname}/sass/app.scss`, "css")
  .styles(
    [
      `${__dirname}/css/app.css`,
      `${__dirname}/css/tuankhoi.css`,
      `${__dirname}/css/bootstrap.min.css`,
      `${__dirname}/css/font-awesome.min.css`,
      `${__dirname}/css/elegant-icons.css`,
      `${__dirname}/css/jquery-ui.min.css`,
      `${__dirname}/css/magnific-popup.css`,
      `${__dirname}/css/owl.carousel.min.css`,
      `${__dirname}/css/slicknav.min.css`,
      `${__dirname}/css/style.css`,
    ],
    "public/themes/ashion/css/all.css"
  );
mix.js(`${__dirname}/js/mixitup.min.js`,'public/themes/ashion/js/mixitup.min.js')