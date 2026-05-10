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

    <!-- Navbar -->
    <nav class="bg-[#1C1917] border-b-4 border-[#FCD34D] sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="text-[#FCD34D] text-xl font-bold tracking-tight" style="font-family: 'Syne', sans-serif;">
                <span class="text-5xl">⚔</span> TCG MANAGER
            </a>
            <div class="flex items-center gap-6">
                <a href="{{ route('events.index') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                    Events
                </a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                        Dashboard
                    </a>
                    <a href="{{ route('events.create') }}" class="bg-[#FCD34D] text-[#1C1917] text-sm font-normal px-4 py-2.5 rounded-md hover:bg-yellow-300 transition" style="font-family: 'Syne', sans-serif;">
                        + Create Event
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-[#A8A29E] hover:text-red-400 text-sm font-normal transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#FCD34D] text-[#1C1917] text-sm font-normal px-4 py-2.5 rounded-md hover:bg-yellow-300 transition" style="font-family: 'Syne', sans-serif;">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

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
