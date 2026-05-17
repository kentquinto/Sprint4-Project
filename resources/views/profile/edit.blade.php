<x-app-layout>
    <div>
        <h1>Profile</h1>

        {{-- Section 1: name, email, country, favourite game, bio --}}
        <div>
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Section 2: change password --}}
        <div>
            @include('profile.partials.update-password-form')
        </div>

        {{-- Section 3: delete account --}}
        <div>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
