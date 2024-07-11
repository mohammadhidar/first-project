@extends('nurse.dashboard')

@section('content2')
@if(session()->has('error'))

<div class="alert alert-danger">
    {{session()->get('error')}}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
<div class="row">
    <div class="col-lg-10" style="margin:10px auto;">
        <div class="card">
            <div class="card-header">
                <strong class="card-title"> All Dates

                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Clinic</th>
                            <th>Day</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Alternative Time</th>
                            <th>Patient</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dates as $date)
                        <tr>
                            <td>{{$date->user->name}} , {{$date->user->id}}</td>
                            <td>{{$date->clinic->name}}</td>
                            <td>{{$date->day}}</td>
                            <td>{{$date->date}}</td>
                            <td>{{$date->time1}}</td>
                            <td>{{$date->time2}}</td>
                            <td>{{$date->state}}</td>

                            <td>{{$date->state}}</td>
                            <td>
                                <a href="{{route('nurse.accept',$date->id)}}" class="btn btn-success">
                                    Accept</a>

                                <a href="{{route('nurse.decline',$date->id)}}" class="btn btn-danger">
                                    Decline</a>

                                <a href="{{route('nurse.show',$date->id)}}" class="btn btn-primary">
                                    Update</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End  Bas
ic Table  -->








</div>@endsection
