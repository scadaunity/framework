/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: ["./app/Views/**/*.{php,html,js}"],
  theme: {
    extend: {

    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
  darkMode: 'class',
}
