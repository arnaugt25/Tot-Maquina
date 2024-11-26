/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./App/**/*.html",
    "./App/**/*.php",
  ],
  theme: {
    extend: {
        colors: {
            blue: {
                lightest: '#CDD1D8',
                lighter: '#5DA4C3',
                light: '#051425',
                primary: '#214969',
                dark: '#5F7F88',
                darker: '#476249',
                darkest: '#1D3F58',
                gray: '#133048',
                deep: '#8C8C94',
                deepest: '#4E585A'
            }
        }
    }
  },
  plugins: [],
}