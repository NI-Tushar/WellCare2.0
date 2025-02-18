@extends('Frontend.Pages.Dashboard.app')

@section('title', 'Dashboard')
@section('dashbaord_content')
@extends('Frontend.includes.create_post_btn')

@push('css')
    <link rel="stylesheet" href="{{url('Frontend/assets/css/taker_posts.css')}}">
    <link rel="stylesheet" href="{{url('Frontend/assets/css/view_profile.css')}}">
@endpush()



<!-- ========================================== TAKER DEFAULT DASH BOARD POST START -->
<div class="giver_jobs">
    <div class="giver_jobs_heading">
        <h3>All Care Taker</h3>
        <p>View your applied care services and personalized care details.</p>
    </div>
</div>

<div class="jobs_card">
    <div class="blank-1"></div>
    <div class="cards">

<!-- giver all posts which showing in the taker dashboard -->

        @if ($giver_acc->isEmpty())
            <h2 class="no_post_msg">No Post Yet</h2>
        @else
            
        @foreach ($giver_acc as $giver_ac)

 <!-- __________________________________________________ -->
        <div class="card">
            <div class="jobs_body">

                <div class="top_icon">
                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                    <a href=""><i class="fa-solid fa-share"></i></a>
                </div>

            <div class="card_section">
                <div class="job_heading">
                    <div class="giver_img">
                        <img src="{{ asset($giver_ac->image) }}" alt="">
                    </div>
                    <div class="job_title">
                        <div class="name"><h3>{{$giver_ac->name}}</h3><p><i class="fa-solid fa-circle"></i>Online</p></div>

                        <p><i class="fa-solid fa-location-dot"></i>{{$giver_ac->address}}</p>
                        <ul>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p class="experiance">4 Year Experienced</p>
                    </div>
                </div>

                <div class="gen_amnt">
                    <p><i class="fa-solid fa-restroom"></i><Span>{{$giver_ac->gender}}</Span></p>
                    <p><i class="fa-solid fa-bangladeshi-taka-sign"></i><span>{{$giver_ac->budget}}</span>/<span class="price_by">Service</span></p>
                </div>

                <div class="jobs_desc">
                    <p>{{$giver_ac->profile_heading}}</p>
                </div>
                
                @foreach($services as $ser)
                    @if($giver_ac->service == $ser->id)
                    <a href="#"><button>{{$ser->title}}</button></a>
                    @endif
                @endforeach
            </div>
                
                <div class="accept_button">
                    <button class="active"   onclick="showProfile('{{ $giver_ac->image }}', '{{ $giver_ac->name }}', '{{ $giver_ac->address }}', '{{ $giver_ac->budget }}', '{{ $giver_ac->created_at->format('d F Y') }}')">View Profile</button>
                    <!-- _______________ checking if taker id is exist or in service offer table to show hire button or not -->
                    @if($offers->isNotEmpty())
                        @php
                            $offerExists = false;
                        @endphp

                        @foreach($offers as $offer)
                            @if($offer->giver_id == $giver_ac->id && $offer->taker_id == auth()->id())
                                <button class="non-active offer_sent">Offer Sent</button>
                                @php
                                    $offerExists = true;
                                @endphp
                                @break
                            @endif
                        @endforeach

                        @if(!$offerExists)
                            <button class="non-active" onclick="showServiceOffer({{ $giver_ac->id }})">Hire For Service</button>
                        @endif
                    @else
                        <button class="non-active" onclick="showServiceOffer({{ $giver_ac->id }})">Hire For Service</button>
                    @endif
                     <!-- _______________ -->

                </div>

            </div>
        </div>
        <!-- __________________________________________________ -->
        @endforeach
        @endif



    </div>
    <div class="blank-2"></div>
</div>

<!-- ========================================== TAKER DEFAULT DASH BOARD POST START -->











<!-- ===================================== view profile start -->

 <section id="view_profile_section" class="view_profile_section">
    <div class="centered_view_profile">
        <i onclick="showProfile()" class="fa-solid fa-circle-xmark"></i>
        <div class="profile_body">
            <div class="profile_img">
                <img id="img_elem" src="{{ asset('avatar.png') }}" alt="">
            </div>
            <h2><span id="name_elem"></span> <span><i class="fa-solid fa-circle-check"></i></span></h2>
            <p><i class="fa-solid fa-location-dot"></i><span id="address_elem"></span></p>
            <p>Experienced and Professional care taker.</p>
            <p><i class="fa-solid fa-star-half-stroke"></i><span>0</span>(<span>0</span>) reviews</p>
            <div class="summery_box">
                <p><i class="fa-regular fa-credit-card"></i> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            <span id="amount_elem" class="amount"></span>/Service</p>
            <p><i class="fa-solid fa-link"></i> Joined <span id="date_elem"></span></p>
            </div>
        </div>
    </div>
 </section>
<!-- ===================================== view profile end -->



