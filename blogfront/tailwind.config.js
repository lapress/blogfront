// See default config https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
module.exports = {
  theme: {
    fontFamily: {
      sans: [
        'Nunito Sans',
        'system-ui',
        'BlinkMacSystemFont',
        '-apple-system',
        'Segoe UI',
        'Roboto',
        'Oxygen',
        'Ubuntu',
        'Cantarell',
        'Fira Sans',
        'Droid Sans',
        'Helvetica Neue',
        'sans-serif'
      ],
      roboto: [
        'Roboto',
        'system-ui',
        'BlinkMacSystemFont',
        '-apple-system',
        'Segoe UI',
        'Roboto',
        'Oxygen',
        'Ubuntu',
        'Cantarell',
        'Fira Sans',
        'Droid Sans',
        'Helvetica Neue',
        'sans-serif'
      ]
    },
    colors: {
      transparent: 'transparent',

      primary: '#fa4d2a',
      secondary: '#1eaffc',
      tertiary: '#3e50b4',
      black: '#101111',
      white: '#ffffff',
      grey: {
        default: '#999999',
        dark: '#404141',
        darker: '#2a2a2a',
        light: '#E5E5E5',
        lighter: '#F4F4F4',
        lightest: '#f2f2f2'
      }
    },
    sizes: {
      base: '4.375rem',
      medium: '3.125rem',

      square: '2.5rem',
      container: {
        default: '1420px',
        large: '1366px'
      },
      negatives: {
        medium: '-3.125rem'
      }
    },

    extend: {
      screens: {
        mobile: { max: '640px' },
        hd: '1450px'
      },
      shadow: {
        lg: '0 0 15px 0 rgba(0,0,0,0.2)'
      },
      spacing: {
        medium: '3.125rem'
      }
    }
  },
  variants: {}
}
