/** @type {import('tailwindcss').Config} */
/** @typeof {import('tailwindcss').defaultTheme} defaultTheme */
const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    mode: 'jit',
    content: [
        './app/Livewire/**/*.php',
        './app/Models/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        fontFamily: {
            'sans': ['Helvetica', 'Arial', 'sans-serif'],
            'heading': ['Helvetica']
        },
        extend: {
            fontSize: {
                heading: '34px',
                subheading: '22px'
            },
            textOpacity: ['dark'],
            colors: {
                transparent: 'transparent',
                white: '#ffffff',
                black: '#000000',
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['checked'],
            borderColor: ['checked'],
        }
    },
    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
    ],
}
