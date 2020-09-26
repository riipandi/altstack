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
        primary: {
          50: '#F5F7FF',
          100: '#EBF0FF',
          200: '#CCD9FF',
          300: '#ADC2FF',
          400: '#7094FF',
          500: '#3366FF',
          600: '#2E5CE6',
          700: '#1F3D99',
          800: '#172E73',
          900: '#0F1F4D'
        },
        success: {
          50: '#F7FDF4',
          100: '#F0FBE9',
          200: '#D9F5C9',
          300: '#C3EFA9',
          400: '#95E468',
          500: '#68D827',
          600: '#5EC223',
          700: '#3E8217',
          800: '#2F6112',
          900: '#1F410C'
        },
        info: {
          50: '#F2FAFF',
          100: '#E6F6FF',
          200: '#C0E8FF',
          300: '#9ADAFF',
          400: '#4EBEFF',
          500: '#02A2FF',
          600: '#0292E6',
          700: '#016199',
          800: '#014973',
          900: '#01314D'
        },
        warning: {
          50: '#FFFCF6',
          100: '#FFF8ED',
          200: '#FFEED1',
          300: '#FFE4B5',
          400: '#FFCF7E',
          500: '#FFBB47',
          600: '#E6A840',
          700: '#99702B',
          800: '#735420',
          900: '#4D3815'
        },
        danger: {
          50: '#FFF6F5',
          100: '#FFEDEB',
          200: '#FFD2CE',
          300: '#FFB7B0',
          400: '#FF8175',
          500: '#FF4B3A',
          600: '#E64434',
          700: '#992D23',
          800: '#73221A',
          900: '#4D1711'
        }
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