<!-- ___________________________________ Service offer Details -->
 <div id="service_offer_div" class="service_offer_div">
    <div class="centered_service">
        <i onclick="showServiceOffer()" class="fa-solid fa-circle-xmark"></i>
        <!-- _____________________ service form body start -->
        <div class="service_container">
            <h3>Service Offer Details</h3>
            <form action="{{ route('service.offer') }}" method="POST">
            @csrf
            @method('POST')

                <div class="row">
                 <div class="col-50">

                 <input type="hidden" name="giver_id" id="giver_id">


                    <div class="row">
                        <div class="col-50">
                            <label for="fname">Service Title <span>*</span></label>
                            <input type="text" id="fname" name="service_title" placeholder="Type here (Max Character: 120)" value="{{ old('service_title') }}">
                            <p class="error_msg">@error('service_title'){{$message}}@enderror</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-50">
                            <label for="adr">Services Category <span>*</span></label>
                            <select name="service" id="cars">
                                <option value="" selected>Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            <p class="error_msg">@error('service'){{$message}}@enderror</p>
                        </div>
                        <div class="col-50">
                            <label for="fname">Amount <span>*</span></label>
                            <input type="number" id="fname" name="budget" placeholder="0" value="{{ old('budget') }}">
                            <p class="error_msg">@error('budget'){{$message}}@enderror</p>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-50">
                            <label for="state">Starting Date <span>*</span></label>
                            <input type="date" id="state" name="date" value="{{ old('date') }}">
                            <p class="error_msg">@error('date'){{$message}}@enderror</p>
                        </div>
                        <div class="col-50 offer_time">
                            <div class="block">
                                <label for="zip">Start Time <span>*</span></label>
                                <input type="time" id="zip" name="start_time" placeholder="10001" value="{{ old('start_time') }}">
                                <p class="error_msg">@error('start_time'){{$message}}@enderror</p>
                            </div>
                            <div class="block">
                                <label for="zip">End Time <span>*</span></label>
                                <input type="time" id="zip" name="end_time" placeholder="10001" value="{{ old('end_time') }}">
                                <p class="error_msg">@error('End_time'){{$message}}@enderror</p>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-50">
                            <label for="adr">Service Provider Gender <span>*</span></label>
                            <select name="gender" id="cars">
                                <option value="any">Any</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <p class="error_msg">@error('gender'){{$message}}@enderror</p>
                        </div>
                        <div class="col-50">
                            <label for="adr">Care For <span>*</span></label>
                            <select name="carefor" id="cars">
                                <option value="" selected>Select Family Member</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->relation }}</option>
                                @endforeach
                            </select>
                            <p class="error_msg">@error('carefor'){{$message}}@enderror</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-50">
                            <label for="email">Additional Comments <span>*</span></label>
                            <textarea name="description" id="" placeholder="Typer here...">{{ old('description') }}</textarea>
                            <p class="error_msg">@error('description'){{$message}}@enderror</p>
                        </div>
                    </div>

                </div>
                </div>

                <div class="row">
                    <div class="col-50">
                        <input type="submit" value="Send Offer" class="btn">
                    </div>
                </div>


                </div>
            </div>



            </form>
            </div>

        <!-- _____________________ service form body end -->
    </div>
 </div>

 <x-frontend.create-post-component :services="$services" :members="$members" />


 <script>
    var service_div = localStorage.getItem('service_offer');
    var div = document.getElementById("service_offer_div");
    if(service_div == 1){
        div.style.display = "flex";
    }else{
        div.style.display = "none";
    }
    function showServiceOffer(giver_id) {
        var x = document.getElementById("service_offer_div");
        var giver_id_inp = document.getElementById("giver_id");
        if (x.style.display === "none") {
            x.style.display = "flex";
            giver_id_inp.value=giver_id;
            localStorage.setItem('service_offer', 1);
        } else {
            x.style.display = "none";
            localStorage.setItem('service_offer', 0);
        }
    }

    // __________________________

    function showProfile(image, name, address, budget, created_at) {
        var p = document.getElementById("view_profile_section");
        // ________ elements id
        var img_elem = document.getElementById("img_elem");
        var imgPath = "{{ asset('') }}" + image; // Concatenate asset path with the image parameter
        img_elem.src = imgPath;

        var name_elem = document.getElementById("name_elem");
        var address_elem = document.getElementById("address_elem");
        var amount_elem = document.getElementById("amount_elem");
        var date_elem = document.getElementById("date_elem");

        img_elem.textContent = image;

        name_elem.textContent = name;
        address_elem.textContent = address;
        amount_elem.textContent = budget;
        date_elem.textContent = created_at;
        // ________ 
        if (p.style.display === "none") {
            p.style.display = "flex";
        } else {
            p.style.display = "none";
        }
    }
    showProfile();
</script>
<!-- ___________________________________ Accepted div end -->


@endsection
@push('script')
    <script>

    </script>
@endpush
