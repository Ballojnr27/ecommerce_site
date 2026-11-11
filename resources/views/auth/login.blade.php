<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="{{ asset('css/reg_log.css') }}">
</head>
<body>
    <div class="signup">
        <h2>Log In!</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit">
                {{ __('Login') }}
            </button>

            <a href="/password/forget">Forgot Your Password?</a>

            <p>Don't have an account? <a href="/register">Sign up</a></p>
        </form>
    </div>
</body>
</html>
