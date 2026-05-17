<x-app-layout>
    <div>
        <h1>Verify Your Email</h1>
        <p>Please verify your email address by clicking the link we sent you.</p>

        @if(session('status') == 'verification-link-sent')
            <p>A new verification link has been sent to your email.</p>
        @endif

        {{-- Resend the verification email --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Resend Verification Email</button>
        </form>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
</x-app-layout>
