<x-app-layout>
    <div>
        <h1>Find Your Tournament</h1>
        <p>Browse and join TCG events</p>
    </div>

    <div>

        {{-- Game filter tabs: clicking a game filters events by that game (?game=id) --}}
        <nav>
            <a href="{{ route('events.index') }}">All Events</a>

            @foreach(\App\Models\Game::all() as $game)
                <a href="{{ route('events.index', ['game' => $game->id]) }}">
                    {{ $game->name }}
                </a>
            @endforeach
        </nav>

        @if($events->isEmpty())
            <p>No events found.</p>
            @auth
                <a href="{{ route('events.create') }}">+ Create Event</a>
            @endauth
        @else

            {{-- First event is featured --}}
            @php $featured = $events->first(); @endphp
            <div>
                <a href="{{ route('events.show', $featured) }}">
                    <p>{{ $featured->game->name }}</p>
                    <h2>{{ $featured->title }}</h2>
                    <p>{{ Str::limit($featured->description, 120) }}</p>
                    <p>{{ $featured->location }}</p>
                    <p>{{ \Carbon\Carbon::parse($featured->date_time)->format('M d, Y · h:i A') }}</p>
                    <p>{{ $featured->entry_fee > 0 ? '€'.number_format($featured->entry_fee, 2) : 'Free entry' }}</p>
                    <p>{{ $featured->participants->count() }} / {{ $featured->max_players }} players</p>
                    @include('events._status_badge', ['status' => $featured->status])
                    <p>by {{ $featured->creator->name }}</p>
                </a>
            </div>

            {{-- Remaining events --}}
            @foreach($events->skip(1) as $event)
                <div>
                    <a href="{{ route('events.show', $event) }}">
                        <p>{{ $event->game->name }}</p>
                        <h3>{{ $event->title }}</h3>
                        <p>{{ $event->location }}</p>
                        <p>{{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}</p>
                        <p>{{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee, 2) : 'Free' }}</p>
                        <p>{{ $event->participants->count() }} / {{ $event->max_players }} players</p>
                        @include('events._status_badge', ['status' => $event->status])
                    </a>
                </div>
            @endforeach

        @endif
    </div>
</x-app-layout>
