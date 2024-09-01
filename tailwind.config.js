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
      backgroundImage: {
        'image': "url('./public/img/ELL75_yousyohondana20120620_TP_V.webp')", 
      },
      textShadow: {
        DEFAULT: '2px 2px 4px rgba(0, 0, 0, 0.3)',
        // 追加のカスタム値も設定できます
        sm: '1px 1px 2px rgba(0, 0, 0, 0.3)',
        lg: '3px 3px 6px rgba(0, 0, 0, 0.3)',
      },
    },
  },
  plugins: [
    function({ addUtilities, theme, e }) {
      const textShadow = theme('textShadow');
      const textShadowUtilities = Object.keys(textShadow).reduce((acc, key) => {
        acc[`.${e(`text-shadow-${key}`)}`] = { textShadow: textShadow[key] };
        return acc;
      }, {});
      addUtilities(textShadowUtilities, ['responsive', 'hover']);
    },
  ],
}