<x-app-layout>
    <!-- Hero -->
    <div class="bg-[#1C1917] border-b-4 border-[#FCD34D]">
        <div class="max-w-5xl mx-auto px-6 py-14 text-center">
            <p class="text-[#FCD34D] text-xs font-bold uppercase tracking-widest mb-4" style="font-family:'Syne',sans-serif;">
                Season 2026 — Now Live
            </p>
            <h1 class="text-4xl font-bold text-[#FFFDF7] leading-tight mb-6" style="font-family:'Syne',sans-serif;">
                Your TCG Tournament<br><span class="text-[#FCD34D]">Hub.</span>
            </h1>
            <p class="text-[#A8A29E] text-sm font-normal mb-10 max-w-md mx-auto leading-relaxed">
                Organize and join Trading Card Game tournaments. Browse events, register to compete, and manage your schedule.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('events.index') }}"
                   class="bg-[#FCD34D] text-[#1C1917] font-bold px-6 py-2.5 rounded-md hover:bg-yellow-300 transition text-sm"
                   style="font-family:'Syne',sans-serif;">
                    Browse Events →
                </a>
                @guest
                    <a href="{{ route('register') }}"
                       class="border-2 border-[#FCD34D] text-[#FCD34D] font-bold px-6 py-2.5 rounded-md hover:bg-[#292524] transition text-sm"
                       style="font-family:'Syne',sans-serif;">
                        Create Account
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- Feature highlights -->
    <div class="max-w-5xl mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6">
                <p class="text-xl mb-3">🃏</p>
                <h3 class="font-bold text-[#1C1917] mb-2" style="font-family:'Syne',sans-serif;">Browse Events</h3>
                <p class="text-sm text-[#78716C] font-normal leading-relaxed">Find tournaments for Yu-Gi-Oh!, Pokémon, Magic: The Gathering, and more.</p>
            </div>
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6">
                <p class="text-xl mb-3">⚔️</p>
                <h3 class="font-bold text-[#1C1917] mb-2" style="font-family:'Syne',sans-serif;">Join & Compete</h3>
                <p class="text-sm text-[#78716C] font-normal leading-relaxed">Register for events with one click and track all your upcoming matches.</p>
            </div>
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6">
                <p class="text-xl mb-3">🏆</p>
                <h3 class="font-bold text-[#1C1917] mb-2" style="font-family:'Syne',sans-serif;">Host Tournaments</h3>
                <p class="text-sm text-[#78716C] font-normal leading-relaxed">Create and manage your own events, set entry fees, and track participants.</p>
            </div>
        </div>
    </div>
</x-app-layout>
