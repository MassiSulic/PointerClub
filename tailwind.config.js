import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js"
      ],    

    theme: {
        extend: {
            colors: {
                AzulPrimario: '#032D39',
                MarronSecundario: '#7C6A52',
                BlancoTerciario: '#F5F4EA'
            },

            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
