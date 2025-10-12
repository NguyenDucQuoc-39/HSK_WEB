import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
    'border-green-500', 'border-yellow-500', 'border-orange-500', 'border-red-500', 'border-purple-500', 'border-gray-500',
    'text-green-500', 'text-yellow-500', 'text-orange-500', 'text-red-500', 'text-purple-500', 'text-gray-500',
    'hover:ring-green-500', 'hover:ring-yellow-500', 'hover:ring-orange-500', 'hover:ring-red-500', 'hover:ring-purple-500', 'hover:ring-gray-500',
    'group-hover:text-green-500', 'group-hover:text-yellow-500', 'group-hover:text-orange-500', 'group-hover:text-red-500', 'group-hover:text-purple-500', 'group-hover:text-gray-500',
    ],

    plugins: [forms],
};
