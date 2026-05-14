<x-app-layout>
    <div class="max-w-md mx-auto px-6 py-12">
        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl overflow-hidden">

            <div class="bg-[#1C1917] px-8 py-10 text-center">
                <p class="text-[#FCD34D] text-xs font-normal uppercase tracking-widest mb-3" style="font-family:'Syne',sans-serif;">
                    ⚔ TCG MANAGER
                </p>
                <h1 class="text-2xl font-bold text-[#FFFDF7]" style="font-family:'Syne',sans-serif;">
                    Log In
                </h1>
                <p class="text-[#A8A29E] text-sm font-normal mt-2">Sign in to your account</p>
            </div>

            <div class="px-8 py-8">
                @if (session('status'))
                    <div class="bg-green-100 border-2 border-green-300 text-green-800 text-sm font-normal px-4 py-3 rounded-lg mb-6">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('email') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-widest text-[#A8A29E] mb-2" style="font-family:'Syne',sans-serif;">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="w-full border-2 border-[#E8E0CC] rounded-lg px-4 py-4 text-sm font-normal text-[#1C1917] focus:outline-none focus:border-[#FCD34D] transition bg-[#FFFDF7]">
                        @error('password') <p class="text-red-600 text-xs font-normal mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                   class="rounded border-[#E8E0CC] text-[#FCD34D] focus:ring-[#FCD34D]">
                            <span class="text-sm font-normal text-[#78716C]">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-normal text-[#78716C] hover:text-[#FCD34D] transition">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full bg-[#FCD34D] text-[#1C1917] font-semibold text-sm py-3.5 rounded-md hover:bg-yellow-300 transition"
                            style="font-family:'Syne',sans-serif;">
                        Log In →
                    </button>

                    <p class="text-center text-sm font-normal text-[#78716C]">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-[#1C1917] font-semibold hover:text-[#FCD34D] transition">Register</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
