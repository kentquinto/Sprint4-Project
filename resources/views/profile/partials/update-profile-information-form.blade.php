<section>
    <h2 class="text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-6" style="font-family:'Syne',sans-serif;">
        Profile Information
    </h2>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                @error('name') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                @error('email') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Country</label>
                <input type="text" name="country" value="{{ old('country', $user->country) }}"
                       class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                       placeholder="e.g. Spain">
                @error('country') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Favourite Game</label>
                <select name="favorite_game_id"
                        class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                    <option value="">None</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('favorite_game_id', $user->favorite_game_id) == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('favorite_game_id') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Bio</label>
            <textarea name="bio" rows="3"
                      class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-3 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]"
                      placeholder="Tell others a bit about yourself...">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-2 border-t-2 border-[#E8E0CC] flex items-center gap-4">
            <button type="submit"
                    class="bg-[#FCD34D] text-[#1C1917] font-bold text-sm px-8 py-3 rounded-md hover:bg-yellow-300 transition"
                    style="font-family:'Syne',sans-serif;">
                Save Changes
            </button>
            @if(session('status') === 'profile-updated')
                <p class="text-sm text-[#78716C] font-normal">Saved.</p>
            @endif
        </div>
    </form>
</section>
