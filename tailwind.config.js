/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'image': "url('./public/img/ELL75_yousyohondana20120620_TP_V.webp')", 
      }
    },
  },
  plugins: [],
}