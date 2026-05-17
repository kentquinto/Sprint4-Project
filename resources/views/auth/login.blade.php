<x-app-layout>
    <div>
        <h1>Log In</h1>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    Remember me
                </label>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <button type="submit">Log In</button>

            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</x-app-layout>
