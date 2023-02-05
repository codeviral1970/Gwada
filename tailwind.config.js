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
        'theme': '#0EA5E9',
        'secondary': '#9191A4',
        'badge': '#3F3F51',
        'input-border': '#015450',
        'theme-color': '#0EA5E9'
      },
      fontFamily: {
        'poppins': ["'poppins'", 'sans-serif']
      },
      backgroundImage: {
        'sea': 'url("/public/images/bg/bg-1.jpg")',
        'hero': "url('/public/images/bg/bg-2.jpg')",

      },
      padding: {
        'px-9' : '2.25rem',
        'px-10' : '2.5rem'
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
