<x-app-layout>
    <div>
        <p>Player Profile</p>
        <h1>{{ $user->name }}</h1>

        @if($user->country)
            <p>{{ $user->country }}</p>
        @endif

        <p>{{ $finishedEvents->count() }} Events Finished</p>

        @if($user->bio)
            <h3>Bio</h3>
            <p>{{ $user->bio }}</p>
        @endif

        @if($user->favoriteGame)
            <h3>Favourite Game</h3>
            <p>{{ $user->favoriteGame->name }}</p>
        @endif

        {{-- Active events: upcoming + ongoing (from ProfileController@show) --}}
        @if($upcomingEvents->isNotEmpty())
            <h3>Active Events ({{ $upcomingEvents->count() }})</h3>
            @foreach($upcomingEvents as $event)
                <a href="{{ route('events.show', $event) }}">
                    <p>{{ $event->game->name }}</p>
                    <p>{{ $event->title }}</p>
                    @include('events._status_badge', ['status' => $event->status])
                </a>
            @endforeach
        @endif

        {{-- Finished events --}}
        @if($finishedEvents->isNotEmpty())
            <h3>Finished Events ({{ $finishedEvents->count() }})</h3>
            @foreach($finishedEvents as $event)
                <a href="{{ route('events.show', $event) }}">
                    <p>{{ $event->game->name }}</p>
                    <p>{{ $event->title }}</p>
                    @include('events._status_badge', ['status' => $event->status])
                </a>
            @endforeach
        @endif

        @if($upcomingEvents->isEmpty() && $finishedEvents->isEmpty())
            <p>This player hasn't joined any events yet.</p>
        @endif
    </div>
</x-app-layout>
