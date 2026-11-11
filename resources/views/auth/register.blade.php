<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/reg_log.css') }}">
</head>
<body>
    <div class="signup">
        <h2>Sign Up!</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

            <label for="security_ques">Security Question</label>
            <input id="security_ques" type="text" name="security_ques" value="{{ old('security_ques') }}" placeholder="What is your favorite sport?" required autocomplete="security_ques">

            @error('security_ques')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit">
                {{ __('Register') }}
            </button>

            <p>Already have an account? <a href="/login">Log in</a></p>
        </form>
    </div>
</body>
</html>
