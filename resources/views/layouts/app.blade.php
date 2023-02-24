<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="antialiased bg-gray-100">

    <header class="p-5 border-b bg-white shadow ">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">Filament</h1>

            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('dashboard')}}">Crear productos</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('dashboard/listProduct')}}">Listar Productos</a>
            </nav>

        </div>

    </header>

    <section class="container mx-auto">
        {{ $slot }}
    </section>
 

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Filament - 🐫
        {{now()->format('Y')}}
    </footer>

    @livewire('notifications')
    @livewire('livewire-ui-modal')

</body>

</html>