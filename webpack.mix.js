let mix = require('laravel-mix');
require('laravel-mix-purgecss');
require('laravel-mix-copy-watched');
require('laravel-mix-polyfill');
require('laravel-mix-bundle-analyzer');
require('laravel-mix-svelte');
require('laravel-mix-postcss-config');
require('laravel-mix-brotli');

// get git info from command line
let commitHash = require('child_process').execSync('git rev-parse --short HEAD').toString();

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

if (mix.isWatching()) {
  //mix.bundleAnalyzer();
  mix.browserSync('http://sig-de.stacks.run/');
}

if (mix.inProduction()) {
  mix.bundleAnalyzer({ analyzerPort: 9999, generateStatsFile: true });
}

mix.setPublicPath('./Resources/Public/Assets');

mix
  .sass('Resources/Private/Assets/styles/app.scss', 'Styles')
  .options({
    autoprefixer: {
      options: {
        browsers: ['last 6 versions'],
      },
    },
    postCss: [
      require('postcss-aspect-ratio-polyfill'),
      require('postcss-logical'),
      require('cssnano')({
        preset: ['advanced', { discardComments: { removeAll: true } }],
      }),
    ],
  });

mix
  .js('Resources/Private/Assets/scripts/app.js', 'Scripts')
  .modernizr()
  .svelte()
  .polyfill({
    enabled: false,
    useBuiltIns: 'usage',
    targets: '> 0.25%, not dead',
  })
  .extract();

mix.brotli();

if (mix.inProduction()) {
  mix.webpackConfig((webpack) => {
    return {
      output: {
        publicPath: '/site/templates/resources/',
        chunkFilename: 'scripts/chunks/[name].[chunkhash].js',
      },
      optimization: {
        concatenateModules: false,
      }
    };
  });
}
mix
  .copyWatched('Resources/Private/Assets/images/**', './Resources/Public/Images')
  .copyWatched('Resources/Private/Assets/fonts/**', './Resources/Public/Fonts')
  .copyWatched('Resources/Private/Assets/svg/**', '.Resources/Public/SVG');

mix.autoload({
  jquery: ['$', 'window.jQuery'],
});

mix.babelConfig({
  plugins: ['@babel/plugin-syntax-dynamic-import'],
});

mix.options({
  processCssUrls: false,
});

mix.sourceMaps(false, 'source-map').version();

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.override(function (webpackConfig) {}) <-- Will be triggered once the webpack config object has been fully generated by Mix.
// mix.dump(); <-- Dump the generated webpack config object to the console.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   terser: {}, // Terser-specific options. https://github.com/webpack-contrib/terser-webpack-plugin#options
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });