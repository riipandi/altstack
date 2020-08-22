const defaultTheme = require('tailwindcss/defaultTheme');
const isProd = process.env.NODE_ENV === 'production';

module.exports = {
  purge: isProd
    ? {
        content: [
          './app/**/*.php',
          './resources/**/*.css',
          './resources/**/*.html',
          './resources/**/*.js',
          './resources/**/*.jsx',
          './resources/**/*.ts',
          './resources/**/*.tsx',
          './resources/**/*.php',
          './resources/**/*.vue'
        ],
        options: {
          defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || [],
          whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/]
        }
      }
    : false,
  theme: {
    fontFamily: {
      sans: ['Inter var', ...defaultTheme.fontFamily.sans]
    },
    extend: {}
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui')({
      layout: 'sidebar'
    })
  ]
};
