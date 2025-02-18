@extends('Frontend.Pages.Dashboard.app')

@section('title', 'Dashboard')
@section('dashbaord_content')


@push('css')
    <link rel="stylesheet" href="{{url('Frontend/assets/css/giver_jobs.css')}}">
    <link rel="stylesheet" href="{{url('Frontend/assets/css/view_profile.css')}}">
@endpush()



<!-- ========================================== TAKER DEFAULT DASH BOARD POST START -->
<div class="giver_jobs">
    <div class="giver_jobs_heading">
        <h3>Care Giver Jobs</h3>
        <p>Find the perfect care recipient that matches your skills and expertise.</p>
    </div>
</div>

<div class="jobs_card">
    <div class="blank-1"></div>
    <div class="cards">

<!-- giver all posts which showing in the taker dashboard -->


        @if ($all_post->isEmpty())
            <h2 class="no_post_msg">No Post Available</h2>
        @else
            
        @foreach ($all_post as $post)
 <!-- __________________________________________________ -->
            @if($post->taken_id == null || $post->taken_id == auth()->id())
                <div class="card">
                    <div class="jobs_body">
                        <div class="top_icon">
                            <a href=""><i class="fa-solid fa-circle-info"></i></a>
                            <a href=""><i class="fa-solid fa-share"></i></a>
                        </div>

                    <div class="card_section">
                        <div class="job_heading">
                            <div class="giver_img">
                                <img src="{{ asset($post->user->image) }}" alt="">
                            </div>
                            <div class="job_title">
                                <h3>{{$post->title}}</h3>
                                <p>{{$post->user->name}}</p>
                                <p><i class="fa-solid fa-location-dot"></i>{{$post->user->address}}</p>
                                <p><i class="fa-regular fa-clock"></i>{{$post->start_time}} - {{$post->end_time}}</p>
                                <ul>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="gen_amnt">
                            <p><i class="fa-solid fa-restroom"></i><Span>{{$post->gender}}</Span></p>
                            <p><i class="fa-solid fa-bangladeshi-taka-sign"></i><span>{{$post->budget}}</span></p>
                        </div>

                        <div class="jobs_desc">
                            <p>{{$post->description}}</p>
                        </div>

                        <button>{{$post->service->title}}</button>
                    </div>
                        
                        @if ($post->taken_id === auth()->id())
                        <div class="accept_button">
                            <button class="disabled">Accepted</button>
                        </div>
                        @else
                        <div class="accept_button">
                            <button onclick="show_accept({{$post->budget}},{{$post->id}},{{$post->user_id}})">Accept This Request</button>
                        </div>
                        @endif



                        <div class="bottom_icon">
                            <div class="ago">
                                <p><i class="fa-solid fa-calendar-days"></i><span>{{$post->created_at->diffForHumans()}}</span></p>
                            </div>
                            <div class="view">
                                <p><i class="fa-solid fa-eye"></i><span>322</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
           
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
                <img src="https://fdopportunities.com/wp-content/uploads/2019/12/fdo-bsherman-480x480.jpg" alt="">
            </div>
            <h2>Mr. Abul Kashem Miah <span><i class="fa-solid fa-circle-check"></i></span></h2>
            <p><i class="fa-solid fa-location-dot"></i><span>Mohakhali, Dohs, Dhaka 1207</span></p>
            <p>Experienced and Professional care taker.</p>
            <p><i class="fa-solid fa-star-half-stroke"></i><span>0</span>(<span>0</span>) reviews</p>
            <div class="summery_box">
                <p><i class="fa-regular fa-credit-card"></i> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            <span class="amount">7000</span>/Service</p>
            <p><i class="fa-solid fa-link"></i> Joined <span>8 September 2024</span></p>
            </div>
        </div>
    </div>
 </section>
<!-- ===================================== view profile end -->






<!-- ___________________________________ Accept div start -->
<div id="accept_div" class="accept_div">
    <div class="acc_centered_div">
        <i onclick="hide_accept()" class="fa-solid fa-circle-xmark"></i>
        <h2>Accept This Job</h2>
        <div class="fee_desc">
            <div class="fee_part">
            <i class="fa-solid fa-circle-info"></i>
                <p class="fee1">Advance Fee : <span>50</span>%</p>
                <p id="adv_budget" class="fee2"></p>
                <p class="fee3">Advance payment before starting work.</p>
            </div>
            <div class="fee_part">
            <i class="fa-solid fa-circle-info"></i>
                <p class="fee1">After Salary Fee : <span>50</span>%</p>
                <p id="after_budget" class="fee2"></p>
                <p class="fee3">After getting the salary from Client.</p>
            </div>
        </div>

        <form action="{{ route('post_enrolled') }}" method="POST">
            @csrf
            <div class="acc_text">
                <div class="text_part check">
                    <input type="checkbox" id="vehicle1" name="checkbox" value="checked" required>
                    
                    <input type="hidden" id="post_id" name="post_id">
                    <input type="hidden" id="taker_id" name="taker_id">
                </div>
                <div class="text_part">
                    <p>By applying for this post, I agree to pay the mentioned percentage (either 50% or 60%) to the website after securing the job. 
                        Failure to make the payment within the stipulated time frame may result in penalties or restrictions on future applications.</p>
                </div>
            </div>
            <input type="submit" value="Confirm">
        </form>
    </div>
 </div>

<!-- ___________________________________ Accept div end -->




<!-- ___________________________________ Accepted div start -->
<div id="accepted_div" class="accepted_div">
    <div class="accepted_centered_div">
        <i onclick="hide_done()" class="fa-solid fa-circle-xmark"></i>

        <h2>Congratulations!</h2>

        <p>You get the job of “Looking for a Caring Maid for Daily Assistance.</p>

        <button onclick="hide_done()">Close</button>
    </div>
 </div>
<!-- ___________________________________ Accepted div end -->





@endsection
@push('script')
    <script>
        function show_accept(budget, post_id, taker_id){
            const acc = document.getElementById("accept_div");
            const adv_budget = document.getElementById("adv_budget");
            const after_budget = document.getElementById("after_budget");

            const post_id_inp = document.getElementById("post_id");
            const taker_id_inp = document.getElementById("taker_id");
            post_id_inp.value = post_id;
            taker_id_inp.value = taker_id;
            
            adv_budget.innerText =  budget/2;
            after_budget.innerText =  budget/2;
            acc.style.display = "flex";
        }

        function hide_accept(){
            const acc = document.getElementById("accept_div");
            acc.style.display = "none";

        }
        function hide_done(){   
            const acc = document.getElementById("accepted_div");
            acc.style.display = "none";
        }
    </script>
@endpush
