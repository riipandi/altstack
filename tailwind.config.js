const defaultTheme = require('tailwindcss/defaultTheme')
const defaultColor = require('tailwindcss/colors')

module.exports = {
  purge: ['./resources/**/*.{blade.php,js,jsx,ts,tsx,vue}'],
  darkMode: 'media', // or 'media' or 'class'
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
      }
    }
  },
  variants: {
    extend: {}
  },
  plugins: [
    // Additional first-party plugins
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/typography')
  ]
}
