@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/giver_jobs.css')}}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/user_location.css')}}">
@endpush
@section('dashbaord_content')

<!-- My Post -->


<div class="giver_jobs">
    <div class="giver_jobs_heading">
        <h3>Active Jobs</h3>
        <p>Your all jobs ar e view in one page.</p>
    </div>
</div>

<!-- ___________________________________ giver post start -->

<div class="jobs_card">
    <div class="blank-1"></div>
    <div class="cards">
        

    @if ($posts->isEmpty())
            <h2 class="no_post_msg">No Job Available</h2>
        @else

    @foreach ($posts as $post)
<!-- __________________________________________________ -->
        <div class="card">
            <div class="post_num_div">
                <p class="post_num">{{$loop->index + 1}}</p>
            </div>
            <div class="jobs_body">

                <div class="top_icon">
                    <i class="fa-solid fa-circle-info"></i>
                    <i onclick="showShareProfile('Ovie Rahman Sheikh')" class="fa-solid fa-share"></i>
                </div>

                <div class="job_heading">
                    <div class="giver_img">
                        @if(!empty($post->user->image))
                            <img src="{{ asset($post->user->image) }}" alt="">
                        @else
                            <img src="{{ asset('no_pro_img.png') }}" alt="Default Image">
                        @endif
                    </div>
                    <div class="job_title">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->user->name}}</p>
                        <p><i class="fa-solid fa-location-dot"></i>{{$post->user->address}}</p>

                    </div>
                </div>

                <div class="gen_amnt">
                    <p><i class="fa-solid fa-restroom"></i><Span>{{$post->gender}}</Span></p>
                    <p><i class="fa-solid fa-calendar"></i><span>{{$post->created_at->diffForHumans()}}</span></p>
                    <p><i class="fa-solid fa-bangladeshi-taka-sign"></i><span>{{$post->budget}}</span>/Month</p>
                </div>

                <div class="jobs_desc">
                    <p>{{$post->description}}</p>
                </div>

                <a href=""><button>{{$post->service->title}}</button></a>

                <div class="request_button">
                    <button onclick="show_cancel({{$post->id}})">Cancel</button>
                    <button onclick="show_map('{{ $post->user->location }}')">View Location</button>
                </div>

            </div>
        </div>
        <!-- __________________________________________________ -->
        @endforeach
    @endif

     
    
    </div>
    <div class="blank-2"></div>
</div>



<!-- ___________________________________ jobss end -->
<!-- view location start -->
    <div id="whole_map_section" class="whole_map_section">
        <div class="centered_map">
            <div class="map">
                <iframe id="loc_frame" src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="map_buttons">
                <button onclick="hide_map()" id="cancel" class="cancel hide_loc">Cancel</button>
            </div>
        </div>
    </div>    
<!-- view location end -->

<script>
    function checkGoogleMapsUrl(url) {
    // Check if it's an embed URL
    const islinkUrl = url.startsWith("https://maps.app.goo.gl/");
    
    // Check if it's a standard Google Maps URL
    const isStandardUrl = url.startsWith("https://www.google.com/maps/");

    if (islinkUrl) {
        console.log("This is an link URL.");
        return "link";
    } else if (isStandardUrl) {
        console.log("This is a standard Google Maps URL.");
        return "standard";
    } else {
        console.log("This is not a valid Google Maps URL.");
        return "invalid";
    }
}


    function show_map(location_link) {
        window.open(location_link, '_blank');
}

    function hide_map(){
        const map = document.getElementById("whole_map_section");
        map.style.display = "none";
    }
</script>

<!-- __________________________________ active job cancel div start -->
 <div id="cancel_div" class="cancel_div">
    <div class="centered_cancel">
    <i onclick="show_cancel()" class="fa-solid fa-circle-xmark"></i>
        <p class="heading">Cancel This job?</p>
        <div class="cancel_form">
            <form action="{{ route('enroledpost.cancel') }}" method="POST">
            @csrf
            @method('POST')
                <label for="">Leave a Reason:</label>
                <br>
                <input type="hidden" id="post_id" name="post_id">
                <textarea name="reason" id=""></textarea>
                <br>
                <input type="checkbox" name="checkbox" id=""><label for="">Are You Sure to Cancel This Job?</label>
                <div class="buttons">
                    <input type="reset" value="Clear">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
 </div>
<!-- __________________________________ active job cancel div end-->



<!-- My Post End -->

@endsection
@push('script')
<script>
    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };

  function show_cancel(post_id){
        const cancel_div = document.getElementById("cancel_div");
        const post_id_inp = document.getElementById("post_id");
        if (cancel_div.style.display === "none") {
            cancel_div.style.display = "flex";
            post_id_inp.value = post_id;
            } else {
                cancel_div.style.display = "none";
            }
        } 
        show_cancel();
</script>
@endpush
