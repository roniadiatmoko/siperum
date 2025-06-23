<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPERUM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto mt-6">
                @foreach (['success', 'error', 'warning', 'info'] as $msg)
                    @if(session()->has($msg))
                        <div class="mb-4 px-4 max-w-7xl mx-auto mt-6 py-2 bg-{{ $msg == 'success' ? 'green' : ($msg == 'error' ? 'red' : 'gray') }}-700 border border-{{ $msg == 'success' ? 'green' : ($msg == 'error' ? 'red' : 'gray') }}-400 text-{{ $msg == 'success' ? 'white' : ($msg == 'error' ? 'red' : 'gray') }}-700 rounded">
                            {{ session($msg) }}
                        </div>
                    @endif
                @endforeach

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
