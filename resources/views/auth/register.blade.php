<x-app-layout>
    <div>
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation') <p>{{ $message }}</p> @enderror
            </div>

            <button type="submit">Create Account</button>

            <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </form>
    </div>
</x-app-layout>
