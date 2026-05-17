<x-app-layout>
    <div>
        <a href="{{ route('events.show', $event) }}">← Back to Event</a>

        <h1>Edit Event</h1>

        {{-- Submits to EventController@update via PUT --}}
        <form method="POST" action="{{ route('events.update', $event) }}">
            @csrf
            @method('PUT')

            <div>
                <label>Event Title</label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}">
                @error('title') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Game</label>
                <select name="game_id">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id', $event->game_id) == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Description</label>
                <textarea name="description" rows="4">{{ old('description', $event->description) }}</textarea>
                @error('description') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Location</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}">
                @error('location') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Date & Time</label>
                {{-- Carbon formats the stored date into datetime-local format (Y-m-d\TH:i) --}}
                <input type="datetime-local" name="date_time"
                       value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}">
                @error('date_time') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Max Players</label>
                <input type="number" name="max_players" value="{{ old('max_players', $event->max_players) }}" min="2">
                @error('max_players') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Entry Fee (€)</label>
                <input type="number" name="entry_fee" value="{{ old('entry_fee', $event->entry_fee) }}" min="0" step="0.01">
                @error('entry_fee') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Status</label>
                <select name="status">
                    @foreach(['upcoming', 'ongoing', 'finished', 'cancelled'] as $s)
                        <option value="{{ $s }}" {{ old('status', $event->status) === $s ? 'selected' : '' }}>
                            {{ ucfirst($s) }}
                        </option>
                    @endforeach
                </select>
                @error('status') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit">Save Changes</button>
                <a href="{{ route('events.show', $event) }}">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
