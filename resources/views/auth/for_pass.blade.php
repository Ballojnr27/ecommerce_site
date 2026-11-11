<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/reg_log.css') }}">
</head>
<body>
    <div class="signup">
        <h2>Reset Password</h2>

        @if (session('status'))
            <div class="invalid-feedback" role="alert" style="color: green;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.new') }}">
            @csrf

            <label for="email">Email Address</label>
            <input id="email" type="email" placeholder="Enter your registered email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="security_ques">Security Question</label>
            <input id="security_ques" type="text" placeholder="What is your favorite sport?" name="security_ques" required>

            @error('security_ques')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">New Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">Confirm New Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

            <button type="submit">
                {{ __('Submit') }}
            </button>
        </form>
    </div>
</body>
</html>
