<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-black text-[#1C1917] mb-2" style="font-family:'Syne',sans-serif;">
            Games
        </h1>
        <p class="text-[#78716C] text-sm font-semibold mb-8">All supported TCG games on the platform.</p>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @php
                $gameColors = [
                    'Yu-Gi-Oh!'                        => '#FBBF24',
                    'Pokémon'                          => '#F87171',
                    'Magic: The Gathering'             => '#A78BFA',
                    'One Piece'                        => '#34D399',
                    'League of Legends Riftbound'      => '#60A5FA',
                    'Disney Lorcana'                   => '#F472B6',
                    'Dragon Ball Super Card Game'      => '#FB923C',
                    'Star Wars: Unlimited'             => '#94A3B8',
                    'Final Fantasy TCG'                => '#818CF8',
                    'Flesh and Blood'                  => '#F87171',
                    'Digimon Card Game'                => '#4ADE80',
                    'Gundam Card Game'                 => '#E5E7EB',
                    'Altered'                          => '#2DD4BF',
                ];
            @endphp

            @foreach($games as $game)
                @php $color = $gameColors[$game->name] ?? '#FCD34D'; @endphp
                <div class="bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden">
                    <div class="h-2" style="background:{{ $color }};"></div>
                    <div class="p-5">
                        <p class="font-black text-[#1C1917] text-sm" style="font-family:'Syne',sans-serif;">
                            {{ $game->name }}
                        </p>
                        <p class="text-xs text-[#A8A29E] font-semibold mt-1">
                            {{ $game->events()->count() }} events
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
