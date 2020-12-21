@extends('templates.sign-in-up')
@section('content')
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                <a href="{{url('/sign-up')}}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">登入</h2>
                <form method="POST" class="register-form" id="login-form" onsubmit="return setEmail(event)">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" name="email" id="your_email" placeholder="Your Email" value="{{ old('email') }}"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="your_pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        @include('components.validationErrorMessage')
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection
