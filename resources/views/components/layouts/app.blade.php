<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles

    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('centre-invest-bank.svg') }}">
    <title>{{ 'TourchSupport' }}</title>
</head>
<body class="overflow-scroll scrollbar-hide">
    <livewire:header />

    <div class="mx-auto h-screen">
        {{ $slot }}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/bd53d87eef.js" crossorigin="anonymous"></script>
</body>
@livewireScripts
</html>
