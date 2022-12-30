/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        'body': '#17171F',
        'primary-text': '#015450',
        'theme': '#FAC748',
        'secondary': '#9191A4',
        'badge': '#3F3F51',
        'input-border': '#015450',
        'input': '#2A2A35'
      },
      fontFamily: {
        'poppins': ["'poppins'", 'sans-serif']
      },
      backgroundImage: {
        'sea': 'src("./build/images/bg1.jpg")'
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
