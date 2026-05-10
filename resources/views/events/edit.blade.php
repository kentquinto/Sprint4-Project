<x-app-layout>
    <div class="max-w-2xl mx-auto px-6 py-6">

        <a href="{{ route('events.show', $event) }}" class="text-[#78716C] hover:text-[#FCD34D] text-sm font-semibold mb-8 inline-block transition">
            ← Back to Event
        </a>

        <h1 class="text-xl font-bold text-[#1C1917] mb-8" style="font-family:'Syne',sans-serif;">
            Edit Event
        </h1>

        <form method="POST" action="{{ route('events.update', $event) }}"
              class="bg-white border-2 border-[#E8E0CC] rounded-xl p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Event Title</label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                @error('title') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Game</label>
                <select name="game_id" class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id', $event->game_id) == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">{{ old('description', $event->description) }}</textarea>
                @error('description') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Location</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                @error('location') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Date & Time</label>
                    <input type="datetime-local" name="date_time"
                           value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}"
                           class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    @error('date_time') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Max Players</label>
                    <input type="number" name="max_players" value="{{ old('max_players', $event->max_players) }}" min="2"
                           class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    @error('max_players') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Entry Fee (€)</label>
                    <input type="number" name="entry_fee" value="{{ old('entry_fee', $event->entry_fee) }}" min="0" step="0.01"
                           class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    @error('entry_fee') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Status</label>
                    <select name="status" class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @foreach(['upcoming','ongoing','finished','cancelled'] as $s)
                            <option value="{{ $s }}" {{ old('status', $event->status) === $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4 pt-2 border-t-2 border-[#E8E0CC]">
                <button type="submit"
                        class="bg-[#FCD34D] text-[#1C1917] font-semibold text-sm px-8 py-3 rounded-md hover:bg-yellow-300 transition"
                        style="font-family:'Syne',sans-serif;">
                    Save Changes
                </button>
                <a href="{{ route('events.show', $event) }}"
                   class="bg-[#F5F0E8] text-[#78716C] font-semibold text-sm px-8 py-3 rounded-md hover:bg-[#EDE8DF] transition"
                   style="font-family:'Syne',sans-serif;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
