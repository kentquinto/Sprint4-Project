<x-app-layout>
    <div class="max-w-md mx-auto px-6 py-12">
        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden">

            <div class="bg-[#1C1917] px-8 py-10 text-center">
                <p class="text-[#FCD34D] text-xs font-normal uppercase tracking-widest mb-3" style="font-family:'Syne',sans-serif;">
                    ⚔ TCG MANAGER
                </p>
                <h1 class="text-2xl font-bold text-[#FFFDF7]" style="font-family:'Syne',sans-serif;">
                    Register
                </h1>
                <p class="text-[#A8A29E] text-sm font-normal mt-2">Create your TCG Manager account</p>
            </div>

            <div class="px-8 py-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('name') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('email') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('password') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('password_confirmation') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-[#FCD34D] text-[#1C1917] font-semibold text-sm py-3.5 rounded-md hover:bg-yellow-300 transition"
                            style="font-family:'Syne',sans-serif;">
                        Create Account →
                    </button>

                    <p class="text-center text-sm font-normal text-[#78716C]">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-[#1C1917] font-semibold hover:text-[#FCD34D] transition">Log in</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
