@extends('master')
@section('content')

<div id="logreg-forms">
        <form action="{{ url('/login') }}" method="post" class="form-signin" >
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" >
            @if ($errors -> has('email'))
                    <div class="invalid-feedback">
                        {{ $errors -> first('email') }}
                    </div>
                @endif
            <br>
            <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
            @if ($errors -> has('password'))
                    <div class="invalid-feedback">
                        {{ $errors -> first('password') }}
                    </div>
                @endif

             @if ($message = Session::get('error'))
                <div class="alert alert-danger mt-3 text-center">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>
            </form>

            <form action="/reset/password/" class="form-reset" >

                <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form>
            
            <form action="/register" class="form-signup" method="POST">
                 @Csrf
                <div class="social-login">
                    <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign up with Facebook</span> </button>
                </div>
                <div class="social-login">
                    <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign up with Google+</span> </button>
                </div>
                
                <p style="text-align:center">OR</p>

                <input type="text" id="user-name" name="name" class="form-control" placeholder="Full name" required="" autofocus="">
                <input type="email" id="user-email" name="email" class="form-control" placeholder="Email address" required autofocus="">
                <input type="password" id="user-pass" name="password" class="form-control" placeholder="Password" required autofocus="">
                <input type="password" id="user-repeatpass" name="repassword" class="form-control" placeholder="Repeat Password" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>

                <span class="text-primary"><h2>{{ session('msg') }}</h2></span>
            </form>
            <br>
            
    </div>

@endsection
