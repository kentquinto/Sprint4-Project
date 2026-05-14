<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-6">

        <a href="{{ route('events.index') }}" class="text-[#78716C] hover:text-[#FCD34D] text-sm font-normal mb-8 inline-block transition">
            ← Back to Events
        </a>

        <!-- Header card -->
        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden mb-6">
            <div class="bg-[#1C1917] p-10">
                @php
                    $gameColors = [
                        'Yu-Gi-Oh!'                         => '#FBBF24',
                        'Pokémon'                           => '#F87171',
                        'Magic: The Gathering'              => '#A78BFA',
                        'One Piece'                         => '#34D399',
                        'League of Legends Riftbound'       => '#60A5FA',
                        'Disney Lorcana'                    => '#F472B6',
                        'Dragon Ball Super Card Game'       => '#FB923C',
                        'Star Wars: Unlimited'              => '#94A3B8',
                        'Final Fantasy TCG'                 => '#818CF8',
                        'Flesh and Blood'                   => '#F87171',
                        'Digimon Card Game'                 => '#4ADE80',
                        'Gundam Card Game'                  => '#E5E7EB',
                        'Altered'                           => '#2DD4BF',
                    ];
                    $gc = $gameColors[$event->game->name] ?? '#FCD34D';
                @endphp
                <p class="text-sm font-bold uppercase tracking-widest mb-4" style="color:{{ $gc }};font-family:'Syne',sans-serif;">
                    {{ $event->game->name }}
                </p>
                <div class="flex justify-between items-start flex-wrap gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-[#FFFDF7] mb-3" style="font-family:'Syne',sans-serif;">
                            {{ $event->title }}
                        </h1>
                        <p class="text-[#A8A29E] text-sm font-normal">
                            Organized by {{ $event->creator->name }}
                        </p>
                    </div>
                    @include('events._status_badge', ['status' => $event->status])
                </div>
            </div>

            <div class="p-10">
                <div class="flex flex-col gap-8 mb-8">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-4" style="font-family:'Syne',sans-serif;">
                            Event Details
                        </h3>
                        <div class="space-y-3 text-sm text-[#44403C] font-normal">
                            <p>📍 {{ $event->location }}</p>
                            <p>📅 {{ \Carbon\Carbon::parse($event->date_time)->format('F d, Y · h:i A') }}</p>
                            <p>💰 {{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee,2) : 'Free entry' }}</p>
                            <p>👥 {{ $event->participants->count() }} / {{ $event->max_players }} players</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-4" style="font-family:'Syne',sans-serif;">
                            Description
                        </h3>
                        <p class="text-sm text-[#44403C] font-normal leading-relaxed">
                            {{ $event->description }}
                        </p>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="border-t-2 border-[#E8E0CC] pt-6 flex gap-3">
                    @auth
                        @if(auth()->id() === $event->creator_id)
                            <a href="{{ route('events.edit', $event) }}"
                               class="bg-[#1C1917] text-[#FCD34D] font-bold text-sm px-6 py-3 rounded-md hover:bg-[#292524] transition"
                               style="font-family:'Syne',sans-serif;">
                                Edit Event
                            </a>
                            <form method="POST" action="{{ route('events.destroy', $event) }}"
                                  onsubmit="return confirm('Delete this event?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-100 text-red-700 font-bold text-sm px-6 py-3 rounded-md hover:bg-red-200 transition"
                                        style="font-family:'Syne',sans-serif;">
                                    Delete
                                </button>
                            </form>
                        @else
                            @php $joined = $event->participants->contains(auth()->id()); @endphp
                            @if($joined)
                                <form method="POST" action="{{ route('events.leave', $event) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-100 text-red-700 font-bold text-sm px-6 py-3 rounded-md hover:bg-red-200 transition"
                                            style="font-family:'Syne',sans-serif;">
                                        Leave Event
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('events.join', $event) }}">
                                    @csrf
                                    <button type="submit"
                                            class="bg-[#FCD34D] text-[#1C1917] font-bold text-sm px-8 py-3 rounded-md hover:bg-yellow-300 transition"
                                            style="font-family:'Syne',sans-serif;">
                                        Join Event →
                                    </button>
                                </form>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="bg-[#FCD34D] text-[#1C1917] font-bold text-sm px-8 py-3 rounded-md hover:bg-yellow-300 transition"
                           style="font-family:'Syne',sans-serif;">
                            Login to Join →
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Participants -->
        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6">
            <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-5 pb-3 border-b-2 border-[#E8E0CC]"
                style="font-family:'Syne',sans-serif;">
                Participants ({{ $event->participants->count() }})
            </h3>
            @if($event->participants->isEmpty())
                <p class="text-sm text-[#78716C] font-normal">No participants yet. Be the first!</p>
            @else
                <div class="flex flex-wrap gap-3">
                    @foreach($event->participants as $p)
                        <a href="{{ route('profile.show', $p) }}"
                           class="bg-[#FFFDF7] border-2 border-[#E8E0CC] px-4 py-2 rounded-md text-sm font-normal text-[#1C1917] hover:border-[#FCD34D] hover:text-[#92400E] transition">
                            {{ $p->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
