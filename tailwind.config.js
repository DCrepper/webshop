const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");
//import forms from '@tailwindcss/forms';
//import plugin from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            gridTemplateRows: {
                'grid-cols-1': 'repeat(1, minmax(0, 1fr))',
                'grid-cols-2': 'repeat(2, minmax(0, 1fr))',
                'grid-cols-3': 'repeat(3, minmax(0, 1fr))',
                'grid-cols-4': 'repeat(4, minmax(0, 1fr))',
                'grid-cols-5': 'repeat(5, minmax(0, 1fr))',
                'grid-cols-6': 'repeat(6, minmax(0, 1fr))',
                'grid-cols-7': 'repeat(7, minmax(0, 1fr))',
                'grid-cols-8': 'repeat(8, minmax(0, 1fr))',
                'grid-cols-9': 'repeat(9, minmax(0, 1fr))',
                'grid-cols-10': 'repeat(10, minmax(0, 1fr))',
                'grid-cols-11': 'repeat(11, minmax(0, 1fr))',
                'grid-cols-12': 'repeat(12, minmax(0, 1fr))',
            },
            gridTemplateColumns: {
                // Define your custom three-column layout
                'prdgallery': '3fr 1fr 2fr',
            },
        },
        borderWidth: {
            '0': '0px',
            '1': '1px',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
        },
        screens: {
            /* Mobile first*/
            /*
            xs: '380px',
            sm: '560px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
            */
            // DESKTOP FIRST
            '2xl': { 'max': '1680px' },
            // => @media (max-width: 1680px) { ... }
            'xl': { 'max': '1440px' },
            // => @media (max-width: 1440px) { ... }
            'lg': { 'max': '976px' },
            // => @media (max-width: 976px) { ... }
            'md': { 'max': '768px' },
            // => @media (max-width: 768px) { ... }
            'sm': { 'max': '560px' },
            // => @media (max-width: 560px) { ... }
            'xs': { 'max': '380px' },
            // => @media (max-width: 380px) { ... }
        },
        colors: {
            'sky': {
                50: '#f0f9ff',
                100: '#e0f2fe',
                200: '#bae6fd',
                300: '#7dd3fc',
                400: '#38bdf8',
                500: '#0ea5e9',
                600: '#0284c7',
                700: '#0369a1',
                800: '#075985',
                900: '#0c4a6e',
                950: '#082f49',
            },
            'emerald': {
                50: '#ecfdf5',
                100: '#d1fae5',
                200: '#a7f3d0',
                300: '#6ee7b7',
                400: '#34d399',
                500: '#10b981',
                600: '#059669',
                700: '#047857',
                800: '#065f46',
                900: '#064e3b',
                950: '#022c22',
            },
            'teal': {
                50: '#f0fdfa',
                100: '#ccfbf1',
                200: '#99f6e4',
                300: '#5eead4',
                400: '#2dd4bf',
                500: '#14b8a6',
                600: '#0d9488',
                700: '#0f766e',
                800: '#115e59',
                900: '#134e4a',
                950: '#042f2e',
            },
            'blue': {
                50: '#eff6ff',
                100: '#dbeafe',
                200: '#bfdbfe',
                300: '#7dd3fc',
                400: '#60a5fa',
                500: '#3b82f6',
                550: '#008ddd',
                600: '#2563eb',
                700: '#1d4ed8',
                800: '#1e40af',
                900: '#1e3a8a',
                950: '#172554',
            },
            'purple': '#7e5bef',
            'pink': '#ff49db',
            'orange': '#ff7849',
            'lime': {
                50: '#f7fee7',
                100: '#ecfccb',
                200: '#d9f99d',
                300: '#bef264',
                400: '#a3e635',
                500: '#84cc16',
                600: '#65a30d',
                700: '#4d7c0f',
                800: '#3f6212',
                900: '#3f6212',
                950: '#1a2e05',
            },
            'green': {
                50: '#f0fdf4',
                100: '#dcfce7',
                200: '#bbf7d0',
                300: '#86efac',
                400: '#4ade80',
                500: '#22c55e',
                600: '#16a34a',
                700: '#15803d',
                800: '#166534',
                900: '#14532d',
                950: '#052e16',
            },
            'yellow': '#ffc82c',
            'gray-dark': '#273444',
            'gray': {
                50: '#f9fafb',
                100: '#f3f4f6',
                200: '#e5e7eb',
                300: '#d1d5db',
                400: '#9ca3af',
                500: '#6b7280',
                600: '#4b5563',
                700: '#374151',
                800: '#1e293b',
                900: '#0f172a',
                950: '#020617',
                1000: '#000',
            },
            'indigo': {
                50: '#eef2ff',
                100: '#e0e7ff',
                200: '#c7d2fe',
                300: '#a5b4fc',
                400: '#818cf8',
                500: '#6366f1',
                600: '#4f46e5',
                700: '#4338ca',
                800: '#3730a3',
                900: '#312e81',
                950: '#1e1b4b',
                1000: '#000',
            },
            'primary': {
                DEFAULT: '#008ddd',
                50: '',
                100: '',
                200: '',
                300: '#67C7F1',
                400: '#008ddd',
                500: '#2E92BC',
                600: '',
                700: '',
                800: '',
                900: '',
            },
            'red': {
                50: '#fef2f2',
                100: '#fee2e2',
                200: '#fecaca',
                300: '#fca5a5',
                400: '#f87171',
                500: '#ef4444',
                600: '#dc2626',
                700: '#b91c1c',
                800: '#991b1b',
                900: '#7f1d1d',
                950: '#450a0a',
                1000: '#000',
            },
            'neutral': {
                100: '#f5f5f5',
                200: '#e5e5e5',
            },
            'gray-light': '#d3dce6',
            'white': '#fff',

            sarga: 'rgba(var(--color-sarga), 1)',
            szurke: 'rgba(var(--color-szurke), 1)',
            smaragd: 'rgba(var(--color-smaragd), 1)',
            zold: 'rgba(var(--color-zold), 1)',
            zold_attetszo: 'rgba(var(--color-zold), 0.6)',
        },
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },

            backgroundImage: {

            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
}

