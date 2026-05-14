<x-app-layout>
    <!-- Hero -->
    <div class="bg-[#1C1917] border-b-4 border-[#FCD34D]">
        <div class="max-w-5xl mx-auto px-6 py-12">
            <h1 class="text-3xl font-bold text-[#FFFDF7] leading-tight mb-3" style="font-family:'Syne',sans-serif;">
                The Arena <span class="text-[#FCD34D]">Awaits.</span><br>Find Your Tournament.
            </h1>
            <p class="text-[#A8A29E] text-sm font-normal">
                Browse and join TCG events
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-6">

        <!-- Game filter tabs -->
        <div id="filter-scroll" class="border-b-2 border-[#E8E0CC] mb-8 flex gap-0 overflow-x-auto">
            <a href="{{ route('events.index') }}"
               @if(!request('game')) data-active="1" @endif
               class="px-3 py-3 text-xs font-bold border-b-4 whitespace-nowrap transition {{ !request('game') ? 'border-[#FCD34D] text-[#1C1917]' : 'border-transparent text-[#78716C] hover:text-[#1C1917]' }}"
               style="font-family:'Syne',sans-serif;">
                All Events
            </a>
            @foreach(\App\Models\Game::all() as $game)
                @php
                    $colors = [
                        'Yu-Gi-Oh!'                        => ['border' => '#FBBF24', 'text' => '#B45309'],
                        'Pokémon'                          => ['border' => '#F87171', 'text' => '#B91C1C'],
                        'Magic: The Gathering'             => ['border' => '#A78BFA', 'text' => '#6D28D9'],
                        'One Piece'                        => ['border' => '#34D399', 'text' => '#065F46'],
                        'League of Legends Riftbound'      => ['border' => '#60A5FA', 'text' => '#1D4ED8'],
                        'Disney Lorcana'                   => ['border' => '#F472B6', 'text' => '#9D174D'],
                        'Dragon Ball Super Card Game'      => ['border' => '#FB923C', 'text' => '#C2410C'],
                        'Star Wars: Unlimited'             => ['border' => '#94A3B8', 'text' => '#334155'],
                        'Final Fantasy TCG'                => ['border' => '#818CF8', 'text' => '#4338CA'],
                        'Flesh and Blood'                  => ['border' => '#FDA4AF', 'text' => '#BE123C'],
                        'Digimon Card Game'                => ['border' => '#4ADE80', 'text' => '#15803D'],
                        'Gundam Card Game'                 => ['border' => '#D1D5DB', 'text' => '#374151'],
                        'Altered'                          => ['border' => '#2DD4BF', 'text' => '#0F766E'],
                    ];
                    $c = $colors[$game->name] ?? ['border' => '#FCD34D', 'text' => '#1C1917'];
                    $active = request('game') == $game->id;
                @endphp
                <a href="{{ route('events.index', ['game' => $game->id]) }}"
                   @if($active) data-active="1" @endif
                   class="px-3 py-3 text-xs font-bold border-b-4 whitespace-nowrap transition"
                   style="font-family:'Syne',sans-serif;
                          border-bottom-color: {{ $active ? $c['border'] : 'transparent' }};
                          color: {{ $active ? $c['text'] : '#78716C' }};">
                    {{ $game->name }}
                </a>
            @endforeach
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const active = document.querySelector('#filter-scroll [data-active]');
                if (active) active.scrollIntoView({ inline: 'center', block: 'nearest' });
            });
        </script>

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
                'Flesh and Blood'                  => '#FDA4AF',
                'Digimon Card Game'                => '#4ADE80',
                'Gundam Card Game'                 => '#D1D5DB',
                'Altered'                          => '#2DD4BF',
            ];
        @endphp

        @if($events->isEmpty())
            <div class="text-center py-16">
                <p class="text-xl font-bold text-[#1C1917] mb-2" style="font-family:'Syne',sans-serif;">No events found.</p>
                <p class="text-[#78716C] text-sm font-normal mb-6">Be the first to create one!</p>
                @auth
                    <a href="{{ route('events.create') }}" class="bg-[#FCD34D] text-[#1C1917] font-bold px-6 py-3 rounded-md text-sm hover:bg-yellow-300 transition" style="font-family:'Syne',sans-serif;">
                        + Create Event
                    </a>
                @endauth
            </div>
        @else
            <!-- Featured + Sidebar layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Featured event (first one) -->
                <div class="col-span-2">
                    @php $featured = $events->first(); @endphp
                    @php $gc = $gameColors[$featured->game->name] ?? '#FCD34D'; @endphp
                    <a href="{{ route('events.show', $featured) }}" class="block bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden hover:border-[#FCD34D] transition group">
                        <div class="bg-[#1C1917] p-6">
                            <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color:{{ $gc }};font-family:'Syne',sans-serif;">
                                ★ Featured · {{ $featured->game->name }}
                            </p>
                            <h2 class="text-base font-bold text-[#FFFDF7] leading-tight group-hover:text-[#FCD34D] transition" style="font-family:'Syne',sans-serif;">
                                {{ $featured->title }}
                            </h2>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-[#78716C] font-normal leading-relaxed mb-4">
                                {{ Str::limit($featured->description, 120) }}
                            </p>
                            <div class="text-sm text-[#78716C] font-normal space-y-1 mb-4">
                                <p>📍 {{ $featured->location }}</p>
                                <p>📅 {{ \Carbon\Carbon::parse($featured->date_time)->format('M d, Y · h:i A') }}</p>
                                <p>💰 {{ $featured->entry_fee > 0 ? '€'.number_format($featured->entry_fee,2) : 'Free entry' }}</p>
                                <p>👥 {{ $featured->participants->count() }} / {{ $featured->max_players }} players</p>
                            </div>
                            <div class="flex justify-between items-center">
                                @include('events._status_badge', ['status' => $featured->status])
                                <span class="text-xs font-bold text-[#A8A29E]" style="font-family:'Syne',sans-serif;">
                                    by {{ $featured->creator->name }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sidebar events -->
                <div class="col-span-1 flex flex-col gap-4">
                    @foreach($events->skip(1)->take(4) as $event)
                        @php $gc2 = $gameColors[$event->game->name] ?? '#FCD34D'; @endphp
                        <a href="{{ route('events.show', $event) }}"
                           class="block bg-white border-2 border-[#E8E0CC] rounded-xl p-4 hover:border-[#FCD34D] transition group">
                            <p class="text-xs font-bold uppercase tracking-widest mb-1" style="color:{{ $gc2 }};font-family:'Syne',sans-serif;">
                                {{ $event->game->name }}
                            </p>
                            <h3 class="text-xs font-bold text-[#1C1917] mb-2 group-hover:text-[#92400E] transition" style="font-family:'Syne',sans-serif;">
                                {{ $event->title }}
                            </h3>
                            <div class="flex justify-between items-center">
                                @include('events._status_badge', ['status' => $event->status])
                                <span class="text-xs text-[#A8A29E] font-normal">
                                    👥 {{ $event->participants->count() }}/{{ $event->max_players }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>

            <!-- Remaining events grid -->
            @if($events->count() > 5)
                <h2 class="text-base font-bold text-[#1C1917] mt-12 mb-6 pb-3 border-b-2 border-[#E8E0CC]" style="font-family:'Syne',sans-serif;">
                    More Events
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($events->skip(5) as $event)
                        @php $gc3 = $gameColors[$event->game->name] ?? '#FCD34D'; @endphp
                        <a href="{{ route('events.show', $event) }}"
                           class="block bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden hover:border-[#FCD34D] transition group">
                            <div class="h-2" style="background:{{ $gc3 }};"></div>
                            <div class="p-5">
                                <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:{{ $gc3 }};font-family:'Syne',sans-serif;">
                                    {{ $event->game->name }}
                                </p>
                                <h3 class="text-xs font-bold text-[#1C1917] mb-3 group-hover:text-[#92400E] transition" style="font-family:'Syne',sans-serif;">
                                    {{ $event->title }}
                                </h3>
                                <div class="text-xs text-[#78716C] font-normal space-y-1 mb-3">
                                    <p>📍 {{ $event->location }}</p>
                                    <p>📅 {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}</p>
                                    <p>💰 {{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee,2) : 'Free' }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    @include('events._status_badge', ['status' => $event->status])
                                    <span class="text-xs text-[#A8A29E] font-normal">👥 {{ $event->participants->count() }}/{{ $event->max_players }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</x-app-layout>
