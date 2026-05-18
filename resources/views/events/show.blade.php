<x-app-layout>

    <a href="{{ route('events.index') }}" class="text-sm text-gray-500 hover:text-blue-600 transition mb-6 inline-block">
        ← Back to Events
    </a>

    {{-- Main event card --}}
    <div class="bg-white border border-gray-200 rounded-xl p-6 mb-6">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4 flex-wrap mb-6">
            <div>
                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide mb-1">{{ $event->game->name }}</p>
                <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $event->title }}</h1>
                <p class="text-sm text-gray-400">Organized by
                    <a href="{{ route('profile.show', $event->creator) }}" class="text-blue-600 hover:underline">{{ $event->creator->name }}</a>
                </p>
            </div>
            @include('events._status_badge', ['status' => $event->status])
        </div>

        {{-- Details --}}
        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Event Details</h3>
        <div class="space-y-2 text-sm text-gray-600 mb-6">
            <p>📍 {{ $event->location }}</p>
            <p>📅 {{ \Carbon\Carbon::parse($event->date_time)->format('F d, Y · h:i A') }}</p>
            <p>💰 {{ $event->entry_fee > 0 ? '€'.number_format($event->entry_fee, 2) : 'Free entry' }}</p>
            <p>👥 {{ $event->participants->count() }} / {{ $event->max_players }} players</p>
        </div>

        {{-- Description --}}
        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Description</h3>
        <p class="text-sm text-gray-600 leading-relaxed mb-6">{{ $event->description }}</p>

        {{-- Action buttons at the bottom of the card --}}
        <div class="border-t border-gray-100 pt-5 flex gap-3">
            @auth
                @if(auth()->id() === $event->creator_id)
                    {{-- Creator can edit or delete the event --}}
                    <a href="{{ route('events.edit', $event) }}"
                       class="bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition">
                        Edit Event
                    </a>
                    <form method="POST" action="{{ route('events.destroy', $event) }}"
                          onsubmit="return confirm('Delete this event?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-50 text-red-600 text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-red-100 transition">
                            Delete Event
                        </button>
                    </form>
                @else
                    @php $joined = $event->participants->contains(auth()->id()); @endphp

                    @if($joined)
                        {{-- Leave: sends DELETE to events.leave --}}
                        <form method="POST" action="{{ route('events.leave', $event) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-50 text-red-600 text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-red-100 transition">
                                Leave Event
                            </button>
                        </form>
                    @else
                        {{-- Join: sends POST to events.join --}}
                        <form method="POST" action="{{ route('events.join', $event) }}">
                            @csrf
                            <button type="submit"
                                    class="bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition">
                                Join Event
                            </button>
                        </form>
                    @endif
                @endif
            @else
                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition">
                    Login to Join
                </a>
            @endauth
        </div>

    </div>

    {{-- Participants card --}}
    <div class="bg-white border border-gray-200 rounded-xl p-6">
        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">
            Participants ({{ $event->participants->count() }})
        </h3>

        @if($event->participants->isEmpty())
            <p class="text-sm text-gray-400">No participants yet. Be the first!</p>
        @else
            <div class="flex flex-wrap gap-2">
                @foreach($event->participants as $p)
                    <a href="{{ route('profile.show', $p) }}"
                       class="text-sm bg-gray-100 text-gray-700 px-3 py-1.5 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition">
                        {{ $p->name }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>

</x-app-layout>
