/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
  ],
  theme: {
    container: {
      center: true,
      padding: "2rem",
      screens: {
        "2xl": "1400px",
      },
    },
    extend: {
      colors: {
        blvd: {
          cream: "#f8f5f0",
          beige: "#e9e2d8",
          sand: "#d7cfc6",
          gold: "#9c8a69",
          taupe: "#7b6c5a",
          charcoal: "#333333",
        },
      },
      fontFamily: {
        sans: ["Montserrat", "sans-serif"],
        display: ["Cormorant Garamond", "serif"],
      },
      borderRadius: {
        sm: "0.125rem",
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
      },
      animation: {
        'fade-in': 'fadeIn 0.5s ease-in-out forwards',
      },
    },
  },
  plugins: [],
}
