<section>
    <h2>Profile Information</h2>

    {{-- Hidden form required by Laravel's email verification flow --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Submits to ProfileController@update via PATCH --}}
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Country</label>
            <input type="text" name="country" value="{{ old('country', $user->country) }}" placeholder="e.g. Spain">
            @error('country') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Favourite Game</label>
            <select name="favorite_game_id">
                <option value="">None</option>
                @foreach($games as $game)
                    <option value="{{ $game->id }}" {{ old('favorite_game_id', $user->favorite_game_id) == $game->id ? 'selected' : '' }}>
                        {{ $game->name }}
                    </option>
                @endforeach
            </select>
            @error('favorite_game_id') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Bio</label>
            <textarea name="bio" rows="3" placeholder="Tell others a bit about yourself...">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit">Save Changes</button>
            @if(session('status') === 'profile-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
