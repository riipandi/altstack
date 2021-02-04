const mix = require('laravel-mix')

//------------------------------------------------------------------------------
// Mix configuration...
//------------------------------------------------------------------------------

mix
  .js('resources/js/app.js', 'public/assets')
  .js('resources/js/themeSwitcher.js', 'public/assets')
  .postCss('resources/css/fontface.css', 'public/assets')
  .postCss('resources/css/style.css', 'public/assets', [require('tailwindcss')])

// Images directory
mix.copyDirectory('resources/img', 'public/images')

// Favicon for docs using VuePress
// mix.copy('public/favicon.ico', 'public/docs')
