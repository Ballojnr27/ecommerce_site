<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reg_log.css">
    <style>
        body{
    background:white;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    }
    
    .signup{
    background: rgba(44, 62, 80, 0.7);
    padding:40px;
    width:250px;
    margin-top:90px;
    margin-left:180px;
    margin:0 auto;
    }
    
    form{
    width:240px;
    text-align:center;
    margin-top:-10;
    }
    
    input{
    width:240px;
    text-align: center;
    background: transparent;
    border:none;
    border-bottom:2px solid white;
    font-size:18px;
    font-weight:200px;
    padding:10px;
    transition:border 0.5s;
    outline:none;
    height:35px;
    color: black;
    }
    
    button{
    width:190px;
    font-size:20px;
    border:none;
    padding:10px 0;
    border-radius:25px;
    line-height:25px;
    cursor: pointer;
    background-color: blue;
    font-weight: bold;
    /*margin-top="100px"*/
    }
    
    button:hover {
    background: black;
    color:blue;
    }
    
    h2, h1{
    color:blue;
    font-weight: bolder;
    font-size: 30px;
    }
    
    a{
    color:blue;
    }
    
    a:hover{
    color:black;
    }
    
    .signin{
    color:crimson;
    }
    
    ::placeholder{
    color: black;
    opacity:0.5;
    font-size: small;
    }
    
    #error{
        color:red;
        opacity: 0.9;
    }
    label{
        color:black;
    opacity:0.8;
    font-size:18px;
    font-weight:200px;
    }

    </style>
</head>
<body>
    <div class="signup">
                <h2>Reset Password</h2>
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                <form method="POST" action="{{ route('password.new') }}">
                        @csrf

                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Enter your registered email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="security_question" class="col-md-4 col-form-label text-md-right">{{ __('Security Question') }}</label>

                                <div class="col-md-6">
                                    <input id="security_ques" type="text" placeholder="What is your favorite sport?" class="form-control @error('security_ques') is-invalid @enderror" name="security_ques" required>

                                    @error('security_ques')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>



                            

                             <br>   
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>





