<x-app-layout>

    {{-- Page header --}}
    <div class="mb-6">
        <h1 class="text2xl font-bold text-gray-900">Event Lists</h1>
        <p class="text-sm text-gray-500 mt-1">Browse and join TCG events!</p>
    </div>

    {{-- Game filter tabs: clicking a game filters events by that game (?game=id) --}}
    <div class="flex gap-2 flex-wrap mb-6">
        <a href="{{ route('events.index') }}"
           class="text-xs font-medium px-4 py-2 rounded-full border transition
                  {{ !request('game') ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-gray-600 border-gray-300 hover:border-blue-400' }}">
            All Events
        </a>
        @foreach(\App\Models\Game::all() as $game)
            <a href="{{ route('events.index', ['game' => $game->id]) }}"
               class="text-xs font-medium px-4 py-2 rounded-full border transition
                      {{ request('game') == $game->id ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-gray-600 border-gray-300 hover:border-blue-400' }}">
                {{ $game->name }}
            </a>
        @endforeach
    </div>

    @if($events->isEmpty())
        <div class="bg-white border border-dashed border-gray-300 rounded-lg py-16 text-center">
            <p class="text-sm text-gray-400 mb-4">No events found.</p>
            @auth
                <a href="{{ route('events.create') }}"
                   class="bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition">
                    + Create Event
                </a>
            @endauth
        </div>
    @else

        {{-- Events grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($events as $event)
                <a href="{{ route('events.show', $event) }}"
                   class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-400 transition">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">{{ $event->game->name }}</p>
                        @include('events._status_badge', ['status' => $event->status])
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-3">{{ $event->title }}</h3>
                    <div class="space-y-1 text-xs text-gray-400">
                        <p>📍 {{ $event->location }}</p>
                        <p>📅 {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}</p>
                        <p>💰 {{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee, 2) : 'Free' }}</p>
                        <p>👥 {{ $event->participants->count() }} / {{ $event->max_players }} players</p>
                    </div>
                </a>
            @endforeach
        </div>

    @endif

</x-app-layout>
