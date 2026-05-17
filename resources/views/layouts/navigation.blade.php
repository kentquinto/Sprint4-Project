<nav>
    <a href="/">TCG MANAGER</a>

    <ul>
        <li><a href="{{ route('events.index') }}">Events</a></li>

        @auth
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

            {{-- Links to the logged-in user's own profile edit page --}}
            <li><a href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a></li>

            <li><a href="{{ route('events.create') }}">+ Create Event</a></li>

            {{-- Logout requires a POST form (Laravel CSRF protection) --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
        <div class="flex bg-pink"
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        </div>
        @endauth
    </ul>
</nav>
