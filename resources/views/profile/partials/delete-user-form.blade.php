<section>
    <h2>Delete Account</h2>
    <p>Once deleted, all your data will be permanently removed.</p>

    {{-- Submits to ProfileController@destroy via DELETE. Requires password confirmation. --}}
    <form method="post" action="{{ route('profile.destroy') }}"
          onsubmit="return confirm('Are you sure you want to delete your account?')">
        @csrf
        @method('delete')

        <div>
            <label>Confirm Password</label>
            <input id="password" name="password" type="password" placeholder="Enter your password">
            @foreach($errors->userDeletion->get('password') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

        <div>
            <button type="submit">Delete Account</button>
        </div>
    </form>
</section>
