const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
      "./resources/**/*.blade.php"
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: [...defaultTheme.fontFamily.sans]
        },
        colors: {
            tuna: '#30353F'
        }
    },
  },
  plugins: [
      require('@tailwindcss/forms')
  ],
}
