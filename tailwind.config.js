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
        'theme': '#5BA1AE',

        'primary': '#5BA1AE',
        'secondary': '#343E31',
        'tertiary': '#DED1C1',

        'hippie': '#5BA1AE',
        'neptune': '#88BBBC',
        'badge-success': '#5BA1AE',
        'badge-alert': '#5BA1AE',
        'input-border': '#1F2421',
        
        'text-neptune': '#88BBBC',
        'text-primary': '#5eead4',
        'text-secondary': '#343E31',
        'border-theme': '#5BA1AE',
        'section-color': '#DED1C1',
        'btn-color': '#397F77',
        'btn-color-hover': '#015450',
        'line-color': '#397F77'
      },
      fontFamily: {
        'poppins': ["'poppins'", 'sans-serif']
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
