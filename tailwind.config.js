/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.css",
  ],
  theme: {
    extend: {
      spacing: {
        '98': '26rem',
        '100-custom': '28rem',
      },
      dropShadow: {
        '3xl': '-2px 87px 100px 100px #777777;',
        '4xl': [
            '0 35px 35px rgba(0, 0, 0, 0.25)',
            '0 45px 65px rgba(0, 0, 0, 0.15)'
        ]
      },
      screens: {
        'mmd': '890px',
        '3xl': '1550px',
        'min-height-400': { 'raw': '(min-height: 400px)' },
        'min-height-1000': { 'raw': '(min-height: 1000px)' },
      },
      aspectRatio: {
        'long': '4 / 6', // 縦長のアスペクト比
      },
    },
  },
  plugins: []
}