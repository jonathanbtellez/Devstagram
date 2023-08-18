/** @type {import('tailwindcss').Config} */
export default {
  content: [
    // Search in views file to aply tailwindcss
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    // Apply styles of tailwind to our pagination 
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

