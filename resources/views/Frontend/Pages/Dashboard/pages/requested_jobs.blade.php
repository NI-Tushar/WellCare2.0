@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/taker_enrolled.css')}}">
@endpush
@section('dashbaord_content')

<!-- My Post -->
<!-- ____________________________________ REQUESTED JOB LIST START -->
<div class="giver_jobs">
    <div class="giver_jobs_heading">
        <h3>Requested Jobs</h3>
        <p>Your all Requested active Jobs</p>
    </div>
</div>

<div class="enroll_container">
        <div class="expandable-list">
            @if ($accepted_requests->isEmpty())
                <h2 class="no_post_msg">No Requested Active Job</h2>
            @else
            
            @foreach ($accepted_requests as $reqjob)
         <!-- ____________________ -->
        <div class="expandable-item">
          <div class="expandable-header">
            
          <div class="collapsible-header">
              <div class="enr_img">
                  <img src="{{ asset($reqjob->user->image) }}" alt="">
                </div>
              <div class="header_info">
                <div class="section_part">
                    <label>Name</label>
                    <p>{{$reqjob->user->name}}</p>
                </div>
                <div class="section_part">
                    <label>Gender</label>
                    <p>{{$reqjob->user->gender}}</p>
                </div>      
                <div class="section_part">
                    <label>Budget</label> 
                    <p><span>{{$reqjob->budget}}</span> /Service</p>
                </div>            
              </div>
              <div class="section_part">
                  <div class="down_icon" onclick="toggle('<?php echo $loop->index; ?>')">
                      <i class="fa-solid fa-sort"></i>
                  </div>
              </div>

          </div>    
          </div>
          <div class="expandable-body">
            <div id="drop_text" class="drop_text">
                <div class="drop_section">
                    <label>Address:</label>
                    <p>{{$reqjob->user->address}}</p>
                </div>
                <div class="drop_section">
                    <label>Description:</label>
                    <p>{{$reqjob->description}}</p>
                </div>
                <div class="drop_section">
                    <p><span>4 years</span><br>experience</p>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                </div>
            </div>
            <div class="expand_button">
                <button>Cancel Job</button>
            </div>
          </div>

        </div>
        <!-- ____________________ -->
        @endforeach
        @endif
     </div>
</div>

<!-- ____________________________________ REQUESTED JOB LIST END-->








@endsection
@push('script')
<script>
    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };
</script>
@endpush
