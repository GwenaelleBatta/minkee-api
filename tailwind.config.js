/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        fontFamily: {
            bodoni: ['Bodoni', 'serif'],
            raleway: ['Raleway', 'sans-serif']
        },
        colors:{
            orange: {
                default : '#D9946B',
                light : '#F2BC8D',
                dark: '#A65E45'
            },
            grey:{
                light:'#D1D1D1'
            }
        },
        backgroundImage:{
           gif: 'url("/public/bg/pexels-ksenia-chernaya-3965543.jpg")'
        }
    },
  },
  plugins: [],
}

