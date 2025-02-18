@php
    $configure = App\Models\Configuration::latest()->first();
@endphp
@extends('Frontend.app')
@section('title', 'Home')
@section('app-content')

@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/contact_page.css') }}">
@endpush
<!-- __________________________________________________________________ CONTACT SECTION START -->
<section class="contact_section">
  <div class="centered_banner">
    <div class="banner">
      <div class="banner_text">
        <h1>Get in Touch with Us</h1>
        <p>We’re here to assist you with any questions or concerns. Whether you need support with your loan application or have inquiries about our services, feel free to reach out. Our team is dedicated to providing prompt and helpful responses to ensure your needs are met.</p>
        <a href=""><button>Book a Meeting</button></a>
      </div>
    </div>
    <div class="banner">
      <div class="banner_img">
        <img src="{{url('Frontend/assets/img/contact/poster_img.png')}}" alt="">
      </div>
    </div>
  </div>
</section>

<!-- ________________________________ send email -->
<section class="contact_section email_section">
  <div class="centered_banner">
    <div class="banner">
      <div class="email_side">
        <img src="{{url('Frontend/assets/img/contact/contact_img.png')}}" alt="">
        <p>FinWise makes loan applications easy. Submit your form, connect with banks and corporations, and track your loan status effortlessly. Quick approvals and tailored solutions to help you reach your financial goals.</p>
      </div>
    </div>
    <div class="banner">
      <div class="email_form">
        <form action="">
          <label for="">Your name</label>
          <br>
          <input type="text">
          <br>
          <label for="">Phone Number</label>
          <br>
          <input type="text">
          <br>
          <label for="">Email Address</label>
          <br>
          <input type="email" name="" id="">
          <div class="submit_btn">
            <input type="submit" value="Send">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- __________________________________________________________________ CONTACT SECTION END -->


@endsection
