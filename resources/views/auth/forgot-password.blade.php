<x-app-layout>
    <div>
        <h1>Forgot Password</h1>
        <p>Enter your email and we'll send you a reset link.</p>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <p>{{ $message }}</p> @enderror
            </div>

            <button type="submit">Send Reset Link</button>

            <p><a href="{{ route('login') }}">Back to Login</a></p>
        </form>
    </div>
</x-app-layout>
