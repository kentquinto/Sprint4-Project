<x-app-layout>
    <div class="max-w-xl mx-auto px-6 py-10">

        <a href="{{ route('events.index') }}" class="text-[#78716C] hover:text-[#FCD34D] text-sm font-normal mb-8 inline-block transition">
            ← Back to Events
        </a>

        <h1 class="text-xl font-bold text-[#1C1917] mb-8" style="font-family:'Syne',sans-serif;">
            Create Event
        </h1>

        <form method="POST" action="{{ route('events.store') }}"
              class="bg-white border-2 border-[#E8E0CC] rounded-xl p-10 space-y-8">
            @csrf

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Event Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                       placeholder="e.g. Saturday Showdown">
                @error('title') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Game</label>
                <select name="game_id" class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    <option value="">Select a game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                          placeholder="Describe your event...">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Location</label>
                <input type="text" name="location" value="{{ old('location') }}"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                       placeholder="e.g. Barcelona Game Store">
                @error('location') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Date & Time</label>
                    <input type="datetime-local" name="date_time" value="{{ old('date_time') }}"
                           class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    @error('date_time') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Max Players</label>
                    <input type="number" name="max_players" value="{{ old('max_players') }}" min="2"
                           class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                           placeholder="16">
                    @error('max_players') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Entry Fee (€)</label>
                <input type="number" name="entry_fee" value="{{ old('entry_fee', 0) }}" min="0" step="0.01"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                       placeholder="0.00">
                @error('entry_fee') <p class="text-red-600 text-xs font-semibold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4 pt-2 border-t-2 border-[#E8E0CC]">
                <button type="submit"
                        class="bg-[#FCD34D] text-[#1C1917] font-semibold text-sm px-8 py-3 rounded-md hover:bg-yellow-300 transition"
                        style="font-family:'Syne',sans-serif;">
                    Create Event
                </button>
                <a href="{{ route('events.index') }}"
                   class="bg-[#F5F0E8] text-[#78716C] font-semibold text-sm px-8 py-3 rounded-md hover:bg-[#EDE8DF] transition"
                   style="font-family:'Syne',sans-serif;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
