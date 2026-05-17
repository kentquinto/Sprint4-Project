<section>
    <h2>Update Password</h2>

    {{-- Uses a named error bag: $errors->updatePassword --}}
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <label>Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            @foreach($errors->updatePassword->get('current_password') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

        <div>
            <label>New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            @foreach($errors->updatePassword->get('password') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

        <div>
            <label>Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            @foreach($errors->updatePassword->get('password_confirmation') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

        <div>
            <button type="submit">Save</button>
            @if(session('status') === 'password-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
