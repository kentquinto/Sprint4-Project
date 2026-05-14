<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TCG Manager') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFDF7] text-[#1C1917]" style="font-family: 'DM Sans', sans-serif;">

    @include('layouts.navigation')

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border-b-2 border-green-400 text-green-800 px-6 py-3 text-sm font-normal">
            ✓ {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-b-2 border-red-400 text-red-800 px-6 py-3 text-sm font-normal">
            ✕ {{ session('error') }}
        </div>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <footer class="bg-[#1C1917] border-t-4 border-[#FCD34D] mt-10 py-5 text-center">
        <p class="text-[#A8A29E] text-sm font-normal">⚔ TCG Manager — Season 2026</p>
    </footer>

</body>
</html>
