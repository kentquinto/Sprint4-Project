<x-app-layout>
    <div class="bg-[#1C1917] border-b-4 border-[#FCD34D]">
        <div class="max-w-5xl mx-auto px-6 py-6">
            <p class="text-[#FCD34D] text-xs font-bold uppercase tracking-widest mb-2" style="font-family:'Syne',sans-serif;">
                Welcome back
            </p>
            <h1 class="text-xl font-bold text-[#FFFDF7]" style="font-family:'Syne',sans-serif;">
                {{ auth()->user()->name }}
            </h1>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Events you created -->
        <div>
            <h2 class="text-xs font-normal uppercase tracking-widest text-[#A8A29E] mb-5 pb-3 border-b-2 border-[#E8E0CC]"
                style="font-family:'Syne',sans-serif;">
                Events You Created
            </h2>
            @forelse(auth()->user()->createdEvents()->with('game')->latest()->get() as $event)
                <a href="{{ route('events.show', $event) }}"
                   class="block bg-white border-2 border-[#E8E0CC] rounded-xl p-5 mb-3 hover:border-[#FCD34D] transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-sm text-[#1C1917] group-hover:text-[#92400E] transition mb-1"
                               style="font-family:'Syne',sans-serif;">
                                {{ $event->title }}
                            </p>
                            <p class="text-xs text-[#A8A29E] font-normal">
                                {{ $event->game->name }} · {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}
                            </p>
                        </div>
                        @include('events._status_badge', ['status' => $event->status])
                    </div>
                </a>
            @empty
                <div class="bg-white border-2 border-dashed border-[#E8E0CC] rounded-xl p-6 text-center">
                    <p class="text-sm text-[#78716C] font-normal mb-3">No events created yet.</p>
                    <a href="{{ route('events.create') }}"
                       class="bg-[#FCD34D] text-[#1C1917] font-bold text-xs px-5 py-2 rounded-md hover:bg-yellow-300 transition"
                       style="font-family:'Syne',sans-serif;">
                        + Create your first event
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Events you joined -->
        <div>
            <h2 class="text-xs font-normal uppercase tracking-widest text-[#A8A29E] mb-5 pb-3 border-b-2 border-[#E8E0CC]"
                style="font-family:'Syne',sans-serif;">
                Events You Joined
            </h2>
            @forelse(auth()->user()->participatingEvents()->with('game')->latest()->get() as $event)
                <a href="{{ route('events.show', $event) }}"
                   class="block bg-white border-2 border-[#E8E0CC] rounded-xl p-5 mb-3 hover:border-[#FCD34D] transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-sm text-[#1C1917] group-hover:text-[#92400E] transition mb-1"
                               style="font-family:'Syne',sans-serif;">
                                {{ $event->title }}
                            </p>
                            <p class="text-xs text-[#A8A29E] font-normal">
                                {{ $event->game->name }} · {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}
                            </p>
                        </div>
                        @include('events._status_badge', ['status' => $event->status])
                    </div>
                </a>
            @empty
                <div class="bg-white border-2 border-dashed border-[#E8E0CC] rounded-xl p-6 text-center">
                    <p class="text-sm text-[#78716C] font-normal mb-3">You haven't joined any events yet.</p>
                    <a href="{{ route('events.index') }}"
                       class="bg-[#1C1917] text-[#FCD34D] font-bold text-xs px-5 py-2 rounded-md hover:bg-[#292524] transition"
                       style="font-family:'Syne',sans-serif;">
                        Browse Events →
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
