<x-app-layout>
    <div>
        <a href="{{ route('events.index') }}">← Back to Events</a>

        <h1>Create Event</h1>

        {{-- Submits to EventController@store --}}
        <form method="POST" action="{{ route('events.store') }}">
            @csrf

            <div>
                <label>Event Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Saturday Showdown">
                @error('title') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Game</label>
                <select name="game_id">
                    <option value="">Select a game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Description</label>
                <textarea name="description" rows="4" placeholder="Describe your event...">{{ old('description') }}</textarea>
                @error('description') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Location</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="e.g. Barcelona Game Store">
                @error('location') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Date & Time</label>
                <input type="datetime-local" name="date_time" value="{{ old('date_time') }}">
                @error('date_time') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Max Players</label>
                <input type="number" name="max_players" value="{{ old('max_players') }}" min="2" placeholder="16">
                @error('max_players') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label>Entry Fee (€)</label>
                <input type="number" name="entry_fee" value="{{ old('entry_fee', 0) }}" min="0" step="0.01" placeholder="0.00">
                @error('entry_fee') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit">Create Event</button>
                <a href="{{ route('events.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
