
  <!-- _________________________ side bar start -->
  @push('css')
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/side_bar.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/logout.css') }}">
    @endpush
        <!-- Dashboard -->


<div class="sidebar close">
  <div id="side_arrow" class="side_arrow">
    <i class="fa-solid fa-list"></i>
  </div>

  
  <ul class="side-nav-links">

    <li>
      <a href="{{route('dashboard')}}" style="background-color:{{ Route::is('dashboard') ? '#163a49' : '' }}">
        <i class='bx bx-home'></i>
        <span class="link_name">Dashboard</span>
      </a>
    </li>

    <li>
      <div class="icon-link" style="background-color:{{ Route::is('user.profile') ? '#163a49' : '' }}">
        <a href="{{route('user.profile')}}">
        <i class="fa-regular fa-user"></i>
          <span class="link_name">Profile</span>
        </a>
        <!-- <i class='bx bxs-chevron-down arrow'></i> -->
      </div>
      <!-- <ul class="sub-menu">
        <li><a class="link_name" href="#">Solutions</a></li>
        <li><a href="#">Payments API</a></li>
        <li><a href="#">Accounts APi</a></li>
        <li><a href="#">Finance API</a></li>
      </ul> -->
    </li>

    @if(auth()->user()->account_type === 'care_taker')
    <li>
      <div class="icon-link" style="background-color:{{ Route::is('post.index') ? '#163a49' : '' }}">
        <a href="{{ route('post.index')}}">
          <i class='bx bx-news'></i>
          <span class="link_name">My Posts</span>
        </a>
      </div>
    </li>
    <li>
      <div class="icon-link" style="background-color:{{ Route::is('taker_enrolled') ? '#163a49' : '' }}">
        <a href="{{ route('taker_enrolled')}}">
        <i class="fa-regular fa-calendar-check"></i>
          <span class="link_name">Enrolled Job</span>
        </a>
      </div>
    </li>
    @elseif(auth()->user()->account_type === 'care_giver')
    <li>
      <div class="icon-link" style="background-color:{{ Route::is('service.index') ? '#163a49' : '' }}">
        <a href="{{ route('service.index')}}">
        <i class="fa-solid fa-comment-dots"></i>
          <span class="link_name">Service Offer</span>
        </a>
      </div>
    </li>
    <li>
      <div class="icon-link" style="background-color:{{ Route::is('job.index') ? '#163a49' : '' }}">
        <a href="#">
          <i class='bx bx-news'></i>
          <span class="link_name">My Jobs</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
        <ul class="sub-menu">
          <li><a href="{{ route('job.index')}}">Accepted Job</a></li>
          <li><a href="{{ route('requested_job')}}">Requested Job</a></li>
      </ul>
    </li>
    @endif



    <li onclick="show_logout_func()">
      <a href="#">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span class="link_name">Logout</span>
      </a>
    </li>

    <li>
      <div class="profile-details">
        <div class="profile-content">
          <img src="{{url('Frontend/assets/img/logo.png')}}" alt="profileImg">
        </div>
        <div class="name-job">
          <div class="profile_name">Well<span>Care</span></div>
          <div class="job">Care at Your Doorstep</div>
        </div>
        <i id="side_arrow" class='bx bx-log-out' onclick="show_logout_func()"></i>
      </div>
    </li>
  </ul>

</div>

<!-- _________________________ side bar end -->





    <div class="logout_section">
        <div class="center_logout">
            <i onclick="close_logout_func()" class="fa-regular fa-circle-xmark"></i>
            <h3>Sure you want to log out?</h3>
            <p>This will end your session, and you’ll need to sign in again. Any unsaved changes may be lost. Stay logged in to keep working.</p>
            <div class="logout_button">
                <button onclick="close_logout_func()">No, Cancel</button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Yes, Confirm</button>
                </form>
            </div>
        </div>
    </div>





@push('script')
    <script>

        function show_logout_func(){
          let logout = document.querySelector(".logout_section");
          logout.style.display="flex";
        }
        function close_logout_func(){
          let logout = document.querySelector(".logout_section");
          logout.style.display="none";
        }



        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
            console.log('clicked');
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");
        sidebar.classList.remove("close");
        let sidebarBtn = document.querySelector(".side_arrow");
        sidebarBtn.addEventListener("click", () => {
            console.log('clicked');
            sidebar.classList.toggle("close");
        });


        // ________________________ mobile side bar
        function show_mob_sidebar(){
          let sidebar = document.querySelector(".sidebar");
          sidebar.style.display="flex";
          sidebar.classList.remove("close");
        }

        // _________________ media query
        function adjustClassesBasedOnScreenSize() {
        const screenWidth = window.innerWidth;
        const sidebar = document.querySelector(".sidebar");

          if (screenWidth < 900) {
              sidebar.classList.add("close"); // Explicitly add the "close" class
          } else {
              sidebar.classList.remove("close"); // Explicitly remove the "close" class
          }
        }

        // Run the function initially
        adjustClassesBasedOnScreenSize();

        // Listen for window resize events with debounce for better performance
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(adjustClassesBasedOnScreenSize, 200);
        });


    </script>
    <script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
@endpush
