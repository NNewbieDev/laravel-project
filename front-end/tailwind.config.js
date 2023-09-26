/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: ["./src/**/*.{js,jsx,ts,tsx}"],
  theme: {
    extend: {
      colors: {
        dark: "#191a1f",
        "green-btn": "#0cbc87",
        "gray-form": "#e8effd",
      },
    },
    fontFamily: {
      display: ["Playfair Display", "serif"],
    },
  },
  plugins: [],
};
