let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js').browserSync({
  		'proxy': 'bsocial.dev',
}).sass('resources/assets/sass/app.scss', 'public/css')
.options({ uglify: { uglifyOptions: { compress: { drop_console: true, } } } });


if (mix.inProduction()) {
	mix.minify(['public/js/app.js','public/css/app.css']);
    mix.version();
}