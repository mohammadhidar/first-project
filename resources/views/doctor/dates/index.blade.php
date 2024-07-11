@extends('doctor.dashboard')

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
                <strong class="card-title"> Click here -> to add new date
                    <a href="{{route('dates.create',$clinic_id)}}" class="btn btn-primary" style="border-radius: 20px;">
                        Create
                    </a>
                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clinic</th>
                            <th>Day</th>
                            <th>Start At</th>
                            <th>End At</th>
                            <th>Break</th>
                            <th>Last updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dates as $date)
                        <tr>
                            <td>{{$date->clinic->name}}</td>
                            <td>{{$date->day}}</td>
                            <td>{{$date->start_at}}</td>
                            <td>{{$date->end_at}}</td>
                            <td>{{$date->break}}</td>
                            <td>{{$date->updated_at}}</td>
                            <td>
                                <a href="{{route('dates.show',$date->id)}}" class="btn btn-primary">
                                    Edit</a>
                                <form action="{{route('dates.destroy',$date->id)}}" method="POST" class="btn-sm ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>

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