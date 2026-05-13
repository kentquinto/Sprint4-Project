<nav class="bg-[#1C1917] border-b-4 border-[#FCD34D] sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-6 h-20 flex items-center justify-between">
        <a href="/" class="text-[#FCD34D] text-xl font-bold tracking-tight" style="font-family: 'Syne', sans-serif;">
            <span class="text-5xl">⚔</span> TCG MANAGER
        </a>
        <div class="flex items-center gap-6">
            <a href="{{ route('events.index') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                Events
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                    Dashboard
                </a>
                <a href="{{ route('profile.edit') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                    {{ auth()->user()->name }}
                </a>
                <a href="{{ route('events.create') }}" class="bg-[#FCD34D] text-[#1C1917] text-sm font-normal px-4 py-2.5 rounded-md hover:bg-yellow-300 transition" style="font-family: 'Syne', sans-serif;">
                    + Create Event
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-[#A8A29E] hover:text-red-400 text-sm font-normal transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-[#A8A29E] hover:text-[#FCD34D] text-sm font-normal transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-[#FCD34D] text-[#1C1917] text-sm font-normal px-4 py-2.5 rounded-md hover:bg-yellow-300 transition" style="font-family: 'Syne', sans-serif;">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>
