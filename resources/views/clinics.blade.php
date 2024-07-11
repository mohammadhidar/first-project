@extends('layouts.clinic')
@section('content')
<div class="services_section layout_padding padding_bottom_0">
    <div class="container">
        <h1 class="blog_text">Clinics</h1>
        <div class="row">
            @foreach($clinics as $clinic)
            <div class="col-lg-4">
                <div class="call_box">
                    <div class="call_image"><img src="{{asset('front/images/call-icon.png')}}"></div>
                    <h2 class="emergency_text"> {{$clinic->name}}</h2>
                    <h1 class="call_text">location : {{$clinic->location}}</h1>
                    <p class="dolor_text">
                        {{$clinic->about}}<br>
                        phone: {{$clinic->phone}}<br>
                        Doctor : {{$clinic->user->name}} <br>
                        Section : {{$clinic->section->name}}<br>
                        <a href="{{route('clinic.clinicsDetails',$clinic->id)}}">More Details</a>
                    </p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
