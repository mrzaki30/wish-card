<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <title>{{ $title ?? 'Page Title' }}</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> --}}
    <script src="{{ asset('js/webcam.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Jika menggunakan Vite -->
    @livewireStyles
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Custom animation for focus states */
        .group:focus-within label {
            transform: translateY(-2px);
        }

        /* Smooth transition for all interactive elements */
        input,
        textarea,
        button {
            transition: all 0.2s ease-in-out;
        }

        /* Custom placeholder styling */
        ::placeholder {
            color: #a0aec0;
            opacity: 0.7;
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Hover animations */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        /* Custom shadow for cards */
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-auto-rows: auto;
            align-items: start;
            gap: 1.5rem;
        } */
    </style>
    @stack('styles')
</head>

<body>
    {{ $slot }}
    @livewireScripts
    @stack('scripts')

</body>

</html>
