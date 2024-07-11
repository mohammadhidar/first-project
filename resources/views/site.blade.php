@extends('layouts.clinic')
@section('content')
<!-- banner section start -->
<div class="banner_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 padding_0">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="banner_bg">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Providing appropritate<br>
                                        health care for
                                        <br>seniors and childrens
                                    </h1>
                                    <p class="long_text">It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout. The point of using
                                        Lorem Ipsum</p>
                                    <div class="btn_main">
                                        <div class="about_us"><a href="#">About Us</a></div>
                                        <div class="about_bt"><a href="#">Get Appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="banner_bg">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Providing appropritate<br>
                                        health care for
                                        <br>seniors and childrens
                                    </h1>
                                    <p class="long_text">It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout. The point of using
                                        Lorem Ipsum</p>
                                    <div class="btn_main">
                                        <div class="about_us"><a href="#">About Us</a></div>
                                        <div class="about_bt"><a href="#">Get Appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="banner_bg">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Providing appropritate<br>
                                        health care for
                                        <br>seniors and childrens
                                    </h1>
                                    <p class="long_text">It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout. The point of using
                                        Lorem Ipsum</p>
                                    <div class="btn_main">
                                        <div class="about_us"><a href="#">About Us</a></div>
                                        <div class="about_bt"><a href="#">Get Appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i></a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 padding_0">
                <div class="banner_img"></div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->
<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="about_taital">
                    <h4 class="about_text">About</h4>
                    <h1 class="highest_text">The Highest provide health care</h1>
                    <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable
                        content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposedIt is a long established fact that a
                        reader will be distracted by the readable content of a page when looking at its layout. The
                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                        opposed</p>
                    <div class="read_bt"><a href="#">Read More</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image_2" href="#"><img src="{{asset('front/images/img-2.png')}}"></div>
            </div>
        </div>
    </div>
</div>
<!-- about section end -->
<!-- care section start -->
<div class="care_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_3" href="#"><img src="{{asset('front/images/img-3.png')}}"></div>
            </div>
            <div class="col-md-6">
                <div class="care_taital">
                    <h4 class="finest_text">Finest Patient</h4>
                    <h1 class="care_text">Care & Amenities</h1>
                    <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam,tempor Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam,incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    <div class="read_bt_2"><a href="#">Read More</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- care section end -->
<!-- services section start -->
<div class="services_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="call_box">
                    <div class="call_image"><img src="{{asset('front/images/call-icon.png')}}"></div>
                    <h2 class="emergency_text">Emergency Cases</h2>
                    <h1 class="call_text">1-800-400-5768</h1>
                    <p class="dolor_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="call_box active">
                    <div class="call_image"><img src="{{asset('front/images/time-seat-icon.png')}}"></div>
                    <h2 class="emergency_text">Doctors timetable</h2>
                    <h1 class="call_text">1-800-400-5768</h1>
                    <p class="dolor_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="call_box">
                    <div class="call_image"><img src="{{asset('front/images/watch-icon.png')}}"></div>
                    <h2 class="emergency_text">Opening hours</h2>
                    <h1 class="call_text">1-800-400-5768</h1>
                    <p class="dolor_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services section end -->
<!-- doctor section start -->
<div class="doctor_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 padding_top0">
                <h4 class="about_text">Best Laboratory</h4>
                <h1 class="highest_text">Tests Available</h1>
                <p class="lorem_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur </p>
                <div class="read_main">
                    <div class="read_bt"><a href="#">Read More</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image_4"><img src="{{asset('front/images/img-4.png')}}"></div>
            </div>
        </div>
    </div>
</div>



@endsection