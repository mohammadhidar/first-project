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
                <strong class="card-title"> All Accepted Dates

                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clinic</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message To Patient</th>
                            <th>Message To Doctor</th>
                            <th>Last updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dates as $date)
                        <tr>
                            <td>{{$date->clinic->name}}</td>
                            <td>{{$date->date}}</td>
                            <td>{{$date->time}}</td>
                            <td>{{$date->messageToUser}}</td>
                            <td>{{$date->messageToDoctor}}</td>
                            <td>{{$date->updated_at}}</td>
                            <td>
                                @if(App\Models\MessageToNurse::where('save_date_id',$date->id)->count()>0)
                                <a href="{{route('complaints.index',$date->id)}}" class="btn btn-danger">

                                    Complaints By Doctore
                                    {{App\Models\MessageToNurse::where('save_date_id',$date->id)->count()}}
                                </a>
                                @else
                                <a href="{{route('complaints.index',$date->id)}}" class="btn btn-success">

                                    Complaints By Doctore
                                </a>
                                @endif


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
