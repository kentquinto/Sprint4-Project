<x-app-layout>
    <div>
        <h1>Reset Password</h1>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            {{-- Token is required by Laravel's password reset flow --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @error('email') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password') <p>{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation') <p>{{ $message }}</p> @enderror
            </div>

            <button type="submit">Reset Password</button>
        </form>
    </div>
</x-app-layout>
