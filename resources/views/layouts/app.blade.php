<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TCG Manager') }}</title>
    {{-- Add your fonts here --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.navigation')

    {{-- Flash messages: driven by controller return back()->with('success'/'error', '...') --}}
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>TCG Manager &mdash; Season 2026</p>
    </footer>

</body>
</html>
