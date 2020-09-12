const defaultTheme = require('tailwindcss/defaultTheme');
const isProd = process.env.NODE_ENV === 'production';

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true
  },
  purge: isProd
    ? {
        content: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
        options: {
          whitelist: ['mode-dark']
        }
      }
    : false,
  theme: {
    extend: {
      fontFamily: {
        sans: ["'Robert Sans'", "'Inter'", ...defaultTheme.fontFamily.sans]
      },
      colors: {
        primary: '#6875F5',
        secondary: '#FF9900'
      }
    },
    darkSelector: '.mode-dark'
  },

  variants: {
    opacity: ['responsive', 'hover', 'focus', 'disabled'],
    backgroundColor: ['dark', 'dark-hover', 'dark-group-hover', 'dark-even', 'dark-odd'],
    borderColor: ['dark', 'dark-disabled', 'dark-focus', 'dark-focus-within'],
    textColor: ['dark', 'dark-hover', 'dark-active', 'dark-placeholder']
  },

  plugins: [
    require('tailwindcss-dark-mode')(),
    require('@tailwindcss/ui')({
      layout: 'sidebar'
    }),
    require('@tailwindcss/typography')
  ]
};
