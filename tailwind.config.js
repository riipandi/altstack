const defaultTheme = require('tailwindcss/defaultTheme')
const defaultColor = require('tailwindcss/colors')

module.exports = {
  purge: ['./resources/**/*.{blade.php,js,jsx,ts,tsx,vue}'],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans]
      },
      colors: {
        gray: defaultColor.coolGray,
        primary: defaultColor.indigo,
        secondary: defaultColor.blue,
        accent: defaultColor.rose
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.gray.800'),
            a: {
              color: theme('colors.primary.700'),
              '&:hover': {
                color: theme('colors.primary.500')
              }
            }
          }
        }
      })
    }
  },
  variants: {
    extend: {
      fontWeight: ['hover', 'focus']
    }
  },
  plugins: [
    // Additional first-party plugins
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/typography')
  ]
}
