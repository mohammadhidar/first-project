@extends('layouts.clinic')

@section('content')



<div class="care_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_3" href="#"><img src="{{asset('front/images/clinic.jpg')}}"></div>
            </div>
            <div class="col-md-6">
                <div class="care_taital" style="background-color: wheat;border-radius: 25px; padding: 20px;">
                    <h4 class="finest_text">
                        <font color="black" align="center"> {{$clinic->name}} ,Dr: {{$clinic->user->name}}</font>
                    </h4>
                    <h1 class="care_text">
                        <font color="black"> {{$clinic->phone}}</font>
                    </h1>
                    <p class="ipsum_text">
                        <font color="black">
                            {{$clinic->about}}
                        </font>
                        <br>
                        <font color="black">
                            Dates </font><br>
                        @foreach($dates as $date)
                        <font color="black">
                            Day : {{$date->day}} , Start At {{$clinic->start_at}} , End At {{$clinic->end_at}} ,
                            break
                            {{$clinic->break}}
                        </font>
                        <br>

                        @endforeach
                    </p>


                </div>
            </div>
        </div>
    </div>

</div>


<div class="appointment_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="need_text">Need a doctor for check-Up </h3>
                <h1 class="make_text">Make An Appointment & You're Done </h1>
            </div>
            <div class="col-md-6">
                <div class="appointment_bt_main">

                    <div class="appointment_bt"><a href="{{route('book.create',$clinic->id)}}">Get Appointment</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
