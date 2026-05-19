<x-app-layout>

    {{-- Hero --}}
    <div class="text-center py-16">
        <p class="text-xs font-semibold text-blue-600 uppercase tracking-widest mb-3">Welcome to TCG Manager</p>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Your TCG Tournament Hub</h1>
        <p class="text-gray-500 text-base mb-8 max-w-md mx-auto">Organize and join Trading Card Game tournaments hosted by other users for Yu-Gi-Oh!, Pokémon, Magic: The Gathering, and more!</p>

        <div class="flex items-center justify-center gap-3">
            <a href="{{ route('events.index') }}"
               class="bg-blue-600 text-white text-sm font-medium px-6 py-2.5 rounded-lg hover:bg-blue-700 transition">
                Browse Events
            </a>
            @guest
                <a href="{{ route('register') }}"
                   class="border border-blue-600 text-blue-600 text-sm font-medium px-6 py-2.5 rounded-lg hover:bg-blue-50 transition">
                    Create Account
                </a>
            @endguest
        </div>
    </div>

    {{-- Feature cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-4">
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide mb-2">Discover</p>
            <h3 class="text-sm font-bold text-gray-900 mb-2">Browse Events!</h3>
            <p class="text-sm text-gray-500">Find user-organized tournaments for Yu-Gi-Oh!, Pokémon, Magic: The Gathering, and more!</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide mb-2">Compete</p>
            <h3 class="text-sm font-bold text-gray-900 mb-2">Join & Compete!</h3>
            <p class="text-sm text-gray-500">Register for events with ease and track all your upcoming matches.</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide mb-2">Organize</p>
            <h3 class="text-sm font-bold text-gray-900 mb-2">Host your own Tournaments!</h3>
            <p class="text-sm text-gray-500">Create and manage your own events, set entry fees, and track participants.</p>
        </div>
    </div>

</x-app-layout>
