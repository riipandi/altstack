const mix = require('laravel-mix')
const path = require('path')

//------------------------------------------------------------------------------
// Mix configuration...
//------------------------------------------------------------------------------
mix.disableNotifications().webpackConfig({
  resolve: {
    alias: {
      '@js': path.resolve('resources/js')
    }
  }
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

mix
  .copyDirectory('resources/img', 'public/images')
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/fonts.css', 'public/css')
  .postCss('resources/css/style.css', 'public/css', [
    require('autoprefixer'),
    require('tailwindcss')
  ])
  .options({ autoprefixer: false })

// Images directory
mix.copyDirectory('resources/img', 'public/images')

if (mix.inProduction()) {
  mix.version()
}
