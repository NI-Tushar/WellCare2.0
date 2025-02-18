@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/taker_enrolled.css')}}">
@endpush
@section('dashbaord_content')

<!-- My Post -->


<div class="giver_jobs">
    <div class="giver_jobs_heading">
        <h3>Enrolled Giver</h3>
        <p>View Your Enrolled Job with Care Giver's</p>
    </div>
</div>

<!-- ___________________________________ enrolled job start -->
 <div class="enroll_container">
        <div class="expandable-list">


            @if ($jobs->isEmpty())
                <h2 class="no_post_msg">No Active Job</h2>
            @else
            
            @foreach ($jobs as $job)
         <!-- ____________________ -->
        <div class="expandable-item">
          <div class="expandable-header">
            
          <div class="collapsible-header">
              <div class="enr_img">
                  @if(!empty($job->user->image))
                    <img src="{{ asset($job->user->image) }}" alt="">
                  @else
                    <img src="{{ asset('no_pro_img.png') }}" alt="Default Image">
                  @endif
                </div>
              <div class="header_info">
                <div class="section_part">
                    <label>Name</label>
                    <p>{{$job->user->name}}</p>
                </div>
                <div class="section_part">
                    <label>Gender</label>
                    <p>{{$job->user->gender}}</p>
                </div>      
                <div class="section_part">
                    <label>Budget</label> 
                    <p><span>{{$job->user->budget}}</span> /Service</p>
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
                    <p>{{$job->user->address}}</p>
                </div>
                <div class="drop_section">
                    <label>Description:</label>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente pariatur architecto sequi impedit excepturi similique,</p>
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





<!-- ___________________________________ enrolled job end -->

@endsection
@push('script')
<script>
    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };
</script>
@endpush