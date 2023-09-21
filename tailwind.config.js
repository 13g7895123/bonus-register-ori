/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    "./Pages/*.{php, js}",
    "./index.php",
    "./login.php",
  ],
  theme: {
    letterSpacing: {
      '5': '0.3rem',
      '6': '0.2rem'
    },
    extend: {
      backgroundImage: {
        'contentBg': 'url("../assets/images/bg.png")',
        'contentBgBlue': 'url("../assets/images/bg_blue.png")'
      }
    },
  },
  varilants:{
    extend: {
      borderStyle: ["responsive", "hover"],
      backgroundColor: ['responsive',"group-hover"], //加入 group-hover
    },
  },
  plugins: [],
}
