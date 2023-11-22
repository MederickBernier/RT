/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/css/**/*.css',
        './app/Http/Livewire/**/*.{php,html}'
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
