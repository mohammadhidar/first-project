<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Newlife</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('front/images/fevicon.png')}}" type="image/gif')}}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="destop_header navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"></div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clinic.clinics')}}">Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="logo_main" href="index.html"><img src="{{asset('front/images/logo.png')}}"></a>
                    </li>

                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a href="{{route('home')}}" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest


                </ul>
            </div>
        </nav>
        <nav class="mobile_header navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.html"><img src="{{asset('front/images/logo.png')}}"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clinic.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor.html">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="logo_main" href="index.html"><img src="{{asset('front/images/logo.png')}}"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="depatments.html">Depatments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="{{asset('front/images/search-icon.png')}}"></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- header section end -->

    @yield('content')

    <!-- footer section start -->
    <!-- info section -->
    <div class="info_section layout_padding">
        <div class="container ">
            <div class="info_content">
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex">
                                <h5>
                                    Medical Care
                                </h5>
                            </div>
                            <div class="d-flex ">
                                <ul>
                                    <li>
                                        <a href="">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About Departments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ml-3 ml-md-5">
                                    <li>
                                        <a href="">
                                            Cancer Oncology
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Dental Surgery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Diagnose & Research
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Drug / Medicines
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex">
                                <h5>
                                    The Services
                                </h5>
                            </div>
                            <div class="d-flex ">
                                <ul>
                                    <li>
                                        <a href="">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About Departments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ml-3 ml-md-5">
                                    <li>
                                        <a href="">
                                            Cancer Oncology
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Dental Surgery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Diagnose & Research
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Drug / Medicines
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex">
                                <h5>
                                    Departments
                                </h5>
                            </div>
                            <div class="d-flex ">
                                <ul>
                                    <li>
                                        <a href="">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            About Departments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ml-3 ml-md-5">
                                    <li>
                                        <a href="">
                                            Cancer Oncology
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Dental Surgery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Diagnose & Research
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Drug / Medicines
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
                    <div class="social-box">
                        <a href="">
                            <img src="{{asset('front/images/fb-icon.png')}}" alt="" />
                        </a>

                        <a href="">
                            <img src="{{asset('front/images/twitter-icon.png')}}" alt="" />
                        </a>
                        <a href="">
                            <img src="{{asset('front/images/linkedin-icon.png')}}" alt="" />
                        </a>
                        <a href="">
                            <img src="{{asset('front/images/instagram-icon.png')}}" alt="" />
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end info section -->
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright">2023 All Rights Reserved. Design by <a href="https://html.design">Free html
                    Templates</a></p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{asset('front/js/jquery.min.js')}}"></script>
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('front/js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('front/js/custom.js')}}"></script>






    <sc ript src="{{asset('front/js/owl.carousel.js')}}">


       
 </script>
        <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js')}}"></script>
</body>

</html>