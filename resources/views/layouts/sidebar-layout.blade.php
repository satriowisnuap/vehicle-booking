<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Vehicle Booking') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-sidebar>
        <x-slot name="header">{{ $header ?? '' }}</x-slot>
        {{ $slot }}
    </x-sidebar>
</body>

</html>
