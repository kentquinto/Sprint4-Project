<x-app-layout>
    <div>
        <p>Welcome back</p>
        <h1>{{ auth()->user()->name }}</h1>
    </div>

    <div>

        {{-- Events created by the logged-in user (User->createdEvents relationship) --}}
        <div>
            <h2>Events You Created</h2>

            @forelse(auth()->user()->createdEvents()->with('game')->latest()->get() as $event)
                <a href="{{ route('events.show', $event) }}">
                    <p>{{ $event->title }}</p>
                    <p>{{ $event->game->name }} &middot; {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}</p>
                    {{-- Status badge: upcoming / ongoing / finished / cancelled --}}
                    @include('events._status_badge', ['status' => $event->status])
                </a>
            @empty
                <p>No events created yet.</p>
                <a href="{{ route('events.create') }}">+ Create your first event</a>
            @endforelse
        </div>

        {{-- Events the logged-in user has joined (User->participatingEvents relationship) --}}
        <div>
            <h2>Events You Joined</h2>

            @forelse(auth()->user()->participatingEvents()->with('game')->latest()->get() as $event)
                <a href="{{ route('events.show', $event) }}">
                    <p>{{ $event->title }}</p>
                    <p>{{ $event->game->name }} &middot; {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y') }}</p>
                    @include('events._status_badge', ['status' => $event->status])
                </a>
            @empty
                <p>You haven't joined any events yet.</p>
                <a href="{{ route('events.index') }}">Browse Events</a>
            @endforelse
        </div>

    </div>
</x-app-layout>
