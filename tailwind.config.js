import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist: [
        'bg-slate-600',
        'bg-red-600',
        'bg-green-600',
        'bg-blue-600',
        'bg-amber-600',
        'hover:bg-slate-300',
        'hover:bg-red-300',
        'hover:bg-green-300',
        'hover:bg-blue-300',
        'hover:bg-amber-300',
        'text-slate-400',
        'text-red-400',
        'text-green-400',
        'text-blue-400',
        'text-amber-400',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
