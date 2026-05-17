<x-app-layout>
    <div>
        <h1>Confirm Password</h1>
        <p>Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password') <p>{{ $message }}</p> @enderror
            </div>

            <button type="submit">Confirm</button>
        </form>
    </div>
</x-app-layout>
