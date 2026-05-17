<x-app-layout>
    <div>
        <a href="{{ route('events.index') }}">← Back to Events</a>

        <div>
            <p>{{ $event->game->name }}</p>
            <h1>{{ $event->title }}</h1>
            <p>Organized by {{ $event->creator->name }}</p>
            @include('events._status_badge', ['status' => $event->status])
        </div>

        <div>
            <h3>Event Details</h3>
            <p>{{ $event->location }}</p>
            <p>{{ \Carbon\Carbon::parse($event->date_time)->format('F d, Y · h:i A') }}</p>
            <p>{{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee, 2) : 'Free entry' }}</p>
            <p>{{ $event->participants->count() }} / {{ $event->max_players }} players</p>

            <h3>Description</h3>
            <p>{{ $event->description }}</p>
        </div>

        {{-- Action buttons: shown based on auth state and whether user is creator or participant --}}
        <div>
            @auth
                @if(auth()->id() === $event->creator_id)
                    {{-- Creator can edit or delete the event --}}
                    <a href="{{ route('events.edit', $event) }}">Edit Event</a>

                    <form method="POST" action="{{ route('events.destroy', $event) }}"
                          onsubmit="return confirm('Delete this event?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @else
                    @php $joined = $event->participants->contains(auth()->id()); @endphp

                    @if($joined)
                        {{-- Leave: sends DELETE to events.leave --}}
                        <form method="POST" action="{{ route('events.leave', $event) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Leave Event</button>
                        </form>
                    @else
                        {{-- Join: sends POST to events.join --}}
                        <form method="POST" action="{{ route('events.join', $event) }}">
                            @csrf
                            <button type="submit">Join Event</button>
                        </form>
                    @endif
                @endif
            @else
                <a href="{{ route('login') }}">Login to Join</a>
            @endauth
        </div>

        {{-- Participants: each name links to their public profile --}}
        <div>
            <h3>Participants ({{ $event->participants->count() }})</h3>

            @if($event->participants->isEmpty())
                <p>No participants yet. Be the first!</p>
            @else
                @foreach($event->participants as $p)
                    <a href="{{ route('profile.show', $p) }}">{{ $p->name }}</a>
                @endforeach
            @endif
        </div>

    </div>
</x-app-layout>
