/** @type {import('tailwindcss').Config} */
export default {
  content: ['./public/*.html'],
  theme: {
    extend: {
      colors: {
        'light-primary': '#4ECDC4',
        'primary': '#006C67',
        'dark-primary': '#003844',
        secondary: '#8075FF',
        light: '#F6FFFF'
      }
    },
  },
  plugins: [],
}

