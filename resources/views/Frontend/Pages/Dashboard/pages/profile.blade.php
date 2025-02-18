@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@section('dashbaord_content')


<!-- _____________________ update profile section start -->

@push('css')
    <link rel="stylesheet" href="{{url('Frontend/assets/css/update_profile.css')}}">
@endpush


<!-- ________________________ -->
<section class="profile">
    <h3>Profile Update</h3>

    <div class="comp_profile">
        <div class="progress_body">
            <p><span>70</span> % Complete</p>
            <div class="progress">
                <div class="progress-done" data-done="70"></div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-25">
            <div class="container">

                <div onclick="show_profile()" class="option_div">
                    <i class="fa-regular fa-circle-user"></i>
                    <div class="option_desc">
                        <h3>Personal Details</h3>
                        <p>Your Personal Information</p>
                    </div>
                </div>
                <hr>
                <div onclick="show_update_profile()" class="option_div">
                    <i class="fa-regular fa-id-card"></i>
                    <div class="option_desc">
                        <h3>Update Personal Details</h3>
                        <p>Your Personal Information</p>
                    </div>
                </div>
                
                @if(auth()->user()->account_type === 'care_taker')
                <hr>
                <div onclick="show_update_nominee()" class="option_div">
                    <i class="fa-solid fa-file-pen"></i>
                    <div class="option_desc">
                        <h3>Update Member Information</h3>
                        <p>Your Member Information</p>
                    </div>
                </div>
                @endif

            </div>
        </div>


        <!-- _________________________________ show account information start-->
         <div id="show_profile" class="col-75">

           <div class="container">
                   <div class="row">
                   <div class="col-50">
                       <h3>Personal Details</h3>

                       <div class="img_section">
                           <img src="{{ asset(auth()->user()->image) }}" alt="">
                       </div>


                       <label for="fname">Your Full Name</label>
                        <p class="acc_info">{{auth()->user()->name}}</p>

                       <label for="adr">Your Location</label>
                       <p class="acc_info">{{auth()->user()->location}}</p>


                       <div class="row">
                           <div class="col-50">
                               <label for="state">NID Number</label>
                               <p class="acc_info">{{auth()->user()->nid_number}}</p>
                           </div>
                           <div class="col-50">
                               <label for="zip">NID Picture</label>
                               <div class="acc_info"><img src="{{ asset(auth()->user()->nid_image) }}" alt=""></div>
                           </div>
                       </div>


                       <div class="row">
                           <div class="col-50">
                               <label>Gender</label>
                               <p class="acc_info">{{auth()->user()->gender}}</p>
                           </div>
                           @if(auth()->user()->account_type === 'care_giver')
                                <div class="col-50 price_service">
                                    <div class="block">
                                        <label for="zip">Select Your Service</label>
                                        
                                        @foreach($services as $ser)
                                            @if(auth()->user()->service == $ser->id)
                                                <p class="acc_info">{{$ser->title}}</p>
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                    <div class="block">
                                        <label for="zip">Your Asking Amount</label>
                                        <p class="acc_info">{{auth()->user()->budget}} BDT</p>
                                    </div>
                                </div>
                            @endif
                       </div>

                       <div class="row">
                           <div class="col-50">
                               <label for="email">Profile Headline</label>
                               <p class="acc_info">{{auth()->user()->profile_heading}}</p>
                           </div>
                       </div>
                       @if(auth()->user()->account_type === 'care_taker')
                        @foreach(auth()->user()->members as $member)
                        <!-- ______ show memeber div -->
                         <div class="profile_part">

                             <h4>Member {{$loop->index + 1}}</h4>

                            <div class="row">
                                <div class="col-50">
                                    <label for="fname">NID Holder's Name</label>
                                    <p class="acc_info">{{$member->nid_name}}</p>
                                </div>

                                <div class="col-50">
                                    <label for="fname">Address</label>
                                    <p class="acc_info">{{$member->address}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">NID Number</label>
                                    <p class="acc_info">{{$member->nid_number}}</p>
                                </div>
                                <div class="col-50">
                                    <label for="zip">NID Picture</label>
                                    <div class="acc_info"><img src="{{$member->nid_image}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                            <!-- ______ show memeber div -->
                        @endforeach
                        @endif

                   </div>
               </div>
                </form>
            </div>
        </div>
   <!-- _________________________________ show account information end-->

        <!-- _________________________________ update profile section start-->
        <div id="update_profile" class="col-75">

            <div class="container">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                    <div class="row">
                    <div class="col-50">
                        <h3>Personal Details</h3>



                        <div class="img_section">
                            <img src="{{ asset(auth()->user()->image) }}" alt="">
                            <span onclick="change_img_func()">Change Profile Image</span>
                        </div>

                        <input type="hidden" name="id" value="{{auth()->user()->id}}">

                        <label for="fname">Your Full Name</label>
                        <input type="text" id="fname" name="fullname"  value="{{auth()->user()->name}}">


                        <!-- _______________ location filter start -->
                        <div class="row">
                            <div class="col-50">
                                <label for="adr">Your Location <span>(Division)</span></label>
                                <select name="division" id="division"  value="{{auth()->user()->division}}">
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Dhaka">Chattogram</option>
                                    <option value="Dhaka">Barishal</option>
                                    <option value="Dhaka">Sylhet</option>
                                </select>
                            </div>
                            <div class="col-50">
                                <label for="adr">State</label>
                                <input type="text" name="state" id="" value="{{auth()->user()->state}}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label for="fname">City</label>
                                <input type="text" id="fname" name="city" value="{{auth()->user()->city}}">
                            </div>
                            <div class="col-50">
                                <label for="fname">Address</label>
                                <input type="text" id="fname" name="address" value="{{auth()->user()->address}}">
                            </div>
                        </div>


                        <!-- _______________ location filter end -->


                        <div class="row">
                            <div class="col-50">
                                <label for="state">NID Number</label>
                                <input type="text" id="state" name="nid_number"  value="{{auth()->user()->nid_number}}">
                            </div>
                            <div class="col-50">
                                <label for="zip">NID Picture</label>
                                <input type="file" id="zip" name="user_nid_img"  value="{{auth()->user()->nid_image}}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label>Gender</label>
                                <div class="boxed">
                                    <input type="radio" id="android" name="gender" value="male" value="{{auth()->user()->gender}}">
                                    <label for="android">Male</label>

                                    <input type="radio" id="ios" name="gender" value="female" value="{{auth()->user()->gender}}">
                                    <label for="ios">Female</label>
                                </div>
                            </div>

                            
                            @if(auth()->user()->account_type === 'care_giver')
                                <div class="col-50 price_service">
                                    <div class="block">
                                        <label for="zip">Select Your Service</label>
                                        <select name="service" id="catagory">
                                            <option value="" selected>Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="block">
                                        <label for="zip">Your Asking Amount</label>
                                        <input type="number" id="zip" name="asking_amount"  value="{{auth()->user()->budget}}">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-50">
                                <label for="email">Profile Headline <span class="describe">(Describe in 10 to 50 character.)</span></label>
                                <textarea name="headline" id="">{{auth()->user()->profile_heading}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>



                <input type="submit" value="Save and Continue" class="btn">

            </form>
        </div>
    </div>



<!-- _______ change profile img div start -->
<div id="change_img_div" class="change_img_div">
    <div class="change_img_centered_div">
        <i onclick="hide_upload()" class="fa-solid fa-circle-xmark"></i>

        <h3>Change Profile Image</h3>

        <form  action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
            <input type="file" name="profile_img" id="" required>
            <br>
            <input type="submit" value="Upload">
        </form>

    </div>
 </div>
 <!-- _________change profile img div end -->

 <!-- _________________________________ update profile section end-->



 <!-- _________________________________ update member section start-->
 <div id="update_nominee" class="col-75">

        <div class="container">

            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-50">
                        <h3>Add Family Member for Getting Service</h3>
                        <!-- _______________________________________________________ -->
                        <h4>Member 1</h4>

                        <input type="hidden" name="id" value="{{auth()->user()->id}}">

                        <div class="row">
                            <div class="col-50">
                                <label for="fname">NID Holder's Name</label>
                                <input type="text" id="fname" name="member_name" value="{{ old('member_name') }}">
                                <p class="error_msg">@error('member_name'){{$message}}@enderror</p>
                            </div>

                            <div class="col-50">
                                <label for="fname">Address</label>
                                <input type="text" id="fname" name="member_address" value="{{ old('member_address') }}">
                                <p class="error_msg">@error('member_address'){{$message}}@enderror</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label for="state">NID Number</label>
                                <input type="text" id="state" name="nid_number" value="{{ old('nid_number') }}">
                                <p class="error_msg">@error('nid_number'){{$message}}@enderror</p>
                            </div>
                            <div class="col-50">
                                <label for="zip">NID Picture</label>
                                <input type="file" id="zip" name="nid_img">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label for="fname">Select Relation</label>
                                <select name="relation" id="">
                                    <option value="" disable></option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Grand-Father">Grand Father</option>
                                    <option value="Grand-Mother">Grand Mother</option>
                                    <option value="Other">Other's</option>
                                </select>
                            </div>

                            <div class="col-50">

                            </div>
                        </div>


                        <!-- _______________________________________________________ -->


                    </div>
                </div>

                <input type="submit" value="Save and Continue" class="btn">

            </form>
            </div>


        </div>
         <!-- _________________________________ update member section end-->

    </div>

</section>


<!-- _____________________ update profile section end -->

@endsection
@push('script')
    <script>

        var profile_set = localStorage.getItem('profile_set');
        if(profile_set==1){
            console.log(profile_set);
            const show_profile = document.getElementById("show_profile");
            const update_profile = document.getElementById("update_profile");
            const update_nominee = document.getElementById("update_nominee");
            show_profile.style.display = "flex";
            update_profile.style.display = "none";
            update_nominee.style.display = "none";

        }else if(profile_set==2){
            console.log(profile_set);
            const show_profile = document.getElementById("show_profile");
            const update_profile = document.getElementById("update_profile");
            const update_nominee = document.getElementById("update_nominee");
            show_profile.style.display = "none";
            update_profile.style.display = "flex";
            update_nominee.style.display = "none";
        }else if(profile_set==3){
            console.log(profile_set);
            const show_profile = document.getElementById("show_profile");
            const update_profile = document.getElementById("update_profile");
            const update_nominee = document.getElementById("update_nominee");


            show_profile.style.display = "none";
            update_profile.style.display = "none";
            update_nominee.style.display = "flex";
        }

        const progress = document.querySelector('.progress-done');
        progress.style.width = progress.getAttribute('data-done') + '%';
        progress.style.opacity = 1;




        function show_profile(){
            localStorage.setItem('profile_set', 1);
            const show_profile = document.getElementById("show_profile");
        const update_profile = document.getElementById("update_profile");
        const update_nominee = document.getElementById("update_nominee");


            show_profile.style.display = "flex";
            update_profile.style.display = "none";
            update_nominee.style.display = "none";
        }


        function show_update_profile(){

            localStorage.setItem('profile_set', 2);
            const show_profile = document.getElementById("show_profile");
            const update_profile = document.getElementById("update_profile");
            const update_nominee = document.getElementById("update_nominee");


            show_profile.style.display = "none";
            update_profile.style.display = "flex";
            update_nominee.style.display = "none";
        }


        function show_update_nominee(){
            localStorage.setItem('profile_set', 3);

            const show_profile = document.getElementById("show_profile");
            const update_profile = document.getElementById("update_profile");
            const update_nominee = document.getElementById("update_nominee");


            show_profile.style.display = "none";
            update_profile.style.display = "none";
            update_nominee.style.display = "flex";
        }






        function change_img_func(){
            const acc = document.getElementById("change_img_div");
            acc.style.display = "flex";
        }
        function hide_upload(){
            const acc = document.getElementById("change_img_div");
            acc.style.display = "none";
        }


        function change_img_func(){
        const acc = document.getElementById("change_img_div");
        acc.style.display = "flex";
        }
        function hide_upload(){
            const acc = document.getElementById("change_img_div");
            acc.style.display = "none";
        }






    </script>
@endpush
