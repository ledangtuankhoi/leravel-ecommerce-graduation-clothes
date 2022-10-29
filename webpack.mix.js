const { dump } = require("laravel-mix");
let mix = require("laravel-mix");

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

let theme = process.env.npm_config_theme;
if (theme) {
    require(`${__dirname}/themes/${theme}/webpack.mix.js`);
} else {
    mix
        .js("resources/js/app.js", "public/js")
        .sass("resources/sass/app.scss", "public/css")
        .sass("resources/sass/responsive.scss", "public/css")
        .sourceMaps()
        .browserSync("laravel-ecommerce-example.test");
}