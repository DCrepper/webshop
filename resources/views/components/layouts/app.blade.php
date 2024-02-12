<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Classen') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net" rel="preconnect">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @isset($style)
            <style>
                {{ $style }}
            </style>
        @endisset
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">

        {{-- SPA Do not delete --}}
        <livewire:app />

        <!-- Page Content -->
        <div x-data="{ cartOpen: false, isOpen: false }">
            <x-layouts.navigation.navbar />

            <x-layouts.cart />

            <main class="my-8">
                {{ $slot }}
            </main>
            <x-layouts.footer />

        </div>
    </body>

</html>
