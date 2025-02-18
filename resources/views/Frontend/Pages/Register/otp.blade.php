@extends('Frontend.app')
@section('title', 'Register')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/sign_up_user_cred.css')}}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/otp.css')}}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/logo.css')}}">
@endpush
@section('app-content')

{{-- @php

    $otp = session()->get('otp');
    echo "<script>alert('Your OTP is: $otp');</script>";

    $user_number = session()->get('sign_up_user_number');

@endphp --}}

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


                <div class="otp_section">
                    <h4>Enter OTP - {{ $otp }}</h4>
                    <form id="otp_form" action="{{ route('register.OTPVarification') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="otp-input">
                            <input type="hidden" name="user_id" value="{{ $user_id}}">
                            <input name="dig1" type="number" min="0" max="9" required>
                            <input name="dig2" type="number" min="0" max="9" required>
                            <input name="dig3" type="number" min="0" max="9" required>
                            <input name="dig4" type="number" min="0" max="9" required>
                        </div>

                <div class="varify_button">
                    @error('otp')
                        <span style="color:red;font-weight:700;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="varify_button">
                    <a href="" id="resend_btn" class="resend_btn">Resend</a>
                </div>

                    <div class="otp_text">
                        <p>You have <span id="time" class="time"></span> Sec Only to put OTP number.</p>
                        <p>You will get a otp via your phone number.
                        {{-- <span>{{$user_number}}</span> <a href="">Change</a></p> --}}
                    </div>
                </div>



                <div class="next_section">
                    <div class="step"><p>Step <span>1</span>/3</p></div>
                    <div class="next"><input id="disabled" class="disabled" type="submit" value="Next"></div>
                </div>

                </form>
            </div>

        </div>
    </section>
    <!-- Register Page -->

@endsection

@push('script')
<script>


    // ____________________________________ pass otp input after fillup one by one
    const inputs = document.querySelectorAll(".otp-input input");
    inputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
        if (e.target.value.length > 1) {
          e.target.value = e.target.value.slice(0, 1);
        }
        if (e.target.value.length === 1) {
          if (index < inputs.length - 1) {
            inputs[index + 1].focus();
          }
        }
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !e.target.value) {
          if (index > 0) {
            inputs[index - 1].focus();
          }
        }
        if (e.key === "e") {
          e.preventDefault();
        }
      });
    });



    // __________________________________ otp timer
    const timerDisplay = document.getElementById('time');
    const resend_btn = document.getElementById('resend_btn');

    let timeLeft = 120; // 2 minutes in seconds
    let timerId;
    let canResend = true;
    function startTimer() {
        timerId = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerId);
                resend_btn.style.display="flex";
                timerDisplay.textContent = "Code expired";
                timerDisplay.classList.add('expired');
                inputs.forEach(input => input.disabled = true);
                canResend = false;
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerDisplay.textContent = `(${minutes}:${seconds.toString().padStart(2, '0')})`;
                timeLeft--;
            }
        }, 100);
    }
    startTimer();




        // _______________________________ checking all otp field
        const form = document.getElementById('otp_form');
        const next_btn = document.getElementById('disabled');

        function checkForm() {
            console.log('checkform');
            const inputs = form.querySelectorAll('input');
            let allFilled = false;
            inputs.forEach(input => {
                if (input.value === '') {
                    allFilled = false;
                }
            });

            if(allFilled = true){
                next_btn.classList.remove('disabled');
            }
        }

        form.addEventListener('input', checkForm);









    // _________________________________ verify otp
    function verifyOTP() {

            const otp = Array.from(inputs).map(input => input.value).join('');
            if (otp.length === 4) {
                if (timeLeft > 0) {
                    alert(`Verifying OTP: ${otp}`);

                } else {
                    alert('OTP has expired. Please request a new one.');
                }
            } else {
                alert('Please enter a 4-digit OTP');
            }
        }








    </script>
@endpush
