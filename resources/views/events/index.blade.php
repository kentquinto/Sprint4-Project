<x-app-layout>

    {{-- Page header --}}
    <div class="mb-6">
        <h1 class="text2xl font-bold text-gray-900">Event Lists</h1>
        <p class="text-sm text-gray-500 mt-1">Browse and join TCG events!</p>
    </div>

    {{-- Search / Date / Price filters --}}
    <form method="GET" action="{{ route('events.index') }}" class="flex flex-wrap gap-3 mb-4">
        @if(request('game'))
            <input type="hidden" name="game" value="{{ request('game') }}">
        @endif

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Event title..."
               class="border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-800 focus:outline-none focus:border-blue-500 transition w-48">

        <input type="date" name="date" value="{{ request('date') }}"
               class="border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-800 focus:outline-none focus:border-blue-500 transition">

        <select name="price" class="border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-800 focus:outline-none focus:border-blue-500 transition">
            <option value="">All Prices</option>
            <option value="free" {{ request('price') === 'free' ? 'selected' : '' }}>Free</option>
            <option value="paid" {{ request('price') === 'paid' ? 'selected' : '' }}>Paid</option>
        </select>

        <button type="submit"
                class="bg-blue-600 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            Filter
        </button>

        @if(request('search') || request('date') || request('price'))
            <a href="{{ route('events.index', request('game') ? ['game' => request('game')] : []) }}"
               class="border border-gray-300 text-gray-500 text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-100 transition">
                Clear
            </a>
        @endif
    </form>

    {{-- Game filter tabs --}}
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
