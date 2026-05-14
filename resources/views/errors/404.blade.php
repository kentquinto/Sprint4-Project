<x-app-layout>
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-6">

        <div class="bg-[#1C1917] text-[#FCD34D] text-8xl font-bold px-8 py-4 rounded-xl mb-8 border-4 border-[#FCD34D]"
             style="font-family:'Syne',sans-serif;">
            404
        </div>

        <h1 class="text-3xl font-bold text-[#1C1917] mb-3" style="font-family:'Syne',sans-serif;">
            Page Not Found
        </h1>

        <p class="text-[#78716C] text-sm font-normal mb-8 max-w-md">
            Looks like this card doesn't exist in our deck. The page you're looking for may have been moved or deleted.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('events.index') }}"
               class="bg-[#FCD34D] text-[#1C1917] font-bold text-sm px-6 py-3 rounded-md hover:bg-yellow-300 transition"
               style="font-family:'Syne',sans-serif;">
                Browse Events
            </a>
            <a href="/"
               class="bg-[#F5F0E8] text-[#78716C] font-bold text-sm px-6 py-3 rounded-md hover:bg-[#EDE8DF] transition"
               style="font-family:'Syne',sans-serif;">
                Go Home
            </a>
        </div>

    </div>
</x-app-layout>
