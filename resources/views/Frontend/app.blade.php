@php
    $configure = App\Models\Configuration::latest()->first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="Web site created using create-react-app"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
<body>

<link rel="stylesheet" href="{{ asset('Frontend/assets/css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/logo.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/footer.css') }}">

<section class="nav_section">

    <div class="wrapper">
        <div class='nav'>
        <input type="checkbox" id="show-search"/>
        <input type="checkbox" id="show-menu"/>
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="nav-content">
        <a href="{{ route('home') }}">
            <div class="logo">
            <img src="{{ asset('Frontend/assets/img/logo.png') }}" alt="">
                <div class="logo_text">
                    <h1>Well<span>Care</span></h1>
                    <p>Care at Your Doorstep</p>
                </div>
            </div>
        </a>
        <ul class="links">
            <!-- <li><a class='active'  href="{{ route('home') }}">Home</a></li> -->
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('pro.plane') }}">Pro-Care Giverr</a></li>
            <li><a href="{{ route('pro.plane') }}">Pro-Care Taker</a></li>
            <!-- <li>
            <a href="#" class="desktop-link">Services <i class="fa-solid fa-angle-down"></i></a>
            <input type="checkbox" id="show-services"/>
            <label for="show-services">Services <i class="fa-solid fa-angle-down"></i></label>
            <ul>
                <li><a href="#">Drop Menu 1</a></li>
                <li><a href="#">Drop Menu 2</a></li>
                <li><a href="#">Drop Menu 3</a></li>
            </ul>
            </li>  -->
            @auth('web')
            <li><a class="nav-sign_up" href="{{ route('dashboard') }}">My Profile</a></li>
            @endauth
            @guest
            <li><a href="{{ route('login') }}" class="nav-login">Sign In</a></li>
            <li><a class="nav-sign_up" href="{{ route('register') }}">Sign Up</a></li>
            @endguest
            <!-- <li>
                <select class="form-select changeLang">
                    <option value="en">English</option>
                    <option value="bn">Bangla</option>
                </select>
            </li> -->

        </ul>
        </div>
    </div>

</section>





    @yield('app-content')

    <section class='footer_section'>

        <div class="footer_card">
            <div class="blank-1"></div>
            <div class="cards">

                <div class="card">
                    <div class="footer_body">
                        <div class="footer_logo">
                        <a href="{{url('/')}}">
                            <div class="logo">
                                <img src="{{url('Frontend/assets/img/logo2.png')}}" alt="">
                                <div class="logo_text">
                                    <h1>Well<span>Care</span></h1>
                                    <p>Care at Your Doorstep</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="footer_body">
                       <h3>About Us</h3>
                       <ul>
                        <a href=""><li>About Us</li></a>
                        <a href=""><li>What We Do</li></a>
                        <a href=""><li>Team</li></a>
                        <a href=""><li>Contact</li></a>
                       </ul>
                    </div>
                </div>



                <div class="card">
                    <div class="footer_body">
                       <h3>More</h3>
                       <ul>
                        <a href=""><li>Projects</li></a>
                        <a href=""><li>Events</li></a>
                        <a href=""><li>Donate</li></a>
                        <a href=""><li>Blog</li></a>
                       </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="footer_body">
                       <h3>Connect With Us:</h3>
                       <ul class='social'>
                        <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
                        <a href=""><li><i class="fa-brands fa-instagram"></i></li></a>
                        <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
                        <a href=""><li><i class="fa-brands fa-linkedin"></i></li></a>
                       </ul>
                    </div>
                </div>



            </div>
            <div class="blank-2"></div>
        </div>

        <div class="bottom_footer">
            <p>All Right Reserve to Wise Corporation</p>
        </div>
        
</section>
    @stack('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      @if (Session::has('message'))
        var type = "{{ Session::get('type', 'info') }}"
        switch(type){
          case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
          case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
          case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
      @endif
    </script>
</body>
</html>
