const mix = require('laravel-mix');

//-------------------------------------------------------------------------------------------------
// Mix configuration...
//-------------------------------------------------------------------------------------------------
if (mix.inProduction()) {
  mix.disableNotifications().version();
  mix.options({
    postCss: [require('autoprefixer')],
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
      '@': path.resolve('resources/js')
      // '~': path.resolve('resources/css'),
    }
  }
});

//-------------------------------------------------------------------------------------------------
// Main resources...
//-------------------------------------------------------------------------------------------------
mix
  .js('resources/js/app.js', 'public/assets')
  .postCss('resources/css/style.css', 'public/assets', [require('tailwindcss')])
  .sourceMaps();

mix.copyDirectory('resources/img', 'public/images');
