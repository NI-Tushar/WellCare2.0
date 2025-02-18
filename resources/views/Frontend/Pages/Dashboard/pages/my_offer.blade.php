@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/giver_jobs.css')}}">
@endpush
@section('dashbaord_content')


<!-- My service request start -->

    <div class="jobs_heading">
        <div class="giver_jobs_heading">
            <h3>Service Requests</h3>
            <p>View your Service Request from CareTaker</p>
        </div>
    </div>


    <div class="jobs_card">
        <div class="blank-1"></div>
            <div class="cards">


        @if ($my_offer->isEmpty())
            <h2 class="no_post_msg">No Service Offer</h2>
        @else

        @foreach ($my_offer as $offer)
         <!-- __________________________________________________ -->
         <div class="card">
            <form action="{{ route('accept_offer') }}" method="POST">
            @csrf
            @method('POST')
                    <div class="jobs_body">
                        <div class="top_icon">
                            <a href=""><i class="fa-solid fa-circle-info"></i></a>
                            <a href=""><i class="fa-solid fa-share"></i></a>
                        </div>

                        <div class="job_heading">
                            <div class="giver_img">
                                <img src="{{ asset($offer->user->image)}}" alt="">
                            </div>
                            <div class="job_title">
                                <h3>{{$offer->service_title}}</h3>
                                <p>{{$offer->user->name}}</p>
                                <p><i class="fa-solid fa-location-dot"></i>{{$offer->user->address}}</p>
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
                            <p><i class="fa-solid fa-restroom"></i><Span>{{$offer->gender}}</Span></p>
                            <p><i class="fa-solid fa-bangladeshi-taka-sign"></i><span>{{$offer->budget}}</span></p>
                            <p><i class="fa-regular fa-clock"></i>{{$offer->start_time}} - {{$offer->end_time}}</p>
                        </div>

                        <div class="jobs_desc">
                            <p>{{$offer->description}}</p>
                        </div>

                        @foreach($services as $ser)
                            @if($ser->id == $offer->service)
                                <button>{{$ser->title}}</button>
                            @endif
                        @endforeach

                        <input type="hidden" name="taker_id" value="{{$offer->taker_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">


                        <div class="accept_button">
                            @if($offer->is_accepted == true)
                                <button class="disabled">Offer Accepted</button>
                            @else
                                <button type="submit">Accept This Request</button>
                            @endif

                        </div>
    



                        <div class="bottom_icon">
                            <div class="ago">
                                <p><i class="fa-solid fa-calendar-days"></i><span>{{$offer->created_at->diffForHumans()}}</span></p>
                            </div>
                            <div class="view">
                                <p></p>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
        <!-- __________________________________________________ -->
        @endforeach
    @endif

    </div>
    <div class="blank-2"></div>
</div>




    


<!-- My service request end -->

@endsection
@push('script')
<script>

</script>
@endpush