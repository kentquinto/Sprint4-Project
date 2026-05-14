<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-6 space-y-5">

        <h1 class="text-xl font-bold text-[#1C1917]" style="font-family:'Syne',sans-serif;">
            Profile
        </h1>

        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-8">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white border-2 border-[#E8E0CC] rounded-xl p-8">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>
