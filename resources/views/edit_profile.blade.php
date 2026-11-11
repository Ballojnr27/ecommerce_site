<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/reg_log.css') }}">
</head>
<body>
    <div class="signup">
        <h2>Edit Profile</h2>

        <form method="POST" action="{{ route('edit_profile') }}">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" required autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">Current Password</label>
            <input id="password" type="password" name="current_password" autocomplete="new-password">

            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="new-password">New Password</label>
            <input id="new-password" type="password" name="password" autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">Confirm New Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">

            <label for="security_ques">Security Question</label>
            <input id="security_ques" type="text" name="security_ques" value="{{ $user->security_ques }}" required autocomplete="security_ques">

            @error('security_ques')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit">
                {{ __('Edit profile') }}
            </button>
        </form>
    </div>
</body>
</html>
