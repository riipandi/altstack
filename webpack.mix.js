const mix = require('laravel-mix');

//-------------------------------------------------------------------------------------------------
// Mix configuration...
//-------------------------------------------------------------------------------------------------
if (mix.inProduction()) {
  mix.disableNotifications().version();
  mix.options({
    uglify: {
      uglifyOptions: {
        compress: { drop_console: true }
      }
    }
  });
}

mix.webpackConfig({
  resolve: {
    alias: {
      '@js': path.resolve('resources/js')
    }
  }
});

//-------------------------------------------------------------------------------------------------
// Main resources...
//-------------------------------------------------------------------------------------------------
mix
  .js('resources/js/app.js', 'public/assets')
  .postCss('resources/fonts/fontface.css', 'public/assets')
  .postCss('resources/css/style.css', 'public/assets', [require('postcss-import'), require('tailwindcss')]);

mix.copyDirectory('resources/img', 'public/images');
