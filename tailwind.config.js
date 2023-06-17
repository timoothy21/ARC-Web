const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
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
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'serv-bg': '#082431',
                'serv-bg-explore': '#F8F8FD',
                'serv-text': '#A2ADB1',
                'serv-email-text': '#537180',
                'serv-border': '#16303D',
                'serv-button': '#22B07D',
                'serv-email': '#0B2D3D',
                'serv-login-bg': '#D5D5E1',
                'serv-login-text': '#5C5C69',
                'serv-services-bg': '#F4F4FA',
                'serv-hr': '#EFEFEF',
                'serv-testimonial-border': '#ECECF4',
                'serv-yellow': '#FFBF47',
                'serv-explore-button': '#F0F0FC',
                'serv-green-badge': '#DDFFF3',
                'serv-upload-bg': '#FAFAFA',
                'arc-bg': '#FF7878',
                'arc-btn-deactive': '#F4F4FA',
                'arc-soft': '#FAECE2'
              },
              spacing: {
                '13': '3.25rem',
                '15': '3.75rem',
                '128': '32rem',
                '144': '36rem',
              }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
