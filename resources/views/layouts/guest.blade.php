<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="darkModeStore()" 
          :class="{ 'dark': darkMode }" 
          x-init="initDarkMode()">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 transition-colors duration-300 pb-16 lg:pb-0">
            @include('layouts.navigation')

            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <div class="mb-6">
                    <a href="/">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                            </svg>
                        </div>
                    </a>
                </div>

                <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-xl border border-gray-200 dark:border-gray-700">
                    {{ $slot }}
                </div>
            </div>

            {{-- Mobile Footer Navigation --}}
            <x-mobile-footer />
        </div>
    </body>
</html>
