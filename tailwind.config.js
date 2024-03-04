/** @type {import('tailwindcss').Config} */

export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wire-elements/modal/src/ModalComponent.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            height: {
                post_image_xl: "calc((((100vw * 2)/3) * 9)/32)",
                post_image_lg: "calc((((100vw * 4)/5) * 9)/32)",
                post_image: "calc((100vw * 9)/32)",
                admin_master: "94vh",
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

