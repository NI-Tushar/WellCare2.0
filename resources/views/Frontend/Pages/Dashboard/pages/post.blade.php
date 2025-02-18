@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Post | WellCare')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/taker_my_post.css')}}">
@endpush
@section('dashbaord_content')
@extends('Frontend.includes.create_post_btn')

<!-- My Post -->



    <div class="jobs_heading">
        <div class="giver_jobs_heading">
            <h3>My All Posts</h3>
            <p>View your applied care services and personalized care details.</p>
        </div>
    </div>



    <!--All Post -->

    <div class="giver_jobs_card">
        <div class="blank-1"></div>
        <div class="cards">

            @if ($posts->isEmpty())
                <h2 class="no_post_msg">No Post Yet</h2>
            @else
            
            @foreach ($posts as $post)
            <!--Single Post-->
            <div class="s_card">
                <div class="jobs_body">

                    <div class="top_icon">
                        <a href=""><i class="fa-solid fa-circle-info"></i></a>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                    <div class="card_section">

                        <div class="job_heading">
                            <div class="giver_img">
                            <!-- <img src="{{url('avatar.png')}}" alt=""> -->
                            <img src="{{ asset(auth()->user()->image) }}" alt="">
                        </div>
                        <div class="job_title">
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->user->name}}</p>
                            <p><i class="fa-solid fa-location-dot"></i>{{$post->user->address}}</p>
                            <p><i class="fa-regular fa-clock"></i>{{$post->start_time}} -{{$post->end_time}}</p>
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
                        <p><i class="fa-solid fa-restroom"></i><Span>{{$post->user->gender}}</Span></p>
                        <p><i class="fa-solid fa-bangladeshi-taka-sign"></i><span>{{$post->budget}}</span></p>
                    </div>
                    
                    <div class="jobs_desc">
                        <p>{{$post->description}}</p>
                    </div>
                    
                    <a href="#"><button>{{$post->service->title}}</button></a>
                </div>
                    
                    
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
        <!--Single Post End-->
        @endforeach
        @endif




<x-frontend.create-post-component :services="$services" :members="$members" />





<!-- My Post End -->

@endsection
@push('script')
<script>

</script>
@endpush
