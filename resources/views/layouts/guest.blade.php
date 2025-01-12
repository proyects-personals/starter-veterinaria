<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Veterinaria') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-50" 
             style="background-image: url('https://facultades.unab.cl/cienciasdelavida/wp-content/uploads/2022/02/Medicina-Veterinaria.webp'); background-size: cover; background-position: center;">

            <div class="w-full sm:max-w-md mt-6 px-6 py-8">
                <!-- Friendly heading with soft colors -->
                <h2 class="text-3xl text-center font-semibold text-blue-600 dark:text-blue-800 mb-6">Inisiar Sesión</h2>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
