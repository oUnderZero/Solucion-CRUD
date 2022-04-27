const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
       
    ],

    theme: {
        extend: {
            fontFamily: {
                display: ['IBM Plex Mono', 'Menlo', 'monospace'],
                body: ['IBM Plex Mono', 'Menlo', 'monospace'],
              },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
