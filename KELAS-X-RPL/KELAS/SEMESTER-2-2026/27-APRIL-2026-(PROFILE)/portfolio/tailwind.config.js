/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.jsx",
  ],
  theme: {
    extend: {
      colors: {
        chrome: {
          dark: '#0a0a0a',
          gray: '#151515',
          light: '#252525',
          silver: '#e5e5e5',
          neon: '#4a9eff'
        }
      },
      fontFamily: {
        sans: ['Space Grotesk', 'sans-serif'],
      },
      backgroundImage: {
        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
      }
    },
  },
  plugins: [],
}
