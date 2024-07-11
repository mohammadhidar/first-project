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
                            <th>message</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->message}}</td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>MessageToUser</th>
                                        <th>MessageToDoctor</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($message->find_save_dates($message->save_date_id) as $date)
                                    <tr>
                                        <td>{{$date->date}}</td>
                                        <td>{{$date->time}}</td>
                                        <td>{{$date->messageToUser}}</td>
                                        <td>{{$date->messageToDoctor}}</td>

                                        <td>

                                            <a href="{{route('savedates.decline',$date->id)}}" class="btn btn-danger">
                                                Decline</a>

                                            <a href="{{route('savedates.show',$date->id)}}" class="btn btn-primary">
                                                Update</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
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
