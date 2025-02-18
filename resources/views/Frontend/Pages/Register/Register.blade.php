@extends('Frontend.app')
@section('title', 'Register')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/sign_up_user_cred.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/logo.css') }}">
@endpush
@section('app-content')

    <!-- Register Page -->
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

            <h3 style="padding-top:30px;padding-bottom:30px;">Create an account</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <form action="{{ route('register') }}" method="POST">
              @csrf
              @method('POST')
                <!-- __________________________________________ form section start -->

                <div class="form-container">
                <div id="form">

                  @if(Session::has('duplicate_user'))
                        <p class="error_msg">{{Session::get('duplicate_user')}}</p>
                    @endif

                    <div class="input-container">
                        <input type="hidden" name="account_type" value="{{ $type }}">
                      <input name="phone" type="text" id="mobile" aria-describedby="requirements" required/>
                      <label for="password">Mobile</label>
                    </div>
                    <p class="error_msg">@error('number'){{$message}}@enderror</p>

                    <div class="input-container">
                      <input name="password" type="password" id="password" aria-describedby="requirements" required/>
                      <label for="password">Password</label>
                      <button class="show-password" id="show-password" type="button" role="switch" aria-label="Show password" aria-checked="false">Show</button>
                    </div>
                    <p class="error_msg">@error('password'){{$message}}@enderror</p>

                    <div id="requirements" class="password-requirements">
                        <div class="part">
                            <div class="requirements_part">
                                <p class="requirement" id="length">Min. 8 characters</p>
                                <p class="requirement" id="lowercase">Include lowercase letter</p>
                            </div>
                            <div class="requirements_part">
                                <p class="requirement" id="uppercase">Include uppercase letter</p>
                                <p class="requirement" id="number">Include number</p>
                            </div>
                        </div>
                        <p class="requirement" id="characters">Include a special character: #.-?!@$%^&*</p>
                    </div>

                    <div class="input-container">
                      <input name="password_confirmation" type="password" id="confirm-password" required/>
                      <label for="confirm-password">Confirm password</label>
                    </div>
                    <p class="error_msg">@error('password_confirmation'){{$message}}@enderror</p>

                    <div class="password-requirements">
                      <p class="requirement hidden error" id="match">Password Does not Matched</p>
                    </div>

                </div>
        </div>



        <p>Already have an account? <a href="{{url('/user/log-in/')}}">Login</a></p>


                <!-- __________________________________________ form section end -->
                    <div class="next_section">
                        <div class="step"><p>Step <span>1</span>/3</p></div>
                        <div class="next"><input type="submit" class="next_btn" value="Next"></div>
                    </div>
             </form>


        </div>
    </section>
    <!-- Register Page -->

@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    function show_pass(){
        var pass_field = document.getElementById("password");
        var repass_field = document.getElementById("repassword");

        if (pass_field.type === "password") {
            pass_field.type = "text";
        } else {
            pass_field.type = "password";
        }

        if (repass_field.type === "password") {
            repass_field.type = "text";
        } else {
            repass_field.type = "password";
        }
    }


    //____________________________________________________ passwod requirements
    const inputs = document.querySelectorAll("input");
    const form = document.getElementById("form");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const showPassword = document.getElementById("show-password");
    const matchPassword = document.getElementById("match");
    const submit = document.getElementById("submit");

    inputs.forEach((input) => {
      input.addEventListener("blur", (event) => {
        if (event.target.value) {
          input.classList.add("is-valid");
        } else {
          input.classList.remove("is-valid");
        }
      });
    });

    showPassword.addEventListener("click", (event) => {
      if (password.type == "password") {
        password.type = "text";
        confirmPassword.type = "text";
        showPassword.innerText = "hide";
        showPassword.setAttribute("aria-label", "hide password");
        showPassword.setAttribute("aria-checked", "true");
      } else {
        password.type = "password";
        confirmPassword.type = "password";
        showPassword.innerText = "show";
        showPassword.setAttribute("aria-label", "show password");
        showPassword.setAttribute("aria-checked", "false");
      }
    });

    const updateRequirement = (id, valid) => {
      const requirement = document.getElementById(id);

      if (valid) {
        requirement.classList.add("valid");
      } else {
        requirement.classList.remove("valid");
      }
    };

    password.addEventListener("input", (event) => {
      const value = event.target.value;

      updateRequirement("length", value.length >= 8);
      updateRequirement("lowercase", /[a-z]/.test(value));
      updateRequirement("uppercase", /[A-Z]/.test(value));
      updateRequirement("number", /\d/.test(value));
      updateRequirement("characters", /[#.?!@$%^&*-]/.test(value));
    });

    confirmPassword.addEventListener("blur", (event) => {
      const value = event.target.value;

      if (value.length && value != password.value) {
        matchPassword.classList.remove("hidden");
      } else {
        matchPassword.classList.add("hidden");
      }
    });

    confirmPassword.addEventListener("focus", (event) => {
      matchPassword.classList.add("hidden");
    });

    const handleFormValidation = () => {
      const value = password.value;
      const confirmValue = confirmPassword.value;

      if (
        value.length >= 8 &&
        /[a-z]/.test(value) &&
        /[A-Z]/.test(value) &&
        /\d/.test(value) &&
        /[#.?!@$%^&*-]/.test(value) &&
        value == confirmValue
      ) {
        submit.removeAttribute("disabled");
        return true;
      }

      submit.setAttribute("disabled", true);
      return false;
    };

    form.addEventListener("change", () => {
      handleFormValidation();
    });

    form.addEventListener("submit", (event) => {
      event.preventDefault();
      const validForm = handleFormValidation();

      if (!validForm) {
        return false;
      }

      alert("Form submitted");
    });

    </script>
@endpush
