<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body class="overflow-scroll scrollbar-hide">
    <livewire:header />

    <div class="mx-auto h-screen">
        {{ $slot }}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
</body>
@livewireScripts
</html>
