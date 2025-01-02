/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Livewire/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                rose: {
                    200: '#fecdd3',
                    400: '#fb7185',
                },
                pink: {
                    200: '#fbcfe8',
                },
                purple: {
                    200: '#e9d5ff',
                    600: '#9333ea',
                },
                indigo: {
                    200: '#c7d2fe',
                },
                blue: {
                    200: '#bfdbfe',
                    400: '#60a5fa',
                },
                emerald: {
                    200: '#a7f3d0',
                    400: '#34d399',
                },
                teal: {
                    200: '#99f6e4',
                },
                cyan: {
                    200: '#a5f3fc',
                    400: '#22d3ee',
                },
                amber: {
                    200: '#fde68a',
                    400: '#fbbf24',
                },
                orange: {
                    200: '#fed7aa',
                },
                fuchsia: {
                    200: '#f5d0fe',
                },
                violet: {
                    200: '#ddd6fe',
                    400: '#a78bfa',
                },
                sky: {
                    200: '#bae6fd',
                },
                gray: {
                    100: '#f3f4f6',
                    200: '#e5e7eb',
                    500: '#6b7280',
                    700: '#374151',
                    800: '#1f2937',
                }
            },
            opacity: {
                '90': '0.9',
            },
            scale: {
                '105': '1.05',
            },
            transitionDuration: {
                '500': '500ms',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
