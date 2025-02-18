@extends('Frontend.app')
@section('title', 'Login')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/login.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/logo.css')}}">
@endpush

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush
@section('app-content')

    <!-- Login Page -->
    <section class="sign_up_opt_section">
        <div class="centered_option">

            <div class="logo_section">
                <div class="logo">
                    <img src="{{ asset('Frontend/assets/img/logo.png') }}" alt="">
                    <div class="logo_text">
                        <h1>Well<span>Care</span></h1>
                        <p>Care at Your Doorstep</p>
                    </div>
                </div>
            </div>
            <h3 style="padding-top:30px;">Login</h3>


            <form action="{{ route('login') }}" method="POST">
                @csrf
                @method('POST')

                @if(Session::has('pass_fail'))
                    <p class="login_error">{{Session::get('pass_fail')}}</p>
                @endif
                @if(Session::has('user_fail'))
                    <p class="login_error">{{Session::get('user_fail')}}</p>
                @endif
                @if(Session::has('number_fail'))
                    <p class="login_error">{{Session::get('number_fail')}}</p>
                @endif


                <div class="form_pass">

                    <div class="input_field">
                        <input type="number" id="number" name="phone" placeholder="Phone" value="{{old('phone')}}"><br>
                        <span class="error_msg">@error('phone'){{$message}}@enderror</span>
                    </div>


                    <div class="input_field">
                        <div class="repass">
                            <input id="password" type="password" name="password" placeholder="Password">
                            <button class="show-password" id="show-password" type="button" role="switch" aria-label="Show password" aria-checked="false">Show</button>
                        </div>
                        @error('phone')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="remember">
                    <div class="rem_part">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="">Remember Me</label>
                    </div>

                    <div class="rem_part">
                        <a href="{{ route('password.request') }}"><p>Forgot Password?</p></a>
                    </div>
                </div>

                <div class="login_button">
                    <input id="login_btn" type="submit" value="Login">
                </div>

                </form>


                <div class="sign_up_div">
                    <p>Don't have an account?<a href="{{ route('register') }}">Sign Up</a></p>
                </div>

        </div>
    </section>
    <!-- Login Page -->

@endsection
@push('script')
<script>
    const password = document.getElementById("password");
    const showPassword = document.getElementById("show-password");

    showPassword.addEventListener("click", (event) => {
      if (password.type == "password") {
        password.type = "text";
        showPassword.innerText = "hide";
        showPassword.setAttribute("aria-label", "hide password");
        showPassword.setAttribute("aria-checked", "true");
      } else {
        password.type = "password";
        showPassword.innerText = "show";
        showPassword.setAttribute("aria-label", "show password");
        showPassword.setAttribute("aria-checked", "false");
      }
    });
</script>
@endpush
