@extends('Frontend.app')
@section('title', 'Register')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/sign_up.css')}}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/logo.css')}}">
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

            <div class="option_div">
                <h3>Create an account</h3>
                <p>Select your user type</p>

                <div class="option_form">
                    <form action="{{ route('register.account_type') }}" method="POST">
                        @csrf
                        @method('POST')
                    <div class="option">

                        <div class="radio_part">
                            <input onclick="option_func()" type="radio" id="acc_type" name="acc_type" value="care_giver">
                            <img src="{{ asset('Frontend/assets/img/sign_up/opt1.png') }}" alt="">
                            <label for="html">Care Giver</label>
                        </div>

                        <div class="radio_part">
                            <input onclick="option_func()" type="radio" id="acc_type" name="acc_type" value="care_taker">
                            <img src="{{ asset('Frontend/assets/img/sign_up/opt2.png')}}" alt="">
                            <label for="css">Care Taker</label>
                        </div>

                    </div>

                    <div class="submit_btn">
                        <input type="submit" id="next_btn" class="disable" value="Next">
                    </div>

                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- Register Page -->

@endsection

@push('script')
<script>
    function option_func(){
        const next_btn = document.querySelector('#next_btn');
        next_btn.classList.remove("disable");

        // const next_link = document.querySelector('#next_link');
        // const selectedOption = document.querySelector('input[name="acc_type"]:checked').value;
        // next_link.href = "{{ url('/user/user-id/pass/sign-up') }}" + "?acc_type=" + selectedOption;
    }
</script>
@endpush
