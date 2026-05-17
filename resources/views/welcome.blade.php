<x-app-layout>
    <div>
        <h1>Your TCG Tournament Hub</h1>
        <p>Organize and join Trading Card Game tournaments.</p>

        <a href="{{ route('events.index') }}">Browse Events</a>

        @guest
            <a href="{{ route('register') }}">Create Account</a>
        @endguest
    </div>

    <div>
        <div>
            <h3>Browse Events</h3>
            <p>Find tournaments for Yu-Gi-Oh!, Pokémon, Magic: The Gathering, and more.</p>
        </div>
        <div>
            <h3>Join & Compete</h3>
            <p>Register for events with one click and track all your upcoming matches.</p>
        </div>
        <div>
            <h3>Host Tournaments</h3>
            <p>Create and manage your own events, set entry fees, and track participants.</p>
        </div>
    </div>
</x-app-layout>
