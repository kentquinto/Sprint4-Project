<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-6">

        <!-- Header card -->
        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden mb-6">
            <div class="bg-[#1C1917] p-10">
                <div class="flex justify-between items-start flex-wrap gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-3" style="font-family:'Syne',sans-serif;">
                            Player Profile
                        </p>
                        <h1 class="text-3xl font-bold text-[#FFFDF7] mb-2" style="font-family:'Syne',sans-serif;">
                            {{ $user->name }}
                        </h1>
                        @if($user->country)
                            <p class="text-[#A8A29E] text-sm font-normal">📍 {{ $user->country }}</p>
                        @endif
                    </div>
                    <div class="text-right">
                        <p class="text-4xl font-bold text-[#FCD34D]" style="font-family:'Syne',sans-serif;">
                            {{ $finishedEvents->count() }}
                        </p>
                        <p class="text-xs font-bold uppercase tracking-widest text-[#A8A29E]" style="font-family:'Syne',sans-serif;">
                            Events Finished
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    @if($user->bio)
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-3" style="font-family:'Syne',sans-serif;">Bio</h3>
                            <p class="text-sm text-[#44403C] font-normal leading-relaxed">{{ $user->bio }}</p>
                        </div>
                    @endif
                    @if($user->favoriteGame)
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-3" style="font-family:'Syne',sans-serif;">Favourite Game</h3>
                            <p class="text-sm font-bold text-[#1C1917]" style="font-family:'Syne',sans-serif;">
                                {{ $user->favoriteGame->name }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Upcoming / Ongoing Events -->
        @if($upcomingEvents->isNotEmpty())
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6 mb-6">
                <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-5 pb-3 border-b-2 border-[#E8E0CC]"
                    style="font-family:'Syne',sans-serif;">
                    Active Events ({{ $upcomingEvents->count() }})
                </h3>
                <div class="flex flex-col gap-3">
                    @foreach($upcomingEvents as $event)
                        <a href="{{ route('events.show', $event) }}"
                           class="flex justify-between items-center px-4 py-3 bg-[#FFFDF7] border-2 border-[#E8E0CC] rounded-lg hover:border-[#FCD34D] transition">
                            <div>
                                <p class="text-xs font-bold text-[#A8A29E] mb-1" style="font-family:'Syne',sans-serif;">
                                    {{ $event->game->name }}
                                </p>
                                <p class="text-sm font-bold text-[#1C1917]" style="font-family:'Syne',sans-serif;">
                                    {{ $event->title }}
                                </p>
                            </div>
                            @include('events._status_badge', ['status' => $event->status])
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Finished Events -->
        @if($finishedEvents->isNotEmpty())
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-6">
                <h3 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-5 pb-3 border-b-2 border-[#E8E0CC]"
                    style="font-family:'Syne',sans-serif;">
                    Finished Events ({{ $finishedEvents->count() }})
                </h3>
                <div class="flex flex-col gap-3">
                    @foreach($finishedEvents as $event)
                        <a href="{{ route('events.show', $event) }}"
                           class="flex justify-between items-center px-4 py-3 bg-[#FFFDF7] border-2 border-[#E8E0CC] rounded-lg hover:border-[#FCD34D] transition">
                            <div>
                                <p class="text-xs font-bold text-[#A8A29E] mb-1" style="font-family:'Syne',sans-serif;">
                                    {{ $event->game->name }}
                                </p>
                                <p class="text-sm font-bold text-[#1C1917]" style="font-family:'Syne',sans-serif;">
                                    {{ $event->title }}
                                </p>
                            </div>
                            @include('events._status_badge', ['status' => $event->status])
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if($upcomingEvents->isEmpty() && $finishedEvents->isEmpty())
            <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-10 text-center">
                <p class="text-sm text-[#78716C] font-normal">This player hasn't joined any events yet.</p>
            </div>
        @endif

    </div>
</x-app-layout>
