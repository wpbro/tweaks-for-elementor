const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath("./");

if(mix.inProduction()) {
	mix.options({
		terser: {
			terserOptions: {
				compress: {
					drop_console: true
				}
			}
		}
	});
}

mix.webpackConfig({
	resolve: {
		modules: [
			'node_modules'
		],
		enforceExtension: false
	},
	externals: {
		jquery: 'jQuery'
	}
});

mix.js('assets/scripts/script.js','dist/')
	.sass('assets/styles/style.scss', 'dist/')
	.options({processCssUrls: false})
	.copyDirectory('assets/images', 'dist/images');

mix.browserSync({
	proxy: 'http://bls.test',
	delay: 500,
	open: false,
	files: [
		'dist/*.js',
		'dist/*.css',
	]
});

mix.disableSuccessNotifications();
