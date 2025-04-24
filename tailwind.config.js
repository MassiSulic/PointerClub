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
                BlancoTerciario: '#F4F4E9'
            },

            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
